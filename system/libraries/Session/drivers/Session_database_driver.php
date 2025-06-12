<?php
/**
 * CodeIgniter Session Database Driver
 * Patched for PHP 8.1+ compatibility
 */

#[\AllowDynamicProperties] // Prevents dynamic property deprecation warning in PHP 8.2+
class CI_Session_database_driver extends CI_Session_driver implements SessionHandlerInterface
{
	protected $_db;
	protected $_row_exists = FALSE;
	protected $_platform;

	public function __construct(&$params)
	{
		parent::__construct($params);
		$CI =& get_instance();
		isset($CI->db) or $CI->load->database();
		$this->_db = $CI->db;

		if (!$this->_db instanceof CI_DB_query_builder) {
			throw new Exception('Query Builder not enabled.');
		} elseif ($this->_db->pconnect) {
			throw new Exception('Persistent database connection detected.');
		} elseif ($this->_db->cache_on) {
			throw new Exception('Query caching must be disabled.');
		}

		$driver = $this->_db->dbdriver . (!empty($this->_db->subdriver) ? '_' . $this->_db->subdriver : '');
		$this->_platform = str_contains($driver, 'mysql') ? 'mysql' : (in_array($driver, ['postgre', 'pdo_pgsql'], TRUE) ? 'postgre' : '');

		if (!isset($this->_config['save_path']) && ($this->_config['save_path'] = config_item('sess_table_name')))
			log_message('debug', 'Session: "sess_save_path" fallback to "sess_table_name".');
	}

	#[\ReturnTypeWillChange]
	public function open($save_path, $name)
	{
		if (empty($this->_db->conn_id) && !$this->_db->db_connect())
			return $this->_failure;
		$this->php5_validate_id();
		return $this->_success;
	}

	#[\ReturnTypeWillChange]
	public function close()
	{
		return ($this->_lock && !$this->_release_lock()) ? $this->_failure : $this->_success;
	}

	#[\ReturnTypeWillChange]
	public function read($session_id)
	{
		if ($this->_get_lock($session_id) === FALSE)
			return $this->_failure;
		$this->_db->reset_query();
		$this->_session_id = $session_id;
		$this->_db->select('data')->from($this->_config['save_path'])->where('id', $session_id);
		if ($this->_config['match_ip'])
			$this->_db->where('ip_address', $_SERVER['REMOTE_ADDR']);

		$result = $this->_db->get();
		if (!$result || ($row = $result->row()) === NULL) {
			$this->_row_exists = FALSE;
			$this->_fingerprint = md5('');
			return '';
		}

		$data = $this->_platform === 'postgre' ? base64_decode(rtrim($row->data)) : $row->data;
		$this->_fingerprint = md5($data);
		$this->_row_exists = TRUE;
		return $data;
	}

	#[\ReturnTypeWillChange]
	public function write($session_id, $session_data)
	{
		$this->_db->reset_query();

		if (isset($this->_session_id) && $session_id !== $this->_session_id) {
			if (!$this->_release_lock() || !$this->_get_lock($session_id))
				return $this->_failure;
			$this->_row_exists = FALSE;
			$this->_session_id = $session_id;
		} elseif ($this->_lock === FALSE)
			return $this->_failure;

		if ($this->_row_exists === FALSE) {
			$insert_data = [
				'id' => $session_id,
				'ip_address' => $_SERVER['REMOTE_ADDR'],
				'timestamp' => time(),
				'data' => $this->_platform === 'postgre' ? base64_encode($session_data) : $session_data
			];
			if ($this->_db->insert($this->_config['save_path'], $insert_data)) {
				$this->_fingerprint = md5($session_data);
				$this->_row_exists = TRUE;
				return $this->_success;
			}
			return $this->_failure;
		}

		$this->_db->where('id', $session_id);
		if ($this->_config['match_ip'])
			$this->_db->where('ip_address', $_SERVER['REMOTE_ADDR']);

		$update_data = ['timestamp' => time()];
		if ($this->_fingerprint !== md5($session_data)) {
			$update_data['data'] = $this->_platform === 'postgre' ? base64_encode($session_data) : $session_data;
		}

		if ($this->_db->update($this->_config['save_path'], $update_data)) {
			$this->_fingerprint = md5($session_data);
			return $this->_success;
		}
		return $this->_failure;
	}

	#[\ReturnTypeWillChange]
	public function destroy($session_id)
	{
		if ($this->_lock) {
			$this->_db->reset_query();
			$this->_db->where('id', $session_id);
			if ($this->_config['match_ip'])
				$this->_db->where('ip_address', $_SERVER['REMOTE_ADDR']);
			if (!$this->_db->delete($this->_config['save_path']))
				return $this->_failure;
		}
		if ($this->close() === $this->_success) {
			$this->_cookie_destroy();
			return $this->_success;
		}
		return $this->_failure;
	}

	#[\ReturnTypeWillChange]
	public function gc($maxlifetime)
	{
		$this->_db->reset_query();
		return $this->_db->delete($this->_config['save_path'], 'timestamp < ' . (time() - $maxlifetime)) ? $this->_success : $this->_failure;
	}

	public function validateSessionId($id)
	{
		$this->_db->reset_query();
		$this->_db->select('1')->from($this->_config['save_path'])->where('id', $id);
		if ($this->_config['match_ip'])
			$this->_db->where('ip_address', $_SERVER['REMOTE_ADDR']);
		$result = $this->_db->get()->row();
		return !empty($result);
	}

	protected function _get_lock($session_id)
	{
		if ($this->_platform === 'mysql') {
			$arg = md5($session_id . ($this->_config['match_ip'] ? '_' . $_SERVER['REMOTE_ADDR'] : ''));
			if ($this->_db->query("SELECT GET_LOCK('{$arg}', 300) AS ci_session_lock")->row()->ci_session_lock) {
				$this->_lock = $arg;
				return TRUE;
			}
			return FALSE;
		} elseif ($this->_platform === 'postgre') {
			$arg = "hashtext('{$session_id}')" . ($this->_config['match_ip'] ? ", hashtext('{$_SERVER['REMOTE_ADDR']}')" : '');
			if ($this->_db->simple_query("SELECT pg_advisory_lock({$arg})")) {
				$this->_lock = $arg;
				return TRUE;
			}
			return FALSE;
		}
		return parent::_get_lock($session_id);
	}

	protected function _release_lock()
	{
		if (!$this->_lock)
			return TRUE;
		if ($this->_platform === 'mysql') {
			if ($this->_db->query("SELECT RELEASE_LOCK('{$this->_lock}') AS ci_session_lock")->row()->ci_session_lock) {
				$this->_lock = FALSE;
				return TRUE;
			}
			return FALSE;
		} elseif ($this->_platform === 'postgre') {
			if ($this->_db->simple_query("SELECT pg_advisory_unlock({$this->_lock})")) {
				$this->_lock = FALSE;
				return TRUE;
			}
			return FALSE;
		}
		return parent::_release_lock();
	}
}

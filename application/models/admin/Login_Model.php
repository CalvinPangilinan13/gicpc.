<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_Model extends CI_Model
{

	public function index($email, $password)
	{
		$data = array(
			'email' => trim($email),
			'password' => trim($password)
		);

		$query = $this->db->get_where('tbladmin', $data);
		$result = $query->row();

		// Debugging
		echo '<pre>';
		print_r($this->db->last_query());
		print_r($result);
		exit;

		return $result;
	}
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_Model extends CI_Model
{

	public function index($email, $password)
	{
		$data = array(
			'email' => $email,
			'password' => md5($password) // optional, if used in DB
		);
		$login = $this->db->get_where('tbladmin', $data);

		if ($login->num_rows() > 0) {
			return $login->row();
		} else {
			return NULL;
		}
	}
}
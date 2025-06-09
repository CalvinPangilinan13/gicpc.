<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_Model extends CI_Model
{
	//for getting user details
	public function getusedetails($uid)
	{
		$query = $this->db->select('name,email')
			->where('id', $uid)
			->from('tbladmin')
			->get();
		return $query->row();
	}

	//For updating user details
	public function updateuserprofile($uid, $name, $email)
	{
		$this->db->where('id', $uid);
		$this->db->update('tbladmin', [
			'name' => $name,
			'email' => $email
		]);

		return $this->db->affected_rows() > 0;
	}


}
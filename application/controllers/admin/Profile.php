<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends CI_Controller
{
	//Validating login
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('uid'))
			redirect('admin/login');
	}
	//For fetching user data
	public function index()
	{

		$uid = $this->session->userdata('uid');
		$this->load->model('admin/Profile_Model', 'profile');
		$data['profile'] = $this->profile->getusedetails($uid);
		$this->load->view('admin/profile', $data);

	}
	public function updateprofile()
	{
		// Load form validation library if not autoloaded
		$this->load->library('form_validation');

		// Set form validation rules
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email Id', 'required|valid_email');

		// Run validation
		if ($this->form_validation->run()) {
			// Get post values
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$uid = $this->session->userdata('uid');

			// Load model
			$this->load->model('admin/Profile_Model', 'profilees');

			// Attempt to update user profile
			$result = $this->profilees->updateuserprofile($uid, $name, $email);

			if ($result) {
				$this->session->set_flashdata('success', 'Profile updated successfully.');
			} else {
				$this->session->set_flashdata('error', 'No changes were made or update failed.');
			}
		} else {
			// Validation failed
			$this->session->set_flashdata('error', strip_tags(validation_errors()));
		}

		// Redirect back to profile
		redirect('admin/Profile');
	}
}

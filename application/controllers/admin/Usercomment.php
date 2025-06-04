<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usercomment extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Usercomment_model', 'comment');
		if (!$this->session->userdata('uid'))
			redirect('admin/login');
	}

	public function index()
	{
		$usercomment = $this->comment->managecomment();
		$this->load->view('admin/user_manage_comment', ['managecomment' => $usercomment]);
	}

	public function commetApproved()
	{
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('comment_id', 'Comment ID', 'required');

		if ($this->form_validation->run()) {
			// Get posted values
			$status = $this->input->post('status');
			$comment_id = $this->input->post('comment_id');
			$reply = $this->input->post('reply'); // optional

			$this->load->model('admin/Usercomment_model', 'comit');

			$update_data = [
				'status' => $status,
				'reply' => $reply
			];

			$this->comit->Approvedcomment($comment_id, $update_data);

			$this->session->set_flashdata('success', 'Updated successfully.');
			redirect('admin/Usercomment');
		} else {
			$this->session->set_flashdata('error', 'Something went wrong. Please try again.');
			redirect('admin/Usercomment');
		}
	}


}

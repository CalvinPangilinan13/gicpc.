<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercomment extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('admin/Usercomment_model','comment');
		if(!$this->session->userdata('uid'))
		redirect('admin/login');
	}

	public function index()
	{
		$usercomment=$this->comment->managecomment();
		$this->load->view('admin/user_manage_comment',['managecomment'=>$usercomment]);
	}

	public function commetApproved()
	{
		//Form Validation
	$this->form_validation->set_rules('status','Nastatusme','required');

		if($this->form_validation->run())
		{
			//Getting Post Values
			$status=$this->input->post('status');
			$postid=$this->input->post('postid');
		   
			$this->load->model('admin/Usercomment_model','comit');
			$profiledetails=$this->comit->Approvedcomment($postid,$status);
			$this->session->set_flashdata('success',' updated successfull');
			redirect('admin/Usercomment');
		  }
		 else {
			$this->session->set_flashdata('error','Something went wrong. Please try again.');
			redirect('admin/Usercomment');
			}

        }

}

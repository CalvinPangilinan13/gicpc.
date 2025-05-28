<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('admin/Dashboard_Model');
		if(!$this->session->userdata('uid'))
		redirect('admin/login');
		}
	
	public function index()
	{   $this->load->model('admin/Dashboard_Model','Dashboard');
		$data['totalnew'] = $this->Dashboard->totalnewcount();
		$data['totalcategory'] = $this->Dashboard->totalcategorycount();
		$data['totalsubcategory'] = $this->Dashboard->totalsubcategorycount();
		$data['totalcomment'] = $this->Dashboard->totalcommentcount();
		$this->load->view('admin/dashboard',$data);

	}
}

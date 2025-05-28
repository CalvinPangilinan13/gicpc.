<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	function __construct(){
		parent::__construct();
	     $this->load->model('Website_model');
		 //$this->load->model('Search_Model');
		 
		 $this->load->library("pagination");
	}

	public function index()
	{   
		$sdata=$this->input->post('searchdata');
		$data['sresult']=$this->Website_model->getsearch($sdata);
        $data['category']=$this->Website_model->categoryList();
		$data['resentlypost']=$this->Website_model->resentlypost();
	
		$this->load->view('search',$data);
	}

	
}

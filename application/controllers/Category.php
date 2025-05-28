<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	function __construct(){
		parent::__construct();
	     $this->load->model('Website_model');
		 //$this->load->model('Search_Model');
		 
		 $this->load->library("pagination");
	}

	public function index($id)
	{   
		 $data['category']=$this->Website_model->categoryList();
		 $data['resentlypost']=$this->Website_model->resentlypost();
		// $data['viewdetails']=$this->Website_model->getnewsubdetailscat();
		$data['getwebsitedetailscategory']=$this->Website_model->getwebsitedetailscategory($id);
        $this->load->view('category',$data);
	}
	
	
}

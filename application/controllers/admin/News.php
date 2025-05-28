<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('admin/Category_model','usecategory');
		$this->load->model('admin/Addnews_model','addpost');
		$this->load->library("pagination");
		if(!$this->session->userdata('uid'))
		redirect('admin/login');
	}

	function fetch_subcategory()
	{
	if($this->input->post('category_name'))
	{
	echo $this->addpost->fetch_subcate($this->input->post('category_name'));
	}
	}

	public function add()
	{
		$userdetails=$this->usecategory->categoryList();
		$this->form_validation->set_rules('title', 'Title:', 'required');
		$this->form_validation->set_rules('category', 'category:', 'required');
		$this->form_validation->set_rules('subcategory', 'subcategory:', 'required');
		$this->form_validation->set_rules('description', 'description:', 'required');
		if ($this->form_validation->run()) 
        {
          $title=$this->input->post('title');
		  $category=$this->input->post('category');
		  $subcategory=$this->input->post('subcategory');
		  $description=$this->input->post('description');

		  //image upload
		  if (isset($_FILES['image']['name'])) {
			$this->load->library('upload');
			$config['upload_path'] = 'uploads/files/';
			$config['allowed_types']        = 'jpg|jpeg|png|pdf|gif';
			$config['file_name']  = date('YmdHms').'-'.rand(1,999999);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('image')) {

			   $uploaded = $this->upload->data();
			  $uploadimage =$uploaded['file_name'];
			  }
			}
			
			$this->addpost->addnewss($title,$category,$subcategory,$description,$uploadimage); 
			$this->load->view('admin/add-post',['viewdetails'=>$userdetails]);
	    }
		else{
			$this->load->view('admin/add-post',['viewdetails'=>$userdetails]);
		}
		
		
	}

	public function managenews()
	{
		//pagination settings
        $config['base_url'] = site_url('admin/News/managenews');
        $config['total_rows'] = $this->db->count_all('tbladdnews');
        $config['per_page'] = "10";
        $config["uri_segment"] = 1;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		
        $data["links"] = $this->pagination->create_links();
		$data['viewdetails']=$this->addpost->getnewsubdetails($config["per_page"], $page);
		$this->load->view('admin/manage-post',$data);
	}

	//Delete Record  
	public function delete($uid){
	$this->addpost->deletenews($uid);
	$this->session->set_flashdata('success','Delete Record deleted');
	redirect('admin/News/managenews');
	}

	    public function editdata($uid){
		$data['viewdetails']=$this->usecategory->categoryList();
		$data['editdata']=$this->addpost->editdata($uid);
		$this->load->view('admin/update_post',$data);	
		}
	
	public function newupdate()
	{
		$userdetails=$this->usecategory->categoryList();
		$this->form_validation->set_rules('title', 'Title:', 'required');

		if ($this->form_validation->run())
		{
			//Getting Post Values
			$uid=$this->input->post('id');
			$title=$this->input->post('title');
			$category=$this->input->post('category');
			$subcategory=$this->input->post('subcategory');
			$description=$this->input->post('description');

		 //image upload
		 if (isset($_FILES['image']['name'])) {
			$this->load->library('upload');
			$config['upload_path'] = 'uploads/files/';
			$config['allowed_types']        = 'jpg|jpeg|png|pdf|gif';
			$config['file_name']  = date('YmdHms').'-'.rand(1,999999);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('image')) {

			   $uploaded = $this->upload->data();
			  $uploadimage =$uploaded['file_name'];
			  }
			}
			$this->addpost->updatenews($uid,$title,$category,$subcategory,$description,$uploadimage); 
			$this->session->set_flashdata('success','News updated successfull');
			redirect('admin/News/managenews',$userdetails);
		  }
		 else {
			$this->session->set_flashdata('error','Something went wrong. Please try again.');
			redirect('admin/News/managenews');
			}
	
	}
	 
	public function getmarks()
    {
		$id   = $_POST['id'];
		$dataddd= $this->addpost->getwebsitedetails($id);
        $this->load->view("admin/modal.php",['data'=>$dataddd]);

    }
}

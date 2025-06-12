<?php
defined('BASEPATH') or exit('No direct script access allowed');

#[\AllowDynamicProperties]  // ✅ Add this for PHP 8.2 compatibility
class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Website_model');
		$this->load->library("pagination");
	}

	public function index()
	{
		$config['base_url'] = site_url('welcome/index');
		$config['total_rows'] = $this->db->count_all('tbladdnews');
		$config['per_page'] = "3";
		$config["uri_segment"] = 1;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		// Bootstrap pagination tags
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

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();
		$data['category'] = $this->Website_model->categoryList();
		$data['resentlypost'] = $this->Website_model->resentlypost();
		$data['viewdetails'] = $this->Website_model->getnewsubdetails($config["per_page"], $page);
		$this->load->view('welcome_message', $data);
	}

	public function post($id)
	{
		$usernewdetails['category'] = $this->Website_model->categoryList();
		$usernewdetails['viewdetail'] = $this->Website_model->resentlypost();
		$usernewdetails['viewdetails'] = $this->Website_model->getwebsitedetails($id);
		$usernewdetails['comment'] = $this->Website_model->getcomment($id);

		$this->load->view('post', $usernewdetails);
	}

	public function comment()
	{
		ini_set('display_errors', 1);
		error_reporting(E_ALL);

		if ($this->input->method() === 'post') {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$comment = $this->input->post('comment');
			$postid = $this->input->post('postid');
			$status = 0;

			if ($name && $email && $comment && $postid) {
				$this->Website_model->commentsave($postid, $name, $email, $comment, $status);
				redirect(base_url('welcome/post/' . $postid . '?success=1'));
			} else {
				$data['error'] = 'Please fill in all fields.';
				$data['viewdetails'] = $this->Website_model->getwebsitedetails($postid);
				$data['comment'] = $this->Website_model->getcomment($postid);
				$this->load->view('post', $data);
			}
		}
	}
}

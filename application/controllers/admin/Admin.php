<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('uid'))
            redirect('admin/login');
        $this->load->model('admin/Admin_model', 'adminmodel');
    }

    public function add()
    {
        $this->load->view('admin/admin_add');
    }
    public function manageadd()
    {
        $userdetails = $this->adminmodel->adminlist();
        $this->load->view('admin/manage_admin', ['viewdetails' => $userdetails]);
    }

    public function savedata()
    {
        if ($this->input->post('type') == 1) {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->adminmodel->saverecords($name, $email, $password);
            echo json_encode(array("statusCode" => 200));
        }
    }
    //Delete Record
    public function delete($uid)
    {
        $this->adminmodel->delete($uid);
        $this->session->set_flashdata('success', 'Admin Record deleted');
        redirect('admin/Admin/manageadd');
        
    }
}

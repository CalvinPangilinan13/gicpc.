<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct() // ✅ Proper constructor definition
    {
        parent::__construct();

        // // Model and session check
        // if (!$this->session->userdata('uid')) {
        //     redirect('admin/login');
        // }

        $this->load->model('admin/About_model', 'aboutmodel');
    }

    public function index()
    {
        $data['about'] = $this->aboutmodel->getAllAbout(); // fetch all records
        $this->load->view('Aboutus', $data);
    }

    public function about()
    {
        $data['about'] = $this->aboutmodel->getaboutdetails(1); // or dynamic ID
        $this->load->view('frontend/aboutus', $data);
    }
}

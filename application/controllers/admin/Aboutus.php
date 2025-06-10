<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aboutus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('uid'))
            redirect('admin/login');
        $this->load->model('admin/About_model', 'aboutmodel');

    }

    public function add()
    {
        // Load empty form for create
        $this->load->view('admin/aboutus_form');
    }
    public function editdata($id)
    {
        $about = $this->aboutmodel->getAboutById($id);

        if (!$about) {
            $this->session->set_flashdata('error', 'About Us record not found.');
            redirect('admin/Aboutus/manage');
        }

        $data['about'] = $about;
        $this->load->view('admin/aboutus_edit', $data);
    }

    public function manage()
    {
        $data['viewdetails'] = $this->aboutmodel->aboutList();
        $this->load->view('admin/manage_about', $data);
    }

    public function save()
    {
        $this->load->library('form_validation');

        // Validate all input fields
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('subtitle', 'Subtitle', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('founder_name', 'Founder Name', 'required');
        $this->form_validation->set_rules('founded_date', 'Founded Date', 'required');
        $this->form_validation->set_rules('vision', 'Vision', 'required');
        $this->form_validation->set_rules('mission', 'Mission', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('contact_email', 'Contact Email', 'required|valid_email');
        $this->form_validation->set_rules('social_links', 'Social Links', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        $post = $this->input->post();

        // Validate image only if it's a new record (no ID)
        if (empty($post['id']) && empty($_FILES['image_url']['name'])) {
            $this->form_validation->set_rules('image_url', 'Image', 'required');
        }

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            if (!empty($post['id'])) {
                redirect('admin/Aboutus/editdata/' . $post['id']);
            } else {
                redirect('admin/Aboutus/add');
            }
        }

        // Prepare data
        $data = [
            'title' => $post['title'],
            'subtitle' => $post['subtitle'],
            'content' => $post['content'],
            'founder_name' => $post['founder_name'],
            'founded_date' => $post['founded_date'],
            'vision' => $post['vision'],
            'mission' => $post['mission'],
            'location' => $post['location'],
            'contact_email' => $post['contact_email'],
            'social_links' => $post['social_links'],
            'status' => $post['status']
        ];

        // Upload image if provided
        if (!empty($_FILES['image_url']['name'])) {
            $this->load->library('upload');
            $config['upload_path'] = FCPATH . 'uploads/files/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = date('YmdHis') . '_' . rand(1000, 9999);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image_url')) {
                $uploaded = $this->upload->data();
                $data['image_url'] = $uploaded['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Image upload failed: ' . strip_tags($this->upload->display_errors()));
                if (!empty($post['id'])) {
                    redirect('admin/Aboutus/editdata/' . $post['id']);
                } else {
                    redirect('admin/Aboutus/add');
                }
            }
        }

        // Save or update
        if (!empty($post['id'])) {
            $this->aboutmodel->updateAbout($post['id'], $data);
            $this->session->set_flashdata('success', 'About info updated successfully.');
        } else {
            $this->aboutmodel->saveAbout($data);
            $this->session->set_flashdata('success', 'About info added successfully.');
        }

        redirect('admin/Aboutus/add');
    }


    public function delete($id)
    {
        $this->aboutmodel->delete($id);
        $this->session->set_flashdata('success', 'About Information deleted successfully.');
        redirect('admin/Aboutus/manage');
    }

    public function getaboutmodal()
    {
        $id = $this->input->post('id');
        $data['data'] = $this->aboutmodel->getaboutdetails($id);
        $this->load->view('admin/aboutus_modal', $data);
    }
}

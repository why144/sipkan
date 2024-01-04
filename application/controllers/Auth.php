<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


    public function index()
    {
        if($this->session->userdata('username'))
        {
            redirect('admin');
        }
        $data['judul'] = "Halaman Login";
        $this->load->view('templates/auth-header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth-footer');
    }

    public function login()
    {
        if($this->session->userdata('username'))
        {
            redirect('admin');
        }
        $this->load->model('Auth_model');

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi!'
        ]);

        if($this->form_validation->run() == false) {
            $data['judul'] = "Halaman Login";
            $this->load->view('templates/auth-header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth-footer');
        }else
        {
            $this->Auth_model->login();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Anda telah logout!
	  </div>');
		redirect('auth');
    }

}
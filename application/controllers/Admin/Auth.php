<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function cekAkun()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $query = $this->user->cekAkun($username, $password);

        if (!$query) {
            $this->form_validation->set_message('cekAkun', 'Username atau Password yang anda masukkan salah');
            return FALSE;
        } else {
            $userData = array(
                'id'            => $query->id,
                'username'      => $query->username,
                'logged_in'     => true
            );

            $this->session->set_userdata($userData);
            return TRUE;
        }
    }
    
    public function login()
    {

        if ($this->session->userdata('username')) redirect(base_url('admin'));

        if($this->input->post('submit') === 'login') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|callback_cekAkun');

            if ($this->form_validation->run() === TRUE) {
                redirect('admin');
            }
        }

        $this->load->view('auth/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
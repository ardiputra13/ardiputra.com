<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
    }

    public function index()
    {
        $data['title'] = 'Overview';
        $data['content'] = $this->load->view('admin/content/overview', null, true);

        $this->load->view('admin/layout', $data);
    }
}
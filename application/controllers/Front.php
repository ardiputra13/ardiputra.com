<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model', 'master');
    }

    public function index()
    {
        $b = time();
        $hour = date("G",$b);

        if ($hour>=0 && $hour<=11)
        {
            $ucapan = 'Selamat Pagi';
        }
        elseif ($hour >=12 && $hour<=14)
        {
            $ucapan = 'Selamat Siang';
        }
        elseif ($hour >=15 && $hour<=17)
        {
            $ucapan = 'Selamat Sore';
        }
        elseif ($hour >=17 && $hour<=18)
        {
            $ucapan = 'Selamat Petang';
        }
        elseif ($hour >=19 && $hour<=23)
        {
            $ucapan = 'Selamat Malam';
        }


        $sosial = '
        <a href="https://linkedin.com/in/ardiputra26"><i class="fa fa-linkedin" aria-hidden="true"></i> </a>
        <a href="https://github.com/ardiputra13"><i class="fa fa-github" aria-hidden="true"></i> </a>';


        $data['ucapan'] = $ucapan;
        $data['sosial'] = $sosial;
        $data['portofolio'] = $this->master->get('portofolio')->result();

        $this->load->view('front/layout', $data);
    }

    public function portofolio_detail()
    {
        $id = $this->input->get('porto');
        if (!$id) die('SELESAI');

        $dbPorto = $this->master->getJoinOneWhere('portofolio', 'client', 'project_client', 'id_client', array('id_project' => $id))->row();
        if (!$dbPorto) show_404();
        $data['portofolio'] = $dbPorto;

        $this->load->view('front/pop_portofolio/popup', $data);
    }
}

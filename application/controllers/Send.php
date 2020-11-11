<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function email_to_me()
    {   
        $from_email = "no-reply@suryahadi.com"; 
        $to_email = "halo@suryahadi.com";

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.suryahadi.com',
            'smtp_port' => 25,
            'smtp_user' => $from_email,
            'smtp_pass' => 't4iuucwwET',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        
        
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");   

        $this->email->from($from_email, $this->input->post('con_name')); 
        $this->email->to($to_email);
        $this->email->subject('Dari Website Suryahadi.com. Saya adalah '.$this->input->post('con_name')); 
        $this->email->message('email : '.$this->input->post('con_email').'<br>'.$this->input->post('con_message'));

        //Send mail 
        if($this->email->send()){
            $this->session->set_flashdata("notif","Email berhasil terkirim."); 
        }else {
            $this->session->set_flashdata("notif","Email gagal dikirim."); 
        }

        redirect(base_url());
    }
}
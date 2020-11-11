<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portofolio extends MY_Controller {

    private $db_table = 'portofolio';
    
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();

        $this->load->model('Master_model', 'master');
    }

    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/client/');
        $config['total_rows'] = $this->master->get($this->db_table)->num_rows();
        $config['per_page'] = 10;
        $config['offset'] = $this->uri->segment(3);

        $config['first_link'] = false;
        $config['last_link'] = false;

        $config['attributes'] = array('class' => 'page-link');

        $config['full_tag_open'] = '<ul class="pagination pagination-sm m-0 float-right">';
        $config['full_tag_close'] = '</ul>';

        $config['num_tag_open'] = '<ul class="pagination pagination-sm m-0 float-right">';
        $config['num_tag_close'] = '</ul>';

        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);

        $data['title'] = 'Portofolio';
        $data['portofolio'] = $this->master->getJoinOne_pagination($this->db_table, 'client', 'project_client', 'id_client', $config['per_page'], $config['offset'], 'id_project')->result();
        $data['content'] = $this->load->view('admin/content/portofolio/index', $data, true);

        $this->load->view('admin/layout', $data);
    }

    public function add()
    {
        if ($this->input->post('submit') == 'addProject') {
            if (!empty($_FILES['project_image']['name'])) { // Jika ada foto
                $config['upload_path'] = './data/portofolio_image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 5000;
                $config['file_name'] = 'jangkrik_online-fileasset-_'.rand(1111,9999).'_'.rand(1111111,99999999);
                
                $this->load->library('upload', $config);

                if (! $this->upload->do_upload('project_image')) {
                    exit($this->upload->display_errors()); // Jika ada yang tidak sesuai, display saja kalau error
                } else {
                    $portofolioImage = $this->upload->file_name;
                }
            } else { // Jika tidak ada foto
                $portofolioImage = 'no_image.png';
            }

            $this->form_validation->set_rules('project_name', 'Nama Proyek', 'required');
            $this->form_validation->set_rules('project_client', 'Klien Proyek', 'required');
            $this->form_validation->set_rules('project_description', 'Deskripsi Proyek', '');
            $this->form_validation->set_message('required', "
                <script>
                    Swal.fire({
                    title: 'Gagal!',
                    text: '%s harus diisi',
                    type: 'warning',
                    confirmButtonText: 'Oke'
                    })
                </script>
            ");

            if ($this->form_validation->run() === true) {
                $compelete_date = strtotime($this->input->post('compelete_date'));

                $data = array (
                    'project_name' => $this->input->post('project_name'),
                    'project_client' => $this->input->post('project_client'),
                    'project_description' => $this->input->post('project_description'),
                    'project_image' => $portofolioImage,
                    'project_compelete_date' => $compelete_date,
                    'created_at' => now()
                );

                $query = $this->master->insert($this->db_table, $data);

                if ($query) $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Sukses!',
                    text: 'Portofolio berhasil ditambahkan',
                    type: 'success',
                    confirmButtonText: 'Oke'
                    })
                </script>
                ");
                else $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Gagal!',
                    text: 'Portofolio gagal ditambahkan',
                    type: 'error',
                    confirmButtonText: 'Oke'
                    })
                </script>
                ");

                $this->session->set_flashdata('message', $message['message']);

                redirect('admin/portofolio');
            }
        }

        $data['title'] = 'Tambah Portofolio';
        $data['client_list'] = $this->master->get('client')->result();
        $data['content'] = $this->load->view('admin/content/portofolio/add', $data, true);

        $this->load->view('admin/layout', $data);
    }

    public function edit()
    {
        $id = $this->encryption->decrypt($this->input->get('data-id'));

        if (!$id) die('data apa yang ingin anda ubah?');

        $portofolio = $this->master->get_where($this->db_table, array('id_project' => $id))->row();

        if (!$portofolio) show_404();

        if ($this->input->post('submit') == 'editProject') {
            if (!empty($_FILES['project_image']['name'])) { // Jika ada foto
                $config['upload_path'] = './data/portofolio_image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 5000;
                $config['file_name'] = 'jangkrik_online-fileasset-_'.rand(1111,9999).'_'.rand(1111111,99999999);
                
                $this->load->library('upload', $config);

                if (! $this->upload->do_upload('project_image')) {
                    exit($this->upload->display_errors()); // Jika ada yang tidak sesuai, display saja kalau error
                } else {
                    $portofolioImage = $this->upload->file_name;
                }
            } else { // Jika tidak ada foto
                $portofolioImage = $portofolio->project_image;
            }

            $this->form_validation->set_rules('project_name', 'Nama Proyek', 'required');
            $this->form_validation->set_rules('project_client', 'Klien Proyek', 'required');
            $this->form_validation->set_rules('project_description', 'Deskripsi Proyek', '');
            $this->form_validation->set_message('required', "
                <script>
                    Swal.fire({
                    title: 'Gagal!',
                    text: '%s harus diisi',
                    type: 'warning',
                    confirmButtonText: 'Oke'
                    })
                </script>
            ");

            if ($this->form_validation->run() === true) {
                $compelete_date = strtotime($this->input->post('compelete_date'));

                $data = array (
                    'project_name' => $this->input->post('project_name'),
                    'project_client' => $this->input->post('project_client'),
                    'project_description' => $this->input->post('project_description'),
                    'project_image' => $portofolioImage,
                    'project_compelete_date' => $compelete_date,
                    'updated_at' => now()
                );

                $query = $this->master->update($this->db_table, array('id_project' => $id), $data);

                if ($query) $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Sukses!',
                    text: 'Portofolio berhasil diedit',
                    type: 'success',
                    confirmButtonText: 'Oke'
                    })
                </script>
                ");
                else $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Gagal!',
                    text: 'Portofolio gagal diedit',
                    type: 'error',
                    confirmButtonText: 'Oke'
                    })
                </script>
                ");

                $this->session->set_flashdata('message', $message['message']);

                redirect('admin/portofolio');
            }
        }

        $data['title'] = 'Edit Portofolio';
        $data['client_list'] = $this->master->get('client')->result();
        $data['portofolio'] = $portofolio;
        $data['content'] = $this->load->view('admin/content/portofolio/edit', $data, true);

        $this->load->view('admin/layout', $data);
    }

    public function delete()
    {
        $id = $this->encryption->decrypt($this->input->get('data-id'));

        if (!$id) die('data apa yang ingin anda ubah?');

        $portofolio = $this->master->get_where($this->db_table, array('id_project' => $id))->row();
        if (!$portofolio) show_404();

        if ($portofolio->project_image != 'no_image.png') unlink('./data/portofolio_image/'.$portofolio->project_image);

        $query = $this->master->delete($this->db_table, array('id_project' => $id));

        if ($query) {
            $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Sukses!',
                    text: 'Portofolio berhasil dihapus',
                    type: 'success',
                    confirmButtonText: 'Oke'
                    })
                </script>
            ");
        } else {
            $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Gagal!',
                    text: 'Portofolio gagal dihapus',
                    type: 'error',
                    confirmButtonText: 'Oke'
                    })
                </script>
            ");
        }

        $this->session->set_flashdata('message', $message['message']);

        redirect('admin/portofolio');
    }
}
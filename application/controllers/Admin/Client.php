<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends MY_Controller {

    private $db_table = 'client';

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

        $data['title'] = 'Client';
        $data['client'] = $this->master->get_pagination($this->db_table, $config['per_page'], $config['offset'], 'id_client')->result();
        $data['content'] = $this->load->view('admin/content/client/index', $data, true);

        $this->load->view('admin/layout', $data);
    }

    public function add()
    {
        if ($this->input->post('submit') == 'addClient') {

            if (!empty($_FILES['client_image']['name'])) { // Jika ada foto
                $config['upload_path'] = './data/client_image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2000;
                $config['file_name'] = 'jangkrik_online-fileasset-_'.rand(1111,9999).'_'.rand(1111111,99999999);

                $this->load->library('upload', $config);

                if (! $this->upload->do_upload('client_image')) {
                    exit($this->upload->display_errors()); // Jika ada yang tidak sesuai, display saja kalau error
                } else {
                    $clientImage = $this->upload->file_name;
                }
            } else { // Jika tidak ada foto
                $clientImage = 'no_image.png';
            }

            $this->form_validation->set_rules('client_name', 'Nama Klien', 'required');
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

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'client_name' => $this->input->post('client_name'),
                    'client_image'=> $clientImage,
                    'created_at' => now()
                );

                $query = $this->master->insert($this->db_table, $data);

                if ($query) $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Sukses!',
                    text: 'Klien berhasil ditambahkan',
                    type: 'success',
                    confirmButtonText: 'Oke'
                    })
                </script>
                ");
                else $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Gagal!',
                    text: 'Klien gagal ditambahkan',
                    type: 'error',
                    confirmButtonText: 'Oke'
                    })
                </script>
                ");

                $this->session->set_flashdata('message', $message['message']);

                redirect('admin/client');
            }
        }

        $data['title'] = 'Tambah Client';
        $data['content'] = $this->load->view('admin/content/client/add', $data, true);

        $this->load->view('admin/layout', $data);
    }

    public function edit()
    {
        $id = $this->encryption->decrypt($this->input->get('data-id'));

        if (!$id) die('data apa yang ingin anda ubah?');

        $client = $this->master->get_where($this->db_table, array('id_client' => $id))->row();

        if (!$client) show_404();

        if ($this->input->post('submit') == 'editClient') {
            if (!empty($_FILES['client_image']['name'])) { // Jika ada foto
                $config['upload_path'] = './data/client_image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2000;
                $config['file_name'] = 'jangkrik_online-fileasset-_'.rand(1111,9999).'_'.rand(1111111,99999999);

                $this->load->library('upload', $config);

                if (! $this->upload->do_upload('client_image')) {
                    exit($this->upload->display_errors()); // Jika ada yang tidak sesuai, display saja kalau error
                } else {
                    $clientImage = $this->upload->file_name;
                }
            } else { // Jika tidak ada foto
                $clientImage = $client->client_image;
            }

            $this->form_validation->set_rules('client_name', 'Nama Klien', 'required');
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

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'client_name' => $this->input->post('client_name'),
                    'client_image'=> $clientImage,
                    'updated_at' => now()
                );

                $query = $this->master->update($this->db_table, array('id_client' => $id), $data);

                if ($query) $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Sukses!',
                    text: 'Klien berhasil diubah',
                    type: 'success',
                    confirmButtonText: 'Oke'
                    })
                </script>
                ");
                else $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Gagal!',
                    text: 'Klien gagal diubah',
                    type: 'error',
                    confirmButtonText: 'Oke'
                    })
                </script>
                ");

                $this->session->set_flashdata('message', $message['message']);

                redirect('admin/client');
            }
        }

        $data['title'] = 'Ubah Client';
        $data['client'] = $client;
        $data['content'] = $this->load->view('admin/content/client/edit', $data, true);

        $this->load->view('admin/layout', $data);
    }

    public function delete()
    {
        $id = $this->encryption->decrypt($this->input->get('data-id'));

        if (!$id) die('data apa yang ingin anda ubah?');

        $client = $this->master->get_where($this->db_table, array('id_client' => $id))->row();
        if (!$client) show_404();

        if ($client->client_image != 'no_image.png') unlink('./data/client_image/'.$client->client_image); // Jika ada gambar / tidak kosong

        $query = $this->master->delete($this->db_table, array('id_client' => $id));

        if ($query) {
            $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Sukses!',
                    text: 'Klien berhasil dihapus',
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
                    text: 'Klien gagal dihapus',
                    type: 'error',
                    confirmButtonText: 'Oke'
                    })
                </script>
            ");
        }

        $this->session->set_flashdata('message', $message['message']);

        redirect('admin/client');
    }
}

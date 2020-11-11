<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends MY_Controller {

    private $db_table = 'testimoni';

    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        $this->load->model('Master_model', 'master');
    }

    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/testimoni/');
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

        $data['title'] = 'Testimoni';
        $data['testimoni'] = $this->master->getJoinOne_pagination($this->db_table, 'client', 'testimoni_client', 'id_client', $config['per_page'], $config['offset'], 'id_testimoni')->result();
        $data['content'] = $this->load->view('admin/content/testimoni/index', $data, true);

        $this->load->view('admin/layout', $data);
    }

    public function add()
    {
        if ($this->input->post('submit') == 'addTestimoni') {
            $this->form_validation->set_rules('testimoni_client', 'Klien', 'required');
            $this->form_validation->set_rules('testimoni_client_name', 'Nama Pegawai', 'required');
            $this->form_validation->set_rules('testimoni_client_position', 'Posisi Pegawai', 'required');
            $this->form_validation->set_rules('testimoni_desc', 'Ulasan Testimoni', 'required');
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
                $data = array (
                    'testimoni_client' => $this->input->post('testimoni_client'),
                    'testimoni_client_name' => $this->input->post('testimoni_client_name'),
                    'testimoni_client_position' => $this->input->post('testimoni_client_position'),
                    'testimoni_desc' => $this->input->post('testimoni_desc'),
                    'created_at' => now()
                );

                $query = $this->master->insert($this->db_table, $data);

                if ($query) $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Sukses!',
                    text: 'Testimoni berhasil ditambahkan',
                    type: 'success',
                    confirmButtonText: 'Oke'
                    })
                </script>
                ");
                else $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Gagal!',
                    text: 'Testimoni gagal ditambahkan',
                    type: 'error',
                    confirmButtonText: 'Oke'
                    })
                </script>
                ");

                $this->session->set_flashdata('message', $message['message']);

                redirect('admin/testimoni');
            }
        }

        $data['title'] = 'Tambah Testimoni';
        $data['client_list'] = $this->master->get('client')->result();
        $data['content'] = $this->load->view('admin/content/testimoni/add', $data, true);

        $this->load->view('admin/layout', $data);
    }

    public function edit()
    {
        $id = $this->encryption->decrypt($this->input->get('data-id'));

        if (!$id) die('data apa yang ingin anda ubah?');

        $testimoni = $this->master->get_where($this->db_table, array('id_testimoni' => $id))->row();
        if (!$testimoni) show_404();

        if ($this->input->post('submit') == 'editTestimoni') {
            $this->form_validation->set_rules('testimoni_client', 'Klien', 'required');
            $this->form_validation->set_rules('testimoni_client_name', 'Nama Pegawai', 'required');
            $this->form_validation->set_rules('testimoni_client_position', 'Posisi Pegawai', 'required');
            $this->form_validation->set_rules('testimoni_desc', 'Ulasan Testimoni', 'required');
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
                $data = array (
                    'testimoni_client' => $this->input->post('testimoni_client'),
                    'testimoni_client_name' => $this->input->post('testimoni_client_name'),
                    'testimoni_client_position' => $this->input->post('testimoni_client_position'),
                    'testimoni_desc' => $this->input->post('testimoni_desc'),
                    'updated_at' => now()
                );

                $query = $this->master->update($this->db_table, array('id_testimoni' => $id), $data);

                if ($query) $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Sukses!',
                    text: 'Testimoni berhasil diubah',
                    type: 'success',
                    confirmButtonText: 'Oke'
                    })
                </script>
                ");
                else $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Gagal!',
                    text: 'Testimoni gagal diubah',
                    type: 'error',
                    confirmButtonText: 'Oke'
                    })
                </script>
                ");

                $this->session->set_flashdata('message', $message['message']);

                redirect('admin/testimoni');
            }
        }
        $data['title'] = 'Edit Testimoni';
        $data['client_list'] = $this->master->get('client')->result();
        $data['testimoni'] = $testimoni;
        $data['content'] = $this->load->view('admin/content/testimoni/edit', $data, true);

        $this->load->view('admin/layout', $data);
    }

    public function delete()
    {
        $id = $this->encryption->decrypt($this->input->get('data-id'));

        if (!$id) die('data apa yang ingin anda ubah?');

        $testimoni = $this->master->get_where($this->db_table, array('id_testimoni' => $id))->row();
        if (!$testimoni) show_404();

        $query = $this->master->delete($this->db_table, array('id_testimoni' => $id));

        if ($query) {
            $message = array('status' => true, 'message' => "
                <script>
                    Swal.fire({
                    title: 'Sukses!',
                    text: 'Testimoni berhasil dihapus',
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
                    text: 'Testimoni gagal dihapus',
                    type: 'error',
                    confirmButtonText: 'Oke'
                    })
                </script>
            ");
        }

        $this->session->set_flashdata('message', $message['message']);

        redirect('admin/testimoni');
    }
}
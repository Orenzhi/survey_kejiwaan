<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_man extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //untuk mengambil data session yg login
        $akun['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $ada          = $akun['user']['role_id'];

        if ($ada != 1 or $akun = null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <strong>Galat!</strong> Anda Belum Login ke System sebagai Admin !.</div>');
            redirect('auth', 'refresh');
        }

        $this->load->model('Menu_m', 'menu'); //untuk meload model menu_m
        $this->load->model('Admin_m', 'crud'); //untuk meload model admin_m
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'kode_pel',
            'kode',
            'trim|required|max_length[10]|is_unique[pelanggan.kode_pel]',
            array('is_unique' => 'kode pelanggan sudah tersedia, cek kembali!')
        );
        $this->form_validation->set_rules('nama_pel', 'nama_pelanggan', 'trim|required');
        $this->form_validation->set_rules('jk', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            // redirect('pelanggan', 'refresh');
            $data['title'] = 'User';
            $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('template/header2', $data);
            $this->load->view('template/navbar', $akun);
            $this->load->view('template/menu', $data);
            $this->load->view('user_man/tambah_user');
            $this->load->view('template/footer');
            $this->load->view('template/countdown');
        } else {
            $this->_tambahData();
        }
    }

    public function _tambahData()
    {

        $data = array(
            'kode_pel' => htmlspecialchars($this->input->post('kode_pel', true)),
            'nama_pel' => htmlspecialchars($this->input->post('nama_pel', true)),
            'jk' => htmlspecialchars($this->input->post('jk', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'foto' => '2.jpg'
        );
        $this->crud->insertData('pelanggan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  			<strong>Success!</strong> Data Pelanggan berhasil di tambahkan.
			</div>');
        redirect('admin/pelanggan', 'refresh');
    }

    public function edit($id = null)
    {

        $data_Edit['edit'] = $this->crud->showDataspesifik('pelanggan', array('id' => $id));
        $data['title'] = 'Data Master';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header2', $data);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('pelanggan/edit_pel', $data_Edit);
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }

    public function update($id = '')
    {
        $config['upload_path'] = './folder_file/foto/pelanggan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = 'foto-' . $this->input->post('kode_pel');
        $this->load->library('upload', $config);
        if ($_FILES['foto']['name']) {
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data();
                $data = array(
                    'nama_pel' => htmlspecialchars($this->input->post('nama_pel', true)),
                    'jk' => htmlspecialchars($this->input->post('jk', true)),
                    'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                    'foto' => $foto['file_name']
                );
                $this->crud->updateData('pelanggan', $data, array('id' => $id));
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        			<strong>Success!</strong> Data Pelanggan berhasil di update.
        		</div>');
                redirect('admin/pelanggan', 'refresh');
            } else {
                $this->edit($id);
            }
        }
    }

    public function delete($id = null)
    {
        $this->crud->deleteData('pelanggan', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Data Pelanggan berhasil di delete.
            </div>');
        redirect('admin/pelanggan', 'refresh');
    }
}

/* End of file User_man.php */

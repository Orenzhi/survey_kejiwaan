<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->load->library('Ciqrcode'); // untuk meload librari qr code
    }

    public function index()
    {
        $data['title'] = 'Home';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header2', $data);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('admin/index');
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }

    public function pelanggan()
    {
        $data['title'] = 'Data Master';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $crud['show'] = $this->crud->showData('pelanggan');
        $this->load->view('template/header2', $data);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('admin/pelanggan', $crud);
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }
    public function user()
    {
        $data['title'] = 'User';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $crud['show'] = $this->crud->showData('user');
        $this->load->view('template/header2', $data);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('admin/user', $crud);
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }
    public function menucoffe()
    {
        $data['title'] = 'Menu';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $crud['show'] = $this->crud->showData('menu_coffe');
        $this->load->view('template/header2', $data);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('admin/menu_coffe', $crud);
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }
    public function Qrcode($kodenya)
    {
        Qrcode::png(
            $kodenya,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 4,
            $margin = 1
        );
    }
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */

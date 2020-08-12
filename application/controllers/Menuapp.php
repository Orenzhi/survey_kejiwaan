<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menuapp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
        $this->load->model('Menu_m', 'menu');
        $akun['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $ada          = $akun['user']['role_id'];
        if ($ada != 1 or $akun = null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <strong>Galat!</strong> Anda Belum Login ke System sebagai Admin !.</div>');
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'menuapp/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'menuapp/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'menuapp/index.html';
            $config['first_url'] = base_url() . 'menuapp/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Menu_model->total_rows($q);
        $menuapp = $this->Menu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'menuapp_data' => $menuapp,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $judul['title'] = 'Menu';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header2', $judul);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('menuapp/menu_list', $data);
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }

    public function read($id)
    {
        $row = $this->Menu_model->get_by_id($id);
        if ($row) {
            $data = array(
                'kode_menu' => $row->kode_menu,
                'menu' => $row->menu,
                'icon' => $row->icon,
            );
            $this->load->view('menuapp/menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menuapp'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menuapp/create_action'),
            'kode_menu' => set_value('kode_menu'),
            'menu' => set_value('menu'),
            'icon' => set_value('icon'),
        );
        $judul['title'] = 'Menu';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header2', $judul);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('menuapp/menu_form', $data);
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'menu' => $this->input->post('menu', TRUE),
                'icon' => $this->input->post('icon', TRUE),
            );

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Data Menu berhasil di tambahkan.
            </div>');
            redirect(site_url('menuapp'));
        }
    }

    public function update($id)
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menuapp/update_action'),
                'kode_menu' => set_value('kode_menu', $row->kode_menu),
                'menu' => set_value('menu', $row->menu),
                'icon' => set_value('icon', $row->icon),
            );
            $judul['title'] = 'Data Master';
            $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('template/header2', $judul);
            $this->load->view('template/navbar', $akun);
            $this->load->view('template/menu', $data);
            $this->load->view('menuapp/menu_form', $data);
            $this->load->view('template/footer');
            $this->load->view('template/countdown');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menuapp'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode_menu', TRUE));
        } else {
            $data = array(
                'menu' => $this->input->post('menu', TRUE),
                'icon' => $this->input->post('icon', TRUE),
            );

            $this->Menu_model->update($this->input->post('kode_menu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menuapp'));
        }
    }

    public function delete($id)
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $this->Menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menuapp'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menuapp'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('menu', 'menu', 'trim|required');
        $this->form_validation->set_rules('icon', 'icon', 'trim|required');

        $this->form_validation->set_rules('kode_menu', 'kode_menu', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Menuapp.php */
/* Location: ./application/controllers/Menuapp.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-24 15:15:20 */
/* http://harviacode.com */

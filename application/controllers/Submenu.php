<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Submenu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sub_menu_model');
        $this->load->library('form_validation');
        $this->load->model('Menu_m', 'menu');
        $this->load->model('Menu_model', 'men');
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
            $config['base_url'] = base_url() . 'submenu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'submenu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'submenu/index.html';
            $config['first_url'] = base_url() . 'submenu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sub_menu_model->total_rows($q);
        $submenu = $this->Sub_menu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'submenu_data' => $submenu,
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
        $this->load->view('submenu/sub_menu_list', $data);
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }

    public function read($id)
    {
        $row = $this->Sub_menu_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'kode_menu' => $row->kode_menu,
                'title' => $row->title,
                'url' => $row->url,
            );
            $this->load->view('submenu/sub_menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('submenu'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('submenu/create_action'),
            'id' => set_value('id'),
            'kode_menu' => set_value('kode_menu'),
            'title' => set_value('title'),
            'url' => set_value('url'),
        );
        $judul['title'] = 'Menu';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header2', $judul);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('submenu/sub_menu_form', $data);
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
                'kode_menu' => $this->input->post('kode_menu', TRUE),
                'title' => $this->input->post('title', TRUE),
                'url' => $this->input->post('url', TRUE),
            );

            $this->Sub_menu_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Data Sub_menu berhasil di tambahkan.
            </div>');
            redirect(site_url('submenu'));
        }
    }

    public function update($id)
    {
        $row = $this->Sub_menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('submenu/update_action'),
                'id' => set_value('id', $row->id),
                'kode_menu' => set_value('kode_menu', $row->kode_menu),
                'title' => set_value('title', $row->title),
                'url' => set_value('url', $row->url),
            );
            $judul['title'] = 'Data Master';
            $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('template/header2', $judul);
            $this->load->view('template/navbar', $akun);
            $this->load->view('template/menu', $data);
            $this->load->view('submenu/sub_menu_form', $data);
            $this->load->view('template/footer');
            $this->load->view('template/countdown');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('submenu'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'kode_menu' => $this->input->post('kode_menu', TRUE),
                'title' => $this->input->post('title', TRUE),
                'url' => $this->input->post('url', TRUE),
            );

            $this->Sub_menu_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('submenu'));
        }
    }

    public function delete($id)
    {
        $row = $this->Sub_menu_model->get_by_id($id);

        if ($row) {
            $this->Sub_menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('submenu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('submenu'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_menu', 'kode menu', 'trim|required');
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('url', 'url', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Submenu.php */
/* Location: ./application/controllers/Submenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-24 15:22:20 */
/* http://harviacode.com */

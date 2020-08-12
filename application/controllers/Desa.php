<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Desa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Desa_model');
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
            $config['base_url'] = base_url() . 'desa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'desa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'desa/index.html';
            $config['first_url'] = base_url() . 'desa/index.html';
        }

        $config['per_page'] = 100;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Desa_model->total_rows($q);
        $desa = $this->Desa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'desa_data' => $desa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $judul['title'] = 'Data Master';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header2', $judul);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('desa/desa_list', $data);
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }

    public function read($id) 
    {
        $row = $this->Desa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_desa' => $row->id_desa,
		'id_kecamatan_fk' => $row->id_kecamatan_fk,
		'nama_desa' => $row->nama_desa,
	    );
            $this->load->view('desa/desa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('desa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('desa/create_action'),
	    'id_desa' => set_value('id_desa'),
	    'id_kecamatan_fk' => set_value('id_kecamatan_fk'),
	    'nama_desa' => set_value('nama_desa'),
	);
        $judul['title'] = 'Data Master';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header2', $judul);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('desa/desa_form', $data);
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
		'id_kecamatan_fk' => $this->input->post('id_kecamatan_fk',TRUE),
		'nama_desa' => $this->input->post('nama_desa',TRUE),
	    );

            $this->Desa_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Data Desa berhasil di tambahkan.
            </div>');
            redirect(site_url('desa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Desa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('desa/update_action'),
		'id_desa' => set_value('id_desa', $row->id_desa),
		'id_kecamatan_fk' => set_value('id_kecamatan_fk', $row->id_kecamatan_fk),
		'nama_desa' => set_value('nama_desa', $row->nama_desa),
	    );
            $judul['title'] = 'Data Master';
            $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('template/header2', $judul);
            $this->load->view('template/navbar', $akun);
            $this->load->view('template/menu', $data);
            $this->load->view('desa/desa_form', $data);
            $this->load->view('template/footer');
            $this->load->view('template/countdown');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('desa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_desa', TRUE));
        } else {
            $data = array(
		'id_kecamatan_fk' => $this->input->post('id_kecamatan_fk',TRUE),
		'nama_desa' => $this->input->post('nama_desa',TRUE),
	    );

            $this->Desa_model->update($this->input->post('id_desa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('desa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Desa_model->get_by_id($id);

        if ($row) {
            $this->Desa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('desa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('desa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kecamatan_fk', 'id kecamatan fk', 'trim|required');
	$this->form_validation->set_rules('nama_desa', 'nama desa', 'trim|required');

	$this->form_validation->set_rules('id_desa', 'id_desa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "desa.xls";
        $judul = "desa";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kecamatan Fk");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Desa");

	foreach ($this->Desa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kecamatan_fk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_desa);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=desa.doc");

        $data = array(
            'desa_data' => $this->Desa_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('desa/desa_doc',$data);
    }

}

/* End of file Desa.php */
/* Location: ./application/controllers/Desa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-04 16:50:50 */
/* http://harviacode.com */
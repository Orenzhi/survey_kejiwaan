<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surveyor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surveyor_model');
        $this->load->library('form_validation');
        $this->load->model('Menu_m', 'menu');
        $this->load->model('Penduduk_model','penduduk');
        $this->load->model('Provinsi_model','provinsi');
        $this->load->model('Kota_model','kota');
        $this->load->model('Kecamatan_model','kecamatan');
        $this->load->model('Desa_model','desa');
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
            $config['base_url'] = base_url() . 'surveyor/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'surveyor/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'surveyor/index.html';
            $config['first_url'] = base_url() . 'surveyor/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Surveyor_model->total_rows($q);
        $surveyor = $this->Surveyor_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surveyor_data' => $surveyor,
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
        $this->load->view('surveyor/surveyor_list', $data);
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }

    public function read($id) 
    {
        $row = $this->Surveyor_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_sv' => $row->id_sv,
		'nik_s' => $row->nik_s,
		'nama_s' => $row->nama_s,
		'alamat_s' => $row->alamat_s,
		'rt_s' => $row->rt_s,
		'rw_s' => $row->rw_s,
		'kelurahan_s' => $row->kelurahan_s,
		'kecamatan_s' => $row->kecamatan_s,
		'kota_s' => $row->kota_s,
		'provinsi_s' => $row->provinsi_s,
	    );
            $this->load->view('surveyor/surveyor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surveyor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('surveyor/create_action'),
	    'id_sv' => set_value('id_sv'),
	    'nik_s' => set_value('nik_s'),
	    'nama_s' => set_value('nama_s'),
	    'alamat_s' => set_value('alamat_s'),
	    'rt_s' => set_value('rt_s'),
	    'rw_s' => set_value('rw_s'),
	    'kelurahan_s' => set_value('kelurahan_s'),
	    'kecamatan_s' => set_value('kecamatan_s'),
	    'kota_s' => set_value('kota_s'),
	    'provinsi_s' => set_value('provinsi_s'),
	);
        $judul['title'] = 'Data Master';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header2', $judul);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('surveyor/surveyor_form', $data);
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
		'nik_s' => $this->input->post('nik_s',TRUE),
		'nama_s' => $this->input->post('nama_s',TRUE),
		'alamat_s' => $this->input->post('alamat_s',TRUE),
		'rt_s' => $this->input->post('rt_s',TRUE),
		'rw_s' => $this->input->post('rw_s',TRUE),
		'kelurahan_s' => $this->input->post('kelurahan_s',TRUE),
		'kecamatan_s' => $this->input->post('kecamatan_s',TRUE),
		'kota_s' => $this->input->post('kota_s',TRUE),
		'provinsi_s' => $this->input->post('provinsi_s',TRUE),
	    );

            $this->Surveyor_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Data Surveyor berhasil di tambahkan.
            </div>');
            redirect(site_url('surveyor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Surveyor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surveyor/update_action'),
		'id_sv' => set_value('id_sv', $row->id_sv),
		'nik_s' => set_value('nik_s', $row->nik_s),
		'nama_s' => set_value('nama_s', $row->nama_s),
		'alamat_s' => set_value('alamat_s', $row->alamat_s),
		'rt_s' => set_value('rt_s', $row->rt_s),
		'rw_s' => set_value('rw_s', $row->rw_s),
		'kelurahan_s' => set_value('kelurahan_s', $row->kelurahan_s),
		'kecamatan_s' => set_value('kecamatan_s', $row->kecamatan_s),
		'kota_s' => set_value('kota_s', $row->kota_s),
		'provinsi_s' => set_value('provinsi_s', $row->provinsi_s),
	    );
            $judul['title'] = 'Data Master';
            $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('template/header2', $judul);
            $this->load->view('template/navbar', $akun);
            $this->load->view('template/menu', $data);
            $this->load->view('surveyor/surveyor_form', $data);
            $this->load->view('template/footer');
            $this->load->view('template/countdown');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surveyor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sv', TRUE));
        } else {
            $data = array(
		'nik_s' => $this->input->post('nik_s',TRUE),
		'nama_s' => $this->input->post('nama_s',TRUE),
		'alamat_s' => $this->input->post('alamat_s',TRUE),
		'rt_s' => $this->input->post('rt_s',TRUE),
		'rw_s' => $this->input->post('rw_s',TRUE),
		'kelurahan_s' => $this->input->post('kelurahan_s',TRUE),
		'kecamatan_s' => $this->input->post('kecamatan_s',TRUE),
		'kota_s' => $this->input->post('kota_s',TRUE),
		'provinsi_s' => $this->input->post('provinsi_s',TRUE),
	    );

            $this->Surveyor_model->update($this->input->post('id_sv', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('surveyor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Surveyor_model->get_by_id($id);

        if ($row) {
            $this->Surveyor_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('surveyor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surveyor'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik_s', 'nik s', 'trim|required');
	$this->form_validation->set_rules('nama_s', 'nama s', 'trim|required');
	$this->form_validation->set_rules('alamat_s', 'alamat s', 'trim|required');
	$this->form_validation->set_rules('rt_s', 'rt s', 'trim|required');
	$this->form_validation->set_rules('rw_s', 'rw s', 'trim|required');
	$this->form_validation->set_rules('kelurahan_s', 'kelurahan s', 'trim|required');
	$this->form_validation->set_rules('kecamatan_s', 'kecamatan s', 'trim|required');
	$this->form_validation->set_rules('kota_s', 'kota s', 'trim|required');
	$this->form_validation->set_rules('provinsi_s', 'provinsi s', 'trim|required');

	$this->form_validation->set_rules('id_sv', 'id_sv', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "surveyor.xls";
        $judul = "surveyor";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nik S");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama S");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat S");
	xlsWriteLabel($tablehead, $kolomhead++, "Rt S");
	xlsWriteLabel($tablehead, $kolomhead++, "Rw S");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelurahan S");
	xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan S");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota S");
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi S");

	foreach ($this->Surveyor_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik_s);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_s);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_s);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rt_s);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rw_s);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kelurahan_s);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan_s);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota_s);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi_s);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=surveyor.doc");

        $data = array(
            'surveyor_data' => $this->Surveyor_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('surveyor/surveyor_doc',$data);
    }

}

/* End of file Surveyor.php */
/* Location: ./application/controllers/Surveyor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-21 05:48:38 */
/* http://harviacode.com */
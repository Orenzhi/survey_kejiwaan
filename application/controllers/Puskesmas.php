<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Puskesmas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Puskesmas_model');
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
            $config['base_url'] = base_url() . 'puskesmas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'puskesmas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'puskesmas/index.html';
            $config['first_url'] = base_url() . 'puskesmas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Puskesmas_model->total_rows($q);
        $puskesmas = $this->Puskesmas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'puskesmas_data' => $puskesmas,
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
        $this->load->view('puskesmas/puskesmas_list', $data);
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }

    public function read($id) 
    {
        $row = $this->Puskesmas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_p' => $row->id_p,
		'nama_p' => $row->nama_p,
		'alamat_p' => $row->alamat_p,
		'kelurahan' => $row->kelurahan,
		'kecamatan' => $row->kecamatan,
		'kota' => $row->kota,
		'provinsi' => $row->provinsi,
	    );
            $this->load->view('puskesmas/puskesmas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('puskesmas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('puskesmas/create_action'),
	    'id_p' => set_value('id_p'),
	    'nama_p' => set_value('nama_p'),
	    'alamat_p' => set_value('alamat_p'),
	    'kelurahan' => set_value('kelurahan'),
	    'kecamatan' => set_value('kecamatan'),
	    'kota' => set_value('kota'),
	    'provinsi' => set_value('provinsi'),
	);
        $judul['title'] = 'Data Master';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header2', $judul);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('puskesmas/puskesmas_form', $data);
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
		'nama_p' => $this->input->post('nama_p',TRUE),
		'alamat_p' => $this->input->post('alamat_p',TRUE),
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
	    );

            $this->Puskesmas_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Data Puskesmas berhasil di tambahkan.
            </div>');
            redirect(site_url('puskesmas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Puskesmas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('puskesmas/update_action'),
		'id_p' => set_value('id_p', $row->id_p),
		'nama_p' => set_value('nama_p', $row->nama_p),
		'alamat_p' => set_value('alamat_p', $row->alamat_p),
		'kelurahan' => set_value('kelurahan', $row->kelurahan),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
		'kota' => set_value('kota', $row->kota),
		'provinsi' => set_value('provinsi', $row->provinsi),
	    );
            $judul['title'] = 'Data Master';
            $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('template/header2', $judul);
            $this->load->view('template/navbar', $akun);
            $this->load->view('template/menu', $data);
            $this->load->view('puskesmas/puskesmas_form', $data);
            $this->load->view('template/footer');
            $this->load->view('template/countdown');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('puskesmas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_p', TRUE));
        } else {
            $data = array(
		'nama_p' => $this->input->post('nama_p',TRUE),
		'alamat_p' => $this->input->post('alamat_p',TRUE),
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
	    );

            $this->Puskesmas_model->update($this->input->post('id_p', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('puskesmas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Puskesmas_model->get_by_id($id);

        if ($row) {
            $this->Puskesmas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('puskesmas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('puskesmas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_p', 'nama p', 'trim|required');
	$this->form_validation->set_rules('alamat_p', 'alamat p', 'trim|required');
	$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');

	$this->form_validation->set_rules('id_p', 'id_p', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "puskesmas.xls";
        $judul = "puskesmas";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama P");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat P");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelurahan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");

	foreach ($this->Puskesmas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_p);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_p);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kelurahan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=puskesmas.doc");

        $data = array(
            'puskesmas_data' => $this->Puskesmas_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('puskesmas/puskesmas_doc',$data);
    }

}

/* End of file Puskesmas.php */
/* Location: ./application/controllers/Puskesmas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-18 16:01:20 */
/* http://harviacode.com */
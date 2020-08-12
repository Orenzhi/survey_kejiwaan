<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kabupaten extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kabupaten_model');
        $this->load->model('Provinsi_model');
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
            $config['base_url'] = base_url() . 'kabupaten/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kabupaten/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kabupaten/index.html';
            $config['first_url'] = base_url() . 'kabupaten/index.html';
        }

        $config['per_page'] = 100;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kabupaten_model->total_rows($q);
        $kabupaten = $this->Kabupaten_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kabupaten_data' => $kabupaten,
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
        $this->load->view('kabupaten/kabupaten_list', $data);
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }

    public function read($id) 
    {
        $row = $this->Kabupaten_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kode_kab' => $row->kode_kab,
		'kode_prov' => $row->kode_prov,
		'nama' => $row->nama,
	    );
            $this->load->view('kabupaten/kabupaten_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kabupaten'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kabupaten/create_action'),
	    'kode_kab' => set_value('kode_kab'),
	    'kode_prov' => set_value('kode_prov'),
	    'nama' => set_value('nama'),
	);
        $judul['title'] = 'Data Master';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header2', $judul);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('kabupaten/kabupaten_form', $data);
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
		'kode_prov' => $this->input->post('kode_prov',TRUE),
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->Kabupaten_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Data Kabupaten berhasil di tambahkan.
            </div>');
            redirect(site_url('kabupaten'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kabupaten_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kabupaten/update_action'),
		'kode_kab' => set_value('kode_kab', $row->kode_kab),
		'kode_prov' => set_value('kode_prov', $row->kode_prov),
		'nama' => set_value('nama', $row->nama),
	    );
            $judul['title'] = 'Data Master';
            $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('template/header2', $judul);
            $this->load->view('template/navbar', $akun);
            $this->load->view('template/menu', $data);
            $this->load->view('kabupaten/kabupaten_form', $data);
            $this->load->view('template/footer');
            $this->load->view('template/countdown');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kabupaten'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode_kab', TRUE));
        } else {
            $data = array(
		'kode_prov' => $this->input->post('kode_prov',TRUE),
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->Kabupaten_model->update($this->input->post('kode_kab', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kabupaten'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kabupaten_model->get_by_id($id);

        if ($row) {
            $this->Kabupaten_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kabupaten'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kabupaten'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_prov', 'kode prov', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');

	$this->form_validation->set_rules('kode_kab', 'kode_kab', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kabupaten.xls";
        $judul = "kabupaten";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Prov");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");

	foreach ($this->Kabupaten_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kode_prov);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kabupaten.doc");

        $data = array(
            'kabupaten_data' => $this->Kabupaten_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kabupaten/kabupaten_doc',$data);
    }

}

/* End of file Kabupaten.php */
/* Location: ./application/controllers/Kabupaten.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-21 06:35:13 */
/* http://harviacode.com */
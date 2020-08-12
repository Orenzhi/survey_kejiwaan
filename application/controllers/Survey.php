<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Survey extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Survey_model');
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
            $config['base_url'] = base_url() . 'survey/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'survey/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'survey/index.html';
            $config['first_url'] = base_url() . 'survey/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Survey_model->total_rows($q);
        $survey = $this->Survey_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'survey_data' => $survey,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $judul['title'] = 'Transaksi';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header2', $judul);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('survey/survey_list', $data);
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }

    public function read($id) 
    {
        $row = $this->Survey_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd_surv' => $row->kd_surv,
		'no_kk' => $row->no_kk,
		'nik' => $row->nik,
		'nama' => $row->nama,
		'kondisi' => $row->kondisi,
	    );
            $this->load->view('survey/survey_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('survey/create_action'),
	    'kd_surv' => set_value('kd_surv'),
	    'no_kk' => set_value('no_kk'),
	    'nik' => set_value('nik'),
	    'nama' => set_value('nama'),
	    'kondisi' => set_value('kondisi'),
	);
        $judul['title'] = 'Data Master';
        $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header2', $judul);
        $this->load->view('template/navbar', $akun);
        $this->load->view('template/menu', $data);
        $this->load->view('survey/survey_form', $data);
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
		'no_kk' => $this->input->post('no_kk',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
	    );

            $this->Survey_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Data Survey berhasil di tambahkan.
            </div>');
            redirect(site_url('survey'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Survey_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('survey/update_action'),
		'kd_surv' => set_value('kd_surv', $row->kd_surv),
		'no_kk' => set_value('no_kk', $row->no_kk),
		'nik' => set_value('nik', $row->nik),
		'nama' => set_value('nama', $row->nama),
		'kondisi' => set_value('kondisi', $row->kondisi),
	    );
            $judul['title'] = 'Data Master';
            $akun['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('template/header2', $judul);
            $this->load->view('template/navbar', $akun);
            $this->load->view('template/menu', $data);
            $this->load->view('survey/survey_form', $data);
            $this->load->view('template/footer');
            $this->load->view('template/countdown');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_surv', TRUE));
        } else {
            $data = array(
		'no_kk' => $this->input->post('no_kk',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'kondisi' => $this->input->post('kondisi',TRUE),
	    );

            $this->Survey_model->update($this->input->post('kd_surv', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('survey'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Survey_model->get_by_id($id);

        if ($row) {
            $this->Survey_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('survey'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('kondisi', 'kondisi', 'trim|required');

	$this->form_validation->set_rules('kd_surv', 'kd_surv', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "survey.xls";
        $judul = "survey";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Kk");
	xlsWriteLabel($tablehead, $kolomhead++, "Nik");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Kondisi");

	foreach ($this->Survey_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_kk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kondisi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=survey.doc");

        $data = array(
            'survey_data' => $this->Survey_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('survey/survey_doc',$data);
    }

}

/* End of file Survey.php */
/* Location: ./application/controllers/Survey.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-21 07:25:32 */
/* http://harviacode.com */
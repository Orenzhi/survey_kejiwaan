<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penduduk_model');
        $this->load->library('form_validation');
        $this->load->model('Menu_m', 'menu');
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
            $config['base_url'] = base_url() . 'penduduk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penduduk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penduduk/index.html';
            $config['first_url'] = base_url() . 'penduduk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penduduk_model->total_rows($q);
        $penduduk = $this->Penduduk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penduduk_data' => $penduduk,
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
        $this->load->view('penduduk/penduduk_list', $data);
        $this->load->view('template/footer');
        $this->load->view('template/countdown');
    }

    public function read($id) 
    {
        $row = $this->Penduduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_t1' => $row->id_t1,
		'no_kk' => $row->no_kk,
		'nik' => $row->nik,
		'nama' => $row->nama,
		'tempat_lahir' => $row->tempat_lahir,
		'tgl_lahir' => $row->tgl_lahir,
		'jk' => $row->jk,
		'stts_perkawinan' => $row->stts_perkawinan,
		'pekerjaan' => $row->pekerjaan,
		'agama' => $row->agama,
		'kewarganeraan' => $row->kewarganeraan,
		'alamat' => $row->alamat,
		'rt' => $row->rt,
		'rw' => $row->rw,
		'kelurahan' => $row->kelurahan,
		'kecamatan' => $row->kecamatan,
		'kota' => $row->kota,
		'provinsi' => $row->provinsi,
	    );
            $this->load->view('penduduk/penduduk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penduduk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penduduk/create_action'),
	    'id_t1' => set_value('id_t1'),
	    'no_kk' => set_value('no_kk'),
	    'nik' => set_value('nik'),
	    'nama' => set_value('nama'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'jk' => set_value('jk'),
	    'stts_perkawinan' => set_value('stts_perkawinan'),
	    'pekerjaan' => set_value('pekerjaan'),
	    'agama' => set_value('agama'),
	    'kewarganeraan' => set_value('kewarganeraan'),
	    'alamat' => set_value('alamat'),
	    'rt' => set_value('rt'),
	    'rw' => set_value('rw'),
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
        $this->load->view('penduduk/penduduk_form', $data);
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
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'stts_perkawinan' => $this->input->post('stts_perkawinan',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'kewarganeraan' => $this->input->post('kewarganeraan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'rt' => $this->input->post('rt',TRUE),
		'rw' => $this->input->post('rw',TRUE),
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
	    );

            $this->Penduduk_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Data Penduduk berhasil di tambahkan.
            </div>');
            redirect(site_url('penduduk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penduduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penduduk/update_action'),
		'id_t1' => set_value('id_t1', $row->id_t1),
		'no_kk' => set_value('no_kk', $row->no_kk),
		'nik' => set_value('nik', $row->nik),
		'nama' => set_value('nama', $row->nama),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'jk' => set_value('jk', $row->jk),
		'stts_perkawinan' => set_value('stts_perkawinan', $row->stts_perkawinan),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
		'agama' => set_value('agama', $row->agama),
		'kewarganeraan' => set_value('kewarganeraan', $row->kewarganeraan),
		'alamat' => set_value('alamat', $row->alamat),
		'rt' => set_value('rt', $row->rt),
		'rw' => set_value('rw', $row->rw),
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
            $this->load->view('penduduk/penduduk_form', $data);
            $this->load->view('template/footer');
            $this->load->view('template/countdown');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penduduk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_t1', TRUE));
        } else {
            $data = array(
		'no_kk' => $this->input->post('no_kk',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'stts_perkawinan' => $this->input->post('stts_perkawinan',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'kewarganeraan' => $this->input->post('kewarganeraan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'rt' => $this->input->post('rt',TRUE),
		'rw' => $this->input->post('rw',TRUE),
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
	    );

            $this->Penduduk_model->update($this->input->post('id_t1', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penduduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penduduk_model->get_by_id($id);

        if ($row) {
            $this->Penduduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penduduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penduduk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('jk', 'jk', 'trim|required');
	$this->form_validation->set_rules('stts_perkawinan', 'stts perkawinan', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('kewarganeraan', 'kewarganeraan', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('rt', 'rt', 'trim|required');
	$this->form_validation->set_rules('rw', 'rw', 'trim|required');
	$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');

	$this->form_validation->set_rules('id_t1', 'id_t1', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penduduk.xls";
        $judul = "penduduk";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Jk");
	xlsWriteLabel($tablehead, $kolomhead++, "Stts Perkawinan");
	xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Kewarganeraan");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Rt");
	xlsWriteLabel($tablehead, $kolomhead++, "Rw");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelurahan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");

	foreach ($this->Penduduk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_kk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->stts_perkawinan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kewarganeraan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rt);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rw);
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
        header("Content-Disposition: attachment;Filename=penduduk.doc");

        $data = array(
            'penduduk_data' => $this->Penduduk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('penduduk/penduduk_doc',$data);
    }

}

/* End of file Penduduk.php */
/* Location: ./application/controllers/Penduduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-21 05:48:28 */
/* http://harviacode.com */
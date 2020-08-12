<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//untuk mengambil data session yg login
		$akun['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$ada = $akun['user']['role_id'];

		if ($ada !=2 OR $akun = null){
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  			<strong>Galat!</strong> Anda Belum Login ke System!.
			</div>');
			redirect('auth','refresh');
		}
	}

	public function index()
	{
		//untuk mengambil data session yg login
		$akun['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Home';
		$this->load->view('template/header2',$data);
		$this->load->view('template/navbar',$akun);
		$this->load->view('404');
		$this->load->view('template/footer');		
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
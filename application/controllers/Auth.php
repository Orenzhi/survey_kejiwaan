<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->form_validation->set_rules('mail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/footer');
        } else {
            //echo "berfungsi!";
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('mail');
        $pass  = $this->input->post('password');
        $user  = $this->db->get_where('user', ['email' => $email])->row_array();
        // var_dump($user);
        if ($user) {
            //untuk cek akun aktif atau tidak
            if ($user['is_active'] == 1) {
                //untuk ngecek password benar atau tidak
                if (password_verify($pass, $user['password'])) {
                    $data = [
                        'email'   => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin', 'refresh');
                    } else {
                        redirect('user', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
		  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  			<strong>Galat!</strong> Password Salah, Periksa Kembali Password Anda!.
					</div>');
                    redirect('auth', 'refresh');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  			<strong>Warning!</strong> Email Anda Belum Terdaftar !, Silahkan register terlebih dahulu.
			</div>');
            redirect('auth', 'refresh');
        }
    }

    public function registrasi()
    {
        $data['title'] = 'Registrasi';
        $this->form_validation->set_rules('nama', 'Username', 'trim|required');
        $this->form_validation->set_rules('mail', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email telah Terdaftar, Silahkan Login! / Daftar dengan email baru.',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|max_length[12]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password Repeated', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('auth/register');
            $this->load->view('template/footer');
        } else {
            //echo "berfungsi!";
            $data = [
                'nama'      => htmlspecialchars($this->input->post('nama', true)),
                'email'     => htmlspecialchars($this->input->post('mail', true)),
                'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'foto_user' => '2.jpg',
                'is_active' => 1,
                'tgl_input' => date('d-m-Y, g:i a'),
                'role_id'   => 2,
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  			<strong>Success!</strong> Akun berhasil di daftarkan. Silahkan Aktivasi Akun.
			</div>');
            redirect('auth', 'refresh');
        }
    }

    public function forgot()
    {
        $this->load->view('template/header');
        $this->load->view('auth/forgot_pass');
        $this->load->view('template/footer');
    }

    public function Logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Success!</strong>. Anda Telah Logout.
		</div>');
        redirect('auth', 'refresh');
    }
}

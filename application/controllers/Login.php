<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->load->view('home/login/index');
	}

	public function do_login()
	{
		$this->form_validation->set_rules('username', '', 'required');
		$this->form_validation->set_rules('password', '', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('home/login/index');		
		} else {
			$po = $this->input->post();
			$swicth = $this->Glo_model->doLogin($po['username'],$po['password']);

			switch ($swicth) {
				case 'no_account':
					$this->session->set_flashdata('msg_login','Maaf Username yang anda masukkan tidak ada! Mohon cek kembali.');
					redirect('Login/index');
					break;
				
				case 'password_wrong':
					$this->session->set_flashdata('msg_login','Maaf Password ayang anda masukkan salah! Mohon cek kembali.');
					redirect('Login/index');
					break;

				case 1:
					redirect('Referensi/');
					break;

				case 2:
					echo $this->session->userdata('nama_level').'<br><a href="'.site_url('Login/index').'" "email me">email me</a>';
					break;

				case 3:
					echo $this->session->userdata('nama_level').'<br><a href="'.site_url('Login/index').'" "email me">email me</a>';
					break;

				case 4:
					echo $this->session->userdata('nama_level').'<br><a href="'.site_url('Login/index').'" "email me">email me</a>';
					break;

				case 5:
					echo $this->session->userdata('nama_level').'<br><a href="'.site_url('Login/index').'" "email me">email me</a>';
					break;

				default:
					$this->load->view('home/login/index');
					break;
			}
		}
	}

	public function show_fullname()
	{
		$this->db->where('users.id_users', $this->session->userdata('id_users'));
		$query = $this->Glo_model->Joinuserslevel('users.full_name,level.name_level')->row();
		echo json_encode($query);
	}

	public function logout()
	{
		$this->session->sess_destroy();
        redirect('Login/');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
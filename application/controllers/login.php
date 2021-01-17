<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {


	public function __construct(){

		parent::__construct();
		$this->load->library('form_validation');;
		$this->load->model('model_login');

	}


	public function index(){

		$this->load->view('admin/login');

	}
	public function action_login()
	{

		$this->form_validation->set_rules('username', 'username', 'required|trim');
		$this->form_validation->set_rules('password','password','required|trim');

		if ($this->form_validation->run() == false)
		{

			$this->load->view('admin/login');

		} else{

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$cek = $this->model_login->check_user($username,$password)->num_rows();
			
			if($cek == 1) {

				$db = $this->model_login->check_user($username,$password)->row();


				$data_login= array('is_login'=>TRUE,
					'id_admin'  =>$db->id_admin);
				$this->session->set_userdata($data_login);

				$this->session->set_flashdata('success');
				redirect('admin');

			} else { 


				$this->session->set_flashdata('error','Action Not Completed');
				redirect('admin');

			}
		}
	}

	public function logout(){

		$this->session->sess_destroy();

		redirect('login');

	}
}

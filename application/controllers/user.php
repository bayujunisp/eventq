<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	public function __construct(){

		parent::__construct();

		
		// $this->load->model('model_user');



	}
	public function index(){

		
		$this->load->view('user/navbar');
		$this->load->view('user/home');
		$this->load->view('user/footer');
	}


}

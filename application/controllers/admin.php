<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct(){

		parent::__construct();

		if ($this->session->userdata('id_admin') == null) {
			redirect('login');
		}

		$this->load->model('model_admin');



	}
	public function index(){


		$id_admin = $this->session->userdata('id_admin');
		$this->db->where('id_admin',$id_admin);
		$admin = $this->db->get('admin')->row();
		$data['name_admin'] = $admin->name_admin;
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}

	public function category(){

		
		$id_admin = $this->session->userdata('id_admin');
		$this->db->where('id_admin',$id_admin);
		$admin = $this->db->get('admin')->row();
		$data['name_admin'] = $admin->name_admin;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/category');
		$this->load->view('admin/footer');

	}

	public function category_data(){
		$data=$this->model_admin->category_list();
		echo json_encode($data);
	}

	public function add_category(){
		$data=$this->model_admin->save_category();
		echo json_encode($data);
	}

	public function update_category(){
		$data=$this->model_admin->update_category();
		echo json_encode($data);
	}

	public function delete_category(){
		$data=$this->model_admin->delete_category();
		echo json_encode($data);
	}

	public function event(){

		
		$id_admin = $this->session->userdata('id_admin');
		$this->db->where('id_admin',$id_admin);
		$admin = $this->db->get('admin')->row();
		$data['name_admin'] = $admin->name_admin;

		$data['category'] = $this->model_admin->category_list();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/event');
		$this->load->view('admin/footer');

	}
	public function event_data(){
		$data=$this->model_admin->event_list();
		echo json_encode($data);
	}

	public function add_event(){

		$config['upload_path']="./assets/images_event";
		$config['allowed_types']='gif|jpg|png';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("images")){

			$data = array('upload_data' => $this->upload->data());
			$image = $data['upload_data']['file_name']; 

			$result= $this->model_admin->save_event($image);
			echo json_decode($result);

		}
	}

	public function get_event(){
        $id=$this->input->get('id');
        $data=$this->model_admin->get_event_by_id($id);
        echo json_encode($data);
    }

	public function update_event(){
		$data=$this->model_admin->update_event();
		echo json_encode($data);
	}

	public function delete_event(){
		$data=$this->model_admin->delete_event();
		echo json_encode($data);
	}

}

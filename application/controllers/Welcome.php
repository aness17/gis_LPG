<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function loginadmin()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$q= $this->db->query("select * from admin where username='$username' and password=md5('$password')");
		if($q->num_rows() > 0){
			$row = $q->row();
			$data = array(
				"id"	=> $row->id,
				"nama" => $row->nama
			);
			$this->session->set_userdata($data);
			redirect("main/index");
		}else{
			$this->session->set_flashdata('msg', 'error');
			redirect("welcome");
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome/','refresh');
	}
}

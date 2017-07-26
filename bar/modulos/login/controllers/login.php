<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
       }
	   
	public function index(){
		$this->load->view('login/login');	
	}
	
	public function valida(){	
		$this->load->model('login_model');
		$query = $this->login_model->ValidaLogin();
		
		if($query){
			$data = array(
				'login' => $this->input->post('usuario'),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('home');
		} else {
			redirect('login');
		}
	
	}
	
	public function logout(){
	
		if($this->session->userdata('is_logged_in')){
			$this->session->sess_destroy();
			redirect('login/login');
		}
		
	}

}

?>
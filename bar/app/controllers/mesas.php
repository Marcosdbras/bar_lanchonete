<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mesas extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		
		$this->load->model('crud_model');
		$this->load->model('usuario_model');
		
	}
	
	public function index()	{
		$this->load->model('usuario_model');	
		
		$dados['pagina'] = 'Mesas';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));		
		$this->load->view('header', $dados);	
		$dados = array();	
        $dados['lista'] = $this->crud_model->listar('mesas');			
		$this->load->view('mesas/index', $dados);
		$this->load->view('footer');		
	}
	
	public function visualizar()	{
		
		$dados['pagina'] = 'Visualizar Mesas';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));
		$this->load->view('header', $dados);
		$dados = array();	
        $dados['lista'] = $this->crud_model->listar('mesas WHERE id='.$this->uri->segment(3));				
		$this->load->view('mesas/visualizar', $dados);
		$this->load->view('footer');
		
	}
	
	public function salvar(){
		
		date_default_timezone_set("Brazil/East");
		
		$dados = array (
			'nome' 			=> $this->input->post('nome'),
			'lugares' 		=> $this->input->post('lugares')
		);
		
		
		if($this->input->post('action') == 'cadastrar'){
			$tabela = 'mesas';			
			$this->crud_model->inserir($tabela, $dados);
						
			redirect('mesas/index');
			
		} elseif($this->input->post('action') == 'editar'){			
			$tabela = 'mesas';
			$where = $this->db->where('id', $this->input->post('id'));
			$id = $this->input->post('id');
			$this->crud_model->atualizar($tabela, $dados, $id);
			
			redirect('mesas/index');
		}
	}
	
	public function remover(){
		
		$id	= $this->uri->segment(3);	
		
		$this->crud_model->remover($id,'mesas');
		
		redirect('mesas/index');
	}
	
}

?>
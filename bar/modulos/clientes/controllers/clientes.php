<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		
		$this->load->model('crud_model');
		$this->load->model('usuario_model');
		
	}
	
	public function index()	{
		$this->load->model('usuario_model');	
		
		$dados['pagina'] = 'Clientes';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));	
		
		$config 			= $this->crud_model->listar('config WHERE id = 1');
		$dados['config'] 	= $config[0];
			
		$this->load->view('header', $dados);	
		$dados = array();	
        $dados['lista'] = $this->crud_model->listar('clientes');			
		$this->load->view('index', $dados);
		$this->load->view('footer');		
	}
	
	public function visualizar_pdv()	{
		$this->load->model('usuario_model');	
				
		$dados = array();
        $dados['lista'] = $this->crud_model->listar('clientes WHERE id='.$this->uri->segment(3));
        $dados['pedidos'] = $this->crud_model->listar('pedidos WHERE id_cliente='.$this->uri->segment(3));			
		$this->load->view('visualizar_pdv', $dados);
	}
	
	public function cadastrar()	{
		
		$dados['pagina'] = 'Cadastrar Cliente';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));
		
		$config 			= $this->crud_model->listar('config WHERE id = 1');
		$dados['config'] 	= $config[0];
		
		$this->load->view('header', $dados);				
		$this->load->view('cadastrar');
		$this->load->view('footer');
		
	}
	
	public function visualizar()	{
		
		$dados['pagina'] = 'Visualizar Cliente';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));
		
		$config 			= $this->crud_model->listar('config WHERE id = 1');
		$dados['config'] 	= $config[0];
		
		$this->load->view('header', $dados);
		$dados = array();	
        $dados['lista'] = $this->crud_model->listar('clientes WHERE id='.$this->uri->segment(3));
        $dados['pedidos'] = $this->crud_model->listar('pedidos WHERE id_cliente='.$this->uri->segment(3));				
		$this->load->view('visualizar', $dados);
		$this->load->view('footer');
		
	}
	
	public function editar()	{
		
		$dados['pagina'] = 'Editar Cliente';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));
		
		$config 			= $this->crud_model->listar('config WHERE id = 1');
		$dados['config'] 	= $config[0];
		
		$this->load->view('header', $dados);
		$dados = array();	
        $dados['lista'] = $this->crud_model->listar('clientes WHERE id='.$this->uri->segment(3));				
		$this->load->view('editar', $dados);
		$this->load->view('footer');
		
	}
	
	public function salvar(){
		
		date_default_timezone_set("Brazil/East");
		
		$dados = array (
			'nome' 			=> $this->input->post('nome'),
			'email' 		=> $this->input->post('email'),
			'telefone' 		=> $this->input->post('telefone'),
			'celular' 		=> $this->input->post('celular'),
			'cep' 			=> $this->input->post('cep'),
			'rua' 			=> $this->input->post('rua'),
			'numero' 		=> $this->input->post('numero'),
			'complemento'	=> $this->input->post('complemento'),
			'bairro' 		=> $this->input->post('bairro'),
			'cidade' 		=> $this->input->post('cidade'),
			'estado' 		=> $this->input->post('estado'),
			'notas' 		=> $this->input->post('notas'),
			'data_registro' => date('d/m/Y H:i:s')
		);
		
		
		if($this->input->post('action') == 'cadastrar'){
			$tabela = 'clientes';			
			$this->crud_model->inserir($tabela, $dados);
						
			redirect('clientes');
			
		} elseif($this->input->post('action') == 'editar'){			
			$tabela = 'clientes';
			$where = $this->db->where('id', $this->input->post('id'));
			$id = $this->input->post('id');
			$this->crud_model->atualizar($tabela, $dados, $id);
			
			redirect('clientes/visualizar/'.$this->input->post('id'));
		}
	
	}
	
	public function remover(){
		
		$id	= $this->uri->segment(3);	
		
		$this->crud_model->remover($id,'clientes');
		
		redirect('clientes');
	}
	
}

?>
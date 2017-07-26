<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuracoes extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		
		$this->load->model('crud_model');
		$this->load->model('usuario_model');
		
	}
	
	public function index()	{
		$this->load->model('usuario_model');	
		
		$dados['pagina'] = 'Configurações';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));	
		
		$config 			= $this->crud_model->listar('config WHERE id = 1');
		$dados['config'] 	= $config[0];
			
		$this->load->view('header', $dados);	
		$dados = array();	
        $dados['lista'] = $this->crud_model->listar('config');			
		$this->load->view('configuracoes/index', $dados);
		$this->load->view('footer');		
	}
	
	public function salvar(){
		
		date_default_timezone_set("Brazil/East");
		
		$dados = array (
			'texto_guiche'	=> $this->input->post('texto_guiche'),
			'razao_social'	=> $this->input->post('razao_social'),
			'nome_fantasia'	=> $this->input->post('nome_fantasia'),
			'cnpj_cpf'		=> $this->input->post('cnpj_cpf'),	
			'telefone' 		=> $this->input->post('telefone'),
			'celular' 		=> $this->input->post('celular'),		
			'email' 		=> $this->input->post('email'),		
			'website' 		=> $this->input->post('website'),
			'cep' 			=> $this->input->post('cep'),
			'rua' 			=> $this->input->post('rua'),
			'numero' 		=> $this->input->post('numero'),
			'complemento'	=> $this->input->post('complemento'),
			'bairro' 		=> $this->input->post('bairro'),
			'cidade' 		=> $this->input->post('cidade'),
			'estado' 		=> $this->input->post('estado')
		);
		
		
		if($this->input->post('action') == 'cadastrar'){
			$tabela = 'config';			
			$this->crud_model->inserir($tabela, $dados);
						
			redirect('configuracoes/index');
			
		} elseif($this->input->post('action') == 'editar'){			
			$tabela = 'config';
			$where = $this->db->where('id', '1');
			$this->crud_model->atualizar($tabela, $dados, '1');
			
			redirect('configuracoes/index');
		}
	}
	
}

?>
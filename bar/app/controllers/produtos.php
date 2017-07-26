<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		
		$this->load->model('crud_model');
		$this->load->model('usuario_model');
		
	}
	
	public function index()	{
		$this->load->model('usuario_model');
		
		$dados['pagina'] = 'Produtos';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));
		$this->load->view('header', $dados);
		$dados = array();
        	$dados['lista'] = $this->crud_model->listar('produtos');
        	$dados['categorias'] = $this->crud_model->listar('categorias');
		$this->load->view('produtos/index', $dados);
		$this->load->view('footer');
	}
	
	public function lista()	{
		$this->load->model('usuario_model');
				
		$dados = array();
        	$dados['lista'] = $this->crud_model->listar('produtos');
        	$dados['categorias'] = $this->crud_model->listar('categorias');
		$this->load->view('produtos/lista', $dados);
	}
	
	public function cadastrar()	{
		
		$dados['pagina'] = 'Cadastrar Produtos';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));
		$this->load->view('header', $dados);
        	$dados['categorias'] = $this->crud_model->listar('categorias');					
		$this->load->view('produtos/cadastrar', $dados);
		$this->load->view('footer');
		
	}
	
	public function visualizar()	{
		
		$dados['pagina'] = 'Visualizar Produtos';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));
		$this->load->view('header', $dados);
		$dados = array();	
        	$dados['lista'] = $this->crud_model->listar('produtos WHERE id='.$this->uri->segment(3));
        	$dados['categorias'] = $this->crud_model->listar('categorias');				
		$this->load->view('produtos/visualizar', $dados);
		$this->load->view('footer');
		
	}
	
	public function editar()	{
		
		$dados['pagina'] = 'Editar Produtos';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));
		$this->load->view('header', $dados);
		$dados = array();	
        	$dados['lista'] = $this->crud_model->listar('produtos WHERE id='.$this->uri->segment(3));
        	$dados['categorias'] = $this->crud_model->listar('categorias');				
		$this->load->view('produtos/editar', $dados);
		$this->load->view('footer');
		
	}
	
	public function salvar(){
				
		//Upload da Imagem
		$config['upload_path'] = './assets/pdv/img/img_produtos/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '512';
		$config['max_width']  = '1024';
		$config['max_height']  = '800';
		
		$this->load->library('upload', $config);
		
		
		if (!$this->upload->do_upload()){
			$imagem = 'sem_imagem.png';
		} else {				
			$array = $this->upload->data();
			$imagem = $array['file_name'];
		}
		
		base_url().'assets/pdv/img/img_produtos/';
				
		date_default_timezone_set("Brazil/East");
				
		if($this->input->post('action') == 'cadastrar'){
			$dados = array (
				'nome' 					=> $this->input->post('nome'),
				'descricao' 			=> $this->input->post('descricao'),
				'unidade' 				=> $this->input->post('unidade'),
				'quantidade' 			=> $this->input->post('quantidade'),
				'valor' 				=> $this->input->post('valor'),
				'categoria' 			=> $this->input->post('categoria'),
				'imagem' 				=> $imagem,
				'adicional' 			=> $this->input->post('adicional'),
				'descricao_completa'	=> $this->input->post('descricao_completa'),
				'data_registro' 		=> date('d/m/Y H:i:s')
			);
		
			$tabela = 'produtos';			
			$this->crud_model->inserir($tabela, $dados);
						
			redirect('produtos/index');
			
		} elseif($this->input->post('action') == 'editar'){		
			
			if ($imagem == 'sem_imagem.png'){
				$dados = array (
					'nome' 					=> $this->input->post('nome'),
					'descricao' 			=> $this->input->post('descricao'),
					'unidade' 				=> $this->input->post('unidade'),
					'quantidade' 			=> $this->input->post('quantidade'),
					'valor' 				=> $this->input->post('valor'),
					'categoria' 			=> $this->input->post('categoria'),
					'adicional' 			=> $this->input->post('adicional'),
					'descricao_completa'	=> $this->input->post('descricao_completa'),
					'data_registro' 		=> date('d/m/Y H:i:s')
				);
			}else{
				$dados = array (
					'nome' 					=> $this->input->post('nome'),
					'descricao' 			=> $this->input->post('descricao'),
					'unidade' 				=> $this->input->post('unidade'),
					'quantidade' 			=> $this->input->post('quantidade'),
					'valor' 				=> $this->input->post('valor'),
					'categoria' 			=> $this->input->post('categoria'),
					'imagem' 				=> $imagem,
					'adicional' 			=> $this->input->post('adicional'),
					'descricao_completa'	=> $this->input->post('descricao_completa'),
					'data_registro' 		=> date('d/m/Y H:i:s')
				);
			}
			
			$tabela = 'produtos';
			$where = $this->db->where('id', $this->input->post('id'));
			$id = $this->input->post('id');
			$this->crud_model->atualizar($tabela, $dados, $id);
			
			redirect('produtos/visualizar/'.$this->input->post('id'));
		}
	
	}
	
	public function remover(){
		
		$id	= $this->uri->segment(3);	
		
		$this->crud_model->remover($id,'produtos');
		
		redirect('produtos/index');
	}
	
}

?>
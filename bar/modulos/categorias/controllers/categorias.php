<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		
		$this->load->model('crud_model');
		$this->load->model('usuario_model');
		
	}
	
	public function index()	{
		$this->load->model('usuario_model');
		
		$dados['pagina'] = 'Categorias';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));
		
		$config 			= $this->crud_model->listar('config WHERE id = 1');
		$dados['config'] 	= $config[0];
		
		$this->load->view('header', $dados);
		$dados = array();
        	$dados['lista'] = $this->crud_model->listar('categorias');
		$this->load->view('categorias/index', $dados);
		$this->load->view('footer');
	}
	
	public function lista()	{
		$this->load->model('usuario_model');
				
		$dados = array();
        $dados['lista'] = $this->crud_model->listar('produtos');
		$this->load->view('produtos/lista', $dados);
	}
	
	public function cadastrar()	{
		
		$dados['pagina'] = 'Cadastrar Categorias';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));
		
		$config 			= $this->crud_model->listar('config WHERE id = 1');
		$dados['config'] 	= $config[0];
		
		$this->load->view('header', $dados);				
		$this->load->view('categorias/cadastrar');
		$this->load->view('footer');
		
	}
	
	public function visualizar()	{
		
		$dados['pagina'] = 'Visualizar Categoria';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));
		
		$config 			= $this->crud_model->listar('config WHERE id = 1');
		$dados['config'] 	= $config[0];
		
		$this->load->view('header', $dados);
		$dados = array();	
        $dados['lista'] = $this->crud_model->listar('categorias WHERE id='.$this->uri->segment(3));				
		$this->load->view('categorias/visualizar', $dados);
		$this->load->view('footer');
		
	}
	
	public function editar()	{
		
		$dados['pagina'] = 'Editar Categoria';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));
		
		$config 			= $this->crud_model->listar('config WHERE id = 1');
		$dados['config'] 	= $config[0];
		
		$this->load->view('header', $dados);
		$dados = array();	
        $dados['lista'] = $this->crud_model->listar('categorias WHERE id='.$this->uri->segment(3));				
		$this->load->view('categorias/editar', $dados);
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
		
		//$alias = ereg_replace("[^a-zA-Z0-9_]", "", strtr($this->input->post('nome'), "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
		$alias = strtr($this->input->post('nome'), "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_");
		
		if($this->input->post('action') == 'cadastrar'){
			$dados = array (
				'status' 		=> $this->input->post('status'),
				'nome' 			=> $this->input->post('nome'),
				'alias' 		=> $alias,
				'ordem' 		=> $this->input->post('ordem'),
				'img' 			=> $imagem,
				'descricao' 		=> $this->input->post('descricao'),
				'data_registro' 	=> date('d/m/Y H:i:s')
			);
		
			$tabela = 'categorias';			
			$this->crud_model->inserir($tabela, $dados);
						
			redirect('categorias/index');
			
		} elseif($this->input->post('action') == 'editar'){		
			
			if ($imagem == 'sem_imagem.png'){
					$dados = array (
					'status' 		=> $this->input->post('status'),
					'nome' 			=> $this->input->post('nome'),
					'ordem' 		=> $this->input->post('ordem'),
					'descricao' 		=> $this->input->post('descricao'),
					'data_registro' 	=> date('d/m/Y H:i:s')
				);
			}else{
				$dados = array (
					'status' 		=> $this->input->post('status'),
					'nome' 			=> $this->input->post('nome'),
					'ordem' 		=> $this->input->post('ordem'),
					'img' 			=> $imagem,
					'descricao' 		=> $this->input->post('descricao'),
					'data_registro' 	=> date('d/m/Y H:i:s')
				);
			}
			
			$tabela = 'categorias';
			$where = $this->db->where('id', $this->input->post('id'));
			$id = $this->input->post('id');
			$this->crud_model->atualizar($tabela, $dados, $id);
			
			redirect('categorias/index');
		}
	
	}
	
	public function remover(){
		
		$id	= $this->uri->segment(3);	
		
		$this->crud_model->remover($id,'categorias');
		
		redirect('categorias/index');
	}
	
}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		
		$this->load->model('crud_model');
		$this->load->model('usuario_model');
		date_default_timezone_set('America/Sao_Paulo');
	}
	
	public function index()	{
		$this->load->model('usuario_model');	
		
		$dados['pagina'] = 'Pedidos';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));	
		
		$config 			= $this->crud_model->listar('config WHERE id = 1');
		$dados['config'] 	= $config[0];
			
		$this->load->view('header', $dados);
		$dados = array();	
        $dados['lista'] = $this->crud_model->listar('pedidos');			
		$this->load->view('pedidos/index', $dados);
		$this->load->view('footer');		
	}
	
	public function visualizar()	{
		
		$dados['pagina'] = 'Visualizar Pedidos';
		$dados['pdv'] = $this->usuario_model->verificaPDV();
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));
		
		$config 			= $this->crud_model->listar('config WHERE id = 1');
		$dados['config'] 	= $config[0];
		
		$this->load->view('header', $dados);
		$dados = array();	
        $dados['lista'] = $this->crud_model->listar('pedidos WHERE id='.$this->uri->segment(3));				
		$this->load->view('pedidos/cupom', $dados);
		$this->load->view('footer');		
	}	
	
	public function cupom()	{
				
		$dados = array();	
        $dados['config'] 	= $this->crud_model->listar('config WHERE id=1');
		$dados['pedidos'] 	= $this->crud_model->listar('pedidos WHERE id='.$this->uri->segment(3));
		$dados['produtos'] 	= $this->crud_model->listar('itens_pedidos WHERE id_pedido='.$this->uri->segment(3).' AND id_produto > 0 ORDER BY id');	
		# Troco	
		$dados['troco'] 	= $this->crud_model->listar('itens_pedidos WHERE id_pedido='.$this->uri->segment(3).' AND id_produto = 0');
		# Dinheiro	
		$dados['dinheiro'] 	= $this->crud_model->listar('itens_pedidos WHERE id_pedido='.$this->uri->segment(3).' AND id_produto = -1');		
		# Crédito	
		$dados['credito'] 	= $this->crud_model->listar('itens_pedidos WHERE id_pedido='.$this->uri->segment(3).' AND id_produto = -2');
		# Debito	
		$dados['debito'] 	= $this->crud_model->listar('itens_pedidos WHERE id_pedido='.$this->uri->segment(3).' AND id_produto = -3');
		# Cheque
		$dados['cheque'] 	= $this->crud_model->listar('itens_pedidos WHERE id_pedido='.$this->uri->segment(3).' AND id_produto = -4');
		# Outros
		$dados['outros'] 	= $this->crud_model->listar('itens_pedidos WHERE id_pedido='.$this->uri->segment(3).' AND id_produto = -5');
		# Desconto	
		$dados['desconto'] 	= $this->crud_model->listar('itens_pedidos WHERE id_pedido='.$this->uri->segment(3).' AND id_produto = -10');
		
		$sql = $this->crud_model->listar('pedidos WHERE id='.$this->uri->segment(3));
		foreach ($sql as $row){	
			$id_cliente = $row->id_cliente;
		}
		if($id_cliente == '0'){
			$dados['cliente_nome'] 		= 'Cliente não cadastrado';
			$dados['cliente_telefone'] 	= '';
			$dados['cliente_celular'] 	= '';
			$dados['cliente_rua'] 		= '';
			$dados['cliente_numero'] 	= '';
			$dados['cliente_complemento'] 	= '';
			$dados['cliente_bairro'] 	= '';
			$dados['cliente_cidade'] 	= '';
			$dados['cliente_estado'] 	= '';
		}else {
		$cliente = $this->crud_model->listar('clientes WHERE id='.$id_cliente);		
		foreach ($cliente as $row){
			$dados['cliente_nome'] 		= $row->nome;
			$dados['cliente_telefone'] 	= $row->telefone;
			$dados['cliente_celular'] 	= $row->celular;
			$dados['cliente_rua'] 		= $row->rua;
			$dados['cliente_numero'] 	= $row->numero;
			$dados['cliente_complemento'] 	= $row->complemento;
			$dados['cliente_bairro'] 	= $row->bairro;
			$dados['cliente_cidade'] 	= $row->cidade;
			$dados['cliente_estado'] 	= $row->estado;
			}
		}
		
		$this->load->view('pedidos/cupom', $dados);
		
	}
	
	public function cupom_cozinha()	{
				
		$dados = array();	
        $dados['config'] 	= $this->crud_model->listar('config WHERE id=1');
		$dados['pedidos'] 	= $this->crud_model->listar('pedidos WHERE id='.$this->uri->segment(3));
		//$dados['produtos'] 	= $this->crud_model->listar('itens_pedidos WHERE id_pedido='.$this->uri->segment(3).' AND id_produto > 0 ORDER BY id ASC');	
		$dados['produtos'] 	= $this->crud_model->listar('itens_pedidos A INNER JOIN produtos B ON (A.id_produto = B.id) WHERE A.id_pedido='.$this->uri->segment(3).' AND id_produto > 0 and B.categoria != 2 and B.categoria != 6 ORDER BY A.id');	
		
		$this->load->view('pedidos/cupom_cozinha', $dados);
		
	}
	
	public function senha()	{
				
		$dados = array();	
        $dados['config'] 	= $this->crud_model->listar('config WHERE id=1');
		$dados['pedidos'] 	= $this->crud_model->listar('pedidos WHERE id='.$this->uri->segment(3));
		
		$this->load->view('pedidos/senha', $dados);
		
	}
	
	public function cupom_print()	{
				
		$dados = array();	
        $dados['config'] 	= $this->crud_model->listar('config WHERE id=1');
		$dados['pedidos'] 	= $this->crud_model->listar('pedidos WHERE id='.$this->uri->segment(3));
		$dados['produtos'] 	= $this->crud_model->listar('itens_pedidos WHERE id_pedido='.$this->uri->segment(3).' AND id_produto > 0');	
		
		$sql = $this->crud_model->listar('pedidos WHERE id='.$this->uri->segment(3));
		foreach ($sql as $row){	
			$id_cliente = $row->id_cliente;
		}
		
		$this->load->view('pedidos/cupom_print', $dados);
		
	}	
}

?>
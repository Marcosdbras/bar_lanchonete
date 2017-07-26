<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdv extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

	
// Carrega o PDV
	public function index(){	
	
		$this->load->model('crud_model');
		$this->load->model('usuario_model');
		
		$dados['user'] = $this->usuario_model->verificaEmail($this->session->userdata('login'));

		$data = array();
		
		$data['categorias'] 		= $this->crud_model->listar('categorias WHERE status = 1 ORDER BY ordem ASC');
		
		$data['produtos'] 		= $this->crud_model->listar('produtos WHERE status = 1 ORDER BY nome ASC');
		
		$data['list_pedidos_abertos'] = $this->crud_model->listar('pedidos_espera_html ORDER BY id DESC');
		
		$data['list_mesas'] = $this->crud_model->listar('mesas ORDER BY nome ASC');
		
		$data['list_clientes'] = $this->crud_model->listar('clientes ORDER BY nome ASC');
		
		$config 			= $this->crud_model->listar('config WHERE id = 1');
		$data['config'] 	= $config[0];
		
		$this->load->view('pdv/index', $data);
	}
	
	
// Salvar o pedido em espera no banco
	function salvar_pedido_espera(){	

		$this->load->model('crud_model');
		
		$id_prod		= $this->input->post('id_prod');
		$nome_prod		= $this->input->post('nome_prod');
		$quantidade 	= $this->input->post('quantidade');
		$valor_unitario = $this->input->post('valor_unitario');
		$total_cupom 	= $this->input->post('total_cupom');
		$nome_cliente	= $this->input->post('nome_cliente');
		$id_cliente		= $this->input->post('id_cliente');
		$id_nota		= $this->input->post('id_nota');
		$obs_pedido		= $this->input->post('obs_pedido');		
		
		$desconto		= 0;
		$total			= $total_cupom - $desconto;
		
		$data = date('d/m/Y');
		$hora = date('H:i:s');

		
		if ($id_nota > 0){
			
			// Atualizar Tabela de Pedidos
			$tabela = 'pedidos';
			
			$novos_dados = array ( 				
				'data'				=> $data,
				'hora'				=> $hora,
				'id_cliente'		=> $id_cliente,
				'cliente'			=> $nome_cliente,
				'estado'			=> 0,
				'sub_total'			=> $total_cupom,
				'desconto'			=> $desconto,
				'total'				=> $total,
				'obs'				=> $obs_pedido
			);
			
			$this->crud_model->atualizar($tabela, $novos_dados, $id_nota); 
			
			
			// Remover itens do pedido
			$tabela = 'itens_pedidos';
			
			$this->crud_model->remover_por_campo($id_nota, 'id_pedido', $tabela);
			
			// Adicionar de itens do pedido
			$tamanho = sizeof($nome_prod);
			for ($i = 0; $i < $tamanho; $i++){
				$dados_banco = array ( 				
					'id_pedido'			=> $id_nota,
					'id_produto'		=> $id_prod[$i],
					'nome_produto'		=> $nome_prod[$i],
					'quantidade'		=> $quantidade[$i],
					'valor'				=> $valor_unitario[$i]
				);
				$this->crud_model->inserir($tabela, $dados_banco);
			}
			
			echo $id_nota;
		}else{
			
			// Inserir Tabela de Pedidos
			$tabela = 'pedidos';
			
			$dados_banco = array ( 				
				'data'				=> $data,
				'hora'				=> $hora,
				'cliente'		=> $nome_cliente,
				'id_cliente'		=> $id_cliente,
				'estado'			=> 0,
				'sub_total'			=> $total_cupom,
				'desconto'			=> $desconto,
				'total'				=> $total,
				'obs'				=> $obs_pedido
			);
			
			$this->crud_model->inserir($tabela, $dados_banco);
			$id_pedido = $this->db->insert_id();
			

			// Adicionar de itens do pedido
			$tabela = 'itens_pedidos';
			
			$tamanho = sizeof($nome_prod);
			for ($i = 0; $i < $tamanho; $i++){
				$dados_banco = array ( 				
					'id_pedido'			=> $id_pedido,
					'id_produto'		=> $id_prod[$i],
					'nome_produto'		=> $nome_prod[$i],
					'quantidade'		=> $quantidade[$i],
					'valor'				=> $valor_unitario[$i]
				);
				$this->crud_model->inserir($tabela, $dados_banco);
			}
			
			echo $id_pedido;
		}
		
	}
	

// Salvar o pedido finalizados
	function salvar_pedido_finalizar(){	

		$this->load->model('crud_model');
		
		$id_prod		= $this->input->post('id_prod');
		$nome_prod		= $this->input->post('nome_prod');
		$quantidade 	= $this->input->post('quantidade');
		$valor_unitario = $this->input->post('valor_unitario');
		$total_cupom 	= $this->input->post('total_cupom');
		$total_pago 	= $this->input->post('total_pago');
		$total_desconto = $this->input->post('total_desconto');
		$nome_cliente	= $this->input->post('nome_cliente');
		$id_cliente		= $this->input->post('id_cliente');
		$id_nota		= $this->input->post('id_nota');
		$obs_pedido		= $this->input->post('obs_pedido');
		
		$data = date('d/m/Y');
		$hora = date('H:i:s');

		if ($id_nota > 0){
			
			// Atualizar Tabela de Pedidos
			$tabela = 'pedidos';
			
			$novos_dados = array ( 				
				'data'				=> $data,
				'hora'				=> $hora,
				'id_cliente'		=> $id_cliente,
				'cliente'			=> $nome_cliente,
				'estado'			=> 1,
				'sub_total'			=> $total_cupom,
				'desconto'			=> $total_desconto,
				'total'				=> $total_pago,
				'obs'				=> $obs_pedido
			);
			
			$this->crud_model->atualizar($tabela, $novos_dados, $id_nota); 
			
			
			// Remover itens do pedido
			$tabela = 'itens_pedidos';
			
			$this->crud_model->remover_por_campo($id_nota, 'id_pedido', $tabela);
			
			// Adicionar de itens do pedido
			$tamanho = sizeof($nome_prod);
			for ($i = 0; $i < $tamanho; $i++){
				$dados_banco = array ( 				
					'id_pedido'			=> $id_nota,
					'id_produto'		=> $id_prod[$i],
					'nome_produto'		=> $nome_prod[$i],
					'quantidade'		=> $quantidade[$i],
					'valor'				=> $valor_unitario[$i]
				);
				$this->crud_model->inserir($tabela, $dados_banco);
			}
			
			// Deletar de Tabela HTML pedidos em aberto
			$tabela = 'pedidos_espera_html';
			$this->crud_model->remover_por_campo($id_nota, 'id', $tabela);
			
			echo $id_nota;
		}else{
			
			// Inserir Tabela de Pedidos
			$tabela = 'pedidos';
			
			$dados_banco = array ( 				
				'data'				=> $data,
				'hora'				=> $hora,
				'id_cliente'		=> $id_cliente,
				'cliente'			=> $nome_cliente,
				'estado'			=> 1,
				'sub_total'			=> $total_cupom,
				'desconto'			=> $total_desconto,
				'total'				=> $total_pago,
				'obs'				=> $obs_pedido
			);
			
			$this->crud_model->inserir($tabela, $dados_banco);
			$id_pedido = $this->db->insert_id();
			

			// Adicionar de itens do pedido
			$tabela = 'itens_pedidos';
			
			$tamanho = sizeof($nome_prod);
			for ($i = 0; $i < $tamanho; $i++){
				$dados_banco = array ( 				
					'id_pedido'			=> $id_pedido,
					'id_produto'		=> $id_prod[$i],
					'nome_produto'		=> $nome_prod[$i],
					'quantidade'		=> $quantidade[$i],
					'valor'				=> $valor_unitario[$i]
				);
				$this->crud_model->inserir($tabela, $dados_banco);
			}
			
			echo $id_pedido;
		}
		
	}
	
	
// Salvar o pedido (em espera ou finalizado) no banco
	function salvar_pedido_html(){	
		$this->load->model('crud_model');
		
		$nota_inteira	= $this->input->post('nota_inteira');
		$id_nota		= $this->input->post('id_nota');
		
		$tabela = 'pedidos_espera_html';
		
		$lista = $this->crud_model->listar($tabela.' WHERE id = "'.$id_nota.'"');

		if ($lista == NULL){
			// Inserir HTML do pedido
			$tabela = 'pedidos_espera_html';
			
			$dados_banco = array ( 				
				'id'				=> $id_nota,
				'html'				=> $nota_inteira
			);
			
			$this->crud_model->inserir($tabela, $dados_banco);
			$id_nota = $this->db->insert_id();
		}else{
			// Atualizar HTML do pedido
			$tabela = 'pedidos_espera_html';
			
			$novos_dados = array (
				'html'				=> $nota_inteira
			);
			
			$this->crud_model->atualizar($tabela, $novos_dados, $id_nota);
		}
		
		echo $id_nota;
	}
	
	
// Cadastrar Cliente
	function cadastrar_cliente(){	

		$this->load->model('crud_model');
											
		$nome		= $this->input->post('nome');
		$email		= $this->input->post('email');
		$telefone 	= $this->input->post('telefone');
		$celular 	= $this->input->post('celular');
		$cep 		= $this->input->post('cep');
		$rua 		= $this->input->post('rua');
		$numero		= $this->input->post('numero');
		$complemento= $this->input->post('complemento');
		$bairro		= $this->input->post('bairro');
		$cidade		= $this->input->post('cidade');
		$estado		= $this->input->post('estado');
		$notas		= $this->input->post('notas');
		
		$data = date('d/m/Y').' '.date('H:i:s');

		// Adiciona na tabela
		$tabela = 'clientes';
		
		$dados_banco = array ( 				
			'nome'				=> $nome,
			'email'				=> $email,
			'telefone'			=> $telefone,
			'celular'			=> $celular,
			'cep'				=> $cep,
			'rua'				=> $rua,
			'numero'			=> $numero,
			'complemento'		=> $complemento,
			'bairro'			=> $bairro,
			'cidade'			=> $cidade,
			'estado'			=> $estado,
			'notas'				=> $notas,
			'data_registro'		=> $data
		);
		
		$this->crud_model->inserir($tabela, $dados_banco);
		$id_cliente = $this->db->insert_id();
		
		echo $id_cliente;
	}
	
	
	
// Salvar o pedido (em espera ou finalizado) no banco
	function cancelar_pedido(){	
		$this->load->model('crud_model');
		
		$id_nota = $this->input->post('id_nota');
		
		// Remover pedido
		$tabela = 'pedidos';
		$this->crud_model->remover_por_campo($id_nota, 'id', $tabela);
		
		// Remover html do pedido
		$tabela = 'pedidos_espera_html';
		$this->crud_model->remover_por_campo($id_nota, 'id', $tabela);
		
		// Remover itens do pedido
		$tabela = 'itens_pedidos';
		$this->crud_model->remover_por_campo($id_nota, 'id_pedido', $tabela);
		
	}
	
	
// Salvar valor para Guiche
	function salvar_guiche(){	
		$this->load->model('crud_model');
		
		$numero			= $this->input->post('numero');
		
		$tabela = 'guiche';
		
		$dados_banco = array ( 				
			'pedido'				=> $numero,
			'status'				=> 1
		);
		
		$lista = $this->crud_model->listar($tabela.' WHERE pedido ='.$numero);
		
		
		if ($lista != NULL){
			foreach($lista as $linha){
				$this->crud_model->remover($linha->id, $tabela);
			}
		}
		
		$this->crud_model->inserir($tabela, $dados_banco);
		
		echo '1';
	}
	
// Chamar valor do Guiche
	function chamar_guiche(){	
		$this->load->model('crud_model');
		
		//$numero			= $this->input->post('numero');
		
		$tabela = 'guiche';
		
		$lista = $this->crud_model->listar($tabela.' WHERE status = 1');
		
		if ($lista != NULL){
			$lista = $this->crud_model->listar($tabela.' ORDER BY id');
			$tamanho = sizeof($lista);

			$chamar = '';

			foreach($lista as $linha){
				if ($tamanho > 3){
					$this->crud_model->remover($linha->id, $tabela);
					$tamanho--;
				}else{
					if ($linha->status == 1){
						$dados_banco = array ( 			
							'status' => 0
						);
						$this->crud_model->atualizar($tabela, $dados_banco, $linha->id);
					}
					
					$chamar = $linha->pedido.' '.$chamar;
				}
			}
			
			echo $chamar;
		}else{
			echo 0;
		}
	}
	
// Abrir primeira vez Guiche
	function abrir_guiche(){	
		$this->load->model('crud_model');
		
		$tabela = 'guiche';
		
		$lista = $this->crud_model->listar($tabela.' ORDER BY id');
		
		if ($lista != NULL){
			$tamanho = sizeof($lista);

			$chamar = '';

			foreach($lista as $linha){
				if ($tamanho > 3){
					$this->crud_model->remover($linha->id, $tabela);
					$tamanho--;
				}else{
					$chamar = $linha->pedido.' '.$chamar;
				}
			}
			
			echo $chamar;
		}else{
			echo 0;
		}
	}
}

?>
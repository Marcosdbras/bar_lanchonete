<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {
	
	function __construct(){
        parent::__construct();
		$this->load->dbforge();
		date_default_timezone_set('America/Sao_Paulo');
    }
	
	public function listar($tabela){		
		$tabela_query = 'SELECT * FROM '.$tabela;
		$query = $this->db->query($tabela_query);
		return $query->result();
	}
	
	public function inserir($tabela, $dados_banco){						
		return $this->db->insert($tabela, $dados_banco);
		return $this->db->insert_id();
	}
	
	public function atualizar($tabela, $dados_banco, $id){
		$this->db->where('id', $id);
		$this->db->update($tabela, $dados_banco);
	}
	
	public function remover($id, $tabela){		
		$this->db->delete($tabela, array('id' => $id)); 
	}
	
	public function remover_por_campo($valor, $campo, $tabela){		
		$this->db->delete($tabela, array("$campo" => $valor)); 
	}
	
}
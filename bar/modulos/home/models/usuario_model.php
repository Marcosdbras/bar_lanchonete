<?php

class Usuario_model extends CI_Model{

	function GravaUsuario($usuario){
		$this->db->set('nome', $usuario['nome']);
		$this->db->set('usuario', $usuario['usuario']);
		$this->db->set('senha', $usuario['senha']);
		$this->db->set('data_cadastro', date("d-m-Y", time()));
		return $this->db->insert('usuarios');
	}
		
	function verificaEmail($usuario){
		$this->db->where('usuario', $usuario);
		$sql = $this->db->get('usuarios');
		return $sql->result();
	}
	
	function verificaPDV(){
		$this->db->where('estado', '0');
		$sql = $this->db->get('pedidos');
		#return $sql->result();
		if($sql->num_rows > 0){
			return true;
		}
	}
	
	function GravaNovaSenha($user){
		$this->db->set('senha', $user['senha']);
		$this->db->where('usuario', $user['usuario']);
		$this->db->update('usuarios');
	}
	
	function GetUserID($usuario){
		$this->db->where('usuario', $usuario);
		$sql = $this->db->get('usuarios');
		return $sql->row(0);
	}
		
}

?>
<?php

class Usuario_model extends CI_Model{

	function GravaUsuario($usuario){
		$this->db->set('nome', $usuario['nome']);
		$this->db->set('email', $usuario['email']);
		$this->db->set('senha', $usuario['senha']);
		$this->db->set('data_cadastro', date("d-m-Y", time()));
		return $this->db->insert('usuarios');
	}
		
	function verificaEmail($email){
		$this->db->where('email', $email);
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
		$this->db->where('email', $user['email']);
		$this->db->update('usuarios');
	}
	
	function GetUserID($email){
		$this->db->where('email', $email);
		$sql = $this->db->get('usuarios');
		return $sql->row(0);
	}
		
}

?>
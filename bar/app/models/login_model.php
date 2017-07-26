<?php

class Login_model extends CI_Model{

	function ValidaLogin()
	{
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('senha', hash('sha512', $this->input->post('senha')));
		$this->db->where('status', '1');
		$query = $this->db->get('usuarios');
		if($query->num_rows == 1)
		{
			return true;
		}
		
	}

}

?>
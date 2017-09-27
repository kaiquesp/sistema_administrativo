<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_perfil extends CI_Model{
	function buscaPerfil(){
		$this->db->select('perfilid, descricao');
		$this->db->from('perfil');
		
		$this->db->where('status','1');

		$query = $this->db->get();
		return $query->result();

	}
}
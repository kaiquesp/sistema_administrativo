<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produto extends CI_Model{


	function cadastraproduto($dados = NULL) {
		if ($dados !== NULL) {
			extract ( $dados );
			$this->db->insert ( 'produtos', array (
				'descricaoproduto' => $dados ['descricaoproduto'],
				'unidadevenda' => $dados ['unidadevenda'],
				'valormercadoria' => $dados ['valormercadoria'],
				'valorvenda' => $dados ['valorvenda'],
				'quantidadeestoque' => $dados ['quantidadeestoque'],
				'descontomaximopermitido' => $dados ['descontomaximopermitido'],
				'estoquealerta' => $dados ['estoquealerta'],
				'quantidademinimavenda' => $dados ['quantidademinimavenda']
				) );
			return true;
		} else {
			return false;
		}
	}

	/*function buscacliente(){
		$this->db->select('*');
		$this->db->from('clientes');
		//verificar se o email é válido
		$this->db->order_by("nomefantasia", "asc");
		$query = $this->db->get();
		if($query->num_rows() >= 1){
			return $query->result();
		}else{
			return false;
		}
	}*/

	
}


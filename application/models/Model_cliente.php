<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cliente extends CI_Model{
	/*function login($login, $senha){
		$this->db->select('*');
		$this->db->from('usuarios');
		//verificar se o email é válido
		$this->db->where('login',$login);
		//verificar se a senha está válida
		$this->db->where('senha',$senha);
		//Verificar se o usuário está ativo
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}

	function buscaUsuarioPerfil($perfil){
		$this->db->select('nome');
		$this->db->from('usuarios');
		//verificar se o email é válido
		$this->db->where('perfilid',$perfil);
		$this->db->where('status', '1');
		$query = $this->db->get();
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}*/

	function cadastracliente($dados = NULL) {
		if ($dados !== NULL) {
			extract ( $dados );
			$this->db->insert ( 'clientes', array (
				'nomecompleto'		=> $dados['nomecompleto'],
				'nomefantasia'		=> $dados ['nomefantasia'],
				'razaosocial'		=> $dados ['razaosocial'],
				'cnpj' 				=> $dados ['cnpj'],
				'cpf' 				=> $dados ['cpf'],
				'telefonecomercial' => $dados ['telefonecomercial'],
				'celular' 			=> $dados ['celular'],
				'email' 			=> $dados ['email'],
				'cep' 				=> $dados ['cep'],
				'endereco' 			=> $dados ['endereco'],
				'numero' 			=> $dados ['numero'],
				'complemento' 		=> $dados ['complemento'],
				'bairro' 			=> $dados ['bairro'],
				'cidade' 			=> $dados ['cidade'],
				'estado' 			=> $dados ['estado']
			) );
			return true;
		} else {
			return false;
		}
	}

	function buscacliente(){
		$this->db->select('*');
		$this->db->from('clientes');
		//verificar se o email é válido
		$this->db->order_by("nomecompleto", "asc");
		$query = $this->db->get();
		if($query->num_rows() >= 1){
			return $query->result();
		}else{
			return false;
		}
	}

	function deleteclienteid($id){
		$this->db->where('id', $id);
		$this->db->delete('clientes');
		
	}

	/*

	function consultausuario($dados = NULL){

		if ($dados !== NULL) {
			extract($dados);
			$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->where('1 = 1', null);
			if(!empty($dados['nome'])){
				$this->db->like('nome', $dados['nome']);
			}

			if(!empty($dados['login'])){
				$this->db->where('login', $dados['login']);
			}

			if(!empty($dados['email'])){
				$this->db->where('email', $dados['email']);
			}

			
			$query = $this->db->get();
			if($query->num_rows() >= 1){
				return $query->result();
			}else{
				return false;
			}
		} else {
			return false;
		}	
	}

	function consultausuarioespecifico($id){

		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if($query->num_rows() === 1){
			return $query->result();
		}else{
			return false;
		}
	}

	function atualizausuario($dados = NULL) {
		if ($dados !== NULL) {
			extract ($dados);
			$this->db->where('id', $dados['id']);
			$this->db->update('usuarios', array (
				'nome' => $dados['nome'],
				'login' => $dados['login'],
				'email' => $dados['email'],
				) );
			return true;
		} else {
			return false;
		}
	}*/
}


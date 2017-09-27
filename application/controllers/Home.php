<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		date_default_timezone_set('America/Sao_Paulo');
	}

	public function index(){
		redirect('login');
	}

	function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home','refresh');
	}	

	function dashboard(){
		if ($this->session->userdata ( 'logged_in' )) {
			$this->load->view('view_home');
		}else{
			redirect ( 'login', 'refresh' );
		}
	}

	function requisicaoajax(){
		if ($this->session->userdata ( 'logged_in' )) { // VALIDA USUÁRIO LOGADO
			$this->load->model ( 'model_perfil' );
			$resultadoPerfil = $this->model_perfil->buscaPerfil ();
			
			$dados ['resultadoPerfil'] = $resultadoPerfil;
			$dados ['tela'] = 'view_requisicaojquery';
			$this->load->view ( 'view_home', $dados );
		} else {
			redirect ( 'login', 'refresh' );
		}
	}

	/*Usuários*/
	function cadastrausuario() {
		if ($this->session->userdata ( 'logged_in' )) { // VALIDA USUÁRIO LOGADO
				$this->load->model ( 'model_perfil' );
				$resultadoPerfil = $this->model_perfil->buscaPerfil ();
				$dados ['resultadoPerfil'] = $resultadoPerfil;
					
		if ($this->input->post ()) {
			if ((empty(trim($this->input->post('nome')))) || (empty(trim($this->input->post('login')))) || (empty(trim($this->input->post('email')))) || (empty(trim($this->input->post('senha')))) || (empty(trim($this->input->post('perfilid'))))) {
							
				$dados ['msg'] = '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> Atenção!</h4>
				Campos imcompletos! Preencha todos os campos e tente novamente.
				</div>';

				$dados ['tela'] = 'usuarios/view_cadastrousuario';
					$this->load->view ( 'view_home', $dados );
			} else {
				$dadosusuario ['nome'] = $this->input->post ( 'nome' );
				$dadosusuario ['login'] = $this->input->post ( 'login' );
				$dadosusuario ['email'] = $this->input->post ( 'email' );
				$dadosusuario ['senha'] = $this->input->post ( 'senha' );
				$dadosusuario ['datacadastro'] = date ( 'Y-m-d H:m:s' );
				$dadosusuario ['perfilid'] = $this->input->post ( 'perfilid' );
				$dadosusuario ['status'] = 1;

				$this->load->model ( 'model_usuario' );
				$resultadousuario = $this->model_usuario->cadastrausuario ( $dadosusuario );

			if ($resultadousuario) {
				$dados ['msg'] = '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> Sucesso!</h4>
				Usuário cadastrado com sucesso!
				</div>';
				$dados ['tela'] = 'usuarios/view_cadastrousuario';
			} else {
				$dados ['msg'] = '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> Atenção!</h4>
				Ocorreu um erro ao cadastrar o usuario! Atualize a página e tente novamente.
				</div>';
				$dados ['tela'] = 'usuarios/view_cadastrousuario';
			}
				$this->load->view ( 'view_home', $dados );
			}
		}else{
			$dados ['tela'] = 'usuarios/view_cadastrousuario';
			$this->load->view ( 'view_home', $dados );
		}
		}else{
		redirect ( 'login', 'refresh' );
		}
	}

	function listausuario() {
		if ($this->session->userdata ( 'logged_in' )) { // VALIDA USUÁRIO LOGADO
			$this->load->model ( 'model_usuario' );
			$resultadousuario = $this->model_usuario->buscausuario ();
			$dados ['resultadousuario'] = $resultadousuario;
						
			$dados ['tela'] = 'usuarios/view_listausuario';
			$this->load->view ( 'view_home', $dados );
		}else{
			redirect ( 'login', 'refresh' );
			$dados ['msg'] = 'Sua sessão expirou, faça o login novamente';
		}
	}

	function consultausuario() {
		if ($this->session->userdata ( 'logged_in' )) { // VALIDA USUÁRIO LOGADO

			if($this->input->post()){
				if ((empty(trim($this->input->post('nome')))) || (empty(trim($this->input->post('login')))) || (empty(trim($this->input->post('email'))))) {

					$dadosusuario['nome'] = $this->input->post( 'nome' );
					$dadosusuario['login'] = $this->input->post( 'login' );
					$dadosusuario['email'] = $this->input->post( 'email' );

					$this->load->model ( 'model_usuario' );
					$resultadousuario = $this->model_usuario->consultausuario ( $dadosusuario );
				if ($resultadousuario) {
					$dados ['resultadousuario'] = $resultadousuario;
					$dados ['tela'] = 'usuarios/view_listausuario';
					$this->load->view ( 'view_home', $dados );
				} else {
					$dados ['msg'] = '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-ban"></i> Atenção!</h4>
					Nenhum usuário localizado para os dados informados! Tente novamente.
					</div>';
					$dados ['tela'] = 'usuarios/view_listausuario';
					$this->load->view ( 'view_home', $dados );
					}
				}else{
					$dados ['msg'] = '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-ban"></i> Atenção!</h4>
					Campos imcompletos! Preencha todos os campos e tente novamente.
					</div>';

					$dados ['tela'] = 'usuarios/view_listausuario';
					$this->load->view ( 'view_home', $dados );
				}

			}elseif($this->input->get()) {
				if($this->input->get('id')){

					$id = (int)$this->input->get('id');

					$this->load->model ( 'model_usuario' );
					$consultausuarioespecifico = $this->model_usuario->consultausuarioespecifico($id);
					if ($consultausuarioespecifico) {
							$dados ['consultausuarioespecifico'] = $consultausuarioespecifico;
							$dados ['tela'] = 'usuarios/view_formalterausuario';
							$this->load->view ( 'view_home', $dados );
						} else {
							$dados ['msg'] = '<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-ban"></i> Atenção!</h4>
							Nenhum usuário localizado para os dados informados! Tente novamente.
						</div>';
						$dados ['tela'] = 'usuarios/view_listausuario';
						$this->load->view ( 'view_home', $dados );
					}
				}
			}else{
				$dados ['tela'] = 'usuarios/view_formconsultausuario';
				$this->load->view ( 'view_home', $dados );
			}
		}else{
			redirect( 'login', 'refresh' );
			$dados ['msg'] = 'Sua sessão expirou, faça o login novamente';
		}
	}

	/*Auxiliares (Ajax)*/
	function buscaUsuarioPerfil(){
		if ($this->session->userdata ( 'logged_in' )) { // VALIDA USUÁRIO LOGADO
			$option = "";
			
			if ($this->input->post ()) {
				$perfil = $this->input->post ( 'perfil' );
				$this->load->model ( 'model_usuario' );
				$resultadoUsuarioPerfil = $this->model_usuario->buscaUsuarioPerfil ( $perfil );
				if ($resultadoUsuarioPerfil) {
					foreach ( $resultadoUsuarioPerfil as $Usuario ) {
						$option .= $Usuario->nome;
					}
				} else {
					$option .= 'Nenhum Valor Encontrado';
				}
			} else {
				$option .= 'Nenhum Valor Encontrado';
			}
			echo $option;
		}else{
			redirect ( 'login', 'refresh' );
		}
	}

	function atualizausuario(){
		if ($this->session->userdata ( 'logged_in' )) { // VALIDA USUÁRIO LOGADO
			$this->load->model ( 'model_perfil' );
			$resultadoPerfil = $this->model_perfil->buscaPerfil ();
			$dados ['resultadoPerfil'] = $resultadoPerfil;
				
			if ($this->input->post ()) {
				if ((empty(trim($this->input->post('id')))) || (empty(trim($this->input->post('nome')))) || (empty(trim($this->input->post('login')))) || (empty(trim($this->input->post('email'))))) {
						
					$dados ['msg'] = '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-ban"></i> Atenção!</h4>
					Campos imcompletos! Preencha todos os campos e tente novamente.
					</div>';

					$dados ['tela'] = 'usuarios/view_formconsultausuario';
					$this->load->view ( 'view_home', $dados );
				} else {
					$dadosusuario ['id'] = $this->input->post ( 'id' );
					$dadosusuario ['nome'] = $this->input->post ( 'nome' );
					$dadosusuario ['login'] = $this->input->post ( 'login' );
					$dadosusuario ['email'] = $this->input->post ( 'email' );

					$this->load->model ( 'model_usuario' );
					$resultadoatualizausuario = $this->model_usuario->atualizausuario ( $dadosusuario );


					if ($resultadoatualizausuario) {
						$dados ['msg'] = '<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> Sucesso!</h4>
						Usuário alterado com sucesso!
						</div>';
						$dados ['tela'] = 'usuarios/view_formconsultausuario';
					} else {
						$dados ['msg'] = '<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> Atenção!</h4>
						Ocorreu um erro ao alterar o usuario! Atualize a página e tente novamente.
						</div>';
						$dados ['tela'] = 'usuarios/view_formconsultausuario';
					}
						$this->load->view ( 'view_home', $dados );
				}
			}else{
				$dados ['tela'] = 'usuarios/view_cadastrousuario';
				$this->load->view ( 'view_home', $dados );
			}
		}else{
			redirect( 'login', 'refresh' );
			$dados ['msg'] = 'Sua sessão expirou, faça o login novamente';
		}
	}

	/*Clientes*/
	function cadastrocliente() {
		if ($this->session->userdata ( 'logged_in' )) { // VALIDA USUÁRIO LOGADO
				$this->load->model ( 'model_perfil' );
				$resultadoPerfil = $this->model_perfil->buscaPerfil ();
				$dados ['resultadoPerfil'] = $resultadoPerfil;
					
		if ($this->input->post ()) {
				$dadosusuario ['nomefantasia'] = $this->input->post ( 'nomefantasia' );
				$dadosusuario ['razaosocial'] = $this->input->post ( 'razaosocial' );
				$dadosusuario ['cnpj'] = $this->input->post ( 'cnpj' );
				$dadosusuario ['cpf'] = $this->input->post ( 'cpf' );
				$dadosusuario ['telefonecomercial'] = $this->input->post('telefonecomercial');
				$dadosusuario ['celular'] = $this->input->post ( 'celular' );
				$dadosusuario ['email'] = $this->input->post('email');
				$dadosusuario ['cep'] = $this->input->post ( 'cep' );
				$dadosusuario ['endereco'] = $this->input->post ( 'endereco' );
				$dadosusuario ['numero'] = $this->input->post ( 'numero' );
				$dadosusuario ['complemento'] = $this->input->post ( 'complemento' );
				$dadosusuario ['bairro'] = $this->input->post ( 'bairro' );
				$dadosusuario ['cidade'] = $this->input->post ( 'cidade' );
				$dadosusuario ['estado'] = $this->input->post ( 'estado' );

				$this->load->model ( 'model_cliente' );
				$resultadocadastracliente = $this->model_cliente->cadastracliente ( $dadosusuario );

			if ($resultadocadastracliente) {
				$dados ['msg'] = '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> Sucesso!</h4>
				Cliente cadastrado com sucesso!
				</div>';
				$dados ['tela'] = 'clientes/view_cadastrocliente';
			} else {
				$dados ['msg'] = '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> Atenção!</h4>
				Ocorreu um erro ao cadastrar o cliente! Atualize a página e tente novamente.
				</div>';
				$dados ['tela'] = 'clientes/view_cadastrocliente';
			}
				$this->load->view ( 'view_home', $dados );
		}else{
			$dados ['tela'] = 'clientes/view_cadastrocliente';
			$this->load->view ( 'view_home', $dados );
		}
		}else{
		redirect ( 'login', 'refresh' );
		}
	}

	function perfil(){
		$dados ['tela'] = 'view_perfil';
		$this->load->view ( 'view_home', $dados );
	}

	/*Produtos*/
	function cadastraproduto() {
		if ($this->session->userdata ( 'logged_in' )) { // VALIDA USUÁRIO LOGADO
				$this->load->model ( 'model_perfil' );
				$resultadoPerfil = $this->model_perfil->buscaPerfil ();
				$dados ['resultadoPerfil'] = $resultadoPerfil;
					
		if ($this->input->post ()) {
			if ((empty(trim($this->input->post('nomefantasia')))) || 
				(empty(trim($this->input->post('razaosocial')))) || 
				(empty(trim($this->input->post('cnpj')))) || 
				(empty(trim($this->input->post('cpf')))) || 
				(empty(trim($this->input->post('telefonecomercial')))) || 
				(empty(trim($this->input->post('celular')))) || 
				(empty(trim($this->input->post('email')))) || 
				(empty(trim($this->input->post('cep')))) || 
				(empty(trim($this->input->post('endereco')))) || 
				(empty(trim($this->input->post('complemento')))) || 
				(empty(trim($this->input->post('bairro')))) || 
				(empty(trim($this->input->post('cidade')))) || 
				(empty(trim($this->input->post('estado'))))) {
							
				$dados ['msg'] = '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> Atenção!</h4>
				Campos imcompletos! Preencha todos os campos e tente novamente.
				</div>';

				$dados ['tela'] = 'clientes/view_cadastrocliente';
				$this->load->view ( 'view_home', $dados );
			} else {
				$dadosusuario ['nomefantasia'] = $this->input->post ( 'nomefantasia' );
				$dadosusuario ['razaosocial'] = $this->input->post ( 'razaosocial' );
				$dadosusuario ['cnpj'] = $this->input->post ( 'cnpj' );
				$dadosusuario ['cpf'] = $this->input->post ( 'cpf' );
				$dadosusuario ['telefonecomercial'] = $this->input->post('telefonecomercial');
				$dadosusuario ['celular'] = $this->input->post ( 'celular' );
				$dadosusuario ['email'] = $this->input->post('email');
				$dadosusuario ['cep'] = $this->input->post ( 'cep' );
				$dadosusuario ['endereco'] = $this->input->post ( 'endereco' );
				$dadosusuario ['complemento'] = $this->input->post ( 'complemento' );
				$dadosusuario ['bairro'] = $this->input->post ( 'bairro' );
				$dadosusuario ['cidade'] = $this->input->post ( 'cidade' );
				$dadosusuario ['estado'] = $this->input->post ( 'estado' );

				$this->load->model ( 'model_cliente' );
				$resultadocadastracliente = $this->model_cliente->cadastracliente ( $dadosusuario );

			if ($resultadocadastracliente) {
				$dados ['msg'] = '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-check"></i> Sucesso!</h4>
				Cliente cadastrado com sucesso!
				</div>';
				$dados ['tela'] = 'clientes/view_cadastrocliente';
			} else {
				$dados ['msg'] = '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icon fa fa-ban"></i> Atenção!</h4>
				Ocorreu um erro ao cadastrar o cliente! Atualize a página e tente novamente.
				</div>';
				$dados ['tela'] = 'clientes/view_cadastrocliente';
			}
				$this->load->view ( 'view_home', $dados );
			}
		}else{
			$dados ['tela'] = 'clientes/view_cadastrocliente';
			$this->load->view ( 'view_home', $dados );
		}
		}else{
		redirect ( 'login', 'refresh' );
		}
	}

	/*function perfil(){
		$dados ['tela'] = 'view_perfil';
		$this->load->view ( 'view_home', $dados );
	}*/

}



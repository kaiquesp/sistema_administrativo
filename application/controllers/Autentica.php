<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentica extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Model_usuario','',TRUE);
		$this->load->helper('url');
	}

	function index(){
		$this->load->library('form_validation');

		$this->form_validation->set_message('required', 'campo %s obrigatório');
        $this->form_validation->set_rules('login', 'Usuário', 'trim|required');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|callback_database');

		if($this->form_validation->run() == FALSE){
			//Falha de validação Redirecionando para a pagina de login
			redirect('login','refresh');
		}else{
			//Validação ok Acesso autorizado
			/*$login = $this->input->post('login');
			$sess_array = array();
			$sess_array = array(
				'usuarioid' => $login
			);*/

			$login = $this->input->post('login');
			$senha = $this->input->post('senha');

			$this->load->model('model_usuario');
			$resultadoUsuario = $this->model_usuario->login($login,$senha);

			foreach ($resultadoUsuario as $usuario){
                $config_array = array(
                  'nomeUsuario'  => $usuario->nome,
                  'loginUsuario' => $usuario->login,
                  'emailUsuario' => $usuario->email,
                  'dataCadastro' => $usuario->datacadastro,
                  'ultimoAcesso' => $usuario->dataultimoacesso
                );
            }

			/*var_dump($config_array);
			var_dump($resultadoUsuario);
			die;*/

			$this->session->set_userdata('logged_in', $config_array);
			redirect('home/dashboard','refresh');
		}
	}

	function database($senha){
		$login = $this->input->post('login');
		$result = $this->Model_usuario->login($login, $senha);
		$usuarioid = '';
		$usuarionome = '';
		if($result){
			return true;
		}else{
			return false;
		}
	}
}
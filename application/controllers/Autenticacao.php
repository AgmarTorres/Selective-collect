<?php
Class Autenticacao extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('funcoes','func');
		$this->load->model('Autentica_Usuario_model','autenticar');
	}

	public function index() {
		$this->load->view('login');
	}

	public function login() {
		$this->form_validation->set_rules('l_usuario','NOME','trim|required');
		$this->form_validation->set_rules('l_senha','SENHA','trim|required');	
		if(
			$this->form_validation->run() == FALSE){
			set_msg('<p> Usuário ou senha incorretos!!</p>');
			$dados['titulo']='Login do Sistema';
			$dados['h2'] = 'Login do Sistema';
			$this->load->view('login',$dados);
		} else {
			$dados = array(
				'login' => $this->input->post('l_usuario'),
				'senha' => md5($this->input->post('l_senha'))
			);
			$result = $this->autenticar->get_option($dados);
			if ($result == TRUE) {
				$newdata=array(
					'u_logged_in' => TRUE,
					'u_idUsuario' =>  $result[0]->idUsuario,
					'u_nome' => $result[0]->nome,
					'u_email' => $result[0]->email,
					'u_idade' => $result[0]->idade,
					'u_profissao' => $result[0]->profissao,
					'u_login' => $result[0]->login,
					'u_idRank' => $result[0]->idRank,	
        		);
	    	$this->session->set_userdata($newdata);
				redirect('Usuario/index');
			} else {
				set_msg('<p> Usuário ou senha incorretos!!</p>');
				$dados['titulo']=' Login do Sistema';
				$dados['h2'] = ' Login do Sistema';
				$this->load->view('login',$dados);
			}
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		set_msg('<p> Logout com sucesso!!</p>');
		$dados['titulo']=' Login do Sistema';
		$dados['h2'] = ' Login do Sistema';
		redirect('Autenticacao/index',$dados);
	}
}

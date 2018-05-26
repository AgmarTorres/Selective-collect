<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('funcoes','func');
		$this->load->model('Usuario_model','um');//Contém as funções que manipulum o banco de dados
	}

	public function index()
	{
		$ci = & get_instance();
		$dados["u_logged_in"] = $ci->session->userdata('u_logged_in');
		$dados["u_idUsuario"] = $ci->session->userdata('u_idUsuario');
		$dados["u_nome"] = $ci->session->userdata('u_nome');
		$dados["u_email"] = $ci->session->userdata('u_email');
		$dados["u_idade"] = $ci->session->userdata('u_idade');
		$dados["u_profissao"] = $ci->session->userdata('u_profissao');
		$dados["u_login"] = $ci->session->userdata('u_login');
		$dados["u_idRank"] = $ci->session->userdata('u_idRank');
		$this->load->view('centUsuario_view',$dados);
	}
	
	//adiciona uma nova Usuario no banco de dados
	public function Adicionar_Usuario(){
		$this->form_validation->set_rules('nome', 'nome', 'trim|required');
		$this->form_validation->set_rules('idade', 'login', 'trim|required');
		$this->form_validation->set_rules('profissao', 'login', 'trim|required');
		$this->form_validation->set_rules('login', 'login', 'trim|required');
		$this->form_validation->set_rules('senha', 'senha', 'trim|required');
		$this->form_validation->set_rules('csenha', 'csenha', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$senha = $this->input->post('senha');
		$cSenha = $this->input->post('csenha');
		//verifica se existe usuario com o mesmo nome ou login
		$cadastrado= $this->um->verifica_Cadastrado( $this->input->post('login'),$this->input->post('nome') );
		$dados = array(
			'nome' => $this->input->post('nome'),
			'idade' => $this->input->post('idade'),
			'login' => $this->input->post('login'),
			'profissao' => $this->input->post('profissao'),
			'senha' => md5($this->input->post('senha')),
			'email' => $this->input->post('email'),
			'idRank' => '0'
			);
			if ($this->form_validation->run() == FALSE || $cadastrado == TRUE) {
				set_msg('Dados inválidos !!');
			if($cadastrado== TRUE){
				 set_msg('Nome de usuário ou login já cadastrados. Por favor verifique !!');
			}
			$ci = & get_instance();
			$dados["u_logged_in"] = $ci->session->userdata('u_logged_in');
			$dados["u_idUsuario"] = $ci->session->userdata('u_idUsuario');
			$dados["u_nome"] = $ci->session->userdata('u_nome');
			$dados["u_email"] = $ci->session->userdata('u_email');
			$dados["u_idade"] = $ci->session->userdata('u_idade');
			$dados["u_profissao"] = $ci->session->userdata('u_profissao');
			$dados["u_login"] = $ci->session->userdata('u_login');
			$dados["u_idRank"] = $ci->session->userdata('u_idRank');
			$this->load->view('cadUsuario_view',$dados);
		} else {
			if($senha == $cSenha){			
	     		$this->um->AddUsuario($dados);
				set_msg('Novo usuário cadastrado com sucesso!');
			    redirect(base_url('Usuario/index'));
			} else {
				$ci = & get_instance();
				$dados["u_logged_in"] = $ci->session->userdata('u_logged_in');
				$dados["u_idUsuario"] = $ci->session->userdata('u_idUsuario');
				$dados["u_nome"] = $ci->session->userdata('u_nome');
				$dados["u_email"] = $ci->session->userdata('u_email');
				$dados["u_idade"] = $ci->session->userdata('u_idade');
				$dados["u_profissao"] = $ci->session->userdata('u_profissao');
				$dados["u_login"] = $ci->session->userdata('u_login');
				$dados["u_idRank"] = $ci->session->userdata('u_idRank');
				set_msg('Senhas não conferem !');
				$this->load->view('cadUsuario_view', $dados);
			}
		}
	}

	//abre a view de edição da Usuario
	public function Edit_Usuario(){
		
		$ci = & get_instance();
		$idUsuario=$ci->session->userdata('u_idUsuario');
		if($ci->session->userdata('u_logged_in')!= TRUE) {
			$dados['titulo']= ' Login do Sistema';
			$dados['h2'] = ' Login do Sistema';
			set_msg('<p> Acesso restrito! Faça login para continuar.</p>');
			redirect('Autenticacao');
        }
		$dados["u_logged_in"] = $ci->session->userdata('u_logged_in');
		$dados["u_idUsuario"] = $ci->session->userdata('u_idUsuario');
		$dados["u_nome"] = $ci->session->userdata('u_nome');
		$dados["u_email"] = $ci->session->userdata('u_email');
		$dados["u_idade"] = $ci->session->userdata('u_idade');
		$dados["u_profissao"] = $ci->session->userdata('u_profissao');
		$dados["u_login"] = $ci->session->userdata('u_login');
		$dados["u_idRank"] = $ci->session->userdata('u_idRank');
		$this->load->view('editUsuario_view',$dados);
	}

	//Altera a uma Usuario
	public function UpdateUsuario(){
		$ci = & get_instance();
		if($ci->session->userdata('u_logged_in')!= TRUE) {
			$dados['titulo']= ' Login do Sistema';
			$dados['h2'] = ' Login do Sistema';
			set_msg('<p> Acesso restrito! Faça login para continuar.</p>');
			redirect('Autenticacao');
        }
		$this->form_validation->set_rules('nome', 'nome', 'trim|required');
		$this->form_validation->set_rules('idade', 'login', 'trim|required');
		$this->form_validation->set_rules('profissao', 'login', 'trim|required');
		$this->form_validation->set_rules('login', 'login', 'trim|required');
		$this->form_validation->set_rules('senha', 'senha', 'trim');
		$this->form_validation->set_rules('csenha', 'csenha', 'trim');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$senha = $this->input->post('senha');
		$cSenha = $this->input->post('csenha');
		$idUsuario = $ci->session->userdata('u_idUsuario');
		
		if($this->input->post('senha') == ''){
			$dados = array(
				'nome' => $this->input->post('nome'),
				'idade' => $this->input->post('idade'),
				'profissao' => $this->input->post('profissao'),
				'login' => $this->input->post('login'),
				'email' => $this->input->post('email'),
			);
		}
		else{
			$dados = array(
				'nome' => $this->input->post('nome'),
				'idade' => $this->input->post('idade'),
				'profissao' => $this->input->post('profissao'),
				'login' => $this->input->post('login'),
				'senha' => md5($this->input->post('senha')),
				'email' => $this->input->post('email'),		
			);
		}
		if($ci->session->userdata('u_login') == $this->input->post('login') )
			$nome = $this->um->verifica_Cadastrado_Mesmo($this->input->post('nome'),$this->input->post('login'));
		else{
			$nome = $this->um->verifica_Cadastrado($this->input->post('nome'),$this->input->post('login'));
		}
		if ($this->form_validation->run() == FALSE|| $nome==TRUE ) {
			if($nome ==TRUE){
				set_msg('Já existe uma Usuario com este Nome!');	
			}else{
				set_msg('<b>Dados inválidos!!! </b>');	
			}
			$ci = & get_instance();
			$dados["u_logged_in"] = $ci->session->userdata('u_logged_in');
			$dados["u_idUsuario"] = $ci->session->userdata('u_idUsuario');
			$dados["u_nome"] = $ci->session->userdata('u_nome');
			$dados["u_email"] = $ci->session->userdata('u_email');
			$dados["u_idade"] = $ci->session->userdata('u_idade');
			$dados["u_profissao"] = $ci->session->userdata('u_profissao');
			$dados["u_login"] = $ci->session->userdata('u_login');
			$dados["u_idRank"] = $ci->session->userdata('u_idRank');	
			$this->load->view("EditUsuario_view",$dados);
		} else {
		 	$this->um->UpdateUsuario($idUsuario, $dados);
			$newdata=array(		
				'u_logged_in' => TRUE,
				'u_idUsuario' => $ci->session->userdata('u_idUsuario'),
				'u_nome' => $this->input->post('nome'),
				'u_email' =>$this->input->post('email'),
				'u_idade' => $this->input->post('idade'),
				'u_profissao' => $this->input->post('profissao'),
				'u_login' => $this->input->post('login'),
				'u_idRank' => $result[0]->idRank,	
			);
			$this->session->set_userdata($newdata);
		

			set_msg('<b>Dados da Usuario atualizados com sucesso! </b>');
		    redirect(base_url('Usuario/index'));
		}
	}

	//Deleta a Usuario
	public function DeletaUsuario($codigo){
		$ci = & get_instance();
		if($ci->session->userdata('logged_in')!= TRUE) {
			$dados['titulo']= ' Login do Sistema';
			$dados['h2'] = ' Login do Sistema';
			set_msg('<p> Acesso restrito! Faça login para continuar.</p>');
			redirect('Autenticacao');
        }
		$this->um->DeletaUsuario($codigo);
		set_msg('<b>Usuario excluido com sucesso!</b>');
		redirect(base_url('Usuario/index'));
	}
}
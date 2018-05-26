<?php
Class Fases extends CI_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->helper('funcoes','func');
        $ci = & get_instance();
		if($ci->session->userdata('u_logged_in')!= TRUE) {
       		$dados['titulo']= ' Login do Sistema';
			$dados['h2'] = ' Login do Sistema';
			set_msg('<p> Acesso restrito! Faça login para continuar.</p>');
			redirect('Autenticacao');
  	    }
	}

	public function index() {
        $ci = & get_instance();
        $dados["u_logged_in"] = $ci->session->userdata('u_logged_in');
        $dados["u_idUsuario"] = $ci->session->userdata('u_idUsuario');
        $dados["u_nome"] = $ci->session->userdata('u_nome');
        $dados["u_email"] = $ci->session->userdata('u_email');
        $dados["u_idade"] = $ci->session->userdata('u_idade');
        $dados["u_profissao"] = $ci->session->userdata('u_profissao');
        $dados["u_login"] = $ci->session->userdata('u_login');
        $dados["u_idRank"] = $ci->session->userdata('u_idRank');
        $this->load->view('centFases_view',$dados);
	}

    public function Cadastrar_Fase() {
        $this->load->view("cadFase_view",$dados);
    }

    public function Adicionar_Fase() {
       
    }

    public function Editar_Fase() {
        $this->load->view("editFase_view",$dados);
    }

    public function Update_Fase() {

    }

    public function Deletar_Fase() {

    }
}

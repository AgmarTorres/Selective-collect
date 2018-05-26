<?php
Class Material extends CI_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->helper('funcoes','func');
        $this->load->model('Material_model','material');//Contém as funções que manipulum o banco de dados

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
		$dados["Materiais"] = $this->material->getAllMaterial();
		$this->load->view('centMaterial_view',$dados);
		
	}

    public function Cadastrar_Material() {
        $ci = & get_instance();
		$dados["u_logged_in"] = $ci->session->userdata('u_logged_in');
		$dados["u_idUsuario"] = $ci->session->userdata('u_idUsuario');
		$dados["u_nome"] = $ci->session->userdata('u_nome');
		$dados["u_email"] = $ci->session->userdata('u_email');
		$dados["u_idade"] = $ci->session->userdata('u_idade');
		$dados["u_profissao"] = $ci->session->userdata('u_profissao');
		$dados["u_login"] = $ci->session->userdata('u_login');
		$dados["u_idRank"] = $ci->session->userdata('u_idRank');
		
		$this->load->view("cadMaterial_view",$dados);
    }

    public function Adicionar_Material() {
    	//regras de validação
		$this->form_validation->set_rules('nome','TÍTULO','trim|required');
		$this->form_validation->set_rules('pergunta','TÍTULO','trim|required');
		//verifica validação
		if($this->form_validation->run() == FALSE):
			
			if(validation_errors()):
				set_msg(validation_errors());
			endif;
		else:
			$this->load->library('upload', config_uploadMaterial());
			//se foi veio o upload, então tudo ok
			if($this->upload->do_upload('imagem'))://imagem é o nome do form upload do formulário
				$dados_upload = $this ->upload->data();
				$dados_form =$this->input->post();
			//	var_dump($dados_upload);
				//inserindo informações no banco de dados
				$dados_insert['nome'] = $dados_form['nome'];
				$dados_insert['pergunta'] = $dados_form['pergunta'];
				$dados_insert['imagem'] = $dados_upload['file_name']; //salvar nome da imagem
				//salvar no banco de dados, criar função model
			if($id = $this->material->AddMaterial($dados_insert)):
				set_msg('<p> Material cadastrado com sucesso !! </p>');
			    redirect('Material/index','refresh');
				//redirect('material/editar/'.$id,'refresh');
				else:
					set_msg('<p>Erro ! Material não cadastrado !! </p>');
				endif;		
			else:
				//erro no upload
				$msg = $this->upload->display_errors();//pega os erros que a função de load retornou
				$msg .= '<p>São permitos arquivos JPG E PNG de até 2MB.<p>';
				set_msg($msg);
			endif;
		endif;
		//carrega view
        $ci = & get_instance();
        $dados["u_logged_in"] = $ci->session->userdata('u_logged_in');
        $dados["u_idUsuario"] = $ci->session->userdata('u_idUsuario');
        $dados["u_nome"] = $ci->session->userdata('u_nome');
        $dados["u_email"] = $ci->session->userdata('u_email');
        $dados["u_idade"] = $ci->session->userdata('u_idade');
        $dados["u_profissao"] = $ci->session->userdata('u_profissao');
        $dados["u_login"] = $ci->session->userdata('u_login');
        $dados["u_idRank"] = $ci->session->userdata('u_idRank');
		$dados["Materiais"] = $this->material->getAllMaterial();
		$this->load->view('centMaterial_view',$dados);
	
    }

    public function Editar_Material($idMaterial) {
		$ci = & get_instance();
        $dados["u_logged_in"] = $ci->session->userdata('u_logged_in');
        $dados["u_idUsuario"] = $ci->session->userdata('u_idUsuario');
        $dados["u_nome"] = $ci->session->userdata('u_nome');
        $dados["u_email"] = $ci->session->userdata('u_email');
        $dados["u_idade"] = $ci->session->userdata('u_idade');
        $dados["u_profissao"] = $ci->session->userdata('u_profissao');
        $dados["u_login"] = $ci->session->userdata('u_login');
        $dados["u_idRank"] = $ci->session->userdata('u_idRank');
		$dados["Material"] = $this->material->getOne($idMaterial);
		
		$this->load->view("editMaterial_view",$dados);
    }

    public function Update_Material() {
		//verifica se foi passado o id da Material
		$id = $this->uri->segment(3);//terceito segmento da url
		//var_dump($id);
		if($id > 0):
			
			//id foi informado
			if($Material = $this->material->getOne($id)):	//se a Material existe no banco de dados
				$dados['Material']= $Material; //alimenta a view Material com as informações do banco de dados
				$dados_update['idMaterial'] = $Material->idMaterial;
			else:
				set_msg('<p> Material inexistente. Escolha um Material para editar!! </p>');
				redirect('Material/index','refresh');
			endif;
		else:
			//id não informado
			set_msg('<p> você deve escolher uma Material para editar!! </p>');
		//	redirect('Material/index','refresh');
		endif;
		// regras de validação
		$this->form_validation->set_rules('nome','NOME','trim|required');
		$this->form_validation->set_rules('pergunta','PERGUNTA','trim|required');
		//verifica validação
		if($this->form_validation->run() == FALSE):
			if(validation_errors()):
				set_msg(validation_errors());
			endif;
		else:
			$this->load->library('upload', config_uploadMaterial());
			if(isset($_FILES['imagem'])&& $_FILES['imagem']['name']!=''):
				//foi enviado uma imagem, devo fazer o upload
				if($this->upload->do_upload('imagem')): //se o upload foi efetuado
					$imagem_antiga= './assets/material/'.$Material->imagem;//vai excluir a imagem antiga
					$dados_upload =$this->upload->data();////dados do upload
					$dados_form = $this->input->post();//armazena os dados do formulario
					$dados_update['nome']= $dados_form['nome'];
					$dados_update['pergunta']= $dados_form['pergunta'];
					$dados_update['imagem'] = $dados_upload['file_name'];
					if($this->material->UpdateMaterial($id,$dados_update)): //se retornar algo 
						unlink($imagem_antiga);
						set_msg('<p> Material alterado com sucesso!! </p>');
						$dados['Material']->imagem = $dados_update['imagem'];//da um refresh na imagem
						redirect('Material/index','refresh');
					else:	
						//nenhuma interação foi salva
						set_msg('<p> Erro! Nenuma alteração foi salva. </p>');
					endif;
				else:
					//erro no upload
					$msg = $this->upload->display_errors();//pega os erros que a função de load retornou
					$msg .= '<p>São permitos arquivos JPG E PNG de até 2MB.<p>';
					set_msg($msg);
				endif;
			else:
				// não foi enviado uma imagem pelo form
				$dados_form = $this->input->post();//armazena os dados do formulario
				$dados_update['nome']=$dados_form['nome'];
				$dados_update['pergunta']= $dados_form['pergunta'];
				if($this->material->UpdateMaterial($id,$dados_update)): //se retornar algo 
					set_msg('<p> Material alterada com sucesso!! </p>');
					redirect('Material/index','refresh');
				else:	
					//nenhuma alteração foi salva
					set_msg('<p> Erro! Nenuma alteração foi salva. </p>');
				endif;
			endif;
		endif;
		$ci = & get_instance();
		$dados["u_logged_in"] = $ci->session->userdata('u_logged_in');
        $dados["u_idUsuario"] = $ci->session->userdata('u_idUsuario');
        $dados["u_nome"] = $ci->session->userdata('u_nome');
        $dados["u_email"] = $ci->session->userdata('u_email');
        $dados["u_idade"] = $ci->session->userdata('u_idade');
        $dados["u_profissao"] = $ci->session->userdata('u_profissao');
        $dados["u_login"] = $ci->session->userdata('u_login');
        $dados["u_idRank"] = $ci->session->userdata('u_idRank');
		$dados["Materiais"] = $this->material->getAllMaterial();
		$this->load->view('centMaterial_view',$dados);
	
		//carrega view
	}

    public function Deletar_Material() {
		
		$ci = & get_instance();
		if($ci->session->userdata('u_logged_in')!= TRUE) {
			set_msg('<p> Acesso restrito! Faça login para continuar.</p>');
			redirect('Autenticacao');
        }
		//verifica se foi passado o id da Material
		$id = $this->uri->segment(3);//terceito segmento da url
		if($id > 0):
			//id foi informado
			if($Material = $this->material->getOne($id)):	//se a Material exise no banco de dados
				$dados['Material']= $Material; //alimenta a view Material com as informações do banco de dados
			else:
				set_msg('<p> Material inexistente. Escolha um Material para excluir!! </p>');
				redirect('Material/index','refresh');
			endif;
		else:
			//id não informado
			set_msg('<p> você deve escolher uma Material para excluir!! </p>');
			redirect('Material/index','refresh');
		endif;
			// regras de validação
			$imagem= './assets/material/'.$Material->imagem;
			
				if($this->material->DeletaMaterial($id))://se conseguir excluir o Material
					unlink($imagem);//exclui a imagem
					set_msg('<p> Material excluído com sucesso!! </p>');
					redirect('Material/index', ' refresh');
				else:
					set_msg('<p> Erro! Nenhuma Material foi excluída. </p>');
				endif;
			set_msg('<b>Material excluido com sucesso!</b>');
			redirect('Material/index','refresh');
	}
}

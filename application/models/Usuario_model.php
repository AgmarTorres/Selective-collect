<?php if(!defined('BASEPATH')){ exit('Sem permissão de acesso direto ao Script.'); }
//realiza consultas e manutenção na tabela de Usuario
class Usuario_model extends CI_Model{
  public function __construct() {
    parent::__construct();
  
  }

  //Adiciona os dados da Usuario no banco de dados
  public function AddUsuario($dados_Usuario = NULL){
    return $this->db->insert('Usuario', $dados_Usuario);
  }

  // altera dados da Usuario
  public function UpdateUsuario($codigo = NULL, $dados = NULL) {
    $this->db->where('idUsuario', $codigo);
    $this->db->update('Usuario', $dados);
    return TRUE;
  } 
  //deleta a Usuario pelo id
  public function DeletaUsuario($codigo = NULL) {
    $this->db->where('codigo', $codigo);
    $this->db->delete('Usuario');
    return TRUE;
  }

   //deleta a Aluno pelo id
   public function DeletaAllUsuario($codigo = NULL) {
    $this->db->where('idInstituicao', $codigo);
    $this->db->delete('Usuario');
    return TRUE;
  }

  //recupera dados de todas as Usuarios
  public function getAllUsuarios($idInsituicao = NULL) {
    $this->db->select('*');
    $this->db->from('Usuario');
    $this->db->where('idInstituicao', $idInsituicao);
    $this->db->order_by("nome", "asc");
    $query = $this->db->get();
    return $query->result();
  }

  // verifica se já tem  esse nome cadastrado para atualizar dados, sem ambiguidade.
  public function verifica_Cadastrado($login, $usuario){
    $this->load->database();
    $query = $this->db->get_where('usuario', array('login !=' => $login, 'nome' => $usuario ));
    $result = $query->result_array();
    if(count($result) > 0) {
        return TRUE;
    }
    return FALSE;
  }

  public function verifica_Cadastrado_Mesmo($login, $usuario){
    $this->load->database();
    $query = $this->db->get_where('usuario', array('login !=' => $login, 'nome' => $usuario ));
    $result = $query->result_array();
    if(count($result) > 1) {
        return TRUE;
    }
    return FALSE;
  }



   //recupera dados de uma Usuario por um único ID
   public function GetUsuarioById($codigo = '') {
    $this->db->select('*');
    $this->db->from('Usuario');
    $this->db->where('codigo', $codigo);
    return $this->db->get()->result()[0];
  }

}
<?php if(!defined('BASEPATH')){ exit('Sem permissão de acesso direto ao Script.'); }
//realiza consultas e manutenção na tabela de Instituicao
class Instituicao_model extends CI_Model{
  public function __construct() {
    parent::__construct();
  
  }

  //Adiciona os dados da Instituicao no banco de dados
  public function AddInstituicao($dados_Instituicao = NULL){
    return $this->db->insert('Instituicao', $dados_Instituicao);
  }

  // altera dados da Instituicao
  public function UpdateInstituicao($codigo = NULL, $dados = NULL) {
    $this->db->where('codigo', $codigo);
    $this->db->update('Instituicao', $dados);
    return TRUE;
  } 
  //deleta a Instituicao pelo id
  public function DeletaInstituicao($codigo = NULL) {
    $this->db->where('codigo', $codigo);
    $this->db->delete('Instituicao');
    return TRUE;
  }

  //recupera dados de todas as Instituicaos
  public function getAllInstituicao() {
    $this->db->select('*');
    $this->db->from('Instituicao');
    $query = $this->db->get();
    return $query->result();
  }

  // verifica se já tem  esse nome cadastrado para atualizar dados, sem ambiguidade.
  public function verifica_Cadastrado($nome){
    $this->load->database();
    $query = $this->db->get_where("Instituicao",array('nome'=>$nome));
    $result = $query->result_array();
    if(count($result) > 0) {
        return TRUE;
    }
    return FALSE;
  }


   //recupera dados de uma Instituicao por um único ID
   public function GetInstituicaoById($codigo = '') {
    $this->db->select('*');
    $this->db->from('Instituicao');
    $this->db->where('codigo', $codigo);
    return $this->db->get()->result()[0];
  }

}
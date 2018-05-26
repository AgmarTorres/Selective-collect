<?php if(!defined('BASEPATH')){ exit('Sem permissão de acesso direto ao Script.'); }
//realiza consultas e manutenção na tabela de Sala
class Sala_model extends CI_Model{
  public function __construct() {
    parent::__construct();
  
  }

  //Adiciona os dados da Sala no banco de dados
  public function AddSala($dados_Sala = NULL){
    return $this->db->insert('Sala', $dados_Sala);
  }

  // altera dados da Sala
  public function UpdateSala($codigo = NULL, $dados = NULL) {
    $this->db->where('codigo', $codigo);
    $this->db->update('Sala', $dados);
    return TRUE;
  } 
  //deleta a Sala pelo id
  public function DeletaSala($codigo = NULL) {
    $this->db->where('codigo', $codigo);
    $this->db->delete('Sala');
    return TRUE;
  }

  //recupera dados de todas as Salas
  public function getAllSalas($codigo = NULL) {
    $this->db->select('*');
    $this->db->from('Sala');
    $this->db->where('idInstituicao', $codigo);
    $query = $this->db->get();
    return $query->result();
  }

  // verifica se já tem  esse nome cadastrado para atualizar dados, sem ambiguidade.
  public function verifica_Cadastrado($nome){
    $this->load->database();
    $query = $this->db->get_where("Sala",array('nome'=>$nome));
    $result = $query->result_array();
    if(count($result) > 0) {
        return TRUE;
    }
    return FALSE;
  }


   //recupera dados de uma Sala por um único ID
   public function GetSalaById($codigo = '') {
    $this->db->select('*');
    $this->db->from('Sala');
    $this->db->where('codigo', $codigo);
    return $this->db->get()->result()[0];
  }
}
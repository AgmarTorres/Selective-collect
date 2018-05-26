<?php if(!defined('BASEPATH')){ exit('Sem permissão de acesso direto ao Script.'); }
//realiza consultas e manutenção na tabela de Material
class Material_model extends CI_Model{
  public function __construct() {
    parent::__construct();
  
  }

  //Adiciona os dados da Material no banco de dados
  public function AddMaterial($dados_Material = NULL){
			//noticia não existe devemos inserir
		$this->db->insert('material',$dados_Material);
		return $this->db->insert_id();
		
  }
  public function getAllMaterial() {
    $this->db->select('*');    
    $this->db->from('material');
    $query = $this->db->get();           
    return $query->result();
  }

  // altera dados da Material
  public function UpdateMaterial($codigo = NULL, $dados = NULL) {
    $this->db->where('idMaterial', $codigo);
    $this->db->update('Material', $dados);
    return TRUE;
  }
  
  public function getOne($codigo = NULL) {
      $this->db->where('idMaterial',$codigo);
	    $query= $this->db->get('material',1);
	    if($query->num_rows() == 1):
		    $row=$query->row();
		    return $row;
	    else:
		    return NULL;
	    endif;
      return TRUE;
  } 
 
  
  //deleta a Material pelo id
  public function DeletaMaterial($codigo = NULL) {
    $this->db->where('idMaterial', $codigo);
    $this->db->delete('material');
    return TRUE;
  }

  

  //recupera dados de todas as Materials
  public function getAllMaterials($idInstituicao = NULL) {
    $this->db->select('*');
    $this->db->from('Material');
    $this->db->where('idInstituicao', $idInstituicao);
    $this->db->order_by("nome", "asc");
    $query = $this->db->get();
    return $query->result();
  }

  // verifica se já tem  esse nome cadastrado para atualizar dados, sem ambiguidade.
  public function verifica_Cadastrado($nome){
    $this->load->database();
    $query = $this->db->get_where("Material",array('nome'=>$nome));
    $result = $query->result_array();
    if(count($result) > 0) {
        return TRUE;
    }
    return FALSE;
  }


   //recupera dados de uma Material por um único ID
   public function GetMaterialById($codigo = '') {
    $this->db->select('*');
    $this->db->from('material');
    $this->db->where('idMaterial', $codigo);
    return $this->db->get()->result()[0];
  }


}
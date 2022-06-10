<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Openquiz_model extends CI_Model{
    function __construct() {
        $this->tableName = 'open_quiz_titile';
       
        $this->primaryKey = 'id';
  
    }
    public function select_all_data()
    {
        $this->db->select('*');
		$this->db->where('cat_id',1); 
        $this->db->from('dlc_subcategory');
           $query = $this->db->get();
           return $query->result();

    }
	
  public function insert($data = array()){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
  public function selectcat()
  {
   // $st =1;
    $this->load->database();
    $this->db->select('*');
    $this->db->from('open_quiz_titile');
      $this->db->order_by("id", "desc");
      
    $query=$this->db->get();
    return $query->result();
  }
   public function insert_quiz($data = array()){
     
        $insert = $this->db->insert('dlc_openquiz',$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
    public function insert_sigle_choice($data)
    {
      $this->db->insert_batch('dlc_openquiz_answers',$data);
    }
	 public function insert_answer($answer)
    {

      $this->db->insert('dlc_openquiz_answers',$answer);
    }
	public function insert_passage($data = array())
    {  
    
    $this->db->insert('dlc_openquiz_passage',$data);
    
    }
	 public function select_asperid_pass($idg)
   {
    $this->db->select('*');
    $this->db->from('dlc_openquiz_passage');
    $this->db->where('passage_id',$idg);
    $rslt = $this->db->get();
    return $rslt->result(); 
   }
    public function insert_mult_answer($dataa)
   {

  $this->db->insert_batch('dlc_openquiz_answers',$dataa); 

   }
   public function selectcatz($id)
  {
   // $st =1;
    $this->load->database();
    $this->db->select('*');
    $this->db->from('dlc_openquiz');
    $this->db->where('test_id',$id);
    $query=$this->db->get();
    return $query->result();
  }
   public function select_all_answers($qsid)
    {
      $this->db->select('*');
      $this->db->from('dlc_openquiz_answers');
      $this->db->where('quiz_id',$qsid);
      $qqry = $this->db->get();
      return $qqry->result();
    }  
     public function delete_quiz_data($qzid)
   {
    $this->db->where('quiz_id',$qzid);
    $this->db->delete('dlc_openquiz');
   }	
}

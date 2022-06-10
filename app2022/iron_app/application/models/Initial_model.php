<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Initial_model extends CI_Model{
    function __construct(){
        $this->tableName = 'dlc_quiz';
       
        $this->primaryKey = 'quiz_id';
    }
      /*
public function record_countt(){
 
       return $this->db->count_all("dlc_initial");
 
   }
  
   public function fetch_departmentss($limit,$start) {
     // $this->db->where('pack_id',$courses);
       $this->db->order_by('quiz_id', 'DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_initial");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
            }
 
           return $data;
 
        }
 
       return false;
 
    } */
    
    public function select_all_initial()
    {
       $this->db->select('*');
       $this->db->from('dlc_initial');
       $this->db->order_by('quiz_id', 'DESC');
       $query = $this->db->get();
      return $query->result();  
    }
  
    public function insert_quiz($data = array()){
     
        $insert = $this->db->insert('dlc_initial',$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
   /* public function insert_answer($answer)
    {

      $this->db->insert('dlc_initial_answers',$answer);
    }*/
    public function insert_sigle_choice($data)
    {
      $this->db->insert_batch('dlc_initial_answers',$data);
    }
   public function insert_mult_answer($dataa)
   {

  $this->db->insert_batch('dlc_initial_answers',$dataa); 

   }
   public function insert_passage($data = array())
   {  
    
    $this->db->insert('dlc_initial_passage',$data);
    
   }
  
   public function delete_quiz_data($qzid)
   {
    $this->db->where('quiz_id',$qzid);
    $this->db->delete('dlc_initial');
   }
   public function select_asperid_pass($idg)
   {
    $this->db->select('*');
    $this->db->from('dlc_initial_passage');
    $this->db->where('passage_id',$idg);
    $rslt = $this->db->get();
    return $rslt->result(); 
   }
   public function insert_quizd($userDat)
   {
    $this->db->insert('dlc_initial',$userDat);
   }
    public function insert_sigle_choicep($data)
    {
      $this->db->insert_batch('dlc_initial_answers',$data);
    }
    public function insert_mult_answerp($dataa)
    {
      $this->db->insert_batch('dlc_initial_answers',$dataa);
    }
     public function insert_answerp($answerr)
    {
      $this->db->insert('dlc_initial_answers',$answerr);
    }
    public function select_all_answers($qsid)
    {
      $this->db->select('*');
      $this->db->from('dlc_initial_answers');
      $this->db->where('quiz_id',$qsid);
      $qqry = $this->db->get();
      return $qqry->result();
    }   

}
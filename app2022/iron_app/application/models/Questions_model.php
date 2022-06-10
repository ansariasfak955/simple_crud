<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Questions_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_questions';
       
        $this->primaryKey = 'questions_id';
  
    }


    public function record_count(){
 
       return $this->db->count_all("dlc_questions");
 
   }

  
   public function fetch_departments($limit,$start) {
     
    	 $this->db->order_by('questions_id', 'DESC');
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_questions");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   }
   public function update_staus($data,$id)
   {
    $this->db->where('questions_id',$id);
    $this->db->update('dlc_questions',$data);
   }
  public function delete_question($qid)
  {
    $this->db->where('questions_id',$qid);
    $this->db->delete('dlc_questions');
  }

   public function record_countt(){
 
       return $this->db->count_all("dlc_answers");
 
   }

  
   // public function fetch_departmentss($limit,$start,$qidd) {
   //     $this->db->where('questions_id',$qidd);
   //     $this->db->order_by('answers_id', 'DESC');
 
   //     $this->db->limit($limit,$start);
 
   //     $query = $this->db->get("dlc_answers");
 
 
 
   //     if ($query->num_rows() > 0) {
 
   //         foreach ($query->result() as $row) {
 
   //             $data[] = $row;
 
   //         }
 
   //         return $data;
 
   //     }
 
   //     return false;
 
   // }
   public function select_all_answer($qidd)
   {
        $this->db->select('*');
        $this->db->from('dlc_answers');
        $this->db->where('questions_id',$qidd);
         $qry = $this->db->get();
         return $qry->result();
   }
   public function delete_answers($ansids)
   {
    $this->db->where('answers_id',$ansids);
    $this->db->delete('dlc_answers');
   }
   public function ans_update_status($data,$anidd)
   {
    $this->db->where('answers_id',$anidd);
    $this->db->update('dlc_answers',$data);
   }
   public function add_ques_answers($id,$data)
   {
    
    $this->db->where('questions_id',$id);
    $this->db->insert('dlc_answers',$data);
   }
  

}
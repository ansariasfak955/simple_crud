<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Quiz_model extends CI_Model{
    function __construct(){
        $this->tableName = 'dlc_quiz';
       
        $this->primaryKey = 'quiz_id';
    }
    
    
     
public function record_countt(){
 
       return $this->db->count_all("dlc_quiz");
 
   }
  
   public function fetch_departmentss($limit,$start,$courses) {
       $this->db->where('pack_id',$courses);
       $this->db->order_by('quiz_id', 'DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_quiz");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   } 
  
    public function insert_quiz($data = array()){
     
        $insert = $this->db->insert('dlc_quiz',$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
   /* public function insert_answer($answer)
    {

      $this->db->insert('dlc_quiz_answers',$answer);
    }*/
    public function insert_sigle_choice($data)
    {
      $this->db->insert_batch('dlc_quiz_answers',$data);
    }
   public function insert_mult_answer($dataa)
   {

  $this->db->insert_batch('dlc_quiz_answers',$dataa); 

   }
   public function insert_passage($data = array())
   {  
    
    $this->db->insert('dlc_quiz_passage',$data);
    
   }
  
   /*public function delete_quiz_data($qzid)
   {
    $this->db->where('quiz_id',$qzid);
    $this->db->delete('dlc_quiz');
   }*/
   public function select_asperid_pass($idg)
   {
    $this->db->select('*');
    $this->db->from('dlc_quiz_passage');
    $this->db->where('passage_id',$idg);
    $rslt = $this->db->get();
    return $rslt->result(); 
   }
   public function insert_quizd($userDat)
   {
    $this->db->insert('dlc_quiz',$userDat);
   }
    public function insert_sigle_choicep($data)
    {
      $this->db->insert_batch('dlc_quiz_answers',$data);
    }
    public function insert_mult_answerp($dataa)
    {
      $this->db->insert_batch('dlc_quiz_answers',$dataa);
    }
     public function insert_answerp($answerr)
    {
      $this->db->insert('dlc_quiz_answers',$answerr);
    }
    public function select_all_answers($qsid)
    {
      $this->db->select('*');
      $this->db->from('dlc_quiz_answers');
      $this->db->where('quiz_id',$qsid);
      $qqry = $this->db->get();
      return $qqry->result();
    } 
    public function select_all_packages($imkh)
     {
    
       $this->db->select('*');
       $this->db->from('dlc_quiz');
       $this->db->where('pack_id',$imkh);
        $qst = $this->db->get();
        return $qst->result();
         
     }
    
//  public function selects_answerss($ansedt)
//     {
//       $this->db->select('*');
//       $this->db->from('dlc_quiz_answers');
//       $this->db->where('quiz_id',$ansedt);
//       $qqryds = $this->db->get();
//       return $qqryds->result();
        
//     }

// public function update_single_data($datasn,$ampry)
// {
//   // echo  $ampry; die();
//   $this->db->where('quiz_answers_id',$ampry);
//   $this->db->update('dlc_quiz_answers',$datasn);
// }

// public function update_fill_data($datas,$qztyid)
// {
    
//     $this->db->where('quiz_id',$qztyid);
//     $this->db->update('dlc_quiz_answers',$datas);
    
// }
    

}
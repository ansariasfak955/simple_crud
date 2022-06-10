<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Demo_video_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_demo_video';
       
        $this->primaryKey = 'id';
  
    }


   /* public function record_count(){
 
       return $this->db->count_all("dlc_demo_video");
 
   }
  
   public function fetch_departments($limit, $start) {
        
    	 $this->db->order_by('id', 'DESC');
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_demo_video");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;


    } */
    
 public function select_demo_video()
    {
       $this->db->select('*');  
       $this->db->from('dlc_demo_video');
       $this->db->order_by('id', 'DESC');
       $query = $this->db->get();
        return $query->result();
    }
    
    /* public function record_counttq(){
 
       return $this->db->count_all("dlc_demo");
 
   }
  
   public function fetch_departmentssq($limit,$start) {
     // $this->db->where('pack_id',$courses);
       $this->db->order_by('quiz_id', 'DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_demo");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
            }
 
           return $data;
 
        }
 
       return false;
 
    } */
    
    public function selects_videos()
    {
        
         $this->db->select('*');  
       $this->db->from('dlc_demo');
       $this->db->order_by('quiz_id', 'DESC');
       $querys = $this->db->get();
        return $querys->result();
        
    }
    
public function insert($data = array()){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
	public function insert_quiz($data = array()){
     
        $insert = $this->db->insert('dlc_demo',$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
	public function insert_sigle_choice($data)
    {
      $this->db->insert_batch('dlc_demo_answers',$data);
    }
	public function insert_answer($answer)
    {

      $this->db->insert('dlc_demo_answers',$answer);
    }
	
	public function insert_mult_answer($dataa)
   {

  $this->db->insert_batch('dlc_demo_answers',$dataa); 

   }
   public function insert_passage($data = array())
   {  
    
    $this->db->insert('dlc_demo_passage',$data);
    
   }
    public function updata($id,$data)
    {
      $this->db->where('id',$id);
      $this->db->update('dlc_demo_video',$data);
    }   
    public function update_status($data,$idst)
    {
      $this->db->where('videos_id',$idst);
      $this->db->update('dlc_videos',$data);
    }
	 public function delete($services_id)
    {
        $this->db->where('id',$services_id);
        $this->db->delete('dlc_demo_video');
    }
	 public function select_all_answers($qsid)
    {
      $this->db->select('*');
      $this->db->from('dlc_demo_answers');
      $this->db->where('quiz_id',$qsid);
      $qqry = $this->db->get();
      return $qqry->result();
    }  
  public function select_asperid_pass($idg)
   {
    $this->db->select('*');
    $this->db->from('dlc_demo_passage');
    $this->db->where('passage_id',$idg);
    $rslt = $this->db->get();
    return $rslt->result(); 
   }
 public function insert_sigle_choicep($data)
    {
      $this->db->insert_batch('dlc_demo_answers',$data);
    }  
 public function insert_mult_answerp($dataa)
    {
      $this->db->insert_batch('dlc_demo_answers',$dataa);
    }
  public function insert_answerp($answerr)
    {
      $this->db->insert('dlc_demo_answers',$answerr);
    }
    public function delete_quiz_data($qzid)
   {
    $this->db->where('quiz_id',$qzid);
    $this->db->delete('dlc_demo');
   }


}
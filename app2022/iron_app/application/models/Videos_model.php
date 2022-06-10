<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Videos_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_videos';
       
        $this->primaryKey = 'videos_id';
  
    }

 /*
    public function record_count(){
 
       return $this->db->count_all("dlc_videos");
 
   }
  
   public function fetch_departments($limit, $start) {
        
    	 $this->db->order_by('videos_id', 'DESC');
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_videos");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;


    } */
    
 public function select_all_videos()
    {
        $this->db->select('*');
        $this->db->from('dlc_videos');
        $this->db->order_by('videos_id', 'DESC');
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
    public function updata($id,$data)
    {
      $this->db->where('videos_id',$id);
      $this->db->update('dlc_videos',$data);
    }   
    public function update_status($data,$idst)
    {
      $this->db->where('videos_id',$idst);
      $this->db->update('dlc_videos',$data);
    }
      public function delete($services_id)
    {
        $this->db->where('videos_id',$services_id);
        $this->db->delete('dlc_videos');
    }

}
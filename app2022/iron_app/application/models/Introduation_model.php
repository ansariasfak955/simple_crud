<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Introduation_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_introduation';
       
        $this->primaryKey = 'id';
  
    }


    public function record_count(){
 
       return $this->db->count_all("dlc_introduation");
 
   }
  
   public function fetch_departments($limit, $start) {
        
    	 $this->db->order_by('id', 'DESC');
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_introduation");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;


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
      $this->db->where('id',$id);
      $this->db->update('dlc_introduation',$data);
    }   
    public function update_status($data,$idst)
    {
      $this->db->where('videos_id',$idst);
      $this->db->update('dlc_videos',$data);
    }
	 public function delete($services_id)
    {
        $this->db->where('id',$services_id);
        $this->db->delete('dlc_introduation');
    }

}
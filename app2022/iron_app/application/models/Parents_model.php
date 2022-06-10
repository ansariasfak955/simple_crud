<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Parents_model extends CI_Model{
    function __construct() {
       // $this->tableName = 'dlc_parents';
       
       // $this->primaryKey = 'parents_id';
  
    }
    
    // public function insert($data = array()){
     
    //     $insert = $this->db->insert($this->tableName,$data);
    //     if($insert){
    //         return $this->db->insert_id();
    //     }else{
    //         return false;    
    //     }
    // }
   //  public function record_count() {
 
   //     return $this->db->count_all("dlc_parents");
 
   // }
  
   // public function fetch_departments($limit, $start) {
   //     $this->db->where('user_id',$userid);  
   //     $this->db->order_by('parents_id','DESC');
   //     $this->db->limit($limit, $start);
 
   //     $query = $this->db->get("dlc_parents");
 
 
 
   //     if ($query->num_rows() > 0) {
 
   //         foreach ($query->result() as $row) {
 
   //             $data[] = $row;
 
   //         }
 
   //         return $data;
 
   //     }
 
   //     return false;
   //  } 
    public function select_all_parents($ids)
    {       
        $this->db->select('*');
        $this->db->from('dlc_parents');
        $this->db->where('user_id',$ids);
         $query = $this->db->get();
         return $query->result();

    }
 }

<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subcategory_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_subcategory';
       
        $this->primaryKey = 'sbcat_id';
    }
    
     public function selectsubdata()
   {$this->load->database();
     $this->db->select('*');
     $this->db->from('dlc_subcategory');
     $this->db->order_by('sbcat_id', 'DESC');
     $query=$this->db->get();
     return $query->result();
   }
  
  // public function selectdata()
  // {
    
  //   $this->load->database();
  //   $this->db->select('*');
  //   $this->db->from('dlc_category');
  //   $this->db->order_by('cat_id', 'DESC');
  //   $query=$this->db->get();
  //   return $query->result();
  // }

 /*
     public function record_count() {
 
       return $this->db->count_all("dlc_subcategory");
 
   }
  
   public function fetch_departments($limit, $start) {
 
 $this->db->order_by('sbcat_id', 'DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_subcategory");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   } */


  public function insertsub($data){
     
        $insert = $this->db->insert('dlc_subcategory',$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
 
   public function deletesub($services_id) { 
         if ($this->db->delete("dlc_subcategory", "sbcat_id = ".$services_id)) { 
            return true; 
         } 
      }

       public function updatasub($id,$data)
  {
    $this->db->where('sbcat_id',$id);
    $this->db->update('dlc_subcategory',$data);
  }

}
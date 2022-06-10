<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Childcategory_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_childcategory';
       
        $this->primaryKey = 'childcategory_id';
    }
    
  //   public function selectchilddata()
  // {$this->load->database();
  //   $this->db->select('*');
  //   $this->db->from('dlc_childcategory');
  //   $this->db->order_by('childcategory_id', 'DESC');
  //   $query=$this->db->get();
  //   return $query->result();
  // }
  // public function selesubdata()
  // {
    
  //   $this->load->database();
  //   $this->db->select('*');
  //   $this->db->from('dlc_subcategory');
  //   $this->db->order_by('sbcat_id', 'DESC');
  //   $query=$this->db->get();
  //   return $query->result();
  // }
  //  public function selectdata()
  // {
    
  //   $this->load->database();
  //   $this->db->select('*');
  //   $this->db->from('dlc_category');
  //   $this->db->order_by('cat_id', 'DESC');
  //   $query=$this->db->get();
  //   return $query->result();
  // }
     public function record_count() {
 
       return $this->db->count_all("dlc_childcategory");
 
   }
  
   public function fetch_departments($limit, $start) {
 
 $this->db->order_by('childcategory_id', 'DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_childcategory");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   }


  public function insertchild($data = array()){
     
        $insert = $this->db->insert('dlc_childcategory',$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
 
   public function deletechild($services_id){
         if ($this->db->delete("dlc_childcategory", "childcategory_id = ".$services_id)) { 
            return true; 
         } 
      }

  public function updatachild($id,$data)
  {
    $this->db->where('childcategory_id',$id);
    $this->db->update('dlc_childcategory',$data);
  }
  public function select_subcategory($idd)
  {
    $this->db->select('*');
    $this->db->from('dlc_subcategory');
    $this->db->where('cat_id',$idd);
     $qry = $this->db->get();
     return $qry->result();
  }
  public function select_subcategory_data($ided)
  {
    $this->db->select('*');
    $this->db->from('dlc_subcategory');
    $this->db->where('cat_id',$ided);
     $qryy = $this->db->get();
     return $qryy->result();

  }
 
}
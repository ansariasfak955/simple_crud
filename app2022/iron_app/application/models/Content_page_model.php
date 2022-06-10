<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Content_page_model extends CI_Model{
    function __construct() {
       $this->tableName = 'dlc_pages';
        $this->primaryKey = 'page_id';
  
    }
      /*
   public function record_count() {
 
       return $this->db->count_all("dlc_pages");
 
   }
 
  public function fetch_departments($limit,$start) {
 
 $this->db->order_by('page_id', 'DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_pages");
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   } */
   
   public function all_pages()
   {
     $this->db->select('*');
     $this->db->from('dlc_pages');
     $this->db->order_by('page_id', 'DESC');
     $query = $this->db->get();
     
     return $query->result();
   }
       
 
  public function updata($id,$data)
  {
    $this->db->where('page_id',$id);
    $this->db->update('dlc_pages',$data);
  }

}
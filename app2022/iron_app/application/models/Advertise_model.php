<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Advertise_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_advertisements';
       
        $this->primaryKey = 'advertisements_id';
  
    }
    
    public function insert($data = array()){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
   // public function select_all_user()
   // {
   //  $this->db->select('*');
   //  $this->db->from('dlc_user');
   //   $qry = $this->db->get();
   //   return $qry->result();
   // } 
   public function delete($services_id)
   {
      $this->db->where('advertisements_id',$services_id);
      $this->db->delete('dlc_advertisements');

   }
    public function update_status($data,$id)
  {
    $this->db->where('advertisements_id',$id);
    $this->db->update('dlc_advertisements',$data);
  }
  public function updata($id,$data)
  {
    $this->db->where('advertisements_id',$id);
    $this->db->update('dlc_advertisements',$data);
  }

 /*  public function record_count() {
 
       return $this->db->count_all("dlc_advertisements");
 
   }
  
   public function fetch_departments($limit, $start) {
 
 $this->db->order_by('advertisements_id', 'DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_advertisements");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   } */

  public function select_advertises()
   {
       $this->db->select('*');
       $this->db->from('dlc_advertisements');
       $this->db->order_by('advertisements_id', 'DESC');
       $query = $this->db->get();
       return $query->result();
       
       
   }


}
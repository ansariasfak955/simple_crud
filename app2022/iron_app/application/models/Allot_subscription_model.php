<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Allot_subscription_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_allot_subscription';
       
        $this->primaryKey = 'allot_sub_id';
  
    }
    
    public function insert($data = array()){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
      public function record_count() {
 
       return $this->db->count_all("dlc_allot_subscription");
 
   }
  
    public function fetch_departments($limit,$start,$user,$fdat,$tdate,$pack) {

               if($fdat||$tdate||$user||$pack){
       $this->db->where('allot_date BETWEEN "'. date('Y-m-d', strtotime($fdat)). '" and "'. date('Y-m-d', strtotime($tdate)).'"');
       $this->db->or_where('user_id',$user);
       $this->db->or_where('pack_id',$pack);
       $this->db->order_by('allot_sub_id','DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_allot_subscription");
  
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
     } else{
       $this->db->order_by('allot_sub_id','DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_allot_subscription");
  
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;


     }
 
   }

   public function delete_subscription($id)
   {
    $this->db->where('allot_sub_id',$id);
    $this->db->delete('dlc_allot_subscription');
   }
   public function update_status($data,$id)
   {
    $this->db->where('allot_sub_id',$id);
    $this->db->update('dlc_allot_subscription',$data);
   }
}
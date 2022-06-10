<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_subscription_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_user_subscription';
       
        $this->primaryKey = 'user_sub_id';
  
    }
    
    public function insert($data = array()){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

   /* 
  public function myfriendnames($name)
  { 
    $this->load->database();
    $this->db->select('*');
    $this->db->from('dlc_user');
    $this->db->like('user_fname', $name);
    $query=$this->db->get();
    return $query->result();
  } */

  public function myuser($name)
  { $this->db->select('*');
    $this->db->from('dlc_user');
    $this->db->like('user_fname', $name);
    $query=$this->db->get();
    return $query->result();
  } 
   

   /*
      public function record_count() {
 
       return $this->db->count_all("dlc_user_subscription");
 
   }
  
    public function fetch_departments($limit,$start) {

       $this->db->order_by('user_sub_id','DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_user_subscription");
  
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;

 
   } */
   
   public function select_all_subscription()
   {
       $this->db->select('*');
       $this->db->from('dlc_user_subscription');
       $this->db->order_by('user_sub_id','DESC');
       $query = $this->db->get();
       return $query->result();
       
       
   }

   public function delete_subscription($id)
   {
    $this->db->where('user_sub_id',$id);
    $this->db->delete('dlc_user_subscription');
   }
   public function update_status($data,$id)
   {
    $this->db->where('user_sub_id',$id);
    $this->db->update('dlc_user_subscription',$data);
   }
}
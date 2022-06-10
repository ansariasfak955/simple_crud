<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_user';
       
        $this->primaryKey = 'user_id';
  
    }
    
    public function insert($data = array()){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }


  public function myfriendname($name)
  { 
    $this->load->database();
    $this->db->select('*');
    $this->db->from('dlc_user');
    $this->db->like('user_fname', $name);
    $query=$this->db->get();
    return $query->result();
  }  
  public function getdevicerequests()
  { 
    $this->load->database();
    $this->db->select('*');
    $this->db->from('dlc_device_id_request');
    $this->db->order_by('request_id', 'DESC');
    $query=$this->db->get();
    return $query->result();
  }  
   public function myfriendnamee($name)
  { 
    $this->load->database();
    $this->db->select('*');
    $this->db->from('dlc_user');
    $this->db->like('user_email', $name);
    $query=$this->db->get();
    return $query->result();
  }
  
   public function delete($services_id)
   {
      $this->db->where('user_id',$services_id);
     return    $res =   $this->db->delete('dlc_user');

   }
  public function update_status($data,$id)
  {
    $this->db->where('user_id',$id);
  return    $res =  $this->db->update('dlc_user',$data);
  }
  public function updata($id,$data)
  {
    $this->db->where('user_id',$id);
   return    $res =   $this->db->update('dlc_user',$data);
  }

  /* public function record_count() {
 
       return $this->db->count_all("dlc_user");
 
   }
  
   public function fetch_departments($limit, $start,$user,$eml) {

      if($user||$eml){
       $this->db->where('user_fname',$user);
       $this->db->or_where('user_email',$eml);
       $this->db->order_by('user_id', 'DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_user");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
     } else{
      $this->db->order_by('user_id', 'DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_user");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;


     }
 
   } */
   
  public function select_all_users($user,$eml)
   {
       
       
        if($user||$eml){
       $this->db->select('*');
       $this->db->from('dlc_user'); 
       $this->db->where('user_fname',$user);
       $this->db->or_where('user_email',$eml);
       $this->db->order_by('user_id', 'DESC');
       $query = $this->db->get();
      return $query->result();
     } else {
      
      $this->db->select('*');
      $this->db->from('dlc_user');   
      $this->db->order_by('user_id', 'DESC');
      $query = $this->db->get();
       return $query->result();
     }
       
       
   }
public function con_users($id)
   {
       
       
        
       $this->db->select('*');
       $this->db->from('dlc_save_contacts'); 
       $this->db->where('user_id',$id);
      // $this->db->or_where('user_email',$eml);
       //$this->db->order_by('user_id', 'DESC');
       $query = $this->db->get();
      return $query->result();
        
   }
   


}
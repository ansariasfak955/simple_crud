<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_orders';
       
        $this->primaryKey = 'order_id';
  
    }
      /*
   public function record_count(){
 
       return $this->db->count_all("dlc_orders"); 
   }
  
   public function fetch_departments($limit,$start) {
   
      $this->db->order_by('order_id', 'DESC');
      //$this->db->group_by('user_id');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_orders");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   } */
   
  public function select_all_report()
   {   $this->db->select('*');
       $this->db->from('dlc_orders');
       $this->db->order_by('order_id', 'DESC');
       $query = $this->db->get();
       return $query->result(); 
       
   }
       

  public function myuser($name)
  {
    $this->db->select('*');
    $this->db->from('dlc_user');
    $this->db->like('user_fname', $name);
    $query=$this->db->get();
    return $query->result();
  }

   /*
    public function myfriendname($name)
  { 
    $this->load->database();
    $this->db->select('*');
    $this->db->from('dlc_user');
    $this->db->like('user_fname', $name);
    $query=$this->db->get();
    return $query->result();
  }  */

}
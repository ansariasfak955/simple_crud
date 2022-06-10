<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Referrals_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_referrals';
       
        $this->primaryKey = 'referrals_id';
  
    }


   /* public function record_count(){
 
       return $this->db->count_all("dlc_referrals");
 
   }

  
   public function fetch_departments($limit, $start) {
    
       $this->db->group_by('user_id');
    	 $this->db->order_by('referrals_id', 'DESC');
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_referrals");
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;


 
   }*/
   
  public function selec_all_refferals()
   {
       $this->db->select('*');
       $this->db->from('dlc_referrals');
       $this->db->group_by('user_id');
       $this->db->order_by('referrals_id', 'DESC');
       $query = $this->db->get();
      return $query->result();  
   }

    // search usserlist
public function myuser($name)
  {
    $this->db->select('*');
    $this->db->from('dlc_user');
    $this->db->like('user_fname', $name);
    $query=$this->db->get();
    return $query->result();
 }

   /* public function myfriendname($name)
  { 
    $this->load->database();
    $this->db->select('*');
    $this->db->from('dlc_user');
    $this->db->like('user_fname', $name);
    $query=$this->db->get();
    return $query->result();
  } */

//   public function select_reff($id)
//   {
//     $this->db->select('*');
//     $this->db->from('dlc_referrals');
//     $this->db->where('user_id',$id);
//     $qry = $this->db->get();
//     return $qry->result();

//   }

public function select_reff($id)
  {
    $this->db->select('*');
    $this->db->from('refferal_users');
    $this->db->where('user_id',$id);
    $qry = $this->db->get();
    return $qry->result();

  }

   
}
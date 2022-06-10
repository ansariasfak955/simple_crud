<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Orders_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_orders';
       
        $this->primaryKey = 'order_id';
  
    }

 /*
    public function record_count(){
 
       return $this->db->count_all("dlc_orders");
 
   }


  
   public function fetch_departments($limit,$start,$sdate,$edate) {
     if($sdate||$edate)
     {

 $this->db->where('order_date BETWEEN "'. date('Y-m-d', strtotime($sdate)). '" and "'. date('Y-m-d', strtotime($edate)).'"');
 //$this->db->or_where('user_id',$user);
 //$this->db->group_by('user_id');
 $this->db->order_by('order_id', 'DESC');
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_orders");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
    }else
    {  
       //$this->db->group_by('user_id');
    	 $this->db->order_by('order_id', 'DESC');
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_orders");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;


    }

 
   } */
   
   public function select_all_data($sdate,$edate,$usrname)
   {
       
     if($sdate||$edate||$usrname)
     {
      if(!empty($usrname))
      {

 $this->db->select('dlc_orders.*,dlc_user.user_fname,dlc_user.user_lname');
 $this->db->from('dlc_orders');
 $this->db->join('dlc_user','dlc_user.user_id=dlc_orders.user_id');
 $this->db->where("dlc_user.user_fname like '%$usrname%'");
 $this->db->order_by('order_id', 'DESC');
 $query = $this->db->get();
 return $query->result();       
      }else{
 $this->db->select('dlc_orders.*,dlc_user.user_fname,dlc_user.user_lname');
 $this->db->from('dlc_orders');
 $this->db->join('dlc_user','dlc_user.user_id=dlc_orders.user_id');
 // $this->db->where('user_id',$usrid);
 $this->db->where('dlc_orders.date BETWEEN "'. date('Y-m-d', strtotime($sdate)). '" and "'. date('Y-m-d', strtotime($edate)).'"');
 $this->db->order_by('order_id', 'DESC');
 $query = $this->db->get();
 return $query->result();

  } 
}else
    {  
        $this->db->select('dlc_orders.*,dlc_user.user_fname,dlc_user.user_lname');
        $this->db->from('dlc_orders');
       $this->db->join('dlc_user','dlc_user.user_id=dlc_orders.user_id');
    	$this->db->order_by('order_id', 'DESC');
       $query = $this->db->get();
       return $query->result();
    }
       
   } 

  public function select_all_order_detail($ids)
   {
   	$this->db->select('*');
   	$this->db->from('dlc_order_detail');
    $this->db->join('products','products.prod_id = dlc_order_detail.pack_id');
    $this->db->where('dlc_order_detail.order_id',$ids);
   	  $qryy = $this->db->get();
   	  return $qryy->result();
   }
   
  public function select_all_unsuccess()
   {
   $this->db->select('*');    
$this->db->from('dlc_cart');
$this->db->join('dlc_course_package','dlc_cart.pack_id = dlc_course_package.pack_id');
$this->db->join('dlc_user', 'dlc_cart.user_id = dlc_user.user_id');
$query = $this->db->get();
return $query->result();
   }
  
    

}
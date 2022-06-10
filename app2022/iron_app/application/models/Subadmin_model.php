<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subadmin_model extends CI_Model{
    function __construct() {
        $this->tableName = 'admin';
       
        $this->primaryKey = 'id';
    }
  
    // public function addsubadmin_data($data)
    // {
    //     $this->db->insert('admin',$data);
    // }
    
      public function addsubadmin_data($data = array()){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        } else {
            return false;    
        }
     }
    
    public function select_all_subadmin()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id !=',1);
        $qry = $this->db->get();
        return $qry->result();
    }
    public function delete($services_id)
    {
        $this->db->where('id',$services_id);
        $this->db->delete('admin');
    }
     public function updata($id,$data)
   {
    $this->load->database();
    $this->db->where('id',$id);
    $this->db->update('admin',$data);
   
  }
  public function select_subadmin_contant($services_id)
  {
     $this->db->select('*');
     $this->db->from('subadmin_contant');
     $this->db->where('sbad_id',$services_id);
     $query = $this->db->get();
     return $query->result();
  }
  public function update_status($data,$id)
  {
    $this->db->where('id',$id);
    $this->db->update('admin',$data);
  }
  public function update_data($ddt,$sdbid)
  {
    $this->db->where('sbad_id',$sdbid);
    $this->db->update('subadmin_contant',$ddt);
  }

  /*
   public function record_count() {
 
       return $this->db->count_all("admin");
 
   }
  
   public function fetch_departments($limit, $start) {
 
 $this->db->order_by('id', 'DESC');
 $this->db->where('id !=',1);
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("admin");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   } */
   // public function subadmincont_data($data)
   // {
   //  $this->db->insert('subadmin_contant',$data);
   // }

}
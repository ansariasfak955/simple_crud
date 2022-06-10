<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile_model extends CI_Model{
    function __construct() {
        $this->tableName = 'admin';
        $this->primaryKey = 'id';
          
    }

   public function updata($id,$data)
  {
    $this->db->where('id',$id);
    $this->db->update('admin',$data);
  }


   public function updatapass($id,$data)
  {
    $this->db->where('id',$id);
    $this->db->update('admin',$data);
  }  

}
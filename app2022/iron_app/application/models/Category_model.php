<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_category';
       
        $this->primaryKey = 'cat_id';
    }
    
    public function insert($data){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

  public function selectdata()
   {
    
     $this->load->database();
     $this->db->select('*');
     $this->db->from('dlc_category');
     $this->db->order_by('cat_id', 'DESC');
     $query=$this->db->get();
     return $query->result();
   }

   public function delete($services_id) { 
         if ($this->db->delete("dlc_category", "cat_id = ".$services_id)) { 
            return true; 
         } 
      }


        public function update($id,$data)
  {
    $this->db->where('cat_id',$id);
   return $this->db->update('dlc_category',$data);
  }

     public function new_cat_sort()
  {
      $q = "SELECT cat_sort  FROM `dlc_category` ORDER BY `cat_sort` DESC  LIMIT 1";
        $res =  $this->db->query($q)->result();
        $last_sort = ($res)? $res[0]->cat_sort : 0;
        return $last_sort+1;
   }


       




    }
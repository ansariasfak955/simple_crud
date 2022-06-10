<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Advertise_category_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_advertisement_categories';
       
        $this->primaryKey = ' advertisementcat_id';
    }
    
    public function insert($data = array()){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

 // public function selectdata()
 //  {
    
 //    $this->load->database();
 //    $this->db->select('*');
 //    $this->db->from('dlc_category');
 //    $this->db->order_by('cat_id', 'DESC');
 //    $query=$this->db->get();
 //    return $query->result();
 //  }

   /* public function record_count() {
 
       return $this->db->count_all("dlc_advertisement_categories");
 
   }
  
   public function fetch_departments($limit, $start) {
 
 $this->db->order_by('advertisementcat_id', 'DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_advertisement_categories");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   } */
   
 public function select_advertise_data()
   {
      $this->db->select('*');
      $this->db->from('dlc_advertisement_categories');
      $this->db->order_by('advertisementcat_id', 'DESC');
      $query = $this->db->get(); 
      return $query->result();
      
   }

         public function delete($services_id) { 
         if ($this->db->delete("dlc_advertisement_categories", "advertisementcat_id = ".$services_id)) { 
            return true; 
         } 
      }


        public function updata($id,$data)
  {
    $this->db->where('advertisementcat_id',$id);
    $this->db->update('dlc_advertisement_categories',$data);
  }

    }
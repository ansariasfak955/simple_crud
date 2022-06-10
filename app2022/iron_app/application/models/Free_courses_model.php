<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Free_courses_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_free_courses';
       
        $this->primaryKey = 'free_courses_id';  
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
    public function record_count(){
 
       return $this->db->count_all("dlc_free_courses");
 
   }
  
   public function fetch_departments($limit, $start) {        
      // $this->db->group_by('user_id');
    	 $this->db->order_by('free_courses_id', 'DESC'); 
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_free_courses");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;

    } */
    
    public function select_free_data()
    {
       $this->db->select('*');
       $this->db->from('dlc_free_courses');
        $qqry = $this->db->get();
        return $qqry->result();
        
    }

  }

 
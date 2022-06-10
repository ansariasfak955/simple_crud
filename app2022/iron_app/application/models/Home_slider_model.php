<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_slider_model extends CI_Model{
    function __construct() {

        $this->tableName = 'home_sliders';
        $this->primaryKey = 'id';
        
    }
    public function add_home_slider_data($data){
      $this->load->database();
      return $this->db->insert('home_sliders',$data);
    }
     public function update_home_slider_data($data,$id){
      $this->load->database();
      $this->db->where('id',$id);
      return $this->db->update('home_sliders',$data);
    }
    
   
}
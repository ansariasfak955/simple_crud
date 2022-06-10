<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Offer_slider_model extends CI_Model{
    function __construct() {

        $this->tableName = 'offer_sliders';
        $this->primaryKey = 'id';
        $this->load->database();

        
    }
    public function add_offer_slider_data($data){
     
      return $this->db->insert('offer_sliders',$data);
    }
     public function edit_offer_slider($id){
      return $this->db->where('id',$id)
                       ->get('offer_sliders')
                      ->result();
    }
     public function update_offer_slider_data($data,$id){
      $this->db->where('id',$id);
      return $this->db->update('offer_sliders',$data);
    }
     public function delete_offer_slider($id){
    
       return $this->db->where('id',$id)
                    ->delete('offer_sliders');
  }
    
   
}
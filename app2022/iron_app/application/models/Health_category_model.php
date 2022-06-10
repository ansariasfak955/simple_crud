<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Health_category_model extends CI_Model{
    function __construct() {
        $this->tableName = 'health_category';
       
        $this->primaryKey = 'hel_cat_id';
  
    }
    public function add_health_category_data($data)
    {

       $aff_row=$this->db->insert('health_category',$data);
       if($aff_row>0){
        return $aff_row;
       }else{
        return false;
       }
    }
    

     public function update_health_category_data($hel_cat_id,$data)
    {
      $row=$this->db->where('hel_cat_id',$hel_cat_id)
                ->update('health_category',$data);
          return $row;      
    }
    public function delete_health_category($hel_cat_id)
    {
      $this->db->where('hel_cat_id',$hel_cat_id)
                ->delete('prod_health_segment');
      $row=$this->db->where('hel_cat_id',$hel_cat_id)
                ->delete('health_category');
          return $row;      
    }
    public function edit_health_category($hel_cat_id)
    {
      $row=$this->db->where('hel_cat_id',$hel_cat_id)
                ->get('health_category')
                ->row();
          return $row;      
    }
    public function get_health_category()
    {
      return $this->db->get('health_category')->result();
    }





    public function select_all_data()
    {
        $this->db->select('*');
		    $this->db->where('cat_id',1); 
        $this->db->from('dlc_subcategory');
           $query = $this->db->get();
           return $query->result();

    }
	public function select_all_dat()
    {
        $this->db->select('*');
		$this->db->where('cat_id',2); 
        $this->db->from('dlc_subcategory');
           $query = $this->db->get();
           return $query->result();

    }

    
    
    
    
    
  
  
}

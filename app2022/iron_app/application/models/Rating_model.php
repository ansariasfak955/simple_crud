<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rating_model extends CI_Model
{
    function __construct()
	{
        $this->tableName = 'dlc_rating';
         $this->primaryKey = 'rating_id';
    }
    
     public function insert($data = array()){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
    
    public function select_all_review($pkgiid)
    {
        
         /*$this->db->select('*');  
        $this->db->from('dlc_rating');
	    $this->db->where('pack_id',$pkgiid);           
        $this->db->order_by('rating_id','desc');
        $query = $this->db->get();
        return $query->result();*/
        
         if(!empty($pkgiid)){
        $this->db->select('*');  
        $this->db->from('dlc_rating');
	    $this->db->where('pack_id',$pkgiid);           
        $this->db->order_by('rating_id','desc');
        $query = $this->db->get();
        return $query->result();
        
	         } else {
	    $this->db->select('*');
	    $this->db->from('dlc_rating');
        $this->db->order_by('rating_id','desc');
        $query = $this->db->get();
          return $query->result();
     
	         }
        
    }
    
    /*
    public function record_count()
    {
       
        return $this->db->count_all("dlc_rating");
    }
	public function fetch_departments($limit,$start,$dtss)
	{
	         if(!empty($dtss)){
	    $this->db->where('pack_id',$dtss);           
        $this->db->order_by('rating_id');
        $this->db->limit($limit, $start);
        $query = $this->db->get("dlc_rating");
	         } else {
        $this->db->order_by('rating_id');
        $this->db->limit($limit, $start);
        $query = $this->db->get("dlc_rating");            
	             
	         }
        
        if ($query->num_rows() > 0)
	{
        foreach ($query->result() as $row) 
	{
        $data[] = $row;
    }
        return $data;
    } 
        return false; 
	} */
	
	
	/*
	public function myuser($name)
  {
    $this->db->select('*');
    $this->db->from('dlc_user');
    $this->db->like('user_fname', $name);
    $query=$this->db->get();
    return $query->result();
 }*/
	
	/*
	 public function record_countp()
    {
       
        return $this->db->count_all("dlc_order_detail");
    }
	public function fetch_departmentsp($limit, $start)
	{
        
        $this->db->order_by('order_detail_id');
        $this->db->limit($limit, $start);
        $query = $this->db->get("dlc_order_detail");
        if ($query->num_rows() > 0)
	{
        foreach ($query->result() as $row) 
	{
        $data[] = $row;
    }
        return $data;
    } 
        return false; 
	} 
	 */
	public function select_packs_data()
	{
	     $this->db->select('*');
	     $this->db->from('dlc_order_detail');
	     $this->db->order_by('order_detail_id','desc');
         $query = $this->db->get(); 
         return $query->result();
	}
	
	public function delete($services_id) { 
         if ($this->db->delete("dlc_rating", "rating_id = ".$services_id)) { 
            return true; 
         } 
      }
      
      
      
    public function pack($pack) { 
         
        $this->load->database();
        $this->db->where('pack_id',$pack);
        $this->db->select('*');
        $this->db->from('dlc_course_package');
        $query=$this->db->get();
        return $query->result();
        
      }
      
      public function update_rating($data,$rtid)
      {
          $this->db->where('rating_id',$rtid);
          $this->db->update('dlc_rating',$data);
      }
      
      
      
}
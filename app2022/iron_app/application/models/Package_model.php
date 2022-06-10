<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Package_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_course_package';
       
        $this->primaryKey = 'pack_id';
  
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

    
    public function insert($data = array()){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }
    
    
     public function record_count() {
 
       return $this->db->count_all("dlc_course_package");
 
   }
    public function fetch_departments($limit, $start,$pck) {

            if($pck){
       $this->db->where('pack_id',$pck);       
       $this->db->order_by('pack_id', 'DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_course_package");
   
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
      }else {
       $this->db->order_by('pack_id', 'DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_course_package");
   
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;


      }

   } 
   
  public function select_all_packs($pck)
  {
       if($pck){
       $this->db->select('*');
       $this->db->from('dlc_course_package');    
       $this->db->where('pack_id',$pck);       
       $this->db->order_by('pack_id', 'DESC');
       $query = $this->db->get();
       return $query->result();
      } else {
       $this->db->select('*');
       $this->db->from('dlc_course_package');      
       $this->db->order_by('pack_id', 'DESC');
       $query = $this->db->get();
       return $query->result();
      }
  }
  
  public function insert_pack_detail($orders)
  {

$this->db->insert_batch('dlc_mamage_package', $orders); 

  }


   public function delete_pack($pkid)
   {
    $this->db->where('pack_id',$pkid);
    $this->db->delete('dlc_course_package');
   }
    public function updata($id,$data)
  {
    $this->db->where('pack_id',$id);
    $this->db->update('dlc_course_package',$data);
  }
  public function delete_data($id)
  {
    $this->db->where('pack_id',$id);
    $this->db->delete('dlc_mamage_package');
  }
  public function insert_pack_update($ordersd)
  {
    $this->db->insert_batch('dlc_mamage_package', $ordersd); 

  } 

  
  
}

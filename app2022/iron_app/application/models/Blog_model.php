<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog_model extends CI_Model{
    function __construct() {
        $this->tableName = 'dlc_blog';
        $this->primaryKey = 'bl_id';
        
    }
    
    public function insert($data = array()){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

    public function selectdata()
  {$st = 1;
    $this->load->database();
    $this->db->select('*')
     ->from('blog')
     ->join('category', 'blog.category_id = category.cat_id') ;
       $this->db->where('blog.update_delete',$st);
    
      $query=$this->db->get();
    return $query->result();
  }

   public function selectcat()
  {
   // $st =1;
    $this->load->database();
    $this->db->select('*');
    $this->db->from('dlc_blog');
     
    $query=$this->db->get();
    return $query->result();
  }
 public function selectcattt()
  {
   // $st =1;
    $this->load->database();
    $this->db->select('*');
    $this->db->from('dlc_help_support');
   $this->db->order_by("h_id desc");
    $query=$this->db->get();
    return $query->result();
  }


          public function selectname($services_id)
  {
    $this->load->database();
    $this->db->select('*');
    $this->db->from('blog');
    $this->db->where('blog_id',$services_id);
    $query=$this->db->get();
    $result = $query->row();
    $cityid = $result->category_id;

     $this->load->database();
    $this->db->select('*');
    $this->db->from('category');
     $this->db->where('cat_id',$cityid);
    $query=$this->db->get();
    return $query->result();
  
   
  }



 
         public function updata($id,$data)
  {
    $this->db->where('bl_id',$id);
    $this->db->update('dlc_blog',$data);
  }

   public function delete($services_id) { 
         if ($this->db->delete("dlc_blog", "bl_id = ".$services_id)) { 
            return true; 
         } 
      }


       public function updatadelete($id,$data)
  {
    $this->db->where('blog_id',$id);
    $this->db->update('blog',$data);
  }

  function del_photo($k)
                {
                    $this->db->where('blog_id',$k);
                    $query = $getData = $this->db->get('blog');
                            if($getData->num_rows() > 0)
                                return $query;
                            else
                               return null;
                }
function drop_photo($k)
                   { $this->db->where('blog_id',$k);
                  $this->db->update('blog', array('update_delete' => '0'));
              }


     

}
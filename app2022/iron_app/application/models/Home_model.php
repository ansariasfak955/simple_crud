<?php 
class Home_model extends CI_Model
{


  public function selectuser()
  {
    $this->load->database();
   $this->db->select('COUNT(user_id) AS num_user');
    $this->db->from('dlc_user');
    $query=$this->db->get();
    return $query->result();
  }


 public function selectsubadmin()
  {
    $this->load->database();
   $this->db->select('COUNT(id) AS hcount');
    $this->db->from('admin');
    $this->db->where('id !=',1);
    $query=$this->db->get();
    return $query->result();
  }

  public function selectadvertisement()
  {
    $this->load->database();
    $this->db->select('COUNT(rating_id) AS rcount');
    $this->db->from('dlc_rating');
    $query=$this->db->get();
    return $query->result();
  }

    public function select_all_active_user()
  {
    $this->load->database();
    $this->db->select('COUNT(user_id) AS bcount');
    $this->db->from('dlc_user');
    $this->db->where('user_status',1);
    $query=$this->db->get();
    return $query->result();
  }
}
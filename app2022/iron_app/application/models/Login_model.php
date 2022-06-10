<?php
//error_reporting(0);
class Login_model extends CI_Model{

  public function login_user($email,$password){
    
    $result = $this->db->where('admin_email',$email)
        ->where('password',$password)
        //->where('status',1)
        ->get('admin');
    if($result->num_rows() == 1)  {
      return $result->row(0)->id;
    }else{
      return false;                      
    }   
      }

       public function logindata($email,$password)
  {
    $this->load->database();
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('admin_email',$email);
     $this->db->where('password',$password);
    $query=$this->db->get();
    return $query->result();
   }

    public function selectdata()
  {
    
    $this->load->database();
    $this->db->select('*');
    $this->db->from('admin');
     $this->db->where('id',1);
    $query=$this->db->get();
    return $query->result();
  }
    

       public function updatapass($email,$data)
  {
    $this->db->where('otp',$email);
    $this->db->update('admin',$data);
  }
}
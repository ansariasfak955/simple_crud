<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
    
    public function getByUsername($username){
        $this->db->where('username',$username);
        $admin = $this->db->get('admin')->row_array();
        //SELECT * FORM admin WHERE username
        return $admin;
    }

    
}
?>
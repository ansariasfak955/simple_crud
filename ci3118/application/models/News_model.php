<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model{
    public function get_news(){
       $query = $this->db->get('news');
       if($query->num_rows() > 0)
       {
           return $query->result();
       }
    }
}

?>
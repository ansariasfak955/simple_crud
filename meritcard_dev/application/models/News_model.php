<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model{
    function getNews(){
        $res = "select n.*,ns.* from news_letters as n join news_section as ns on n.newsletter_id=ns.newsletter_id";
        //print_r($res);die;
        return $this->db->query($res)->result_array();
    }

    // function newsDetails(){
    //     $sql = "select n.recipients, n.title, n.heading, n.image, n.text from news_letters as n join news_section as ns on
    //     n.newsletter_id=ns.section_id";
    //     print_r($sql);
    //     return $this->db->query($sql)->result_array();

    // }
} 

?>
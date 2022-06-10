<?php 
ob_start();
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Send_notification extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Notification_model','nm');
          $this->load->library("pagination");
          
    } 
    
    
    public function add_notification()
    {
        $data = $this->input->post();
        
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');
        
        $sql = "INSERT INTO dlc_notification (title,message) VALUES ('$title', '$desc')";
        $res = $this->db->query($sql);
        
        if($res)
       {
           $q = "select * from dlc_tokens ";
         
            $data = $this->db->query($q)->result();
          $arr = array();
            foreach($data as $val)
                {
                    $token_id = $val->token_id;
                    $token = $val->token_name;
                    $tokens = array($token);   
                    $arr [] = $this->nm-> push_notification_android($tokens,$title,$desc);
                }
            
            $sum = count($arr);
            
             $this->session->set_flashdata('success_msg', "Notification  Saved  and Send All Users/$sum");
            
           
           }else{
                   
                        $this->session->set_flashdata('error_msg', 'Notification not Saved ');
                   }
         redirect('Notification/add_notifications','refresh'); die();
        //echo "<pre>"; print_r($data);
        
    }
    
    
    
    
}
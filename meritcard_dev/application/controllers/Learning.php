<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Learning extends CI_Controller {

 public function __construct(){
        	 parent::__construct();
 	    	$this->load->model('Common_model','cm');
 	    	
 	    $aaadmin_id =  $this->session->userdata('admin_id');	
 	    $ooorg_id   =  $this->session->userdata('org_id');	
 	       $res = $this->cm->get_data('organisation',['admin_id'=>$aaadmin_id,'org_id'=>$ooorg_id]);
 	    if($res){ }else{ redirect(base_url('Login/login')); }   
 	 }                               
           
     public function index(){
         
        $this->load->view('learning_review');  
     }
     
     public function lesson_plans(){
         
        $this->load->view('learning_lesson_plans');  
     }
     
     public function lessons(){
         $this->load->view('learning_lessons');  
     }
     
     public function new_lesson(){
         $this->load->view('learning_new_lesson');  
     }
     
      public function new_plan_lesson(){
         $this->load->view('learning_new_plan_lesson');  
     }

     
     
     
     
}
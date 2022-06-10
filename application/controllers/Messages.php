<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

 public function __construct(){
 	 parent::__construct();
 	    	$this->load->model('Common_model','cm');
 	    	
 	    $aaadmin_id =  $this->session->userdata('admin_id');	
 	    $ooorg_id   =  $this->session->userdata('org_id');	
 	       $res = $this->cm->get_data('organisation',['admin_id'=>$aaadmin_id,'org_id'=>$ooorg_id]);
 	    if($res){}else{ redirect(base_url('Login/login')); }   
 	 	
     }                               
                            
 public function index(){
     $school_id =  $this->session->userdata('org_id');	
     $branch_id  =  $this->session->userdata('branch_id');             
     $data = array();                                                 
    //  $data['b_list'] = $this->cm->get_data('blog_tbl',['branch_id'=>$branch_id ]);
     $this->load->view('messages',$data);
 }
   public function announcements(){                              
       $data = array();   
      
       $fdate     = $this->input->get('fdate');                        
       $tdate     = $this->input->get('tdate');
       $class_id  = $this->input->get('class_id');                         
       $class_ids = ($class_id)? implode(',', $class_id) : '' ;   
    
     if(!empty($class_ids) && !empty($fdate) && !empty($tdate)){  
                $fdate = $fdate.' 00:00:01';
                $tdate = $tdate.' 00:00:01';
               
               $q = "SELECT * FROM `announcement_tbl` WHERE (date_time BETWEEN  '$fdate'  and '$tdate') and class_id in($class_ids) " ;
                    $data['list'] = $this->db->query($q)->result(); 
        }
        
          $data['class_list'] = $this->cm->get_data('class_tbl',[]);   
   
             $this->load->view('announcements',$data);                                              
        }
  
   public function announcement_message(){
     $data = array();
              $branch_id  =  $this->session->userdata('branch_id');      
             $data['class_list'] = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id]); 
             $this->load->view('announcement_message',$data);                                              
        }
        
     public function announcement_msg_add(){
             $data = array();
            $class_ids = $this->input->post('class_id');
            $msg_type  = $this->input->post('msg_type');
            $Rmdr_date = $this->input->post('Rmdr_date');
            $Rmdr_time = $this->input->post('Rmdr_time');
            $message       = $this->input->post('msg');
            $sms       = $this->input->post('sms');
          
           $sms         = ($msg_type == 'alert' )? $sms : '';
           $Rmdr_date   = ($msg_type == 'reminder' )? $Rmdr_date : '';
           $Rmdr_time   = ($msg_type == 'reminder' )? $Rmdr_time : '';
         $branch_id  =  $this->session->userdata('branch_id');      
           
    // announcement_tbl`(`ansmt_id`, `branch_id`, `type`, `reminder_date`, `reminder_time`, `sms`, `message`)   
           
        $whr = ['branch_id'=>$branch_id,'type'=>$msg_type,'message'=>$message];
        if($msg_type == 'alert' && $sms ){
            $whr['sms'] = 1;
        }else if($msg_type == 'reminder'){
                    
                     $whr['reminder_date'] = $Rmdr_date ;
                     $whr['reminder_time'] = $Rmdr_time ;
        }
        $arr = []; 
           $whr['image']  = $this->cm->file_upload('upload_cont_img','assets/message_img/') ;
          
         foreach($class_ids as $class_id){
            $whr['class_id'] = $class_id ;
             
             $res = $this->cm->save('announcement_tbl',$whr);
             if($res){ $arr[] = $res;}
         } 
      if($arr)
        {
            $this->session->set_flashdata('success_msg', 'Announcement add successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Announcement note add..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
                                       
                                                 
        }
        
        
        
        
   public function newsletters(){                                                            
     $data = array();      
     $this->load->view('message_newslatter',$data);
        }
     
     
     
} 
     
     
     
     
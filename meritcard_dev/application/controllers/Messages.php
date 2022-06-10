<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

 public function __construct(){
 	 parent::__construct();
 	    	$this->load->model('Common_model','cm');
 	    	$this->load->model('News_model','nm');
 	    	
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
            $date_time = date('Y-m-d H:i:s');
            $message       = $this->input->post('msg');
            $sms       = $this->input->post('sms');
          
           $sms         = ($msg_type == 'alert' )? $sms : '';
           $Rmdr_date   = ($msg_type == 'reminder' )? $Rmdr_date : '';
           $Rmdr_time   = ($msg_type == 'reminder' )? $Rmdr_time : '';
         $branch_id  =  $this->session->userdata('branch_id');      
           
    // announcement_tbl`(`ansmt_id`, `branch_id`, `type`, `reminder_date`, `reminder_time`, `sms`, `message`)   
           
        $whr = ['branch_id'=>$branch_id,'type'=>$msg_type,'message'=>$message, 'date_time'=>$date_time];
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
        $news = $this->nm->getNews();
        //echo "<pre>";print_r($news); die();
        $data['news_letters'] = $news;      
        $this->load->view('message_newslatter',$data);
        }
     
     public function new_newsletters(){
      
       $this->load->view('message_create_newslatter');
     }

     public function addNewsletter(){
      //  echo  "<pre>";
      //  print_r($this->input->post());
      //  echo $_FILES['image']['name'];die;
      
       $recipients = implode(',', $this->input->post('recipients[]'));
       $title = $this->input->post('title');
       $file_name = $this->cm->file_upload('image', 'assets/images/');
       $heading = $this->input->post('heading');
       $text = $this->input->post('text');
       //$newsletter_id = $this->input->post('newsletter_id');
       if(empty($recipients) || empty($title)){
        $this->session->set_flashdata('All field Required!!');
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
        redirect($server);die();
       }
       $res = $this->cm->save('news_letters',['recipients'=>$recipients, 'title'=>$title]);
       //echo $res;
          if($res){
            $this->cm->save('news_section',['image'=>$file_name, 'heading'=>$heading, 'text'=>$text, 'newsletter_id'=>$res]);
            $this->session->set_flashdata('success_msg', 'news have been added successfully.');    
            redirect('Messages/newsletters');
          }else{
            $this->session->set_flashdata('error_msg', 'please enter data.');    
            redirect('Messages/new_newsletters');
          }
     }

     function newsDetails(){
        $newsletter_id=$this->uri->segment(3);
        $data = array();
        //echo 'asfak'.$newsletter_id;die;
        $sql = "select n.*, n.recipients, n.title, ns.heading, ns.image, ns.text from news_letters as n join news_section as ns on n.newsletter_id=ns.newsletter_id where ns.section_id=".$newsletter_id;
        $res = $this->db->query($sql)->result_array();
        // echo "<pre>"; print_r($res); die;
        $data['news_letters'] = $res; 
      $this->load->view('newslatter_detail',$data);
     }
    
} 
     
     
     
     
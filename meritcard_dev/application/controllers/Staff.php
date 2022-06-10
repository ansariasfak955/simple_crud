<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

 public function __construct(){
 	 parent::__construct();
 	    	$this->load->model('Common_model','cm');
 	    	
 	    $aaadmin_id =  $this->session->userdata('admin_id');	
 	    $ooorg_id   =  $this->session->userdata('org_id');	
 	       $res = $this->cm->get_data('organisation',['admin_id'=>$aaadmin_id,'org_id'=>$ooorg_id]);
 	    if($res){}else{ redirect(base_url('Login/login')); }   
 	 	// <!--$this->load->library('paypal_lib');-->
     }                               
                            
 public function index(){
      $branch_id =  $this->session->userdata('branch_id');
      
     $q = "SELECT a.staff_type ,b.user_id,b.name,b.email FROM `staff_tbl` as a join user_tbl as b on a.user_id= b.user_id 
                where b.branch_id = '$branch_id' ";
     $data = [];
     $data['staff_list'] = $this->db->query($q)->result();
     
     $this->load->view("staff",$data);
     
     
 }
  public function add_staff(){
        $fname  = $this->input->post('fname');
        $lname  = $this->input->post('lname');
        $email  = $this->input->post('email');
        $mobile = $this->input->post('mobile');
    if(empty($fname) || empty($lname)  || empty($email)  || empty($mobile) ){
        
        $this->session->set_flashdata('error_msg', 'Parent note add..');
          $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);die();
    }   
      $pass = '123';
        $org_id    =  $this->session->userdata('org_id');	
        $branch_id =  $this->session->userdata('branch_id');
        
       $u_id = $this->cm->save('user_tbl',['name'=> $fname.' '. $lname,'password'=>$pass,'roll'=>'2','mobile'=>$mobile,
                    'email'=>$email,'org_id'=>$org_id,'branch_id'=>$branch_id]);
          
        $res = $this->cm->save('staff_tbl',['user_id'=> $u_id,'branch_id'=>$branch_id]);
    
      if($res )
        {
            $this->session->set_flashdata('success_msg', 'Staff add successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Staff note add..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
     
 }
 
      public function staff_profile(){
           $id = $this->uri->segment(3);
             $branch_id =  $this->session->userdata('branch_id');
          $data = [];
          $data['staff_tbl']     =   $this->cm->get_data('staff_tbl',['user_id'=>$id]);
          $data['user_tbl']      =   $this->cm->get_data('user_tbl',['user_id'=>$id]);
          $data['staff_crt_tbl'] =   $this->cm->get_data('staff_certification_tbl',['staff_user_id'=> $id]);
          $data['staff_training']=   $this->cm->get_data('staff_training_tbl',['staff_id'=> $id]);
       
          $q = "SELECT b.name  FROM `staff_timecard_tbl` as a join section_tbl as b on a.section_id = b.section_id 
                    WHERE a.`staff_id` = $id  GROUP by b.name";
                    
             $data['all_rooms'] = $this->db->query($q)->result();  
              
    
           $data['list_doc'] = $td = $this->cm->get_data_orderBy('doc_attachment_tbl',['branch_id'=>$branch_id,'user_id'=>$id,
                                        'is_delete'=>'0'],'doc_id desc');
        
          
          
           $this->load->view("staff_profile",$data);
      }
      
    public function add_training(){
        
          $name    = $this->input->post('name');
          $type    = $this->input->post('type');
          $c_date  = $this->input->post('c_date');
          $hours   = $this->input->post('hours');
          $notes   = $this->input->post('notes');
          $staff_id= $this->input->post('staff_id');
          $t_id    = $this->input->post('t_id');
    
    if(empty($name) || empty($type)  || empty($c_date)  || empty($hours)|| empty($staff_id) || empty($notes)  ){
        
        $this->session->set_flashdata('error_msg', 'Parent note add..');
          $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);die();
    }             
                        
        $org_id    =  $this->session->userdata('org_id');	
        $branch_id =  $this->session->userdata('branch_id');
        $whr = ['staff_id'=> $staff_id,'t_name'=>$name,'t_type'=> $type,'hours'=>$hours,
                        'completed_date'=> $c_date ,'notes'=>$notes];
          if($t_id){
                    $res =  $this->cm->update('staff_training_tbl',['id'=>$t_id],$whr);
                    $msg = 'Training Update successfully';
              }else{  
                   $msg = 'New Training add successfully';
               $res = $this->cm->save('staff_training_tbl',$whr);
              }
      if($res )
        {
            $this->session->set_flashdata('success_msg',$msg );
        }else{
             $this->session->set_flashdata('error_msg', 'something went wrong please try again');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
                             redirect($server);
        
        
    }  
        public function delete_staff(){
        $id = $this->uri->segment(3);
        
        $res = $this->cm->delete('staff_tbl',['user_id'=> $id]);
        if($res)                            
        {           $this->cm->delete('user_tbl',['user_id'=>$id]);
            $this->session->set_flashdata('success_msg', 'Staff deleted successfully');
          }else{  $this->session->set_flashdata('error_msg', 'something went wrong please try again..');
                }
         
          $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
                                                  
    }
    
    public function staff_update_info_1(){                                                      
       $s_id = $this->uri->segment(3); 
        $dx = $this->input->post();               
      //  echo "<pre>"; print_r($_FILES);  die();                           
             $name        = $this->input->post('name');
             $email          = $this->input->post('email');
             $dob         = $this->input->post('dob');
             $mobile      = $this->input->post('mobile');
                                   
                                                                             
             $allergies    = $this->input->post('allergies');
             $notes        = $this->input->post('notes');
             $medications  = $this->input->post('medications');
             $doctor_name  = $this->input->post('doctor_name');
             $doctor_phone = $this->input->post('doctor_phone');
             $ec_name      = $this->input->post('ec_name');
             $ec_phone     = $this->input->post('ec_phone');
             $ec_type      = $this->input->post('ec_type');
           $image = $this->cm->file_upload('image', 'assets/images/') ;
           if($image){
                  $this->cm->update('user_tbl',['user_id'=>$s_id],['image'=>$image]);
               }
          // staff_id`, `staff_type`, `user_id`, `qualification`, `emergency_contact_name`, `emergency_contact_phone`, 
          //`emergency_contact_type`, `allergies`, `notes`, `medications`, `doctor_name`, `doctor_mobile`, `status`)    
      
         $res = $this->cm->update('staff_tbl',['user_id'=>$s_id],['emergency_contact_name'=>$ec_name,'emergency_contact_phone'=>$ec_phone,
                            'emergency_contact_type'=>$ec_type,  'notes'=>$notes,'medications'=>$medications,'doctor_name'=>$doctor_name,
                            'doctor_mobile'=>$doctor_phone,'allergies'=>$allergies]);
         $res_2 = $this->cm->update('user_tbl',['user_id'=>$s_id],['DOB'=>$dob,'email'=>$email ,'name'=>$name ]);
        if($res || $res_2)
        {
            $this->session->set_flashdata('success_msg', 'data update successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Data note update..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
        
    } 
     public function staff_update_info_2(){                                                      
       $s_id = $this->uri->segment(3); 
      
            $address  = $this->input->post('address');
            
         $res_2 = $this->cm->update('user_tbl',['user_id'=>$s_id],['address'=>$address]);
        if($res_2)
        {
            $this->session->set_flashdata('success_msg', 'data update successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Data note update..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
     }
     
     public function staff_update_info_3(){                                                                                 
       $u_id = $this->uri->segment(3); 
      
          $degree_type    = $this->input->post('degree_type');                                                       
          $certification  = $this->input->post('certification');                                                       
          $education      = $this->input->post('education');                                                       
          $Infant         = $this->input->post('Infant');                                                       
          $notes          = $this->input->post('notes');   
          
       
          $res = $this->cm->get_data('staff_certification_tbl',['staff_user_id'=> $u_id]);
          
     if($res)
        {    
             $res_2 = $this->cm->update('staff_certification_tbl',['staff_user_id'=>$u_id],
                                   [
                                     'degree_type'=>$degree_type,
                                     'certification_name'=>$certification,
                                     'ECE'=>$education,
                                     'Infant_toddler_credits'=>$Infant,
                                     'notes'=>$notes
                                     ]);
       if($res)
        {  $this->session->set_flashdata('success_msg', 'data update successfully');
        }else{  $this->session->set_flashdata('error_msg', 'Data note update..');
            }
            
        }else{
                $res2 = $this->cm->save('staff_certification_tbl',
                                                   [
                                                     'degree_type'=>$degree_type,
                                                     'certification_name'=>$certification,
                                                     'ECE'=>$education,
                                                     'Infant_toddler_credits'=>$Infant,
                                                     'notes'=>$notes
                                                     ]);
                                                     
                  if($res2)
                    {  $this->session->set_flashdata('success_msg', 'add successfully');
                    }else{  $this->session->set_flashdata('error_msg', 'Data note add');
                        }   
           
            }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
     }
     
      public function staff_update_info_4(){                                                                                 
       $u_id = $this->uri->segment(3); 
      
          $hire_date       = $this->input->post('hire_date');                                                       
          $hire_time_notes = $this->input->post('hire_time_notes');                                                       
        
         // hire_date  hire_time_notes
        $res_2 = $this->cm->update('staff_tbl',['user_id'=>$u_id],['hire_date'=>$hire_date,'hire_time_notes'=>$hire_time_notes]);
       if($res_2)
        {  $this->session->set_flashdata('success_msg', 'data update successfully');
        }else{  $this->session->set_flashdata('error_msg', 'Data note update..');
            }
            
       
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
     }
  
     public function add_attachments(){
    
     $type = $this->input->post('type'); 
     $exp_date = $this->input->post('exp_date'); 
     $note = $this->input->post('note'); 
     $other_type = $this->input->post('other_type'); 
      $s_id = $this->input->post('s_id'); 
      $show_types = $this->input->post('show_types'); 
        $show_profiles =  implode(',', $show_types);                
          /// 	attachment_title	attachment_type	document_file	note	user_id	is_delete	date
   $branch_id =  $this->session->userdata('branch_id');
  
  if(empty($type) || empty($exp_date)  || empty($s_id)  )                      
  {
      $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server); die(); 
      
  }
                                     
    $img = $this->cm->file_upload('doc_img','assets/Doc_img/') ;
    
        $res_2 = $this->cm->save('doc_attachment_tbl',['attachment_type'=>$type,'document_file'=> $img,'note'=>$note,
                    'other_type'=>$other_type,'view_profiles'=>$show_profiles,'branch_id'=>$branch_id,'user_id'=>$s_id,
                         'exp_date'=>$exp_date]);                                                        
       
      if($res_2)
        {
            $this->session->set_flashdata('success_msg', 'data update successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Data note update..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
        
    
      
      //  echo "<pre>"; print_r($catch);
    }
  
  
     public function staff_payroll(){    
    
    /// staff_id=68&class_id=2&section_id=10&fDate=2022-03-09&tDate=2022-03-17
       
         $staff_id   =  $this->input->get('staff_id');
         $fDate      =  $this->input->get('fDate');
         $tDate      =  $this->input->get('tDate');
          $branch_id =  $this->session->userdata('branch_id');
             $data = [];                                                                    
          if(!empty($staff_id) ) 
           {                              
               $whr = ['staff_id'=>$staff_id ] ;
                      
                       if(!empty($fDate) && !empty($tDate)){
                             $whr['in_time >= '] = $fDate.' 00:00:00' ;        
                             $whr['out_time <= '] = $tDate.' 11:59:58' ;                            
                       }                                                   
                $data['staff_timeList'] =$tt= $this->cm->get_data('staff_timecard_tbl',$whr);
                // echo "<pre>"; print_r($tt); die();                                     
           }
           
           //$q = "SELECT a.user_id ,b.name  FROM staff_tbl as a join user_tbl as b on a.user_id = b.user_id and a.status = '1'";
           $q = "SELECT a.user_id ,b.name  FROM staff_tbl as a join user_tbl as b on a.user_id = b.user_id 
                    where a.branch_id = '$branch_id' ";
                
            $data['staff_list'] =$tt=  $this->db->query($q)->result();
       
            $this->load->view('staff_payroll',$data);
       }
       
    public function staff_timecards()
       {   
            /// staff_id=68&class_id=2&section_id=10&fDate=2022-03-09&tDate=2022-03-17
         $staff_id   =  $this->input->get('staff_id');
         $class_id   =  $this->input->get('class_id');
         $section_id =  $this->input->get('section_id');
         $fDate      =  $this->input->get('fDate');
         $tDate      =  $this->input->get('tDate');
           $branch_id =  $this->session->userdata('branch_id');
             $data = [];                                                                    
          if(!empty($class_id) && !empty($section_id) && !empty($staff_id) ) 
           {                              
               $whr = ['staff_id'=>$staff_id,'staff_id'=>$staff_id,
                        'class_id'=>$class_id,'section_id'=>$section_id] ;
                       if(!empty($fDate) && !empty($tDate)){
                             $whr['in_time >= '] = $fDate.' 00:00:00' ;        
                             $whr['out_time <= '] = $tDate.' 11:59:58' ;                           
                       }                                                   
                $data['staff_timeList'] =$tt= $this->cm->get_data('staff_timecard_tbl',$whr);
                // echo "<pre>"; print_r($tt); die();                                     
           }
           
          // $q = "SELECT a.user_id ,b.name  FROM staff_tbl as a join user_tbl as b on a.user_id = b.user_id and a.status = '1' where a.branch_id = '$branch_id' ";
           $q = "SELECT a.user_id ,b.name  FROM staff_tbl as a join user_tbl as b on a.user_id = b.user_id  
                        where a.branch_id = '$branch_id' ";
                
            $data['staff_list'] = $tt =  $this->db->query($q)->result();
          
           $data['class_list'] = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id]);
           
            $this->load->view('staff_timecards',$data);
       }
                                                                               
     public function staff_add_timecard()                          
       {   
           $branch_id =  $this->session->userdata('branch_id');   
        // $q = "SELECT a.user_id ,b.name  FROM staff_tbl as a join user_tbl as b on a.user_id = b.user_id and a.status = '1' and b.branch_id = '$branch_id' ";
         $q = "SELECT a.user_id ,b.name  FROM staff_tbl as a join user_tbl as b on a.user_id = b.user_id  and b.branch_id = '$branch_id' ";
              
            $data['staff_list'] = $tt =  $this->db->query($q)->result();
          
           $data['class_list']  = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id]);
    
            $this->load->view('staff_add_timecard',$data);
       }                     
                                          
     public function add_timecard(){
        $staff_id   = $this->input->post('staff_id'); 
        $class_id   = $this->input->post('class_id'); 
        $section_id = $this->input->post('section_id');                                 
        $timein     = $this->input->post('timein'); 
        $timeout    = $this->input->post('timeout'); 
       $arr = [];
                                   
       if(empty($staff_id))
        {       $this->session->set_flashdata('error_msg', 'please Select staff');
              $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);                     
        }
        
      if(empty($class_id) || empty($section_id) || empty($timein) || empty($timeout))
        { 
           $this->session->set_flashdata('error_msg', 'All field Required');
              $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server); 
        }
       for($i=0 ; $i< count($class_id); $i++){
            $ad_time = $this->cm->getTimes($timein[$i],$timeout[$i]);
            $days = $this->cm->get_days($timein[$i],$timeout[$i]);                                     
                                       
        // `staff_timecard_tbl`(`id`, `staff_id`, `in_time`, `out_time`, `days`, `time`, `date`class_id section_id   
     $in_time_1 = $timein[$i];   $timeout_1 = $timeout[$i];  $class_id_1 = $class_id[$i];  $section_id_1 = $section_id[$i];
    
     if(!empty($in_time_1) &&  !empty($timeout_1) &&  !empty($class_id_1) &&  !empty($section_id))
        {      
            $arr[] = $this->cm->save('staff_timecard_tbl',['staff_id' =>$staff_id ,'in_time' =>$in_time_1,'out_time' =>$timeout_1,
                        'class_id' =>$class_id_1,'section_id' =>$section_id_1,'time' =>$ad_time,'days' =>$days] );
                   
        }
        
              
       }
      // echo "<pre>"; print_r($dx); die();   
       if($arr)
        {
            $this->session->set_flashdata('success_msg', 'data add successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Data note add..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
        
  }                                                   
  
     public function schedule(){
          $branch_id  =  $this->session->userdata('branch_id');
         $user_id   =  $this->session->userdata('user_id');
      
        $res = $this->cm->get_data('staff_schedule_tbl',['branch_id'=>$branch_id,'staff_id'=>$user_id]);
              foreach($res as  $val){
               $val->start = $val->start_date;
            }   
            
         $data['class_list'] = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id ]);     
         $data['event_list'] = json_encode($res);     
            
         $this->load->view('schedule',$data);
     }
  
   public function add_schedule(){
       $title = $this->input->post('title');
       $date  = $this->input->post('date');
      if(empty($title)|| empty($date)){
           $dataTosend = ['status'=>false,'msg'=>"All filed required",'body'=>''];
                      echo json_encode($dataTosend); die();  
      }
     
         $branch_id  =  $this->session->userdata('branch_id');
         $user_id   =  $this->session->userdata('user_id');
      
              $res = $this->cm->save('staff_schedule_tbl',['title'=>$title,'start_date'=>$date,
                            'branch_id'=>$branch_id,'staff_id'=>$user_id]);
             if($res){                      
                         $dataTosend = ['status'=>true,'msg'=>"Success",'body'=>''];
                      echo json_encode($dataTosend); die();  
                 }else{
                    $dataTosend = ['status'=>false,'msg'=>"Not addd",'body'=>''];
                      echo json_encode($dataTosend); die();   
                 }                     
         
     }
  
  public function  delete_schedule(){
       $id = $this->input->post('id');
       
        $res = $this->cm->delete('staff_schedule_tbl',['ss_id'=>$id]);
            
             if($res){                      
                        $dataTosend = ['status'=>true,'msg'=>"Success",'body'=>''];
                         echo json_encode($dataTosend); die();  
                 }else{
                    $dataTosend = ['status'=>false,'msg'=>"Not deleted",'body'=>''];
                      echo json_encode($dataTosend); die();   
                 }   
  
      
  }
  
  
     
     
}
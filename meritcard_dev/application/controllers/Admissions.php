<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admissions extends CI_Controller {

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
        
    //    $dx = $this->input->get() ;
       // echo "<pre>"; print_r($dx); die();                        
 
   $sums = "SELECT school_status, COUNT(school_status) AS count FROM temp_student_tbl  WHERE is_delete != '1' and branch_id = '$branch_id' GROUP BY school_status";
        $res = $this->db->query($sums)->result(); 
        $arr = array(); 
        foreach($res as $val){
            $arr[$val->school_status] = $val->count;
        }
  $data['temp_count'] = $arr;                            
  
   $U_ID = $this->uri->segment(3); $whr = '';
   if(!empty($U_ID)){$whr = "and temp_s_id = '$U_ID' " ; }
   
  //  [user_id] => 3 , [progtram_id] => 8, [status] => Waitlist ,[Fdate] => 2022-03-18 , [Tdate] => 2022-03-08
  //  [min_age] => 6 mo [Max_age] => 9 mo
      $user_id      = $this->input->get('user_id') ;
      $progtram_id  = $this->input->get('progtram_id') ;
      $status       = $this->input->get('status') ;
      $Fdate        = $this->input->get('Fdate') ;
      $Tdate        = $this->input->get('Tdate') ;
      $min_age      = $this->input->get('min_age') ;
      $Max_age      = $this->input->get('Max_age') ;
      
     if($user_id){ $whr .= "and a.temp_s_id = '$user_id' ";  }
     if($progtram_id){ $whr .= "or a.program_id = '$progtram_id' ";  }
     if($status){      $whr .= "or a.school_status = '$status' ";  }
     if($min_age){      $whr .= "or b.min_age = '$min_age' ";  }
     if($Max_age){      $whr .= "or b.max_age = '$Max_age' ";  }
     
                              
     if($Fdate){     $whr .= "and a.date >= '$Fdate' ";  }                
     if($Tdate){     $whr .= "and a.date >= '$Tdate' ";  }
                                              
    $q = "SELECT a.*,b.name as class_name,b.min_age,b.max_age FROM `temp_student_tbl` as a join programs_tbl as b on a.program_id = b.program_id and
            a.branch_id = b.branch_id WHERE a.is_delete != '1' and  a.branch_id = '$branch_id'   $whr order by a.temp_s_id desc";        
       $list_data = $this->db->query($q)->result(); 
                    foreach($list_data as $val){
                        $val->btn_show  = $this->cm->count_row('massages_tbl',['student_id'=> $val->temp_s_id ]);
                                                         
                    }
             $data['list']= $list_data;
        //   echo "<pre>"; print_r($list_data) ; die();         
                                              
         $data['s_name'] = isset($list_data[0]->student_name)? $list_data[0]->student_name : '' ;    
        $data['total_students'] = $this->cm->count_row('temp_student_tbl',['branch_id'=>$branch_id ,'is_delete !='=>1]);
        $data['programs_list']  = $this->cm->get_data('programs_tbl',['branch_id'=>$branch_id]);
  
                                                              
     $this->load->view('admissions',$data);
 }
      
  public function admissions_from_requests(){                         
       $branch_id =  $this->session->userdata('branch_id');
      $data = array();  
      $fType = $this->input->get('fType');
            $whr = empty($fType)? ['branch_id'=>$branch_id]: ['branch_id'=>$branch_id, 'form_type' =>$fType];
         $data['form_list']=$td = $this->cm->get_data_orderBy('all_form_tbl',$whr,'form_id desc');
   
      
        $this->load->view('admissions_from_requests',$data);
     }                          
                                                                   
    public function addmission_waitlists(){
      $data = array();  
      $branch_id =  $this->session->userdata('branch_id');
        
       $U_ID = $this->uri->segment(3); $whr = '';
   if(!empty($U_ID)){$whr = "and temp_s_id = '$U_ID' " ; }
   
        $user_id      = $this->input->get('user_id') ;
      $progtram_id  = $this->input->get('progtram_id') ;
   
      $min_age      = $this->input->get('min_age') ;
      $Max_age      = $this->input->get('Max_age') ;
      
     if($user_id){ $whr .= "and a.temp_s_id = '$user_id' ";  }
     if($progtram_id){ $whr .= "or a.program_id = '$progtram_id' ";  }
     if($min_age){      $whr .= "or b.min_age = '$min_age' ";  }
     if($Max_age){      $whr .= "or b.max_age = '$Max_age' ";  }
     
      $q = "SELECT a.*,b.name as class_name,b.min_age,b.max_age FROM `temp_student_tbl` as a join programs_tbl as b on a.program_id = b.program_id and
            a.branch_id = b.branch_id WHERE a.is_delete != '1' and  a.branch_id = '$branch_id'  and a.school_status = 'Waitlist'  $whr order by a.temp_s_id desc";        
        $data['s_list']=$list_data = $this->db->query($q)->result(); 
                               
      $data['programs_list']  = $this->cm->get_data('programs_tbl',['branch_id'=>$branch_id ]);
        $this->load->view('addmission_waitlists',$data);
     }
     
    public function add_students(){
        $id = $this->uri->segment(3);
        
       $sDtl = $this->cm->get_data('temp_student_tbl',['temp_s_id'=>$id]);
       $res = ''; 
       
            //   if($sDtl){
            //       $res = $this->cm->save('programs_tbl',['branch_id'=>$branch_id,'name'=>$name,'min_age'=>$minage,'max_age'=>$maxage,
            //                             'max_occupancy'=>$capacity,'start_date'=>$start,'end_date'=>$end,'description'=>$description]);
            //       $u_name = $sDtl[0]->student_name;  $u_email = $sDtl[0]->email;$pass = '123';  
                  
            //       $DOB = $sDtl[0]->DOB;
                    
            //           $u_id = $this->cm->save('user_tbl',['name'=> $u_name,'password'=>$pass,'roll'=>'4','email'=>$u_email]);
            //             $sum[] = $this->cm->save('student_tbl',['section_id'=> $room_id,'class_id'=>$class_id,'branch_id'=>$branch_id,'user_id'=>$u_id]);
            //         }
              
      
      
             if($res)
                {
                    $this->session->set_flashdata('success_msg','Student enrolled Successfully' );
                    redirect(base_url('Admissions/addmission_waitlists'));die();
                }else{
                       $this->session->set_flashdata('error_msg', 'Student not enrolled Successfully');
                       redirect(base_url('Admissions/addmission_waitlists'));die();
                }
        
    } 
     
     
                                                         
     public function programs(){                        
      $data = array();  
       $branch_id =  $this->session->userdata('branch_id');
        $data['list']= $td = $this->cm->get_data_orderBy('programs_tbl',['branch_id'=>$branch_id ],'program_id asc');
           $this->load->view('programs',$data);
     }                                                      
    
     public function programs_add(){
          $branch_id =  $this->session->userdata('branch_id');
              $data = array();  
              $id = $this->uri->segment(3); 
              $data['pro_data'] = $this->cm->get_data('programs_tbl',['branch_id'=>$branch_id,'program_id'=>$id ]);
        $this->load->view('programs_add',$data);
     }
    
     public function class_add(){
      $data = array();  
      /*            [program_name] => fggfgfgg
                    [capacity] => 554
                    [description] => 56fgdgfgd
                    [minage] => 1
                    [maxage] => 3
                    [start] => 2022-03-09
                    [end] => 2022-03-18
        */
       $name         = $this->input->post('program_name'); 
       $capacity     = $this->input->post('capacity'); 
       $description  = $this->input->post('description'); 
       $minage       = $this->input->post('minage'); 
       $maxage       = $this->input->post('maxage'); 
       $start        = $this->input->post('start'); 
       $end          = $this->input->post('end'); 
       $program_id          = $this->input->post('program_id'); 
        
          $branch_id =  $this->session->userdata('branch_id');
       if(empty($program_id)){
            $res = $this->cm->save('programs_tbl',['branch_id'=>$branch_id,'name'=>$name,'min_age'=>$minage,'max_age'=>$maxage,
                                'max_occupancy'=>$capacity,'start_date'=>$start,'end_date'=>$end,'description'=>$description]);
        $send_msg = 'Program add successfully';
       }else{
            $res = $this->cm->update('programs_tbl',['program_id'=>$program_id],['branch_id'=>$branch_id,'name'=>$name,'min_age'=>$minage,'max_age'=>$maxage,
                                'max_occupancy'=>$capacity,'start_date'=>$start,'end_date'=>$end,'description'=>$description]);
             $send_msg = 'Program Update successfully';
       }
       
           if($res)
                {
                    $this->session->set_flashdata('success_msg',$send_msg );
                    redirect(base_url('Admissions/programs'));die();
                }else{
                       $this->session->set_flashdata('error_msg', 'Program note add..');
                       redirect(base_url('Admissions/programs_add'));die();
                }
       
      // echo "<pre>"; print_r($ftype); die();
        
     }
    
    
    public function addmission_upload_form(){
        
        $id = $this->uri->segment(3);
        $data = array();  
         if($id){
                      $data['fDtl'] = $this->cm->get_data('all_form_tbl',['form_id'=>$id]);
            }
         
         $q = "SELECT * FROM `all_form_tbl` WHERE branch_id = '1' GROUP by form_type";
         
           $data['f_type_list']  = $this->db->query($q)->result();
         
        $this->load->view('addmission_upload_form',$data);
     }                                   
      
      public function add_form_data(){
          $branch_id =  $this->session->userdata('branch_id');
          $ftype = $this->input->post('ftype');                             
          $ftype_new = $this->input->post('ftype_new'); 
          $form_id = $this->input->post('form_id'); 
          $pdf_name = $this->cm->file_upload('pdf', 'assets/forms/'); 
         
          $ftype = ($ftype == 'Other')? $ftype_new : $ftype ; 
             
             $whrs = (empty($form_id))? ['form_type'=>$ftype,'branch_id'=>$branch_id] : ['form_type'=>$ftype,'branch_id'=>$branch_id, 'form_id !='=>$form_id];
                                              
          $check_row = $this->cm->count_row('all_form_tbl',$whrs ); 
         if($check_row){
             
              $this->session->set_flashdata('error_msg', 'This Type Form already exists');
                     redirect(base_url('Admissions/addmission_upload_form'));die();
             
                                                                                  
         }
          
          
         if(empty($form_id)){
                     if(empty($ftype) || empty($pdf_name)){
                         $this->session->set_flashdata('error_msg', 'All Field Required !..');
                     redirect(base_url('Admissions/addmission_upload_form'));die(); 
                     }
         $res = $this->cm->save('all_form_tbl',['form_type'=>$ftype,'pdf_path'=>$pdf_name,'branch_id'=>$branch_id,
                'date'=>date('Y-m-d')]);
         
              if($res)
                {
                    $this->session->set_flashdata('success_msg', 'Form add successfully');
                    redirect(base_url('Admissions/admissions_from_requests'));die();
                }else{
                    $this->session->set_flashdata('error_msg', 'Form note add..');
                     redirect(base_url('Admissions/addmission_upload_form'));die();
                }
             
         }else{
             
             $whr = ($pdf_name)? ['form_type'=>$ftype,'pdf_path'=>$pdf_name] : ['form_type'=>$ftype] ;
             $res2 = $this->cm->update('all_form_tbl',['form_id'=>$form_id],$whr);
              if($res2)
                {
                    $this->session->set_flashdata('success_msg', 'Form Update successfully');
                    redirect(base_url('Admissions/admissions_from_requests'));die();
                }else{
                    $this->session->set_flashdata('error_msg', 'Form note Update..');
                     redirect(base_url('Admissions/addmission_upload_form'));die();
                }
         }
       
       
        
            
     }
     public function Delete_form_data(){
          $branch_id =  $this->session->userdata('branch_id');
          $id = $this->input->post(); 
          
        echo "<pre>"; print_r($id); die(); 
        
        $res = $this->cm->delete('all_form_tbl',['form_id'=>$id]);
            
        if($res)
        {
            $this->session->set_flashdata('success_msg', 'Form add successfully');
            redirect(base_url('Admissions/admissions_from_requests'));die();
        }else{
            $this->session->set_flashdata('error_msg', 'Form note add..');
             redirect(base_url('Admissions/addmission_upload_form'));die();
        }
       
        
            
     }
      
    public function addmission_add_student(){
            $branch_id =  $this->session->userdata('branch_id');
            $data = array(); 
            $data['list']= $td = $this->cm->get_data_orderBy('programs_tbl',['branch_id'=>$branch_id ],'program_id asc');
           
            $this->load->view('addmission_add_student',$data); 
   
    }  
      
    public function temp_student_add(){
         $branch_id =  $this->session->userdata('branch_id');
         
         $s_status= $this->input->post('s_status');     $s_fname  = $this->input->post('s_fname');
         $s_lname = $this->input->post('s_lname');      $class_id = $this->input->post('class_id');
         $DOB   = $this->input->post('DOB');            $p_fname  = $this->input->post('p_fname');
         $p_lname = $this->input->post('p_lname');      $email    = $this->input->post('email');
         $mobile  = $this->input->post('mobile');       $age      = $this->input->post('age'); 
         $date = date('Y-m-d');
       if(empty($s_status) || empty($s_fname) ||  empty($s_lname) ||  empty($class_id) || empty($DOB) ||
            empty($p_fname) || empty($p_lname) || empty($email) || empty($mobile) ){
              $this->session->set_flashdata('error_msg', 'All Field Required');
               redirect(base_url('Admissions/addmission_add_student'));die(); 
         }
          /// INSERT INTO `temp_student_tbl`(`temp_s_id`, `student_name`, `program_id`, `parent_name`, `email`, `mobile`, `DOB`, `age`, `school_status`, `date`)  
         $add = ['student_name'=>$s_fname.' '. $s_lname,'program_id'=>$class_id,'parent_name'=>$p_fname.' '. $p_lname,
                  'email'=>$email, 'mobile'=>$mobile,'DOB'=>$DOB,'age'=>$age,'school_status'=>$s_status,
                'branch_id'=>$branch_id,'date'=> $date ];
         
                 $data = array(); 
             $res = $this->cm->save('temp_student_tbl',$add);
          
        if($res)
        {
            $this->session->set_flashdata('success_msg', 'Student add successfully');
            redirect(base_url('Admissions'));die();
        }else{
            $this->session->set_flashdata('error_msg', 'Student note add..');
             redirect(base_url('Admissions/addmission_add_student'));die();
        }
       
   
    }  
      
                                
      public function update_school_status(){
        
         $s_status= $this->input->post('s_status');     $temp_s_id  = $this->input->post('id');
         $res = $this->cm->update('temp_student_tbl',['temp_s_id'=>$temp_s_id],['school_status'=>$s_status]);
       
       if($res)
      {  
           $dataTosend = ['status'=>true, 'msg' => 'success','body'=> ''];
               echo json_encode($dataTosend); die();
      }else{
             $dataTosend = ['status'=>false, 'msg' => 'No data Found!..','body'=>''];
               echo json_encode($dataTosend);die();
          }                        
                                      
      
      
      } 
      
      
     public function search_student(){
      $branch_id =  $this->session->userdata('branch_id');	
       $branch_id = ($branch_id)? $branch_id : 101;
       $name = $this->input->post('name');
       $q = " SELECT temp_s_id as user_id, student_name as name  FROM `temp_student_tbl` WHERE branch_id = '$branch_id' and student_name LIKE '$name%'  LIMIT 5";
        $res = $this->db->query($q)->result();                            
                                  
            if($res)
              {  
                   $dataTosend = ['status'=>true, 'msg' => 'success','body'=> $res];
                       echo json_encode($dataTosend); die();
              }else{
                     $dataTosend = ['status'=>false, 'msg' => 'No data Found!..','body'=>''];
                       echo json_encode($dataTosend);die();
                  }                        
        
    }       
                           
    
    
      public function message_new(){
          $S_id = $this->input->get('student_id'); 
          $S_ids = $this->input->get('student_ids');                     
                                                                                              
                  //   echo "jk == <pre>"; print_r($S_ids); die(); 
          
            $branch_id =  $this->session->userdata('branch_id');
                                                            
        $data = []; $names = $idss =  array();
        if($S_ids){
                                                      
            $q = "select * from temp_student_tbl where temp_s_id in( $S_ids) and branch_id = '$branch_id' ";
                $dx  = $this->db->query($q)->result();
               foreach($dx as $val){ $names[] = $val->student_name; $idss[] = $val->temp_s_id;   }
                                
        }else{
          $dx= $this->cm->get_data('temp_student_tbl',['temp_s_id'=>$S_id,'branch_id'=>$branch_id]);
         foreach($dx as $val){ $names[] = $val->student_name; $idss[] = $val->temp_s_id;   }
        }
        
        $data['sNames'] = implode(',', $names); 
        $data['sIds']   = implode(',', $idss);  
        $this->load->view('message_new',$data);
                          
     
      }
      
        public function addMessage(){                                 
          $s_id = $this->input->post('s_ids'); 
          $msg  = $this->input->post('msg'); 
           
        if(empty($s_id) || empty($msg) ){
              $this->session->set_flashdata('error_msg', 'All Field Required');
               redirect(base_url('Admissions/addmission_add_student'));die(); 
         }
         
            $student_ids = explode(',',$s_id);
            
         
             $date = date('Y-m-d');
             $time = date('h:i');
              $img  = '';
             
              $img_name = $this->cm->file_types('image');
            if($img_name){ $img  = $this->cm->file_upload('image','assets/message_img/') ; }
             
             foreach($student_ids as $val){
             $res  = $this->cm->save('massages_tbl',['massage'=>$msg,'student_id'=>$val ,'file_type'=>$img_name,'document_attached'=>$img,'date'=> $date ]);
             }
    
     if($res)
        {
            $this->session->set_flashdata('success_msg', 'data add successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Data note add..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
       
          
       }
       
     public function delete_student(){
           $id = $this->uri->segment(3);
        
        $res = $this->cm->update('temp_student_tbl',['temp_s_id'=>$id],['is_delete'=>1]);
     
      if($res)                            
        {  $this->session->set_flashdata('success_msg', 'student deleted successfully');
         }else{ 
                $this->session->set_flashdata('error_msg', 'something went wrong please try again..');
             }
        
         $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
     }
      
    public function chatbot(){
         $id = $this->uri->segment(3);
        $q = "SELECT a.message_id,a.time ,a.student_id, b.student_name,a.massage,a.sender_type,a.date FROM `massages_tbl` as a join temp_student_tbl as b on a.student_id = b.temp_s_id WHERE a.student_id = '$id' and a.is_delete != '1'";
      
          $res = $this->db->query($q)->result();
        
        $this->load->view('tempSchatbot',['chat_data'=>$res]);  
        
    }      
      
      
      
      
          
}
      
      
      
      
      
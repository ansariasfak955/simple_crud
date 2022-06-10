<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

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
      $user_id = $this->input->get('user_id');
      $class_id = $this->input->get('class_id');
      $section_id = $this->input->get('section_id');
      $whr = '';                                              
      if(!empty($user_id)){                            
          $whr .= "and a.user_id ='$user_id'";
      }                           
                                                                                 
      if( !empty($class_id)){
            $whr.= "and a.class_id ='$class_id'";
      }                
                                           
      if( !empty($section_id)){
            $whr .= "and a.section_id ='$section_id'";
      }
    
      
    $branch_id =  $this->session->userdata('branch_id');
     /*$q = "SELECT  b.user_id,b.name,b.mobile,b.address,b.email FROM `student_tbl` as a join user_tbl as b on a.user_id = b.user_id 
            where a.branch_id = '$branch_id'    $whr "; */
    
    $q = "SELECT b.user_id,b.name,b.address,b.email FROM `student_tbl` as a 
            join user_tbl as b on a.user_id = b.user_id  where a.branch_id = '$branch_id'  $whr ";                                                              
    $rows =  $this->db->query($q)->result(); 
     foreach($rows as $val)
     {
         $val->mobile = $this->cm->count_row('parents_tbl',['student_id'=> $val->user_id]);
     }
     
     // echo $q; die();                        
    
     $data = array();
     $data['s_list'] = $rows;
     
     
     
     
     $data['class_list'] = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id]);
     
    $this->load->view("student",$data);
 }
                            
 public function parents(){
     
      $user_id    = $this->input->get('user_id');
      $class_id   = $this->input->get('class_id');
      $section_id = $this->input->get('section_id');
      $whr = '';                                              
      if(!empty($user_id)){                            
          $whr .= "and a.user_id ='$user_id'";
      }                           
                                                                                 
      if( !empty($class_id)){
            $whr.= "and a.class_id ='$class_id'";
      }                
                                           
      if( !empty($section_id)){
            $whr .= "and a.section_id ='$section_id'";
      }
     
      
    $branch_id =  $this->session->userdata('branch_id');
  
   $q = "select  b.user_id,b.name,b.mobile,b.address,b.email from student_tbl as a join user_tbl as b on a.user_id = b.user_id 
                where a.branch_id ='$branch_id' $whr  " ;
        $res = $this->db->query($q)->result();
                            
     $arr = $job = array(); 
     
     foreach($res as $val){
       $arr['user_id'] = $id = $val->user_id;
       $arr['name']    =  $val->name;
       $arr['mobile']  =  $val->mobile;
       $arr['address'] =  $val->address;
       $arr['email']   =  $val->email;
       
       $qq = "select coalesce(p.guardian_id,'') as parent_id ,coalesce(p_tbl.email,'') as p_email ,coalesce(p_tbl.mobile,'') 
                as p_mobile,coalesce(p_tbl.image,'') as parent_image,coalesce(p_tbl.name,'') as parent_name,p.student_relational
                from parents_tbl as p   join user_tbl as p_tbl on p.guardian_id = p_tbl.user_id 
                where p.student_id = '$id' and p.student_relational = 'Parent'  ";
        $arr['data']   =  $this->db->query($qq)->result();
       $job[] = (object)$arr;  
     }
   
     $data['p_list'] = $job; 
     
       $data['class_list'] = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id]); 
      $this->load->view("parent_index",$data);
 }
 
 
                             
 public function add_student(){
       $branch_id =  $this->session->userdata('branch_id');
       
       $data['class_list'] = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id]);
     $this->load->view("add_student",$data);
 }
 
  public function bulk_add_student(){
     
       $dx = $this->input->post();
       
       $class_id = $this->input->post('class_id');
       $room_id  = $this->input->post('room_id');
       $fname    = $this->input->post('fname');
       $lname    = $this->input->post('lname');
       $email    = $this->input->post('email');
        $branch_id =  $this->session->userdata('branch_id');	
       $branch_id = ($branch_id)? $branch_id : 101;
         // echo "<pre>"; print_r($dx); die();
         
      if(empty($class_id) ||empty($room_id) ||empty($fname) ||empty($lname) ||empty($email) ){
          $dataTosend = ['status'=>false,'msg'=>'All Field Required','body'=>''];
                echo json_encode($dataTosend); die(); 
        }   
     $pass = 123; $sum = array(); 
      for($i=0; $i< count($email); $i++)
      {
          $u_name    = $fname[$i].' '.$lname[$i];
          $u_email = $email[$i];  $u_fname = $fname[$i];  $u_lname = $lname[$i];
          if(!empty($u_email) && !empty($u_fname) && !empty($u_lname)){
                  $u_id = $this->cm->save('user_tbl',['name'=> $u_name,'password'=>$pass,'roll'=>'4','email'=>$u_email]);
                $sum[] = $this->cm->save('student_tbl',['section_id'=> $room_id,'class_id'=>$class_id,'branch_id'=>$branch_id,'user_id'=>$u_id]);
              }
      }
          if($sum)
                  {  
                       $dataTosend = ['status'=>true, 'msg' => 'data insert successfully','body'=> count($sum)];
                           echo json_encode($dataTosend); die();
                  }else{
                         $dataTosend = ['status'=>false, 'msg' => 'data not inserted','body'=>''];
                           echo json_encode($dataTosend);die();
                      }
 }                           
 
    public function search_student(){
      $branch_id =  $this->session->userdata('branch_id');	
       $branch_id = ($branch_id)? $branch_id : 101;
       $name = $this->input->post('name');
       $q = " SELECT a.user_id,b.name  FROM `student_tbl` as a  join user_tbl as b on a.user_id = b.user_id  WHERE  a.branch_id = '$branch_id' and b.name LIKE '$name%'  LIMIT 5";
       
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
 
        public function bulk_upload_students(){
            date_default_timezone_set('Asia/Kolkata');
				 $date 	  = date('Y-m-d');
				 
             $file_my = $_FILES['image'];  
     
             $dd = $_FILES['image']['name'];
             $dx =   explode(".", $dd);
             $file_xt_name = (count($dx)>0)? $dx[1] : "";
                                                                      
            // echo "sk == ". $file_xt_name; die();
             
            if( $file_xt_name == 'csv' ||  $file_xt_name == 'CSV' ) 
             {
                 $csvFile = fopen($_FILES['image']['tmp_name'], 'r');
              // Skip the first line
            fgetcsv($csvFile);
            
                                   
          // echo "<pre>"; print_r(fgetcsv($csvFile));  die();       
                                                                               
                                                                                  
                                
            // Parse data from CSV file line by line
          $arr = array();
          $row_count = 0; $error = false;
          ini_set('memory_limit', '-1');
            while(($line = fgetcsv($csvFile)) !== FALSE){
              $row_count++;
              
                      
          
           $branch_id =  $this->session->userdata('branch_id');	
         //  $branch_id = ($branch_id)? $branch_id : 101;
                                                                            
           $u_name     = trim($line[0]).' '.trim($line[1]);
           $u_email    = $line[2];         
           $pass       = $line[3];         
           $class_id   = $line[4];
           $room_id    = $line[5];                                 
            $u_fname   = trim($line[0]);                                              
            $u_lname   = trim($line[1]);                                              
        
        if(!empty($u_email) && !empty($u_fname) && !empty($u_lname)  && !empty($pass)  && !empty($class_id)  && !empty($room_id)  ){
              $u_id = $this->cm->save('user_tbl',['name'=> $u_name,'password'=>$pass,'roll'=>'4','email'=>$u_email]);
         
             $arr[] = $this->cm->save('student_tbl',['section_id'=> $room_id,'class_id'=>$class_id,'branch_id'=>$branch_id,'user_id'=>$u_id]);
             }
                                                                                
                      
            }                                                  
                                          
            // Close opened CSV file
            fclose($csvFile);
                    
                    
                  if($error)    
                   {
                      
                    $dataTosend = ['status'=>false, 'msg' =>'Invalid File Formet Row','body'=>''];
                      echo json_encode($dataTosend); die(); 
                   }
                         
                         
               if($arr)    
                {   
                    $dataTosend = ['status'=>true, 'msg' =>'File Data Inserted Successfully','body'=>$arr,'all_row'=>$row_count];
                      echo json_encode($dataTosend); die();       
                  }else{
                         $dataTosend = ['status'=>false, 'msg' =>'File Data Not inserted, please check the updated file! ','body'=>$arr,'all_row'=>$row_count];
                      echo json_encode($dataTosend); die();
                     }
             }else{
                    $dataTosend = ['status'=>false, 'msg' =>'Invalid File formet','body'=>''];
                      echo json_encode($dataTosend); die();  
                     
                    } 
            
             
         }  
                         
     public function download_students(){
           $class_id = $this->uri->segment(3);
         $section_id = $this->uri->segment(4);
          
       //  echo $class_id.'  jk  '.$section_id; die();
         $whr = '';                                          
       if( !empty($class_id)){                                                       
            $whr.= "and a.class_id ='$class_id'";
      }                
                                           
      if( !empty($section_id)){
            $whr .= "and a.section_id ='$section_id'";
      }                                                             
      
      
    $branch_id =  $this->session->userdata('branch_id');
    /*$q = "SELECT b.name,b.email,b.mobile,b.address FROM `student_tbl` as a join user_tbl as b on a.user_id = b.user_id 
            where a.branch_id = '$branch_id'    $whr "; */
   
     $q = "SELECT b.user_id,b.name,b.address,b.email FROM `student_tbl` as a 
            join user_tbl as b on a.user_id = b.user_id  where a.branch_id = '$branch_id'  $whr ";                                                              
    
        $res =  $this->db->query($q)->result();    
          foreach($res as $val)
             {
                 $val->mobile = $this->cm->count_row('parents_tbl',['student_id'=> $val->user_id]);
             }                                                            
              //echo $q; die();                        
            
        if($res){  
                   $delimiter = ","; 
                    $filename = "members-data_" . date('Y-m-d') . ".csv"; 
                     $f = fopen('php://memory', 'w'); 
     
                    // Set column headers 
                    $fields = array('Student Name', 'Email', 'Address','Contact'); 
                    fputcsv($f, $fields, $delimiter); 
                    
                foreach($res as $row){                                                               
                     $lineData = array($row->name , $row->email,$row->address,$row->mobile ); 
                         fputcsv($f, $lineData, $delimiter); 
                }                                                      
                    
                     // Move back to beginning of file 
                            fseek($f, 0); 
                             
                            // Set headers to download file rather than displayed 
                            header('Content-Type: text/csv'); 
                            header('Content-Disposition: attachment; filename="' . $filename . '";'); 
                             
                            //output all remaining data on a file pointer 
                            fpassthru($f);  
            
        }else{ ?>
            <script>
                alert('No data found!..');
                
                window.location.back();
            </script>
         <?php }
         
         
         
         
     }   
  
   public function family(){                        
        $user_id = $this->input->get('user_id');
      $class_id = $this->input->get('class_id');
      $section_id = $this->input->get('section_id');
      $whr = '';                                              
      if(!empty($user_id)){                            
          $whr .= "and a.user_id ='$user_id'";
      }                            
                                                                                 
      if( !empty($class_id)){
            $whr.= "and a.class_id ='$class_id'";
      }                
                                           
      if( !empty($section_id)){
            $whr .= "and a.section_id ='$section_id'";
      }
     
      
    $branch_id =  $this->session->userdata('branch_id');
                                                       
     $q = "select  b.user_id,b.name,b.mobile,b.address,b.email from student_tbl as a join user_tbl as b on a.user_id = b.user_id 
                where a.branch_id ='$branch_id' $whr  " ;
        $res = $this->db->query($q)->result();
                            
     $arr = $job = array(); 
     
     foreach($res as $val){
       $arr['user_id'] = $id = $val->user_id;
       $arr['name']    =  $val->name;
       $arr['mobile']  =  $val->mobile;
       $arr['address'] =  $val->address;
       $arr['email']   =  $val->email;
       
       $qq = "select coalesce(p.guardian_id,'') as parent_id ,coalesce(p_tbl.email,'') as p_email ,coalesce(p_tbl.mobile,'') 
                as p_mobile,coalesce(p_tbl.image,'') as parent_image,coalesce(p_tbl.name,'') as parent_name,p.student_relational
                from parents_tbl as p   join user_tbl as p_tbl on p.guardian_id = p_tbl.user_id 
                where p.student_id = '$id' and p.student_relational = 'Family'  ";
        $arr['data']   =  $this->db->query($qq)->result();
       $job[] = (object)$arr;  
     }
    
       $data['p_list'] = $job; 
      
    $data['class_list'] = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id]);  
      $this->load->view('family',$data);                                               
     }                                                        
     public function approved_pickups(){                        
          $user_id = $this->input->get('user_id');
      $class_id = $this->input->get('class_id');
      $section_id = $this->input->get('section_id');
      $whr = '';                                              
      if(!empty($user_id)){                            
          $whr .= "and a.user_id ='$user_id'";
      }else{                             
                                                                                 
      if( !empty($class_id)){
            $whr.= "and a.class_id ='$class_id'";
      }                
                                           
      if( !empty($section_id)){
            $whr .= "and a.section_id ='$section_id'";
      }
      }
      
    $branch_id =  $this->session->userdata('branch_id');
    //  $q = "SELECT  coalesce(p.guardian_id,'') as parent_id ,p_tbl.name as parent_name,p_tbl.image as parent_image, b.user_id,b.name,b.mobile,b.address,b.email FROM `student_tbl` as a join user_tbl as b on a.user_id = b.user_id  left join parents_tbl as p on a.user_id = p.student_id left join user_tbl as p_tbl on p.guardian_id = p_tbl.user_id
    //         where a.branch_id = '$branch_id'    $whr "; 
      /*$q = "SELECT  coalesce(p.guardian_id,'') as parent_id ,coalesce(p_tbl.email,'') as p_email ,coalesce(p_tbl.mobile,'') as 
                p_mobile,coalesce(p_tbl.image,'') as parent_image,coalesce(p_tbl.name,'') as parent_name , b.user_id,b.name,
                b.mobile,b.address,b.email FROM `student_tbl` as a join user_tbl as b on a.user_id = b.user_id  left join
                parents_tbl as p on a.user_id = p.student_id  and p.student_relational = 'Approved Pickup'   left join user_tbl as p_tbl on p.guardian_id = p_tbl.user_id
                 where a.branch_id ='$branch_id'    $whr "; */
       
      $q = "select  b.user_id,b.name,b.mobile,b.address,b.email from student_tbl as a join user_tbl as b on a.user_id = b.user_id 
                where a.branch_id ='$branch_id' $whr  " ;
        $res = $this->db->query($q)->result();
                            
     $arr = $job = array(); 
     
     foreach($res as $val){
       $arr['user_id'] = $id = $val->user_id;
       $arr['name']    =  $val->name;
       $arr['mobile']  =  $val->mobile;
       $arr['address'] =  $val->address;
       $arr['email']   =  $val->email;
       
       $qq = "select coalesce(p.guardian_id,'') as parent_id ,coalesce(p_tbl.email,'') as p_email ,coalesce(p_tbl.mobile,'') 
                as p_mobile,coalesce(p_tbl.image,'') as parent_image,coalesce(p_tbl.name,'') as parent_name,p.student_relational
                from parents_tbl as p   join user_tbl as p_tbl on p.guardian_id = p_tbl.user_id 
                where p.student_id = '$id' and p.student_relational = 'Approved Pickup'  ";
        $arr['data']   =  $this->db->query($qq)->result();
       $job[] = (object)$arr;  
     }  
       
       
                                                                  
      //echo $q; die();  
     $data['p_list'] = $this->db->query($q)->result(); 
     
      $data['p_list'] = $job ; 
     
     $data['class_list'] = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id]);  
      
        $this->load->view('approved_pickups',$data);                                            
     }
     
     
    public function student_profile(){                        
        
        $s_id = $this->uri->segment(3); 
            
        $data =array();
        
        $data['user_tbl'] = $this->cm->get_data('user_tbl',['user_id'=>$s_id]);
        $data['student_tbl'] = $this->cm->get_data('student_tbl',['user_id'=>$s_id]);
             
         $branch_id =  $this->session->userdata('branch_id');
       
        $data['class_list'] = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id]); 
        $q = "SELECT a.* , b.name,b.email,b.address,b.mobile,b.image  FROM `parents_tbl` as a join user_tbl as b on a.guardian_id = b.user_id  WHERE a.student_id = '$s_id'";
        $data['parents_tbl'] = $this->db->query($q)->result(); 
         $this->load->view('student_profile',$data);    
    }
    
    
    public function s_update_info_1(){                               
       $s_id = $this->uri->segment(3); 
      //  echo "<pre>"; print_r($dx); 
             $name        = $this->input->post('name');
             $age         = $this->input->post('age');
             $dob         = $this->input->post('dob');
             $gender      = $this->input->post('gender');
             $race        = $this->input->post('race');
             $ethnicity   = $this->input->post('ethnicity');
             $allergies   = $this->input->post('allergies');
             $notes       = $this->input->post('notes');
             $medications = $this->input->post('medications');
             $doctor      = $this->input->post('doctor');
            $date = date('Y-m-d'); 
       $age = ($dob)? $this->cm->get_years($date,$dob):'0';  
       
         $res = $this->cm->update('student_tbl',['user_id'=>$s_id],['ethnicity'=>$ethnicity,'allergies'=>$allergies,
                              'notes'=>$notes,'medications'=>$medications,'doctor'=>$doctor,'race'=>$race]);
         $res_2 = $this->cm->update('user_tbl',['user_id'=>$s_id],['age'=>$age,'DOB'=>$dob,'gender'=>$gender,'name'=>$name ]);
        if($res || $res_2)
        {
            $this->session->set_flashdata('success_msg', 'data update successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Data note update..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
        
    }
    public function s_update_info_2(){                               
       $s_id = $this->uri->segment(3); 
      //  echo "<pre>"; print_r($dx); 
             $address        = $this->input->post('address');
           
        
         $res = $this->cm->update('user_tbl',['user_id'=>$s_id],['address'=>$address ]);
        if($res)
        {
            $this->session->set_flashdata('success_msg', 'data update successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Data note update..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
        
    }
    public function s_update_info_3(){                               
       $s_id = $this->uri->segment(3); 
           /* $dx        = $this->input->post();
            echo "<pre>"; print_r($dx); */
              
             $F_income        = $this->input->post('F_income');                                     
             $subsidy         = $this->input->post('subsidy');
             $SubsidyDetails  = $this->input->post('SubsidyDetails');
                                 
         $res = $this->cm->update('student_tbl',['user_id'=>$s_id],['family_income'=>$F_income,'subsidy'=>$subsidy,'subsidy_details'=>$SubsidyDetails ]);
        if($res)
        {
            $this->session->set_flashdata('success_msg', 'data update successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Data note update..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
        
    }
    public function s_update_info_4(){                               
       $s_id = $this->uri->segment(3); 
           /* $dx        = $this->input->post();
            echo "<pre>"; print_r($dx); */
              
             $class_id        = $this->input->post('class_id');                                     
             $section_id         = $this->input->post('section_id');
                                                                                                                             
                                                                                                                                     
         $res = $this->cm->update('student_tbl',['user_id'=>$s_id],['class_id'=>$class_id,'section_id'=>$section_id]);
       //  $res_2 = $this->cm->update('user_tbl', ['user_id'=>$s_id],['class_id'=>$class_id,'section_id'=>$section_id]);
        
      if($res )
        {
            $this->session->set_flashdata('success_msg', 'data update successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Data note update..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
        
    }
 
    public function student_feed(){                                   
         $s_id = $this->uri->segment(3);  
         $f_date = $this->input->get('f_date');
         $l_date = $this->input->get('l_date');
         $job= array();
      if(!empty($f_date) && !empty($l_date)){
           //echo $f_date.'  ==jk==  '.$l_date;   die();   
        
        $res = $this->cm->get_data('activity_tbl',['date>='=>$f_date,'date<='=>$l_date ]);    
            $arr =  array();
        foreach($res as $val){                                   
            $arr['cat_name'] = $val->title;                                                           
           
            $arr['data'] =   $res = $this->cm->get_user_Activitys($s_id,$val->activity_id);
            if($arr['data'] ){
                $job[]= $arr;
             }
        }    
                                                                                                                       
                                                                                                                          
        //echo "<pre>"; print_r($res); die();   
          
           
        }                                                                                            
     $this->load->view('student_feed',['cat_list'=>$job]); 
    }
 public function student_learning(){
        $this->load->view('student_learning'); 
    }                                 
                                    
 public function student_attachments(){                                                                
     $data = [];              
     $u_id = $this->uri->segment(3); 
     $branch_id =  $this->session->userdata('branch_id');
     $data['list_doc']=$td = $this->cm->get_data_orderBy('doc_attachment_tbl',['branch_id'=>$branch_id,'user_id'=>$u_id,   'is_delete'=>'0'],'doc_id desc');
     $data['std_list']= $td = $this->cm->get_data('user_tbl',['user_id'=>$u_id ]);
                                                               
     //echo "<pre>"; print_r($td); die(); 
                                                                      
        $this->load->view('student_attachments',$data);        
    }
 public function student_dailyreport(){                 
        $this->load->view('student_dailyreport'); 
    }
 public function studnet_forms_requests(){
        $this->load->view('student_feed');      
    }
 
    public function add_guardian(){
     
        $fname  = $this->input->post('fname');
        $lname  = $this->input->post('lname');
        $email  = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $relational = $this->input->post('relational');
        $student_id = $this->input->post('student_id');
         $branch_id =  $this->session->userdata('branch_id');
          $org_ids   =  $this->session->userdata('org_id');	
      $pass = '123';
      
      // $dx  = $this->input->post();
     // echo "<pre>"; print_r($dx); die(); 
      
      
      if(empty($fname) || empty($lname)|| empty($email) || empty($mobile) || empty($relational) || empty($student_id) ){
          $this->session->set_flashdata('error_msg', 'All Field Required');
           $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
      }
      
        $u_id = $this->cm->save('user_tbl',['name'=> $fname.' '. $lname,'password'=>$pass,'roll'=>'3','mobile'=>$mobile,
                                'email'=>$email,'branch_id'=>$branch_id,'org_id'=>$org_ids]);
       
       $res = $this->cm->save('parents_tbl',['student_id'=>$student_id,'student_relational'=>$relational,'guardian_id'=>$u_id]);
  
      if($res )
        {
            $this->session->set_flashdata('success_msg', 'Parent add successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Parent note add..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
        
    }
  
   public function addGuardianExisting(){
        
        $student_id = $this->input->post('student_id');
        $p_id       = $this->input->post('p_id');
        $relational = $this->input->post('relational');
     
      if(empty($student_id) || empty($p_id)|| empty($relational) ){
          $this->session->set_flashdata('error_msg', 'All Field Required');
           $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
      }
      
      
      
        $res = $this->cm->save('parents_tbl',['student_id'=> $student_id,'student_relational'=>$relational,'guardian_id'=>$p_id]);
    
      if($res )
        {
            $this->session->set_flashdata('success_msg', 'Parent add successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Parent note add..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
        
    }
 
 
 
 public function ger_update(){
     $g_id    = $this->input->post('g_id'); 
     $p_id    = $this->input->post('p_id'); 
     $name    = $this->input->post('name'); 
     $email   = $this->input->post('email'); 
     $mobile  = $this->input->post('mobile'); 
     $up_real = $this->input->post('up_real'); 
     
       $res = $this->cm->update('user_tbl',['user_id'=>$g_id],['name'=>$name,'email'=>$email,'mobile'=>$mobile]);
       $res_2 = $this->cm->update('parents_tbl',['parent_id'=>$p_id],['student_relational'=>$up_real]);
       
      if($res || $res_2)
        {
            $this->session->set_flashdata('success_msg', 'data update successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Data note update..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
        
    
 
      //  echo "<pre>"; print_r($dx); die(); 
    }
    
  
 public function up_student_notes(){
    
     $catch   = $this->input->post('catch'); 
     $exempt  = $this->input->post('exempt'); 
     $notes   = $this->input->post('notes'); 
     $s_id   = $this->input->post('s_id'); 
     
      
       $res  = $this->cm->update('student_tbl',['user_id'=>$s_id],['catch_up_schedule'=>$catch,'exempt'=>$exempt,'notes'=>$notes]);
       
      if($res)
        {
            $this->session->set_flashdata('success_msg', 'data update successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Data note update..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
        
    
 
      //  echo "<pre>"; print_r($dx); die(); 
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
    
    
    public function edit_Parents(){
        $dc = $this->input->post();
            //  echo "<pre>"; print_r($dc);
            
     $name     = $this->input->post('name'); 
     $email    = $this->input->post('email'); 
     $mobile   = $this->input->post('mobile'); 
     $p_id     = $this->input->post('p_id'); 


    $res  = $this->cm->update('user_tbl',['user_id'=>$p_id],['name'=>$name,'email'=>$email,'mobile'=>$mobile]);
    if($res)
        {
            $this->session->set_flashdata('success_msg', 'data update successfully');
        }else{
            $this->session->set_flashdata('error_msg', 'Data note update..');
        }
        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
        
    }
    
     public function delete_parent(){
        $id = $this->uri->segment(3);
        
        $res = $this->cm->delete('parents_tbl',['guardian_id'=>$id,'student_relational'=>'Parent']);
        if($res)                            
        {           $this->cm->delete('user_tbl',['user_id'=>$id]);
            $this->session->set_flashdata('success_msg', 'Parent deleted successfully');
          }else{  $this->session->set_flashdata('error_msg', 'something went wrong please try again..');
                }
         
          $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
            redirect($server);
                                                  
    }
    public function search_parent(){
      $branch_id =  $this->session->userdata('branch_id');	
       $branch_id = ($branch_id)? $branch_id : 101;
       $name = $this->input->post('name');
       $q = "SELECT b.user_id ,b.name  FROM `parents_tbl` as a  join user_tbl as b on a.guardian_id = b.user_id  
                WHERE  b.branch_id = '$branch_id' and b.name LIKE '$name%'  LIMIT 5";
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
    
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
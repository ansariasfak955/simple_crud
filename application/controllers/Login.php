<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

 public function __construct(){
 	 parent::__construct();
 	    	$this->load->model('Common_model','cm');
 	 	// <!--$this->load->library('paypal_lib');-->
     }
 
 public function index(){
      $this->load->view("login");
 }
 
 public function logout (){
         session_destroy ();
         redirect(base_url() );
         
     }  
 
  public function login(){
     $this->load->view("login");
 }
 public function add_user(){
    $f_name = $this->input->post('f_name'); 
    $u_type = $this->input->post('u_type'); 
    $l_name = $this->input->post('l_name'); 
    $email  = $this->input->post('email'); 
    $pass   = $this->input->post('pass'); 
    $check_terms   = $this->input->post('check_terms'); 
    
     if(empty($check_terms))
    {
        $dataTosend = ['status'=>false, 'msg' => 'terms condition check please','body'=>''];
                  echo json_encode($dataTosend);die();
    }
    
    $u_type = ($u_type == 'staff')? 1 : 3;
    
    if(empty($f_name) || empty($u_type)|| empty($l_name) || empty($email) || empty($pass) )
    {
        $dataTosend = ['status'=>false, 'msg' => 'All Feild Required','body'=>''];
                  echo json_encode($dataTosend);die();
    }
    
    $chack_email = $this->cm->count_row('user_tbl',['email'=>$email]);
   
     if($chack_email)
        {
            $dataTosend = ['status'=>false, 'msg' => 'email already exist','body'=>''];
             echo json_encode($dataTosend);die();
        }
    
    
    // name`, `email`, `password`, `mobile`, `org_id`, `branch_id`, `section_id`, `image`, `roll`
        $whr = ['name'=> $f_name.' '.$l_name,'password'=>$pass,'roll'=>$u_type,'email'=>$email];
             $RES = $this->cm->save('user_tbl',$whr);
      
                if($RES)
                  {  
                        $this->session->set_userdata('admin_id',$RES);  
                        
                      $dataTosend = ['status'=>true, 'msg' => 'data insert successfully','body'=> $RES];
                  echo json_encode($dataTosend); die();
                  }else{
                    $dataTosend = ['status'=>false, 'msg' => 'data not inserted','body'=>''];
                  echo json_encode($dataTosend);die();
                      }
    
       
    
 }
  public function register(){
     $this->load->view("register");
 }
    
 
     public function make_school(){
           $dx= $this->input->post();
         //  echo "<pre>"; print_r($dx); die(); 
            $school_name = $this->input->post('school_name'); 
            $admin_id = $this->input->post('admin_id'); 
            $capacity = $this->input->post('capacity'); 
            $mobile = $this->input->post('mobile'); 
           $admin_id = ($admin_id)? $admin_id :  $this->session->userdata('admin_id');
          if(empty($school_name) || empty($admin_id)|| empty($capacity) || empty($mobile) )
                {
                    $dataTosend = ['status'=>false, 'msg' => 'All Feild Required','body'=>''];
                              echo json_encode($dataTosend);die();
                } 
            
            $get_info = $this->cm->get_data('user_tbl',['user_id'=>$admin_id]);
             $otp = rand(10000,99999); $email = '';
            if($get_info){
                            $email = $get_info[0]->email;
                            
                      $to = "somebody@example.com";
                        $subject = "Email varification";
                        $txt = "your verification number is = $otp ";
                        $headers = "From: jafarkhan25646@gmail.com ";
                        
                      $mail =   mail($email,$subject,$txt,$headers);          
                    }else{
                        $dataTosend = ['status'=>false, 'msg' => 'Invalid admin','body'=>''];
                              echo json_encode($dataTosend);die();
                    }   
                
            $whr = ['org_name'=> $school_name,'mobile'=>$mobile,'school_capacity'=>$capacity,'admin_id'=>$admin_id];
             $RES = $this->cm->save('organisation',$whr);
           
                if($RES)
                  { 
                      // `org_id`, `name`, `branch_type`, `branch_onner_id`, `branch_adderss`, `branch_phone`, `branch_rank`)
                        
                          $whr_2 = ['org_id'=>$RES,'name'=>$school_name,'branch_type'=>'1','branch_phone'=>$mobile,
                          'branch_capacity'=>$capacity,'branch_onner_id'=>$admin_id];
                         $branch_id = $this->cm->save('branch_tbl',$whr_2); 
                         
                          $this->session->set_userdata('org_id',$RES);    
                          $this->session->set_userdata('email',$email); 
                          
                          
                        $this->cm->update('user_tbl',['user_id'=>$admin_id],['otp'=>$otp,'branch_id'=>$branch_id]);  
                       
                      $dataTosend = ['status'=>true, 'msg' => 'data insert successfully','body'=> $email];
                  echo json_encode($dataTosend); die();
                  }else{
                    $dataTosend = ['status'=>false, 'msg' => 'data not inserted','body'=>''];
                  echo json_encode($dataTosend);die();
                      }
           
           
         
         }
 
    public function email_varification(){
          $e_code = $this->input->post('e_code'); 
        $admin_id = $this->session->userdata('admin_id');
       $q = "SELECT a.org_name,a.org_code,a.mobile,b.name,b.image,a.org_id FROM organisation as a join user_tbl as b on
                a.admin_id = b.user_id WHERE b.user_id = '$admin_id' and b.otp = '$e_code'"; 
                               
         $res = $this->db->query($q)->result(); 
      
          if($res){
                      $this->session->set_userdata('org_name',$res[0]->org_name);  
                      $this->session->set_userdata('org_code',$res[0]->org_code);  
                      $this->session->set_userdata('mobile',$res[0]->mobile);  
                      $this->session->set_userdata('mobile',$res[0]->mobile);  
                   
                     $dataTosend = ['status'=>true, 'msg' => 'success','body'=> ''];
                  echo json_encode($dataTosend); die(); 
                                                     
                }else{
                         $dataTosend = ['status'=>false, 'msg' => 'Invalid Verification Code','body'=>''];
                                 echo json_encode($dataTosend);die();
                      }
        }
      
        public function login_new(){
            $email = $this->cm->input->post('email');
            $pass  = $this->cm->input->post('pass');
            
                if(empty($email) || empty($pass)){
                    $dataTosend = ['status'=>false, 'msg' => 'All Feild Required','body'=>''];
                              echo json_encode($dataTosend);die(); 
                     }
            
              $get_info = $this->cm->get_data('user_tbl',['email'=>$email,'password'=>$pass]);
                
              if($get_info){
                                $user_id = $get_info[0]->user_id;
                                $user_type = $get_info[0]->roll;
                          
                            if($user_type == 1){
                                        $admin_data = $this->cm->get_data('organisation',['admin_id'=>$user_id]);
                                    if($admin_data){
                                     $this->session->set_userdata('org_name',$admin_data[0]->org_name);  
                                      $this->session->set_userdata('org_code',$admin_data[0]->org_code);  
                                      $this->session->set_userdata('mobile',$admin_data[0]->mobile);  
                                      $this->session->set_userdata('admin_id',$admin_data[0]->admin_id);  
                                      $this->session->set_userdata('org_id',$admin_data[0]->org_id);    
                                      $this->session->set_userdata('email',$get_info[0]->email);   
                                      $this->session->set_userdata('name',$get_info[0]->name);   
                                      $this->session->set_userdata('address',$admin_data[0]->address);   
                                      $this->session->set_userdata('user_type',$user_type);   
                                      $this->session->set_userdata('user_id',$user_id);   
                                  
                                   $branch_data = $this->cm->get_data('branch_tbl',['branch_onner_id'=>$user_id]);
                             if($branch_data){  $this->session->set_userdata('branch_id',$branch_data[0]->branch_id);}   
                             
                                }
                                 
                            }else if($user_type == 2){
                              $qq = "SELECT a.*,b.org_name,b.org_code,b.admin_id FROM `user_tbl` as a join organisation as b on a.org_id = b.org_id 
                                        WHERE a.user_id = '$user_id' and a.roll = '2'  ";
                             //  echo $qq; die(); 
                               
                               
                                     $admin_data = $this->db->query($qq)->result(); 
                                     
                                    if($admin_data){
                                     $this->session->set_userdata('org_name',$admin_data[0]->org_name);  
                                      $this->session->set_userdata('org_code',$admin_data[0]->org_code);  
                                      $this->session->set_userdata('mobile',$admin_data[0]->mobile);  
                                      $this->session->set_userdata('org_id',$admin_data[0]->org_id);   
                                      $this->session->set_userdata('branch_id',$admin_data[0]->branch_id);  
                                      $this->session->set_userdata('admin_id',$admin_data[0]->admin_id);  
                                      $this->session->set_userdata('email',$get_info[0]->email);   
                                      $this->session->set_userdata('name',$get_info[0]->name);   
                                      $this->session->set_userdata('address',$admin_data[0]->address);   
                                      $this->session->set_userdata('user_type',$user_type);   
                                      $this->session->set_userdata('user_id',$user_id);   
                                    
                                  }
                            }
                            
                             $dataTosend = ['status'=>true, 'msg' => 'success','body'=> ''];
                             echo json_encode($dataTosend); die();     
                
                  }else{
                            $dataTosend = ['status'=>false, 'msg' => 'Invalid User','body'=>''];
                                 echo json_encode($dataTosend);die();
                        }  
                
                
        }                          
        
        
       public function jkk(){
           
         echo "<pre>"; print_r($this->session->userdata()); 
       }
        
        
     /////////////////jk speed test function /////////////////
     
       public function speed(){
           
           $this->load->view('speed'); 
       }
       
         public function dlc(){                         
           
           $this->load->view('speed_2'); 
       }
       
        
        
}
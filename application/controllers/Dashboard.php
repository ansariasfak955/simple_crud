<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
     $this->load->view("index");
 }
                                                       
  public function profile(){
    $id = $this->session->userdata('user_id'); 
                      
    
    $data['user_info'] = $this->cm->get_data('user_tbl',['user_id'=>$id]);
    
     $this->load->view("profile",$data);
 }
   public function update_profile(){
        $name     = $this->input->post('name'); 
        $email    = $this->input->post('email'); 
        $mobile   = $this->input->post('mobile'); 
        $address  = $this->input->post('address'); 
       $id =      $this->session->userdata('admin_id');
        $id  = ($id)? $id :  $this->session->userdata('user_id');
        
    if(empty($name) || empty($email)|| empty($mobile) || empty($address) )
    {
        $dataTosend = ['status'=>false, 'msg' => 'All Feild Required','body'=>''];
                  echo json_encode($dataTosend);die();
    }
    
    $chack_email = $this->cm->count_row('user_tbl',['email'=>$email,'user_id !='=>$id]);
   
     if($chack_email)
        {
            $dataTosend = ['status'=>false, 'msg' => 'email already exist','body'=>''];
             echo json_encode($dataTosend);die();
        }
              $tag = ['name'=> $name,'address'=>$address,'mobile'=>$mobile,'email'=>$email];
             
             
                 $RES = $this->cm->update('user_tbl',['user_id'=>$id],$tag);
      
                if($RES)
                  { $dataTosend = ['status'=>true, 'msg' => 'data Updated Successfully','body'=> ''];
                  echo json_encode($dataTosend); die();
                  }else{
                    $dataTosend = ['status'=>false, 'msg' => 'data not Update','body'=>''];
                  echo json_encode($dataTosend);die();
                      }
    
        }
                                                       
  public function up_pass(){
      $old_pass = $this->input->post('currentpass');
      $new_pass = $this->input->post('newpassword');
        $id =      $this->session->userdata('admin_id');
        $id  = ($id)? $id :  $this->session->userdata('user_id');
     if(empty($old_pass) || empty($new_pass)) {
         $dataTosend = ['status'=>false, 'msg' => 'All field required','body'=>''];
                  echo json_encode($dataTosend);die();
     }  
     
     $ress =  $this->cm->get_data('user_tbl',['user_id'=>$id,'password'=>$old_pass]);
     if($ress){}else{
         $dataTosend = ['status'=>false, 'msg' => 'Invalid password','body'=>''];
                  echo json_encode($dataTosend);die();
     }
     
        $RES = $this->cm->update('user_tbl',['user_id'=>$id],['password'=>$new_pass]);
      
                if($RES)
                  { $dataTosend = ['status'=>true, 'msg' =>'data Updated Successfully','body'=> ''];
                        echo json_encode($dataTosend); die();
                  }else{
                      $dataTosend = ['status'=>false, 'msg' => 'data not Update','body'=>''];
                             echo json_encode($dataTosend);die();
                      }   
  }
 
    public function school_setting(){
        $this->load->view('school_setting');
    }
 
  public function school_profile(){
        $id =   $this->session->userdata('admin_id');
      $data = array(); 
      $data['school_pro']=$tt =  $this->cm->get_data('organisation',['admin_id'=>$id]);
      $data['state_list'] =  $this->cm->get_data('state_tbl',[]);
      
        //echo "<pre>"; print_r($tt); die();  
       
        $this->load->view('school_profile',$data);
    }
 
  public function get_citys(){
      $state_id = $this->input->post('state_id');
     $RES =  $this->cm->get_data('city_tbl',['state_id'=>$state_id]);
     
    if($RES)
      { $dataTosend = ['status'=>true, 'msg' =>'Success','body'=> $RES];
            echo json_encode($dataTosend); die();
      }else{
          $dataTosend = ['status'=>false, 'msg' => 'No data found!..','body'=>''];
                 echo json_encode($dataTosend);die();
          }   
  }
  
  
   public function update_school_profile(){
      $name  = $this->input->post('name');
      $address  = $this->input->post('address');
      $mobile  = $this->input->post('mobile');
      $website  = $this->input->post('website');
      
      $state_id  = $this->input->post('state_id');
      $city_id  = $this->input->post('city_id');
      $enrollment  = $this->input->post('enrollment');
      $zipcode  = $this->input->post('zipcode');
      $org_id  = $this->input->post('org_id');
      
   if(empty($name) || empty($org_id) || empty($address) || empty($mobile) || empty($state_id) || empty($city_id) || empty($enrollment) || empty($zipcode) ) {
        $this->session->set_flashdata('success_msg','All filed required' );
                    redirect(base_url('Dashboard/school_profile'));die();
     } 
     
       $whr = ['org_name'=>$name,'address'=>$address,'mobile'=>$mobile,'school_website'=>$website,
                'state'=>$state_id,'city'=>$city_id,'school_capacity'=>$enrollment,'zip_code'=>$zipcode  ]  ;
             $res = $this->cm->update('organisation',['org_id'=>$org_id],$whr);
     
      if($res)
                {
                    $this->session->set_flashdata('success_msg', 'school profile successfully');
                    redirect(base_url('Dashboard/school_profile'));die();
                }else{
                    $this->session->set_flashdata('error_msg', 'something went wrong please try again');
                     redirect(base_url('Dashboard/school_profile'));die();
                }
   
     // echo "<pre>"; print_r($state_id); die(); 
       
   }
  
  
}
?>

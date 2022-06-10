<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Login extends REST_Controller {
   
    public function __construct() {
       parent::__construct();
      $this->load->model('Common_model','cm');
    }
   

    public function index_post()
     {
           $flag = $this->input->post('flag');
        
                switch ($flag) {
   
                  case "login":
                    
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');

                    if(empty($email) || empty($password)){
                      $dataTosend = array("response"=>array("status" => "false", "msg" => "Enter all parameters!"));	
                      echo json_encode($dataTosend); die();
                    }
                    $res = $this->cm->get_data('user_tbl',['email'=>$email, 'password'=>$password]);
                    if($res){
                         $data = array();
                          foreach($res as $record){
                              $data['user_id'] =  $record->user_id;
                              $data['name']    =  $record->name;
                              $data['email']   =  $record->email;
                              $data['mobile']  =  $record->mobile;
                              $data['image']  =  $record->image;
                          }
                          $dataTosend = ['status'=>true, 'msg' => 'Login successfull','body'=>$data];
                          echo json_encode($dataTosend); die();
                    }else{
                      $res = $this->cm->get_data('user_tbl',['email'=>$email]);
                      if($res){
                        $dataTosend = ['status'=>true, 'msg' => 'password not match','body'=>''];
                        echo json_encode($dataTosend);
                      }else{
                        $dataTosend = ['status'=>false, 'msg' => 'Please valid email','body'=>''];
                        echo json_encode($dataTosend); die();
                      }
                      $dataTosend = array("response"=>array("status" => "false", "msg" => "Invalid Requst"));
                    }

                      break;
                      default:
                     $dataTosend = ['status'=>false,'msg'=>"Invalid Requst",'body'=>''];
                        echo json_encode($dataTosend); die(); 
                }
    } 
  	
}
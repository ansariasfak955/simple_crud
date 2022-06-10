<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class SignUp extends REST_Controller {
   
    public function __construct() {
       parent::__construct();
      $this->load->model('Common_model','cm');
    }
   

    public function index_post()
     {
           $flag = $this->input->post('flag');
        
                switch ($flag) {
                  case "sign_up":

                    // $user_id = $this->input->post('user_id');
                    $name = $this->input->post('name');
                    $email = $this->input->post('email');
                    $contact = $this->input->post('mobile');
                    $password = $this->input->post('password');
                    // echo $name;
                    // echo $email;
                    // echo $contact;
                    // echo $password;
                    if(empty($name) || empty($email) || empty($contact) || empty($password)) 
                        {
                            $dataTosend = array("response"=>array("status" => "false", "msg" => "Enter all parameters!"));	
                            echo json_encode($dataTosend); die();
                        }
                        $res2  =  $this->cm->get_data('user_tbl',['email'=> $email]);
                        //echo "<pre>"; print_r($res2);
                        if($res2)
                        {
                            $dataTosend = array("response"=>array("status" => "false", "msg" => " email already !"));	
                            echo json_encode($dataTosend); die();
                        }else{
        
                            $rs = $this->cm->save('user_tbl',['name'=> $name, 'email'=>$email, 'mobile'=>$contact,'password'=>$password]);
    
                            if($rs){  
                                $res = $this->cm->get_data('user_tbl',['email'=>$email]);
                                //   echo "<pre>"; print_r($res);die;
                                $dataTosend = ['status'=>true, 'msg' => 'Registration successfully', 'body'=>$res];
                                echo json_encode($dataTosend);

                            }else{
                                     $dataTosend = ['status'=>false, 'msg' => 'Record failed','body'=>''];
                                     echo json_encode($dataTosend);die();
                            }
                            
                           
                            // $dataTosend = array("response"=>array("status" => "false", "msg" => "faield email"));
                        }
                      break;
                      default:
                     $dataTosend = ['status'=>false,'msg'=>"Invalid Requst",'body'=>''];
                        echo json_encode($dataTosend); die(); 
                }
    } 
  	
}
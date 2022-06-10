<?php

class Form extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Common_model','cm');
    }
    
    public function index(){
        $this->load->view('register');
    }

     public function add_record(){
            $name  = $this->input->post('name');
            $email  = $this->input->post('email');
            $contact  = $this->input->post('contact');
            $password = $this->input->post('password');

            // echo $name;die();
            // echo $email;die();
            // echo $contact;die();
            // echo $password;die();

                     $res = $this->cm->save('crud',['name'=> $name, 'email'=>$email, 'contact'=>$contact,'password'=>$password]);

                    //echo "<pre>"; print_r($res);
        
                    if($res )
                    {
                        $this->session->set_flashdata('success', 'Register successfully');
                        redirect('Home');
                    }else{
                        $this->session->set_flashdata('error', 'Staff note add..');
                        
                    }
                    redirect('Form');
        }

        public function delete(){
            $id = $this->uri->segment(3);
            
            $res = $this->cm->delete('crud',['id'=> $id]);
            if($res)                            
            {  
                $this->session->set_flashdata('success', 'Record deleted successfully');
              }else{  $this->session->set_flashdata('error', 'something went wrong please try again..');
                    }
             
              $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
                redirect($server);
                                                      
        }

        public function update_record(){                                                                                             
                $name  = $this->input->post('name');
                $email  = $this->input->post('email');
                $contact  = $this->input->post('contact');
                $password = $this->input->post('password');  
                $id = $this->input->post('id');  
                if(empty($name) || empty($email) || empty($contact) || empty($password)){

                    $this->session->set_flashdata('All field Required!!');
                    $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
                 redirect($server);die();
                }
              $res = $this->cm->update('crud',['id'=>$id],['name'=> $name, 'email'=>$email, 'contact'=>$contact,'password'=>$password]);
             if($res)
             {
                 $this->session->set_flashdata('success', 'data update successfully');
             }else{
                 $this->session->set_flashdata('error', 'Data note update..');
             }
             redirect('Home');
             
         }
         public function edit(){
             $id = $this->uri->segment(3);
             $res = $this->cm->get_data('crud',['id'=> $id]);
             $this->load->view('update',['res'=>$res]);
         }

         public function formApi(){
            $res = $this->cm->get_data('crud',[]);
               if($res)
                 {  
                     $dataTosend = ['status'=>true, 'msg' => 'Api successfully','body'=> $res];
                 echo json_encode($dataTosend); die();
                 }else{
                   $dataTosend = ['status'=>false, 'msg' => 'Api failed','body'=>''];
                 echo json_encode($dataTosend);die();
                     }
         }
         public function add_record_api(){
            $name  = $this->input->post('name');
            $email  = $this->input->post('email');
            $contact  = $this->input->post('contact');
            $password = $this->input->post('password');
            
                if(empty($name) || empty($email) || empty($contact) || empty($password)){
                    $this->session->set_flashdata('All field Required!!');
                  $server =  isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
                    redirect($server);die();
                }

            $res = $this->cm->save('crud',['name'=> $name, 'email'=>$email, 'contact'=>$contact,'password'=>$password]);

                    //echo "<pre>"; print_r($res);
        
             if($res){  
                $dataTosend = ['status'=>true, 'msg' => 'Record successfully','body'=> $res];
                echo json_encode($dataTosend); die();
            }else{
                $dataTosend = ['status'=>false, 'msg' => 'Record failed','body'=>''];
                echo json_encode($dataTosend);die();
            }
         }

         public function delete_api($id){
           // $id = $this->uri->segment(3);
            
            $res = $this->cm->delete('crud',['id'=> $id]);
            if($res){  
                $dataTosend = ['status'=>true, 'msg' => 'Api delete record successfully','body'=> $res];
                echo json_encode($dataTosend); die();
            }else{
                $dataTosend = ['status'=>false, 'msg' => 'Api failed','body'=>''];
                echo json_encode($dataTosend);die();
            }
                                                      
        }

        public function edit_api(){
            $id=$this->uri->segment(3);
            $res = $this->cm->get_data('crud',['id'=> $id]);
            //print_r($res);die;
            $this->load->view('update',['res'=>$res]);
        }
        public function update_record_api(){ 
           // print_r($this->input->post());die;                                                                                            
            $name  = $this->input->post('name');
            $email  = $this->input->post('email');
            $contact  = $this->input->post('contact');
            $password = $this->input->post('password');  
            $id = $this->input->post('id');  
            if(empty($name) || empty($email) || empty($contact) || empty($password) || empty($id)){

                $this->session->set_flashdata('All field Required!!');
                $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
               redirect($server);die();
            }
          $res = $this->cm->update('crud',['id'=>$id],['name'=> $name, 'email'=>$email, 'contact'=>$contact,'password'=>$password]);
          if($res){  
            $dataTosend = ['status'=>true, 'msg' => 'record update successfully','body'=> $res];
            echo json_encode($dataTosend); die();
        }else{
            $dataTosend = ['status'=>false, 'msg' => 'record failed','body'=>''];
            echo json_encode($dataTosend);die();
        }
         
     }


     public function registerApi(){
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $contact = $this->input->post('contact');
            $password = $this->input->post('password');
            //echo $email;

            if(empty($name) || empty($email) || empty($contact) || empty($password)) 
                {
                    $dataTosend = array("response"=>array("status" => "false", "msg" => "Enter all parameters!"));	
                    echo json_encode($dataTosend); die();
                }
                $res   =  $this->cm->get_data('crud',['name'=> $name, 'email'=> $email, 'contact' => $contact, 'password' => $password]);
                $res2  =  $this->cm->get_data('crud',['email'=> $email]);

            
                if($res)
                {
                    $dataTosend = array("response"=>array("status" => "false", "msg" => " email exits already !"));	
                    echo json_encode($dataTosend); die();
                }
                if($res2)
                {
                    $dataTosend = array("response"=>array("status" => "false", "msg" => " email exits already !"));	
                    echo json_encode($dataTosend); die();
                }else{
                    $name  = $this->input->post('name');
                    $email  = $this->input->post('email');
                    $contact  = $this->input->post('contact');
                    $password = $this->input->post('password');

                        if(empty($name) || empty($email) || empty($contact) || empty($password)){
                            $this->session->set_flashdata('All field Required!!');
                        $server =  isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
                            redirect($server);die();
                        }

                    $res = $this->cm->save('crud',['name'=> $name, 'email'=>$email, 'contact'=>$contact,'password'=>$password]);

                            //echo "<pre>"; print_r($res);
                
                    if($res){  
                        $dataTosend = ['status'=>true, 'msg' => 'Record successfully','body'=> $res];
                        echo json_encode($dataTosend); die();
                    }else{
                        $dataTosend = ['status'=>false, 'msg' => 'Record failed','body'=>''];
                        echo json_encode($dataTosend);die();
                    }
                    
                   
                    $dataTosend = array("response"=>array("status" => "false", "msg" => "faield email"));
                }
       }
}


?>
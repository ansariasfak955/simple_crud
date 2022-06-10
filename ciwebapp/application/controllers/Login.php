<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Common_model','cm');
    
    }

    public function index(){
        $this->load->view('login');
    }

    public function authenticate(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        //   echo $email;
        //   echo $password;
         $get_info = $this->cm->get_data('users',['email'=>$email, 'password'=>$password]);

        //echo "<pre>"; print_r($get_info);
        if($get_info){
            $id = $get_info[0]->id;

                    $this->session->set_userdata('id',$get_info[0]->id);
                    $this->session->set_userdata('name',$get_info[0]->name);
                    $this->session->set_userdata('email',$get_info[0]->email);
                    $this->session->set_userdata('password',$get_info[0]->password);

                    $this->session->set_flashdata('success','Record has been Added');

                    redirect('login');
                }else{
                    $this->session->set_flashdata('error','Invalid User');
                    redirect('login');
                }
    }

}

?>
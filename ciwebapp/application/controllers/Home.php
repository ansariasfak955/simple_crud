<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct(){
        parent::__construct();
               $this->load->model('Common_model','cm');
               
           $admin_id =  $this->session->userdata('id');	
              $res = $this->cm->get_data('users',['id'=>$admin_id]);
           //if($res){}else{ redirect(base_url('Login/login')); }   
            // <!--$this->load->library('paypal_lib');-->
       }

    public function index(){
              $res = $this->cm->get_data('crud',[]);
              $this->load->view('dashboard',['res'=>$res]);

    }
}

?>
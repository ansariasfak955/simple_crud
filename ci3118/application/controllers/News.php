<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function index(){
        $data['title'] = 'Software Solution Pvt Ltd. ';

        // $this->session->set_userdata('email','abc@gmail.com');

        // $arr = array(
        //     'id' => 1,
        //     'name' => 'asfak',
        //     'phone' => '8899007766'
        // );
        // $this->session->set_userdata($arr);
        //$this->session->unset_userdata('email');
        //$this->session->sess_destroy();

        // $this->session->set_flashdata('message','Record added');
        // $this->session->mark_as_flash('name');
        // $this->session->set_tempdata('dob', '25/12/1999', 10);

        $data['news'] = $this->news_model->get_news();

        $data['users'] = array('asfak','ansari','abulkaish','ansari');

        $this->load->view('news/index', $data);
    }

    public function details($asfak){
        echo 'Details think debug'.$asfak;
    }
}

?>
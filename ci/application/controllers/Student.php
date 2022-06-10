<?php

class Student extends CI_Controller{
    function  __construct() {
        parent::__construct();
        $this->load->model('Student_model');
    } 
    function userRegister(){
        $this->load->view('register');
    }


    function index(){
        $students = $this->Student_model->all();

        $data = array();
        $data['students'] = $students;
       // echo "<pre>";print_r($data['students']);die();
        $this->load->view('show',$data);
    }


    function registerData(){
    
      $formArray = array();
      $formArray['name'] =  $this->input->post('name');
      $formArray['email'] =  $this->input->post('email');
      $formArray['contact'] =  $this->input->post('number');
      $formArray['password'] =  $this->input->post('password');
      $this->Student_model->register($formArray);
      redirect("Student/");
}
    function delete($userId){
      //  $user = $this->Student_model->getUser($userId);
        $this->Student_model->deleteUser($userId);
        redirect("Student/");
    }

    function edit($userId){
        $student = $this->Student_model->getUser($userId);
        $data = array();
        $data['student'] = $student;
        $this->load->view('update',$data);
      
    }
}

?>
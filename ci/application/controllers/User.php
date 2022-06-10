<?php

class User extends CI_controller{
    function  __construct() {
        parent::__construct();
        $this->load->model('User_model');
    } 

    function index(){
        $users = $this->User_model->all();

        $data = array();
        $data['users'] = $users;
        $this->load->view('list',$data);
    }

    function create(){

       
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('failure','All fields required.');
            $this->load->view('create');
        }else{
            // save record to database

            $formArray = array();
            $formArray['name'] = $this->input->post('name');
            $formArray['email'] = $this->input->post('email');
            $formArray['created_at'] = date('y-m-d');

            $this->User_model->create($formArray);
            $this->session->set_flashdata('success','Record added successfully');
            redirect(base_url().'user');
        }
    }
    function edit($userId){
       
        $user = $this->User_model->getUser($userId);
        $data = array();
        $data['user'] = $user;

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        if($this->form_validation->run() == false){
            $this->load->view('edit',$data);
        }else{
            //update user record
            $formArray = array();
            $formArray['name'] = $this->input->post('name');
            $formArray['email'] = $this->input->post('email');
            $this->User_model->updateUser($userId,$formArray);
            $this->session->set_flashdata('success','Record updated successfully');
            redirect(base_url().'user');
        }
    }
    // Delete user record
    function delete($userId){
     
        $user = $this->User_model->getUser($userId);
        if(empty($user)){
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'user');
        }else{
        $this->User_model->deleteUser($userId);
        $this->session->set_flashdata('success','Record delete successfully');
            redirect(base_url().'user');
        }
    }
}

?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
    public function __construct(){
        parent::__construct();
               $this->load->model('Common_model','cm');
               $this->load->model('Event_model','em');
    }

    public function index(){
        
        $event = $this->em->all();
        $data = array();
        $data['event'] = $event;
        //echo "<pre>";print_r($data['event']);die();
        $this->load->view('events',$data);
    }

    public function events(){
        $this->load->view('events');
    }
    public function event_add(){
        $this->load->view('event_add');
    }
    // public function participate(){
    //     $this->load->view('participate_student');
    // }

    public function add_event(){
        //print_r($this->input->post());die;
        $data = array();
        $data['room'] = $this->input->post('room');
        $data['title'] = $this->input->post('title');
        $data['start_date'] = $this->input->post('date');
        $data['fees'] = $this->input->post('fees');
        $data['description'] = $this->input->post('description');
        $data['type'] = $this->input->post('etype');
        $data['date'] = $this->input->post('date');
        $data['ftime'] = $this->input->post('ftime');
        $data['totime'] = $this->input->post('to_time');


        $insertEvent = $this->em->addEvent($data);
        if($insertEvent){
            $this->session->set_flashdata('success_msg', 'Event have been added successfully.');    
            redirect('Event/event_add');          
        }else{
                $this->session->set_flashdata('error_msg', 'please enter valid data.');
             }
                redirect('Event/');
    }

    public function deleteEvent($id){
        $this->em->deleteUser($id);
        redirect('Event/index');
    }

    public function edit($id){
        $event = $this->em->getUser($id);
        //print_r($event);die;
        $data = array();
        $data['event'] = $event;
        $this->load->view('event_update',$data);
    }
    public function get(){
        $id=$this->uri->segment(3);
        //echo 'asfak'.$id;die;
        $event = $this->em->getStudent($id);
        //print_r($event); die();
        $data['event_join_student'] = $event;
        $this->load->view('participate_student',$data);
    }
    public function updateEvent($id){
        $data = array();
        $data['room'] = $this->input->post('room');
        $data['title'] = $this->input->post('title');
        $data['start_date'] = $this->input->post('date');
        $data['fees'] = $this->input->post('fees');
        $data['description'] = $this->input->post('description');
        $data['type'] = $this->input->post('etype');
        $data['date'] = $this->input->post('date');
        $data['ftime'] = $this->input->post('ftime');
        $data['totime'] = $this->input->post('to_time');

        $res = $this->em->event_update($id,$data);
        if($res){
            $this->session->set_flashdata('success_msg', 'Event have been update successfully.');    
            redirect('Event');          
        }else{
                $this->session->set_flashdata('error_msg', 'please update event data.');
             }
                redirect('Event/');
    }
}


?>
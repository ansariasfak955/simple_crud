<?php 
error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Notification extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Notification_model');
          $this->load->library("pagination");
          
    }  
       /*
    public function index(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Notification/index";
 
       $config["total_rows"] = $this->Notification_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
 
       $data["view"] = $this->Notification_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();

      $this->load->view('view_notification', $data);
        } */
        
     public function index()
     {
         $data["view"] = $this->Notification_model->select_all_notificatios();
         $this->load->view('view_notification', $data); 
     }


      public function add_notifications()
      {
        $this->load->view('add_notification');
      }
      
       public function add_notifications_2()
      {
        $this->load->view('add_notification_2');
      }
      
      
      
      /*
      public function add_notification_data()
      {
        
        $data = array( 'title'=>$this->input->post('title'),
                       'description'=>$this->input->post('description'),
                     
                    ); 
           $insertUserData = $this->Notification_model->insert($data);  
          if($insertUserData){
                
               $this->session->set_flashdata('success_msg', 'Notification have been added successfully.');
               ?>
          <script> window.location.assign('<?php echo base_url(); ?>Notification/add_notifications'); </script>       
               <?php
            }
            else {
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            } ?> <script> window.location.assign('<?php echo base_url(); ?>Notification/add_notifications');</script> <?php
              
      } */

        public function delete(){ 

         $this->load->model('Notification_model'); 
         $services_id = $this->uri->segment('3'); 
         $this->Notification_model->delete($services_id); 
         redirect('Notification'); 
      } 
      
      
 public function submit_notification()
     {
      $tile = $this->input->post('title'); 
      $desc = $this->input->post('desc'); 
      $submit = $this->input->post('submit'); 
       $this->load->view('new_notification');
         
     }
        

}
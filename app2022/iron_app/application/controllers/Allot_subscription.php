<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Allot_subscription extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Allot_subscription_model');
          $this->load->library("pagination");
          
    }  

    public function index(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Allot_subscription/index";
 
       $config["total_rows"] = $this->Allot_subscription_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
           $user = $this->input->post('usr');
           $pack = $this->input->post('packk');
           $fdat = $this->input->post('sdate');
           $tdate = $this->input->post('edate');
    
       $data["view"] = $this->Allot_subscription_model->
 
           fetch_departments($config["per_page"], $page,$user,$fdat,$tdate,$pack);
 
       $data["links"] = $this->pagination->create_links();

      $this->load->view('view_allot_subscription', $data);
        }

      public function add_allot_subcription()
      {
        $this->load->view('add_allot_subscription');
      }
      public function add_allot_subscription_data()
      {
         
        $data = array( 'user_id'=>$this->input->post('uname'),
                       'pack_id'=>$this->input->post('courss'),
                       'allot_date'=>$this->input->post('dt')
                    ); 
           $insertUserData = $this->Allot_subscription_model->insert($data);  
          if($insertUserData){
                ?>
                <script> //alert('Special region Successfully Added');</script><?php 
               $this->session->set_flashdata('success_msg', 'Allot Subscription have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
          redirect('Allot_subscription');           
    }
    public function delete()
    {
      $id = $this->uri->segment(3);
      $this->Allot_subscription_model->delete_subscription($id);
       redirect('Allot_subscription');   
    }
    public function status(){ 
      $status = $_GET['status'];
          $id = $_GET['id'];
        $data = array('status'=> $status);
      $this->Allot_subscription_model->update_status($data,$id);
    }

}
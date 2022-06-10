<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Free_courses extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Free_courses_model');
        $this->load->library("pagination");          
        }  
  
    /*
    public function select_all_free_courses(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Free_courses/select_all_free_courses";
 
       $config["total_rows"] = $this->Free_courses_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
       $data["view"] = $this->Free_courses_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();
    
      $this->load->view('view_free_courses', $data);
        } */
        
         public function select_all_free_courses()
         { 
          $data["view"] = $this->Free_courses_model->select_free_data();
          $this->load->view('view_free_courses', $data);
             
         }
        
        
        public function add_free_coursess()
        {
           $uid = $this->uri->segment(3);
          $this->load->view('add_free_courses');
        }
         public function add_free_course_data()
         {   
          $id =  $this->input->post('uidd');
          $co =   $this->input->post('Coursess');
          $das =  $this->input->post('day');
          
             $dfrs = date("Y-m-d");
        $data = array( 'user_id'=>$this->input->post('uidd'),
                       'course_id'=>$this->input->post('Coursess'),
                       'days'=>$this->input->post('day'),
                       'date_course'=>$dfrs
                      
                    ); 
           $insertUserData = $this->Free_courses_model->insert($data);
           $innv = $this->db->query("INSERT INTO  dlc_orders (user_id,pack_id,price,total,date) VALUES ('$id','$co','0','0','$dfrs')");  
           $list = $this->db->insert_id($innv); 
           $innvv = $this->db->query("INSERT INTO  dlc_order_detail (order_id,user_id,pack_id,price,date) VALUES ('$list','$id','$co','0','$dfrs')"); 
           
          if($insertUserData){
                ?>
                <script> //alert('Special region Successfully Added');</script><?php 
               $this->session->set_flashdata('success_msg', 'added free courses have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
          redirect('Free_courses/select_all_free_courses');       
      
    }

   }
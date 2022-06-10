<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Parents extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Parents_model');
          $this->load->library("pagination");
          
    }  

    public function index(){ 
         
      //       $config = array();
 
      //  $config["base_url"] = base_url() . "Parents/index";
 
      //  $config["total_rows"] = $this->Parents_model->record_count();
 
      //  $config["per_page"] = 10;
 
      //  $config["uri_segment"] = 3;
 
      //  $this->pagination->initialize($config);
     
 
      //  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
      //  $data["view"] = $this->Parents_model->
 
      //      fetch_departments($config["per_page"],$page);
 
      //  $data["links"] = $this->pagination->create_links();

      // $this->load->view('view_parents', $data);
      //   }
      $ids = $this->uri->segment(3);
      $data['view'] = $this->Parents_model->select_all_parents($ids);
      $this->load->view('view_parents',$data);
    }
  }
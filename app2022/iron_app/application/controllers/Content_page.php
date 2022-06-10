<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Content_page extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Content_page_model');
        $this->load->model('Common_model','cm');
          $this->load->library("pagination");
          
    }    
        /*
   public function index(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Content_page/index";
 
       $config["total_rows"] = $this->Content_page_model->record_count();
 
       $config["per_page"] = 20;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
       $data["view"] = $this->Content_page_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();
      $this->load->view('view_page',$data);
        }  */
        
    public function index(){
     
      $data["view"] = $this->Content_page_model->all_pages();   
      $this->load->view('view_page',$data);   
        
    }    
          
        
    public function update()
    {
              $id=$this->input->post('id');
              $dates = date("Y-m-d");
               $data=array(
                      'page_title'=>$this->input->post('title'),
                      'page_detail'=>$this->input->post('detail'),
                      'page_date'=>$dates
                  );
               
        $this->load->model('Content_page_model');
     
         $res = $this->cm->update_data('dlc_pages',['page_id'=>$id],$data);
       
       if($res){$this->session->set_flashdata('success_msg','social media updated successfully');
               }else{  $this->session->set_flashdata('error_msg','social media Not updated');
                    }
      redirect(base_url('Content_page/update_rows/5')); 
     }

        public function update_rows(){ 
         $this->load->helper('form');
         $this->load->helper('url'); 
         $services_id = $this->uri->segment('3'); 
         $query = $this->db->get_where("dlc_pages",array("page_id"=>$services_id));
         $data['records'] = $query->result(); 
         $data['services_id'] = $services_id; 
           
         $this->load->view('edit_content_pages',$data); 
      }     
}
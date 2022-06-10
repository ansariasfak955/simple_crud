<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Advertise extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Advertise_model');
          $this->load->library("pagination");
          
    }  

   /*
    public function index() { 
            $config = array();
 
       $config["base_url"] = base_url() . "Advertise_model/index";
 
       $config["total_rows"] = $this->Advertise_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
       $data["view"] = $this->Advertise_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();

      $this->load->view('view_advertise', $data);
        } */
        
        public function index()
        { 
            $data["view"] = $this->Advertise_model->select_advertises();
            
             $this->load->view('view_advertise', $data);
        }

  

      public function add_advertise()
      {
        $this->load->view('add_advertise');
      }
      public function add_advertise_data()
      {

          if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'upload/advertise/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['image']['name'];
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image')){
                    $uploadData = $this->upload->data();
                    $image = $uploadData['file_name'];
                }else{
                    $image = '';
                }
            }else{
                $image = '';
            }
 

        $data = array( 'advertise_name'=>$this->input->post('advertisename'),
                       'advertise_url'=>$this->input->post('adertiseurl'),
                    //   'advertisementcat_id'=>$this->input->post('advcat'),
                       'advertise_status'=>'1',
                       'advertise_image'=>$image
                    ); 
           $insertUserData = $this->Advertise_model->insert($data);  
          if($insertUserData){
              
               $this->session->set_flashdata('success_msg', 'Advertise have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
          redirect('Advertise');       
      
    }

        public function delete(){ 

         $this->load->model('Advertise_model'); 
         $services_id = $this->uri->segment('3'); 
         $this->Advertise_model->delete($services_id); 
   
         redirect('Advertise'); 
      } 

     public function update_row()
    {

  $id=$this->input->post('uid');
        $image = $this->input->post('image'); 
            
              if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'upload/advertise/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['image']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                    if($this->upload->do_upload('image')){
                        $uploadData = $this->upload->data();
                        $image = $uploadData['file_name'];
                    }else{
                        $image = '';
                    }
              }
              else
              {
                $image = $this->input->post('oldimage') ;   
              }

     

        $data = array( 'advertise_name'=>$this->input->post('advertisename'),
                       'advertise_url'=>$this->input->post('adertiseurl'),
                
                       'advertise_status'=>'1',
                       'advertise_image'=>$image
                    ); 
        $this->load->model('Advertise_model');
        $this->Advertise_model->updata($id,$data);
        $this->session->set_flashdata('successm_msg', 'Advertise have been updated successfully.');
        redirect('Advertise'); 
}

         public function edit() { 
         $this->load->helper('form');
         $this->load->helper('url'); 
         $services_id = $this->uri->segment('3'); 
         $query = $this->db->get_where("dlc_advertisements",array("advertisements_id"=>$services_id));
         $data['records'] = $query->result(); 
         $data['services_id'] = $services_id; 
         $this->load->view('edit_advertise',$data); 
      } 


}
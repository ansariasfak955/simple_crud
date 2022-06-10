<?php //error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Advertise_category extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Advertise_category_model');
    }    

  //     public function index()
  // {
  //   $this->load->model('Category_model');
  //    $data['views']=$this->Category_model->selectdata();
  //   $this->load->view('view_category',$data);
  // }

   /*  public function index() { 
            $config = array();
 
       $config["base_url"] = base_url() . "Advertise_category/index";
 
       $config["total_rows"] = $this->Advertise_category_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
       $data["views"] = $this->Advertise_category_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();

      $this->load->view('view_advertise_category', $data);
        } */
        

 public function index()
  {
    $data["views"] = $this->Advertise_category_model->select_advertise_data(); 
     $this->load->view('view_advertise_category', $data);
      
      
  }

  function add(){
        if($this->input->post('submit')){

            $this->load->model('Advertise_category_model');
    
    
            
            // if(!empty($_FILES['image']['name'])){
            //     $config['upload_path'] = 'upload/category/';
            //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
            //     $config['file_name'] = $_FILES['image']['name'];
                
            //     $this->load->library('upload',$config);
            //     $this->upload->initialize($config);
                
            //     if($this->upload->do_upload('image')){
            //         $uploadData = $this->upload->data();
            //         $image = $uploadData['file_name'];
            //     }else{
            //         $image = '';
            //     }
            // }else{
            //     $image = '';
            // }
 

   $userData = array(
          
          'advertise_name'=>$this->input->post('name'),
          // 'cat_image' => $image
            );
            
            $insertUserData = $this->Advertise_category_model->insert($userData);
          
          if($insertUserData){
         $this->session->set_flashdata('success_msg', 'Advertise Category have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
           
        }
     
        redirect('Advertise_category'); 
    }

        public function update_row()
    {

   $id=$this->input->post('id');
        //$image = $this->input->post('image') ; 
            
              // if(!empty($_FILES['image']['name'])){
              //   $config['upload_path'] = 'upload/category/';
              //   $config['allowed_types'] = 'jpg|jpeg|png|gif';
              //   $config['file_name'] = $_FILES['image']['name'];
              //   $this->load->library('upload',$config);
              //   $this->upload->initialize($config);
                
              //       if($this->upload->do_upload('image')){
              //           $uploadData = $this->upload->data();
              //           $image = $uploadData['file_name'];
              //       }else{
              //           $image = '';
              //       }
              // }
              // else
              // {
              //   $image = $this->input->post('oldimage') ;   
              // }

     

   $data=array(
          'advertise_name'=>$this->input->post('name'),
          //'cat_image' => $image
      );
   
        $this->load->model('Advertise_category_model');
        $this->Advertise_category_model->updata($id,$data);
        redirect('Advertise_category'); 
}

   
   

    
      public function delete() { 
         $this->load->model('Advertise_category_model'); 
         $services_id = $this->uri->segment('3'); 
         $this->Advertise_category_model->delete($services_id); 
   
       redirect('Advertise_category'); 
      } 




}
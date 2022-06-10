<?php //error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Subcategory extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Subcategory_model');
    }    

    public function subcategory()
   {
     $this->load->model('Subcategory_model');
      $data['views']=$this->Subcategory_model->selectsubdata();
  //    $data['view']=$this->Subcategory_model->selectdata();
    $this->load->view('view_subcategory',$data);
   }

   /*
 public function subcategory() { 
            $config = array();
 
       $config["base_url"] = base_url() . "Subcategory/subcategory";
 
       $config["total_rows"] = $this->Subcategory_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
       $data["views"] = $this->Subcategory_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();

      $this->load->view('view_subcategory', $data);
        }
         */





  function addsub(){
        if($this->input->post('submit')){
            $this->load->model('Subcategory_model');

   
            //Check whether user upload picture
           if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'upload/subcategory/';
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
 

   $userData = array(
          
          'sbcat_name'=>$this->input->post('name'),
          'cat_id'=>$this->input->post('category_id'),
            'sbcat_image' => $image
            );
            
            $insertUserData = $this->Subcategory_model->insertsub($userData);
          
          if($insertUserData){
         $this->session->set_flashdata('success_msg', 'Category have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
           
        }
     
        redirect('Subcategory/subcategory'); 
    }


   public function update_rowsub()
    {

  $id=$this->input->post('id');
        $image = $this->input->post('image') ; 
            
              if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'upload/subcategory/';
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

     

   $data=array(
          'sbcat_name'=>$this->input->post('name'),
          'cat_id'=>$this->input->post('category_id'),
          'sbcat_image' => $image
      );
   
        $this->load->model('Subcategory_model');
        $this->Subcategory_model->updatasub($id,$data);
        redirect('Subcategory/subcategory'); 
}

   
   

    
      public function deletesub() { 
         $this->load->model('Subcategory_model'); 
         $services_id = $this->uri->segment('3'); 
         $this->Subcategory_model->deletesub($services_id); 
   
       redirect('Subcategory/subcategory'); 
      } 

}
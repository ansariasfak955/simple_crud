<?php //error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->model('Common_model','cm');     
    }    

  public function index()
   {
     $this->load->model('Category_model');
      $data['views']=$this->Category_model->selectdata();
     $this->load->view('view_category',$data);
   }
   

 function add(){
    $cat_name=$this->input->post('name');
    $image= isset($_FILES['image']['name'])? $_FILES['image']['name'] : '' ;
    if(empty($cat_name) || empty($image)){
    $this->session->set_flashdata('error_msg','All fields are required');
      redirect(base_url('Category')); die(); 
    }
    
       
        $image = $this->cm->file_upload_with_inverted('image','./common_uploads/category_images/');
     
       $sortNum  = $this->Category_model->new_cat_sort();
        
        $data['cat_name']    = $cat_name;
        $data['cat_image']   = $image;
        $data['cat_sort']    = $sortNum;
        $data['description'] = $this->input->post('dis');
        $data['arabic_name'] = $this->input->post('arb_name');
        $data['arabic_description']= $this->input->post('arb_dis');
        
        $c_box =  $this->input->post('featured');
      
        $data['featured']= ($c_box)? 1:'0';
        
        $result=$this->Category_model->insert($data);
        if($result){
          $this->session->set_flashdata('success_msg','Category have been added successfully.');
       
        }else{
              $this->session->set_flashdata('error_msg','something went wrong please try again');
        }
       
     redirect(base_url('Category')); die(); 
       
    }

   public function update_row()
    {
            $id       =  $this->input->post('id');
            $cat_name = $this->input->post('name');
            $sortNO   = $this->input->post('sortNO');
   
   
     
    if(empty($id) || empty($cat_name) || empty($sortNO)){
       $this->session->set_flashdata('error_msg','All fields are required');
         redirect(base_url('Category')); die(); 
    }else{                                          
       
        $check_sortnum = $this->cm->get_data('dlc_category',['cat_sort'=> $sortNO,'cat_id !='=>$id ]);
                if($check_sortnum){ 
                    $this->session->set_flashdata('error_msg','Sorting number already exists');
                      redirect(base_url('Category')); die(); 
                }
                
          $image = $this->cm->file_upload_with_inverted('image','./common_uploads/category_images/');
        
                                   
        $data['cat_name']=$cat_name;
        
      if($image){ $data['cat_image']= $image; }
      
        $data['description']= $this->input->post('dis');
        $data['arabic_name'] = $this->input->post('arb_name');
        $data['arabic_description']= $this->input->post('arb_dis');
        $data['cat_sort']= $sortNO;
       
        $c_box =  $this->input->post('featured');
      
        $data['featured']= ($c_box)? 1:'0';
        
                             
        
        $result=$this->Category_model->update($id,$data);
        if($result){
          $this->session->set_flashdata('success_msg','Category have been updated successfully.');
        }else{
              $this->session->set_flashdata('error_msg','something went wrong please try again');
        }
       
         redirect(base_url('Category')); die(); 
    }
   
           
}

   
   

    
      public function delete() { 
         $this->load->model('Category_model'); 
         $services_id = $this->uri->segment('3'); 
         $this->Category_model->delete($services_id); 
   
       redirect('Category'); 
      } 




}
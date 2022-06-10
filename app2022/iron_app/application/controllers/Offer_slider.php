<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Offer_slider extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Offer_slider_model');
          
    }    
     public function index(){

   $data['view']=$this->db->order_by('id','DESC')
                          ->get('offer_sliders')
                          ->result();
  
   $this->load->view('view_offer_slider',$data);
   }

   public function add_offer_slider(){

    $this->load->view('add_offer_slider');

   }
       public function add_offer_slider_data()
  {
    
    $name=$this->input->post('name');
    $url=$this->input->post('url');
    $image=$_FILES['image']['name'];
    if(empty($name) || empty($url) || empty($image)){
    $this->session->set_flashdata('error_msg','All fields are required');
      redirect('Offer_slider');
    }else{
       $config['upload_path']          = './common_uploads/offer_sliders';
       $config['allowed_types']        = 'gif|jpg|png';
      
       $this->load->library('upload', $config);
       if( $this->upload->do_upload('image')){
        $data['name']=$name;
        $data['url']=$url;
        $data['image']=$image;
        $result=$this->Offer_slider_model->add_offer_slider_data($data);
        if($result){
          $this->session->set_flashdata('success_msg','Slider added successfully');
        redirect('Offer_slider');
        }
       }
    }
  }
  public function delete_offer_slider(){
    $id = $this->uri->segment(3); 
    $result= $this->Offer_slider_model->delete_offer_slider($id);
    if($result){
    $this->session->set_flashdata('success_msg','Slider deleted successfully');
        redirect('Offer_slider');
   } 
  }
  public function edit_offer_slider(){

      $id = $this->uri->segment(3); 
    $data['views']=$this->Offer_slider_model->edit_offer_slider($id);
  

     $this->load->view('edit_offer_slider',$data);
  } 
   public function update_offer_slider_data()
  {
     $id=$this->uri->segment(3);

     $name=$this->input->post('name');
    $url=$this->input->post('url');
    $image=$_FILES['image']['name'];
     $hidden_image=$this->input->post('hidden_image');
    if(empty($image)){
      $image=$hidden_image;
    }else{
      $image=$image;
    }
    if(empty($name) || empty($url)){
    $this->session->set_flashdata('error_msg','All fields are required');
      redirect('Offer_slider');
    }else{

       $config['upload_path']          = './common_uploads/offer_sliders';
       $config['allowed_types']        = 'gif|jpg|png';
      
       $this->load->library('upload', $config);
       $this->upload->do_upload('image');
     
        $data['name']=$name;
        $data['url']=$url;
        $data['image']=$image;
        $result=$this->Offer_slider_model->update_offer_slider_data($data,$id);
        if($result){
          $this->session->set_flashdata('success_msg','Slider updated successfully');
        redirect('Offer_slider');
        }
       
    }
  }
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home_slider extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Home_slider_model');
          
    }    
     public function index(){

   $data['view']=$this->db->order_by('id','DESC')
                          ->get('home_sliders')
                          ->result();
  
   $this->load->view('view_home_slider',$data);
   }

   public function add_home_slider(){

    $this->load->view('add_home_slider');

   }
       public function add_home_slider_data()
  {
    
    $name=$this->input->post('name');
    $url=$this->input->post('url');
    $image=$_FILES['image']['name'];
    if(empty($name) || empty($url) || empty($image)){
    $this->session->set_flashdata('error_msg','All fields are required');
      redirect('Home_slider');
    }else{
       $config['upload_path']          = './common_uploads/home_sliders';
       $config['allowed_types']        = 'gif|jpg|png';
      
       $this->load->library('upload', $config);
       if( $this->upload->do_upload('image')){
        $data['name']=$name;
        $data['url']=$url;
        $data['image']=$image;
        $result=$this->Home_slider_model->add_home_slider_data($data);
        if($result){
          $this->session->set_flashdata('success_msg','Slider added successfully');
        redirect('Home_slider');
        }
       }
    }
  }
  public function delete_home_slider(){
    $id = $this->uri->segment(3); 
   $this->db->where('id',$id)->delete('home_sliders');
    $this->session->set_flashdata('success_msg','Slider deleted successfully');
        redirect('Home_slider');
  } 
  public function edit_home_slider(){

      $id = $this->uri->segment(3); 
    
   $data['views'] = $this->db->where('id',$id)
                            ->get('home_sliders')
                            ->result();

     $this->load->view('edit_home_slider',$data);
  } 
   public function update_home_slider_data()
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
      redirect('Home_slider');
    }else{

       $config['upload_path']          = './common_uploads/home_sliders';
       $config['allowed_types']        = 'gif|jpg|png';
      
       $this->load->library('upload', $config);
       $this->upload->do_upload('image');
     
        $data['name']=$name;
        $data['url']=$url;
        $data['image']=$image;
        $result=$this->Home_slider_model->update_home_slider_data($data,$id);
        if($result){
          $this->session->set_flashdata('success_msg','Slider updated successfully');
        redirect('Home_slider');
        }
       
    }
  }
}
<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Health_category extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Health_category_model'); 
        $this->load->model('Product_model'); 
    }  
     public function index()
     {
        $data['view']=$this->Health_category_model->get_health_category();
       $this->load->view('add_view_health_category',$data);
     
     }
     public function update_health_category_data()
     {

      $hel_cat_id=$this->input->post('health_id');
      $cat_name=$this->input->post('cat_name');
      $hidden_image=$this->input->post('hidden_image');
      $cat_image=$_FILES['cat_image']['name'];
      $description=$this->input->post('description');
      $prod_id=$this->input->post('prod_name');

      if(empty($cat_image)){
        $cat_image=$hidden_image;
      }else
      {
        $cat_image=$cat_image;
      }

       
      if(empty($cat_name)||empty($cat_image)||empty($description))
      {
        
        $this->session->set_flashdata('error_form_msg','All fields are required');
        redirect("Health_category/edit_health_category");
      } else{
         $config['upload_path'] = './common_uploads/health_category_images';
         $config['allowed_types'] = 'gif|jpg|png';
        
         $this->load->library('upload', $config);
          $this->upload->do_upload('cat_image');
          $data['cat_name']=$cat_name;
          $data['cat_image']=$cat_image;
          $data['description']=$description;
          if(!empty($prod_id)){
            $this->db->where('hel_cat_id',$hel_cat_id)->delete('prod_health_segment');
          foreach ($prod_id as $value) {
            // echo "health_id:".$hel_cat_id." "."prod_id:".$value."<br>";
            $this->db->insert('prod_health_segment',['hel_cat_id'=>$hel_cat_id,'prod_id'=>$value]);
              } 
            }
         $res=$this->Health_category_model-> update_health_category_data($hel_cat_id,$data);
              if($res>0){
                $this->session->set_flashdata('success_form_msg','Health category updated successfully');
              redirect("Health_category");
              }else{
                $this->session->set_flashdata('error_form_msg','Unable to update health category');
              
           }
      }
     }
     public function edit_health_category()
     {
      $hel_cat_id=$this->uri->segment(3);
     $data['view']= $this->Health_category_model->edit_health_category($hel_cat_id);
     $data['prod']= $this->Product_model->get_product();
     $data['prod_seg']=$this->db->select('prod_id')->where('hel_cat_id',$hel_cat_id)->get('prod_health_segment')->result();

     $this->load->view('edit_health_category',$data);

     }public function delete_health_category()
     {
      $hel_cat_id=$this->uri->segment(3);
     $row= $this->Health_category_model->delete_health_category($hel_cat_id);
     if($row>0){
      $this->session->set_flashdata('success_table_msg','Health category deleted successfully !');
      redirect("Health_category");
     }else{
      $this->session->set_flashdata('error_table_msg','Unable to deletet health category ');
     }
     $data['prod']= $this->Product_model->get_product();
     $data['prod_seg']=$this->db->select('prod_id')->get('prod_health_segment')->result();

     $this->load->view('edit_health_category',$data);

     }
     public function add_health_category_data()
     { 

        $data['cat_name']=$this->input->post('cat_name');
        $data['cat_image']=$_FILES['cat_image']['name'];
        $data['description']=$this->input->post('description');

        if(empty($data['cat_name'])||empty($data['cat_image'])||empty($data['description'])){
          
          $this->session->set_flashdata('error_form_msg','All fields are required');
          redirect ("Health_category");
        }
        else{
         // print_r($data);die;
         $config['upload_path'] = './common_uploads/health_category_images';
         $config['allowed_types'] = 'gif|jpg|png';
        
         $this->load->library('upload', $config);
           if( $this->upload->do_upload('cat_image')){
            
          $result=$this->Health_category_model-> add_health_category_data($data);
              if($result){
                $this->session->set_flashdata('success_form_msg','Health category added successfully');
              redirect("Health_category");
              }else{
                $this->session->set_flashdata('error_form_msg','Unable to add helth category');
              }
           }
      }
     }
}
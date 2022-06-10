<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Product_model');  
        $this->load->model('Common_model','cm');     
    }  
     public function index()   
     { 
           
       $data["view"] = $this->Product_model->get_products();
       $this->load->view('view_product',$data);
        }
        public function status(){ 
          $status = $_GET['status'];
          $prod_id = $_GET['prod_id'];

          $data = array('status'=> $status);
         $this->Product_model->update_status($data,$prod_id);
    }
    public function view_favorite()
   {
        $prod_name =  $this->input->get('prod_name');
        $F_date =  $this->input->get('F_date');
        $T_date =  $this->input->get('T_date');
           if(!empty($F_date) && !empty($T_date) ) 
        {
            // $data['view'] = $this->cm->get_data ('products',['date>=' =>$F_date, 'date <='=>$T_date]);
       $data["view"] = $this->Product_model->get_product_by_date($F_date,$T_date);
        }elseif(!empty($prod_name)){
       $data["view"] = $this->Product_model->select_all_products($prod_name);
        }else{
    $data['view']=$this->Product_model->view_favorite();
  }
    $this->load->view('view_favorite',$data);
   }
    public function add_product_gallary()
    {
      $prod_id=$this->uri->segment(3);
       $title=$this->input->post('title');
      $image=$_FILES['image']['name'];
       if(empty($title) || empty($image))
      {
                 $this->session->set_flashdata('error_form_msg','All fields are required');
                 redirect('Product/product_gallary');
      }else{
          
         $config['upload_path'] = './common_uploads/product_gallary_images';
         $config['allowed_types'] = 'gif|jpg|png';
        
         $this->load->library('upload', $config);
           if( $this->upload->do_upload('image')){
            $data['prod_id']=$prod_id;
            $data['image']=$image;
            $data['title']=$title;
            
            $result=$this->Product_model->add_product_gallary($data);
              if($result){
                $this->session->set_flashdata('success_form_msg','Product added successfully');
              redirect("Product/product_gallary/$prod_id");
              }
           }
      }
    }
    public function delete_gallary()
    {
      $prod_id=$this->uri->segment(3);
      $id=$this->uri->segment(4);
      $result=$this->Product_model->delete_gallary($id);
      if($result){
                $this->session->set_flashdata('success_table_msg','Product deleted successfully');
              redirect("Product/product_gallary/$prod_id");
    }
  }
    
    public function update_product_gallary()
    { 
       $prod_id=$this->uri->segment(3);
       $id=$this->input->post('id');
       $title=$this->input->post('title');
       $hidden_image=$this->input->post('hidden_image');
      $image=$_FILES['image']['name'];
      if(empty($image))
      {
        $image=$hidden_image;
      }else
      {
        $image=$image;
      }
       if(empty($title) || empty($image))
      {
       $this->session->set_flashdata('error_form_msg','All fields are required');
      redirect("Product/product_gallary/$prod_id");
    }else{
         $config['upload_path'] = './common_uploads/product_gallary_images';
         $config['allowed_types'] = 'gif|jpg|png';
        
         $this->load->library('upload', $config);
           $this->upload->do_upload('image');
            $data['prod_id']=$prod_id;
            $data['image']=$image;
            $data['title']=$title;
            
            $result=$this->Product_model->update_product_gallary($data,$id);
              if($result){
                $this->session->set_flashdata('success_table_msg','Product updated successfully');
              redirect("Product/product_gallary/$prod_id");
              }
           
      } 
    }
    public function edit_gallary()
    {
      $prod_id=$this->uri->segment(3);
      $id=$this->uri->segment(4);
      $data['view']=$this->Product_model->edit_gallary($id);
      $data['all_gall']=$this->Product_model->get_product_gallary($prod_id);

      $this->load->view('edit_view_product_gallary',$data);

    }
    public function product_gallary()
    {
      $data['prod_id']=$this->uri->segment(3);
       $data['prod']=$this->Product_model->get_product_gallary($data['prod_id']);
      
      $this->load->view('add_view_product_gallary',$data);
    }
    public function add_product()
    {
      $data['view']=$this->db->select('cat_id,cat_name')
                              ->get('dlc_category')
                            ->result();
       $data['locations_list']=$this->cm->get_data('location_master_tbl',[]);                      
      $this->load->view('add_product',$data);
    } 
    
    public function add_product_data()
    {
         
          $prod_name=$this->input->post('prod_name');
          $cat_id=$this->input->post('prod_cat');
          $prod_image=$_FILES['prod_image']['name'];
          $price=$this->input->post('price');
          $offer_price=$this->input->post('offer_price');
          $description=$this->input->post('description');
          $locations =$this->input->post('locations');
          $cleaner_count = $this->input->post('cleaner_count');
          $url    = $this->input->post('url');
          
          
        //   $slug=$this->input->post('slug');
        //   $return_status=$this->input->post('return_status');
        //   $cancelable_status=$this->input->post('cancel_status');
        //   $return_days=$this->input->post('return_days');
        //   $is_featured=$this->input->post('is_featured');
          
          // $slug=$this->input->post();
        //echo "<pre>"; print_r($slug); die();    
          
          if(empty($prod_name) || empty($cat_id)|| empty($price) || empty($offer_price) || empty($description))
          {                                 
            $this->session->set_flashdata('error_msg','All fields are required');
               redirect('Product/add_product'); die(); 
        }
       
    //    $p_img = $this->cm->file_upload_with_inverted('prod_image','./common_uploads/product_images/');
       
                                   
     //  echo "<pre>"; print_r($_FILES['prod_image']); die(); 
                                                                                                            
        $p_img = $this->cm->file_upload_multipal('prod_image','./common_uploads/product_images/');
         
            $data['prod_name']=$prod_name;
             $data['cat_id']=$cat_id;
            $data['prod_image']= json_encode($p_img);
            $data['price']=$price;
            $data['offer_price']=$offer_price;
             $data['description']=$description;
             $data['locations']=json_encode($locations);
             $data['cleaner_count']= $cleaner_count;
             $data['youtube_url']  = $url;
            $data['data_time']  = date('Y-m-d h:i:s');
           
            $result=$this->Product_model->add_product_data($data);
              if($result){
                $this->session->set_flashdata('success_msg','Product added successfully');
                     redirect('Product'); die(); 
              }else{
                     $this->session->set_flashdata('error_msg','some things went wrong please try again');
                     redirect('Product/add_product'); die(); 
              }
           
      
    }
     public function update_product_data($prod_id)
    { 

      $prod_name=$this->input->post('prod_name');
      $cat_id=$this->input->post('prod_cat');
      $hidden_image=$this->input->post('hidden_image');
     // $prod_image=$_FILES['prod_image']['name'];
      $price=$this->input->post('price');
      $offer_price=$this->input->post('offer_price');
      $description=$this->input->post('description');
          $locations     = $this->input->post('locations');
          $cleaner_count = $this->input->post('cleaner_count');
          $url   = $this->input->post('url');
          
    //   if(empty($prod_image)){
    //     $prod_image=$hidden_image;
    //   }else{
    //     $prod_image=$prod_image;
    //   }
      if(empty($prod_name) || empty($cat_id)|| empty($price) || empty($offer_price) || empty($description))
      {
       $this->session->set_flashdata('error_msg','All fields are required');
            redirect("Product/edit/$prod_id"); die(); 
    }
    //  $p_img = $this->cm->file_upload_with_inverted('prod_image','./common_uploads/product_images/');
      
        $p_img = $this->cm->file_upload_multipal('prod_image','./common_uploads/product_images/');
          
        
            $data['prod_name']=$prod_name;
            $data['cat_id']=$cat_id;
            if($p_img){ $data['prod_image']= json_encode($p_img);}
            $data['price']=$price;
            $data['offer_price']=$offer_price;
            $data['description']=$description;
              $data['locations']=json_encode($locations);
             $data['cleaner_count']= $cleaner_count;
          
            if($url){ $data['youtube_url']= $url; }  
             
            $result=$this->Product_model->update_product_data($prod_id,$data);
              if($result){
                $this->session->set_flashdata('success_msg','Product updated successfully');
              redirect('Product');  die(); 
              }else{
                     $this->session->set_flashdata('error_msg','some things went wrong please try again');
                     redirect('Product/edit_product'); die(); 
              }
           
     
    }
    public function delete()
    {
      $prod_id=$this->uri->segment(3);
      $result=$this->Product_model->delete_product($prod_id);

      if($result){
                $this->session->set_flashdata('success_msg','Product deleted successfully');
              redirect('Product');
    }  
   }
    public function edit()
    {
      $prod_id=$this->uri->segment(3);
      
      $data['cat']=$this->db->get('dlc_category')->result();
         $data['prod']=$this->Product_model->edit_product($prod_id);
        $data['locations_list']=$this->cm->get_data('location_master_tbl',[]); 
     
     $this->load->view('edit_product',$data);
     
   }
   
}
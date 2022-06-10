<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Promocodes extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Promocodes_model');  
        $this->load->model('Common_model','cm');     
    }  
    public function index()
      {  $data["view"] = $this->Promocodes_model->get_promo();   
          $this->load->view('view_promocode',$data);
         
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
    public function delete_promocode()
    {
       
      $id=$this->uri->segment(3);
    //   $id=$this->uri->segment(4);
      $result=$this->Promocodes_model->delete_promocode($id);
      if($result){
                $this->session->set_flashdata('success_table_msg','Pomocode deleted successfully');
              redirect("Promocodes");
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
    public function add_promocodes()
    {
      $data['view']=$this->db->select('prod_id,prod_name')
                              ->get('products')
                            ->result();
      $this->load->view('add_promocodes',$data );
    } 
    public function add_promocode_data()
    {
     
    //   $dxx=$this->input->post();
    //  echo"<pre>";print_r($dxx);die();
                                      
                                 
      $promo_code=$this->input->post('promo_code');
      $message=$this->input->post('message');
      //$prod_image=$_FILES['prod_image']['name'];
      $start_date=$this->input->post('start_date');
      $end_date=$this->input->post('end_date');
      $no_of_users=$this->input->post('no_of_users');
      $minimum_order_amount=$this->input->post('minimum_order_amount');
      $discount=$this->input->post('discount');
      $discount_type=$this->input->post('discount_type');
      $max_discount_amount=$this->input->post('max_discount_amount');
      $repeat_usage=$this->input->post('repeat_usage');
      $no_of_repeat_usage=$this->input->post('no_of_repeat_usage');
      $status=$this->input->post('status');
      $pack_ids = $this->input->post('pack_ids');
      
        $pack_ids = ($pack_ids)? json_encode($pack_ids) : json_encode([]) ;               
      
           $qry="Insert into promo_codes(promo_code,message,start_date,end_date,no_of_users,minimum_order_amount,discount,discount_type,max_discount_amount,repeat_usage,no_of_repeat_usage,status,apply_packages)
                                       values('$promo_code','$message','$start_date','$end_date','$no_of_users','$minimum_order_amount','$discount','$discount_type','$max_discount_amount','$repeat_usage','$no_of_repeat_usage','$status','$pack_ids')";
               $result=$this->db->query($qry);                           
            // $result=$this->Promocodes_model->add_promocode_data($data);
              
              
              //echo"<pre>";print_r($qry);die();
              if($result){
                $this->session->set_flashdata('success_msg','Promo Code added successfully');
              redirect (base_url('Promocodes'));
              }else{
                   $this->session->set_flashdata('error_msg','Promo Code Not Add');
                              redirect (base_url('Promocodes'));
              }
         
    }
     public function update_promocode_data()                                
    {   $id = $this->input->post('id');
    
         /* $dx = $this->input->post();                        
          echo "<pre>"; print_r($dx); die(); */                                        
                                                           
       $promo_code=$this->input->post('promo_code');
      $message=$this->input->post('message');
      //$prod_image=$_FILES['prod_image']['name'];
      $start_date=$this->input->post('start_date');
      $end_date=$this->input->post('end_date');
      $no_of_users=$this->input->post('no_of_users');
      $minimum_order_amount=$this->input->post('minimum_order_amount');
      $discount=$this->input->post('discount');
      $discount_type=$this->input->post('discount_type');
      $max_discount_amount=$this->input->post('max_discount_amount');
      $repeat_usage=$this->input->post('repeat_usage');
      $no_of_repeat_usage=$this->input->post('no_of_repeat_usage');
      $status=$this->input->post('status');
      $pack_ids = $this->input->post('pack_ids');
           
     if(empty($id) || empty($promo_code) || empty($message)|| empty($start_date) || empty($end_date)|| empty($pack_ids)||
            empty($no_of_users) || empty($minimum_order_amount)|| empty($discount) || empty($discount_type) ||
            empty($max_discount_amount) )
      {
      
       $this->session->set_flashdata('error_msg','All fields are required');
      redirect (base_url('Promocodes/edit/').$id);
    }else{
     //   $qry="Insert into promo_codes(promo_code,message,start_date,end_date,no_of_users,minimum_order_amount,discount,discount_type,max_discount_amount,repeat_usage,no_of_repeat_usage,status)  
       
            $data['promo_code']=$promo_code;
            $data['message']=$message;
            $data['start_date']=$start_date;
            $data['end_date']=$end_date;
            $data['no_of_users']=$no_of_users;
            $data['minimum_order_amount']=$minimum_order_amount;
            $data['discount'] = $discount;
            $data['discount_type']=$discount_type;
            $data['max_discount_amount']=$max_discount_amount;
            $data['repeat_usage']=$repeat_usage;
            $data['no_of_repeat_usage']=$no_of_repeat_usage;
            $data['status']=$status;
            
           if($pack_ids){   $data['apply_packages'] = json_encode($pack_ids); } 
           
            $result=$this->cm->update_data('promo_codes',['id'=>$id], $data);
              if($result){
                $this->session->set_flashdata('success_msg','Promo Code updated successfully');
                    redirect (base_url('Promocodes'));
              }else{
                   $this->session->set_flashdata('error_msg','Promo Code Not Update');
                       redirect(base_url('Promocodes/edit/').$id);       
              }
           
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
      $id=$this->uri->segment(3);
    
     //$data['prod']= $tt = $this->Promocodes_model->edit_promocode($id);
      $dd =$this->cm->get_data('promo_codes',['id'=>$id]);
         $data['prod'] = ($dd)? $dd[0] : '' ;                               
      // echo "<pre>"; print_r($tt);                                
      // echo "<pre>"; print_r($dd); die();                                
                                  
    
     $data['view']=$this->db->select('prod_id,prod_name')
                              ->get('products')
                            ->result();
     
   
     $this->load->view('edit_promocodes',$data);
     
   }
   
}
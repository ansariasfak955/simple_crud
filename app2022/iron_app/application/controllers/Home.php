<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
    function  __construct() {
        parent::__construct();                         
        $this->load->model('Home_model');
        $this->load->model('Common_model','cm');
          $this->load->library("pagination");
    }    
    
      public function index()
  {
    $this->load->model('Home_model');
     $data['viewuser']=$this->Home_model->selectuser();
     $data['viesbad']=$this->Home_model->selectsubadmin();
     $data['advertise']=$this->Home_model->selectadvertisement();
     $data['actusr']=$this->Home_model->select_all_active_user();
 
    $this->load->view('home',$data);
  }
  
    public function calendar(){
      $data = [];
            $res =   $this->cm->get_data('calendar_event_tbl',['active_status'=>1]);
            foreach($res as  $val){
               $val->start = $val->date;
            }
      $data['cal_list'] = json_encode($res);
            
     $this->load->view('calendar',$data); 
                
  } 


            public function add_reviews(){
               
                $this->load->view('add_reviews'); 
                
            } 
             public function store_reviews(){
                  
             //  $page_id=$this->input->post('page_id');
               $name=$this->input->post('name');
              // $title=$this->input->post('title');
               $description=$this->input->post('description');
            //   echo "<pre>";
            //   print_r($this->input->post());die;
            if( empty($name) || empty($description) ){
                    $this->session->set_flashdata('error_msg','All fields are required.');
                 redirect(base_url("Home/add_reviews"));
            }else{
              
                     $q1="insert into reviews (customer_name,description) VALUES ('$name','$description')";
                     $res1=$this->db->query($q1);
                     
                  if($res1){
                       $this->session->set_flashdata('success_msg','Review details added successfully ! .');
                         redirect(base_url("Home/view_reviews"));
                  }else{
                       $this->session->set_flashdata('error_msg','somthing went wrong. please try again.');
                 redirect(base_url("Home/add_reviews"));
                  }
         
            }
           
            }
            public function view_reviews(){
            $page   = $this->uri->segment(3);
             $page = ($page)? $page :1 ; 
         
            $limit = 10 ;
            $total = $this->cm->count_row('reviews',[]) ;;
          
            $offset = ($page-1)* $limit;
            $data['total_page'] = ceil($total/$limit); 
            $c_limit = $offset .','. $limit;
                $q="select *  from reviews  order by id desc limit $c_limit ";
                $data['con']=$this->db->query($q)->result();
                $this->load->view('view_reviews',$data); 
                
            } 
             public function edit_review(){
                 $id=$this->uri->segment(3);
                $q="select *  from reviews where id='$id'";
                $data['con']=$this->db->query($q)->row();
                $this->load->view('edit_review',$data); 
                
            } 
             public function update_reviews(){
                    $id=$this->uri->segment(3);
              // $page_id=$this->input->post('page_id');
               $name=$this->input->post('name');
              // $title=$this->input->post('title');
               $description=$this->input->post('description');
            //   echo "<pre>";
            //   print_r($this->input->post());die;
            if( empty($name) || empty($description) ){
                    $this->session->set_flashdata('error_msg','All fields are required.');
                 redirect(base_url("Home/edit_reviews/$id"));
            }else{
              
                     $q="update reviews set customer_name='$name',description='$description'  where id='$id'";
                     $res=$this->db->query($q);
                  if($res){
                       $this->session->set_flashdata('success_msg','Review details updated successfully ! .');
                         redirect(base_url("Home/view_reviews"));
                  }else{
                       $this->session->set_flashdata('error_msg','somthing went wrong. please try again.');
                 redirect(base_url("Home/edit_reviews/$id"));
                  }
         
            }
         
                
            } 
            public function delete_review(){
                 $id=$this->uri->segment(3);
                $q="delete  from reviews where id='$id'";
                $res=$this->db->query($q);
                 if($res){
                     $this->session->set_flashdata('success_msg','Review details deleted successfully ! .');
                 redirect(base_url("Home/view_reviews"));
                }else{
                       $this->session->set_flashdata('error_msg','somthing went wrong. please try again.');
                 redirect(base_url("Home/view_reviews"));
                } 
                
            } 

         
         
            public function social_media_edit()
            {
                $id = $this->uri->segment(3); 
    
                 $data['views'] = $this->db->where('id',$id)
                            ->get('social_media_link_tbl')
                            ->result();
                $this->load->view('social_media_edit',$data);
             } 
       public function update_social_media_data()
         {
                 $id=$this->uri->segment(3);
            
                 $name=$this->input->post('name');
                 $url=$this->input->post('url');
              
                if(empty($name) || empty($url) || empty($id)){
                $this->session->set_flashdata('error_msg','All fields are required');
                  redirect (base_url("Home/social_media")); die();
                }
                    
                         $image = $this->cm->file_upload_with_inverted('image', './common_uploads/social_media_icons/'); 
                         $data  = array(); 
                   
                     $data['name']=$name;
                    $data['url']=$url;
                    
                    if($image){ $data['image']=$image; }
                            
                    $result=$this->cm->update_data('social_media_link_tbl',['id'=>$id],$data);
                 
                    if($result){$this->session->set_flashdata('success_msg','social media updated successfully');
                                 redirect (base_url("Home/social_media")); die();
                        }else{  $this->session->set_flashdata('error_msg','social media Not updated');
                                      redirect (base_url("Home/social_media")); die();  }
                   
                }
           public function social_media()
           {
                      $data['view']=$this->db->order_by('id','DESC')
                                  ->get('social_media_link_tbl')
                                  ->result();
                $this->load->view('social_media',$data);
           }

  
          public function delete_social_media()
            {
                    $id = $this->uri->segment(3); 
                  $res =  $this->db->where('id',$id)->delete('social_media_link_tbl');
                  if($res){
                       $this->session->set_flashdata('success_msg','Left side bar deleted successfully');
                  }else{
                       $this->session->set_flashdata('success_msg','Left side bar deleted successfully');
                  }
                   redirect( base_url('Home/social_media'));
         } 
          
          
      public function add_calendar_data()
            {
                    $title = $this->input->post('title'); 
                    $date = $this->input->post('date'); 
                if(empty($date) || empty($date) ){
                     $dataTosend = [ 'status'=>false,'msg'=>'All field Required ','body'=>""];
                     echo json_encode($dataTosend); die(); 
                }   
                  $res =  $this->cm->insert_data ('calendar_event_tbl',['title'=>$title,'date'=>$date,'active_status'=>1]);  
                                                             
                  if($res){
                       $dataTosend = [ 'status'=>false,'msg'=>'data  add  successfully','body'=>""];
                     echo json_encode($dataTosend); die(); 
                  }else{
                      $dataTosend = [ 'status'=>false,'msg'=>'data Not add ','body'=>""];
                     echo json_encode($dataTosend); die(); 
                  }
                 
         } 
          
          
  
  
  
  
  
  
  
  
  
  
  
  
  
    
}

















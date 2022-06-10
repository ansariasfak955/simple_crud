<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

 public function __construct(){
 	 parent::__construct();
 	    	$this->load->model('Common_model','cm');
 	    	
 	    $aaadmin_id =  $this->session->userdata('admin_id');	
 	    $ooorg_id   =  $this->session->userdata('org_id');	
 	       $res = $this->cm->get_data('organisation',['admin_id'=>$aaadmin_id,'org_id'=>$ooorg_id]);
 	    if($res){}else{ redirect(base_url('Login/login')); }   
 	 	// <!--$this->load->library('paypal_lib');-->
     }                               
                            
 public function index(){
      //  `blog_tbl`(`blog_id`, `title`, `description`, `date_time`, `branch_id`, `school_id` featured_Image tags
      $school_id   =  $this->session->userdata('org_id');	
     $branch_id =  $this->session->userdata('branch_id');
     $data = array(); 
      $data['b_list'] = $this->cm->get_data('blog_tbl',['branch_id'=>$branch_id ]);
     $this->load->view('blog_list',$data);
 }
                            
 public function blog_add(){
     $id = $this->uri->segment(3);
     $data = [];
     $data['b_logs'] = $this->cm->get_data('blog_tbl',['blog_id'=>$id]); 
     $this->load->view('blog_add',$data);
 }
 public function add_blogs(){
    $title = $this->input->post('newstitle'); 
    $dis   = $this->input->post('dis'); 
    $image = $this->input->post('image'); 
    $tags  = $this->input->post('tags'); 
    $id    = $this->input->post('id'); 
   
    if(empty($title) || empty($dis))
    {
         $this->session->set_flashdata('error_msg', 'All Field Required');
          redirect(base_url('Blog/blog_add')); die(); 
    }                                                              
    //  `blog_tbl`(`blog_id`, `title`, `description`, `date_time`, `branch_id`, `school_id` featured_Image tags
      $school_id   =  $this->session->userdata('org_id');	
     $branch_id =  $this->session->userdata('branch_id');
    $img =  $this->cm->file_upload('image', 'assets/blog/')  ;
      
    
     $tag = [];
     $tag['title'] = $title; $tag['description'] = $dis; $tag['tags'] = $tags;
       if($img){ $tag['featured_Image'] = $img ; }                                                        
    
    if($id >0 ){ $res = $this->cm->update('blog_tbl',['blog_id'=>$id],$tag); $sendmsg =  'Blog update successfully';
                }else{
                          $res = $this->cm->save('blog_tbl',['title'=> $title,'description'=>$dis,'school_id'=>$school_id ,'branch_id'=>$branch_id,
                                'featured_Image'=>$img,'tags'=>$tags]); $sendmsg =  'Blog add successfully';
                     }
         
     if($res)                            
        {
            $this->session->set_flashdata('success_msg', $sendmsg);
             redirect(base_url('Blog'));  die(); 
        }else{
            $this->session->set_flashdata('error_msg', 'something went wrong please try again..');
             redirect(base_url('Blog/blog_add')); die(); 
        }
        
 }     
    public function delete_blog(){
        $id = $this->uri->segment(3);
        
        $res = $this->cm->delete('blog_tbl',['blog_id'=>$id]);
        if($res)                            
        {
            $this->session->set_flashdata('success_msg', 'Blog deleted successfully');
             redirect(base_url('Blog'));  die(); 
        }else{
            $this->session->set_flashdata('error_msg', 'something went wrong please try again..');
             redirect(base_url('Blog/blog_add')); die(); 
        }
         
        
    }
    
 
 
 
}
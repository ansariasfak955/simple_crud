<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

 public function __construct(){
 	 parent::__construct();
 	    	$this->load->model('Common_model','cm');
 	    	
 	    $aaadmin_id =  $this->session->userdata('admin_id');	
 	    $ooorg_id   =  $this->session->userdata('org_id');	
 	       $res = $this->cm->get_data('organisation',['admin_id'=>$aaadmin_id,'org_id'=>$ooorg_id]);
 	    if($res){}else{ redirect(base_url('Login/login')); }   
 	               
     }                               
                                             
 public function index(){
    
     $branch_id =  $this->session->userdata('branch_id');  
     $data['class_list'] = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id]);
     $this->load->view("rooms",$data);
 }
 public function room_detail(){                                        
     $this->load->view("room_detail");                   
 }
 
 public function jk(){                                        
   echo "<pre>"; print_r($this->session->userdata()); 
   
 }
 
 
 
 
  public function add_room(){
      $name = $this->input->post('addroom');
      $class_id = $this->input->post('class_id');
      $max_occupancy = $this->input->post('max_occupancy');
     // $dx = $this->input->post();
       $branch_id =  $this->session->userdata('branch_id');                  
     
                 
      if(empty($name) || empty($class_id) || empty($max_occupancy) ){
                     $dataTosend = ['status'=>false,'msg'=>"All Field Required",'body'=>''];
                             echo json_encode($dataTosend); die(); 
      }
      
      $res =  $this->cm->save('section_tbl', ['class_id'=>$class_id,'branch_id'=>$branch_id,'name'=>$name,'max_occupancy'=>$max_occupancy]);
      if($res){  $dataTosend = ['status'=>true,'msg'=>"Your  Successfully",'body'=>''];
                      echo json_encode($dataTosend); die();  
                 }else{
                    $dataTosend = ['status'=>false,'msg'=>"Invalid Request",'body'=>''];
                      echo json_encode($dataTosend); die();   
                 }
                                    
  }
 public function class_section_list(){
     $class_id = $this->input->post('class_id');
      $branch_id =  $this->session->userdata('branch_id');	
       $branch_id = ($branch_id)? $branch_id : 101;
       
     $res = $this->cm->get_data('section_tbl',['branch_id'=>$branch_id,'class_id'=>$class_id]); 
     
       if($res){  $dataTosend = ['status'=>true,'msg'=>"Your  Successfully",'body'=>$res];
                      echo json_encode($dataTosend); die();  
                 }else{
                    $dataTosend = ['status'=>false,'msg'=>"No Data Found ",'body'=>''];
                      echo json_encode($dataTosend); die();   
                 }
     
 }
 
 ///////////////////////////////////////  add class section //////////////////////////////////
    
  public function add_class(){
    
        $branch_id =  $this->session->userdata('branch_id');  
     $data['class_list'] = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id]);
     $this->load->view("add_class",$data);
     
   }
      // add_class_data
   
   public function get_class_data(){

      $branch_id =  $this->session->userdata('branch_id');	
    $res = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id]); 
     
       if($res){  $dataTosend = ['status'=>true,'msg'=>"Your  Successfully",'body'=>$res];
                      echo json_encode($dataTosend); die();  
                 }else{
                    $dataTosend = ['status'=>false,'msg'=>"No Data Found ",'body'=>''];
                      echo json_encode($dataTosend); die();   
                 }
     
 }

    public function add_class_data(){
      $name = $this->input->post('c_name');
      $age_group = $this->input->post('age_group');
      $max_occupancy = $this->input->post('max_occupancy');
     // $dx = $this->input->post();
       $branch_id =  $this->session->userdata('branch_id');                  
                                  
                 
      if(empty($name) || empty($age_group) || empty($max_occupancy) ){
                     $dataTosend = ['status'=>false,'msg'=>"All Field Required",'body'=>''];
                             echo json_encode($dataTosend); die(); 
      }
      
      /// `class_id`, `branch_id`, `name`, `age_group`, `max_occupancy`
      
      
      $res =  $this->cm->save('class_tbl', ['age_group'=>$age_group,'branch_id'=>$branch_id,'name'=>$name,'max_occupancy'=>$max_occupancy]);
      if($res){  $dataTosend = ['status'=>true,'msg'=>"Your  Successfully",'body'=>''];
                      echo json_encode($dataTosend); die();  
                 }else{
                    $dataTosend = ['status'=>false,'msg'=>"Invalid Request",'body'=>''];
                      echo json_encode($dataTosend); die();   
                 }
                                    
  }
}
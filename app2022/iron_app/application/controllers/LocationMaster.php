<?php defined('BASEPATH') OR exit('No direct script access allowed');
class LocationMaster extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        
        $this->load->model('Common_model','cm');
    }    

  public function index()
  {
  
    $data['view']=$this->cm->get_data('location_master_tbl',[]);
    $this->load->view('add_location',$data);
  }                                   
  
 
    
    function add(){
	       
         $name =  trim($this->input->post('name'));
      
        if(empty($name) ){
                 $this->session->set_flashdata('error_msg', 'Name Field Reqired');
                 redirect(base_url('LocationMaster')); die(); 
             }
         
          $insertUserData = $this->cm->insert_data ('location_master_tbl',['location_name'=>$name,'date'=> date('Y-m-d')]);
            
            
          if($insertUserData){
                
                $this->session->set_flashdata('success_msg', 'Location have been added successfully.');
                   redirect(base_url('LocationMaster')); die(); 
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
                   redirect(base_url('LocationMaster')); die(); 
            }
      
    }

     public function delete() { 
       
         $id = $this->uri->segment('3'); 
         $this->cm->deleteRecord('location_master_tbl',['location_id'=>$id]); 
   
         redirect(base_url('LocationMaster')); 
      } 

        
   public function update_row()
    {
        $image = '';
            if(isset($_FILES['image']['name'])){
               $image =  $this->cm->file_upload_with_inverted('image', 'uploads/blog/');  
              }
        
       $tit   =  $this->input->post('tit');
       $des   =  $this->input->post('des');
       $datee =  $this->input->post('datee');
       $id    =  $this->input->post('mid');
      
        //echo "<pre>"; print_r($dx); die(); 
      
        
        if(empty($id) || empty($tit) || empty($des) || empty($datee)){
                 $this->session->set_flashdata('error_msg', 'All Field Reqired');
                     redirect(base_url('Blog/update_rows/').$id); die(); 
             }
          if($image){  $userData = array('title'       =>$this->input->post('tit'),
                                          'description' =>$this->input->post('des'),
                                             'date'       =>$this->input->post('datee'),
                                              'image'      => $image,);
                 }else{
                  
                $userData = array( 'title'       =>$this->input->post('tit'),
                                   'description' =>$this->input->post('des'),
                                    'date'       =>$this->input->post('datee'),);
              }
          $insertUserData = $this->cm->update_data ('dlc_blog',['bl_id'=>$id ],$userData);
            
            
          if($insertUserData){
                
                $this->session->set_flashdata('success_msg', 'Blog have been added successfully.');
                   redirect(base_url('Blog')); die(); 
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
                   redirect(base_url('Blog/update_rows').$id ); die(); 
            }
      
    }

        public function update_Location() { 
             
         $name        =  trim($this->input->post('name'));
         $location_id =  trim($this->input->post('location_id'));
      
        if(empty($name) || empty($location_id) ){
                 $this->session->set_flashdata('error_msg', 'All Field Reqired');
                 redirect(base_url('LocationMaster')); die(); 
             }
         
          $res = $this->cm->update_data ('location_master_tbl',['location_id'=>$location_id],['location_name'=>$name]);
            
            
          if($res){
                
                $this->session->set_flashdata('success_msg', 'Location have been Update successfully.');
                   redirect(base_url('LocationMaster')); die(); 
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
                   redirect(base_url('LocationMaster')); die(); 
            }
      
      } 


       public function update_delete()
    {
        $services_id = $this->uri->segment('3');
        $delete_status = 0; 
          $id=$services_id;
        $data=array(
            'update_delete'=>$delete_status,
      );
        $this->load->model('Blog_model');
        $this->Blog_model->updatadelete($id,$data);
       redirect($_SERVER['HTTP_REFERER']);
    }

       public function help_support()
       {     
             $data['view']=$this->Blog_model->selectcattt();
        	$this->load->view('view_help_support',$data); 
          
        }
       public function help_support_web()
         {     
            $q =  "select * from dlc_contact order by id desc";
            $data['view'] = $this->db->query($q)->result();
        	
        	$this->load->view('view_help_support_web',$data); 
          
        } 
       public function contact_feedback_add()
         {   
            $id = $this->input->post('id');
            $disc = $this->input->post('disc');
          
            $res = $this->cm->update_data('dlc_contact',['con_id'=>$id ],['feedback' => $disc]);
            
            if($res)
            {
                $dataTosend = ['status'=>true, 'msg' =>'Success','body'=>''];
                                       echo json_encode($dataTosend); die();   
            }else{
                     $dataTosend = ['status'=>false, 'msg' =>'No message send ','body'=>''];
                                       echo json_encode($dataTosend); die(); 
               }
            
         } 
       public function contact_feedback_add_app()
         {   
            $id = $this->input->post('id');
            $disc = $this->input->post('disc');
          
            $res = $this->cm->update_data('dlc_help_support',['h_id'=>$id ],['feedback' => $disc]);
            
            if($res)
            {
                $dataTosend = ['status'=>true, 'msg' =>'Success','body'=>''];
                                       echo json_encode($dataTosend); die();   
            }else{
                     $dataTosend = ['status'=>false, 'msg' =>'No message send ','body'=>''];
                                       echo json_encode($dataTosend); die(); 
               }
            
         }    
         
       public function pdf()
      {
    
       $this->load->view('PDF/pdf_add');
      }   
         
}
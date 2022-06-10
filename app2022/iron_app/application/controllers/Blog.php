<?php defined('BASEPATH') OR exit('No direct script access allowed');
class BLog extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->model('Common_model','cm');
    }    

      public function index()
  {
    $this->load->model('Blog_model');
    $data['view']=$this->Blog_model->selectcat();
    $this->load->view('view_blog',$data);
  }
 public function add_blog()
  {
	 $this->load->view('add_blog'); 
  }
    
    function add(){
	        $image = '';
            if(isset($_FILES['image']['name'])){
               $image =  $this->cm->file_upload_with_inverted('image', 'uploads/blog/');  
              }
        
       $tit   =  $this->input->post('tit');
       $des   =  $this->input->post('des');
       $datee =  $this->input->post('datee');
        
        if(empty($tit) || empty($des) || empty($datee)){
                 $this->session->set_flashdata('error_msg', 'All Field Reqired');
                 redirect(base_url('Blog/add_blog')); die(); 
             }
         
            $userData = array(
               'title'=>$this->input->post('tit'),
               'description'=>$this->input->post('des'),
                'date'=>$this->input->post('datee'),
                'image' => $image,
            );
		
            $insertUserData = $this->cm->insert_data ('dlc_blog',$userData);
            
            
          if($insertUserData){
                
                $this->session->set_flashdata('success_msg', 'Blog have been added successfully.');
                   redirect(base_url('Blog')); die(); 
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
                   redirect(base_url('Blog/add_blog')); die(); 
            }
      
    }

     public function delete() { 
         $this->load->model('Blog_model'); 
         $services_id = $this->uri->segment('3'); 
         $this->Blog_model->delete($services_id); 
   
         redirect('Blog'); 
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

        public function update_rows() { 
         $this->load->helper('form');
         $this->load->helper('url'); 
         $services_id = $this->uri->segment('3'); 
         $query = $this->db->get_where("dlc_blog",array("bl_id"=>$services_id));
         $data['records'] = $query->result(); 
         $data['services_id'] = $services_id; 
        //$data['ctt']=$this->Blog_model->selectname($services_id);
       // $data['catname']=$this->Blog_model->selectcat();
         $this->load->view('edit_blog',$data); 
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
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class CatFaq extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->model('Common_model','cm');
    }    

      public function index()
  {
    
    $q = "SELECT a.*,b.cat_name  FROM `cat_faq_tbl` as a join dlc_category as b on a.cat_id = b.cat_id";
    $data['view']=$this->db->query($q)->result();
    $this->load->view('cat_faq_list',$data);
  }
 public function add_cat_faq()                   
  {
      $id = $this->uri->segment(3);                      
      
       $data['faq_data'] = $this->cm->get_data('cat_faq_tbl',['id'=>$id]);
      
    $data['cat_list'] = $this->cm->get_data('dlc_category',[]);
	 $this->load->view('add_cat_faq',$data); 
  }
    
    function add(){
	       
       $qs   =  trim($this->input->post('qs'));
       $ans   =  trim($this->input->post('ans'));
       $cat_id=  trim($this->input->post('cat_id'));
       $faq_id =  trim($this->input->post('faq_id'));
       $dx  =  $this->input->post();
     /// echo "<pre>"; print_r($dx); die(); 
                                                     
      
        if(empty($qs) || empty($ans) || empty($cat_id) ){
                 $this->session->set_flashdata('error_msg', 'All Field Reqired');
                 redirect(base_url('CatFaq')); die(); 
             }
             $addData =['question'=>$qs,'answer'=>$ans,'cat_id'=>$cat_id];
          
          if($faq_id >= 1 ){ $sendmsg = "FAQ have been added successfully.";
            $insertUserData = $this->cm->update_data('cat_faq_tbl',['id'=>$faq_id],$addData) ;
            }else{  $sendmsg = "FAQ have been Update successfully.";
                $insertUserData = $this->cm->insert_data ('cat_faq_tbl',$addData);
            }
                                              
          if($insertUserData){
                 $this->session->set_flashdata('success_msg', $sendmsg );
             }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
                
               }
        redirect(base_url('CatFaq')); die(); 
    }

     public function delete() { 
        
         $id = $this->uri->segment('3'); 
        $res =  $this->cm->deleteRecord('cat_faq_tbl',['id'=>$id]) ; 
     
       if($res){
                $this->session->set_flashdata('success_msg', 'FAQ have been Delet successfully.');
                 
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
                 
            }
        redirect(base_url('CatFaq')); die(); 
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
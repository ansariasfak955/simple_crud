<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class PDF_controller extends CI_Controller
{
    function  __construct() {
        parent::__construct();
         $this->load->model('Openquiz_model');
        $this->load->model('Common_model','cm');
        $this->load->model('MLM_model','mm');
        $this->load->library("pagination");        
    }  

 public function index()
      {
            
            $data = array();
            $data['pdf_list'] = $tt = $this->cm->get_data('dlc_PDF_tbl',[]);
            
           // echo "<pre>"; print_r($tt); die(); 
            
            $this->load->view('PDF/view_pdf',$data);
      }
      
      
   public function pdf()
      {
           $id = $this->uri->segment(3); 
           
              $data['pdf_list']  =  $this->cm->get_data ('dlc_PDF_tbl',['pdf_id'=>$id]);
            
            
         $this->load->view('PDF/pdf_add',$data);
      }
         
       public function add_PDF()
       {
           $pdf_name = trim($this->input->post('pdf_name'));
           $pdf_id = trim($this->input->post('pdf_id'));
           
               $pdf_image = ''; 
            if (!empty($_FILES["image"]))
            {
                     $target_dir = "assets/PDF/";
                       $pdf_image = rand(1000,9999).$_FILES["image"]["name"];  
                        $target_file = $target_dir .$pdf_image;
                        
                        
                        
                   if (! move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
                   {
                       $pdf_image = '';
                   }
            }    
                   
                   
             if(!empty($pdf_id))
             {
                 $whr_tag = ($pdf_image == '' )? ['pdf_name'=> $pdf_name]  : ['pdf_name'=>$pdf_name,'pdf_path'=>$pdf_image,'date' => date('Y-m-d')] ;
                 
                  $res2 =  $this->cm->update_data ('dlc_PDF_tbl',['pdf_id' => $pdf_id ],$whr_tag);
            
            if($res2){
        		     $this->session->set_flashdata('success_msg', 'PDF Updated successfully '); 
        		    }else{
        		        
        		         $this->session->set_flashdata('error_msg', 'PDF Not Update '); 
        		    }
                  redirect(base_url('PDF_controller')); die();
             }else{
                 
           
         $res =  $this->cm->insert_data ('dlc_PDF_tbl',['pdf_name'=>$pdf_name,'pdf_path'=>$pdf_image,'date' => date('Y-m-d')]);
            
            if($res){
        		     $this->session->set_flashdata('success_msg', 'PDF Inserted successfully '); 
        		    }else{
        		        
        		         $this->session->set_flashdata('error_msg', 'PDF Not Inserted '); 
        		    }
        		    redirect(base_url('PDF_controller/pdf'));   die();  
             }		 
            	    
                
                   
        
           
       }
      
       public function pdf_delete()
       {
           $id = $this->uri->segment(3); 
           
            $res =  $this->cm->deleteRecord ('dlc_PDF_tbl',['pdf_id'=>$id]);
            
            if($res){
        		     $this->session->set_flashdata('success_msg', 'PDF Delete successfully '); 
        		    }else{
        		        
        		         $this->session->set_flashdata('error_msg', 'PDF Not Delete '); 
        		    }
        		    
            		 
            	    
                redirect(base_url('PDF_controller'));    
                   
            } 
           
      
      
      
      
}
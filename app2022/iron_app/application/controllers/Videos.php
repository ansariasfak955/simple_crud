<?php //set_time_limit(0);
error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Videos extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Videos_model');
          $this->load->library("pagination");    
          
            $this->load->model('common_model', 'cm');  
    }  
                     

        
     public function index()
        { 
            $data["view"] = $this->Videos_model->select_all_videos();
            
            $this->load->view('view_videos', $data);
         }
        

      public function add_video_data()
      {
       if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
  
          $configVideo['upload_path'] = 'upload/videos';
        
        $configVideo['max_size'] = '600000000';
        
        $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
        $configVideo['overwrite'] = FALSE;
        $configVideo['remove_spaces'] = TRUE;
        $video_name = $_FILES['video']['name'];
        $configVideo['file_name'] = $video_name;
        
        $this->load->library('upload', $configVideo);
        $this->upload->initialize($configVideo);
        if($this->upload->do_upload('video')) {
          $videoDetails = $this->upload->data();
          $video = $videoDetails['file_name'];
          
        }else{
            $video = "";                     
        }
        
    } else {
        $video = "";
    }
     $dat = date("Y-m-d");
     $cat = $this->input->post('cat');
     $free = $this->input->post('chkfreevideo');
     //echo "checkbox value: ".$free; die();
    if($free != 1)
    {
        $free = 0;
    }
    //echo "checkbox value: ".$free; die();
     $alpha = $this->input->post('alphnm');
    $videowordnm = $this->input->post('videowrd');


   $data = array(
        'video_url' => $video,
        'video_name'=> $videowordnm,
        'videos_date'=> $dat,
		'cat_id'=> $cat,
        'video_alpha'=> $alpha,
        'free_status'=> $free
          );

    //print_r($data); die();

     $insertUserData = $this->Videos_model->insert($data);  
          if($insertUserData){
                
               $this->session->set_flashdata('success_msg','Video have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
            ?> 
            <script type="text/javascript">
                window.location.href ="<?php echo base_url();?>Videos/index"  
            </script>
            
            <?php
        // redirect('Videos');
       
      
    }
     public function edit(){ 
         $this->load->helper('form');
         $this->load->helper('url'); 
         $services_id = $this->uri->segment('3'); 
         $query = $this->db->get_where("dlc_videos",array("videos_id"=>$services_id));
         $data['records'] = $query->result(); 
         $data['services_id'] = $services_id; 
         $this->load->view('edit_video',$data); 
      } 
    public function update_row()
    {
      $id=$this->input->post('uid');
        
        // if(!empty($_FILES["video"]["name"])){

        //    $video = $_FILES["video"];
        //    $videoname = $_FILES["video"]["name"];
        //    $videotempname = $_FILES["video"]["tmp_name"];
        //    move_uploaded_file($videotempname, "upload/videos/".$videoname); 

        //      }else{
        //        $videoname = $this->input->post('oldvideo');
        //      }
       if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
       
        $dat = date("Y-m-d");
        $config['upload_path'] = 'upload/videos';
        $config['max_size'] = '60000';
        $config['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $video_name = $_FILES['video']['name'];
        $config['file_name'] = $video_name;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('video')) {
          $videoDetails = $this->upload->data();
          $video = $videoDetails['file_name'];
          
        }else{
            $video = "";                     
        }
        
    }else{
        $video = $this->input->post('oldvideo');;
    }



    $dat = date("Y-m-d");
    $alpha = $this->input->post('alpha');
    $videowordnm = $this->input->post('fname');
    $viewdate = $this->input->post('dt');
     $free = $this->input->post('chkfreevideo');

        $data = array(
        'video_url' => $video,
        'video_name'=> $videowordnm,
        'videos_date'=> $dat,
        'video_alpha'  => $alpha,
        'free_status'=> $free
            );
            
      
        $this->load->model('Videos_model');
        $this->Videos_model->updata($id,$data);
      $this->session->set_flashdata('successm_msg','Video have been updated successfully.');
       ?> 
            <script type="text/javascript">
                window.location.href ="<?php echo base_url();?>Videos/index"  
            </script>
            
        <?php 
}
 public function status()
 {
    $st = $_GET['status'];
    $idst = $_GET['id'];
    $data = array('status' => $st);
  $this->Videos_model->update_status($data,$idst);
 }
 public function deletee() { 
     //echo "ghghg";exit;
     //echo $this->uri->segment('5');exit;
         $this->load->model('Videos_model'); 
         $services_id = $this->uri->segment('3'); 
         $this->Videos_model->delete($services_id); 
   
         redirect('Videos');      
      } 

    /*===================jk ===================================*/

        public function img_and_video_upload()
        {
            $this->load->view('slide_page_1');
            
        }
        
          public function slide_add_image()
            {       
                $sendData = array();
                $sendData['data'] = $this->cm->get_data('dlc_slide_image_tbl',[]);
                //echo "<pre>"; print_r($sendData); die();
               
                $this->load->view('slide_page_2',$sendData);
                
            }
       //edit_image
         public function edit_image()
            { 
                        $id = $this->input->post('id');
                   
                      if( empty($id) )
                        {
                          $dataTosend = ['status'=>false, 'msg' =>'Image Id  Field Rquired','body'=>''];
                                       echo json_encode($dataTosend); die();
    
                        }  
                 $file = $_FILES['image'];
                
                        $img_name =''; 
                    if(isset($_FILES['image']))
                    {
                        
                        
                        $img_name = rand(1000,9999).$_FILES['image']['name'];
                         $Path1 =  "assets/slide_file/".$img_name; 
               			if(!move_uploaded_file($_FILES['image']['tmp_name'],$Path1))
        				{
        				    $img_name = ""; 
        				    
        				}
                       }
                         
                    if($img_name != "")    
                    {
                        $q = "UPDATE dlc_slide_image_tbl SET  image =  '$img_name' where id= '$id' ";
                        
                        $res = $this->db->query($q);
                        
                        if($res)
                            {
                                 $dataTosend = ['status'=>false, 'msg' =>'Image  Updated successfully ','body'=>''];
                                       echo json_encode($dataTosend); die(); 
                                
                            }else{
                               
                                 $dataTosend = ['status'=>false, 'msg' =>'Image Not Updated','body'=>''];
                                       echo json_encode($dataTosend); die(); 
                            }         
                        
                        }
                        
                        $dataTosend = ['status'=>false, 'msg' =>'something went wrong please try again','body'=>''];
                                       echo json_encode($dataTosend); die(); 
            }
          public function dtl_image()
            { 
                        $id = $this->input->post('id');
                   
                      if( empty($id) )
                        {
                          $dataTosend = ['status'=>false, 'msg' =>'Image Id  Field Rquired','body'=>''];
                                       echo json_encode($dataTosend); die();
    
                        }   
                    
                     $res = $this->cm-> deleteRecord('dlc_slide_image_tbl',['id'=>$id]);  
             
                      if($res)
                      {
                           $dataTosend = ['status'=>true, 'msg' =>'Image Deleted Successfully','body'=>''];
                                           echo json_encode($dataTosend); die();  
                      }else{
                             $dataTosend = ['status'=>false, 'msg' =>'Image Not deleted ','body'=>''];
                                           echo json_encode($dataTosend); die();  
                      }
            }
        public function add_slide_image()
            {   
              
                
                $file = $_FILES['image'];
                
               // echo $type ." == jk <br>"; print_r($file);
                
               
                         
                           $img_name =''; 
                    if(isset($_FILES['image']))
                    {
                        
                        
                        $img_name = rand(1000,9999).$_FILES['image']['name'];
                         $Path1 =  "assets/slide_file/".$img_name; 
               			if(!move_uploaded_file($_FILES['image']['tmp_name'],$Path1))
        				{
        				    $img_name = ""; 
        				     $this->session->set_flashdata('successm_msg','Data Not added ...');
        				}
                       }
                         
                    if($img_name != "")    
                    {
                        $q = "insert into dlc_slide_image_tbl (image)VALUES('$img_name')";
                        
                        $res = $this->db->query($q);
                        
                        if($res)
                        {
                              $this->session->set_flashdata('successm_msg','Data added successfully.');
                        }else{
                             $this->session->set_flashdata('successm_msg','Data Not added .');
                        }
                    }
                    
                 redirect( base_url('Videos/slide_add_image'));      
            }
          public function add_slide()
            {   
                $type = $this->input->post('options');
                
                
                
                $my_type = ($type == 'image')? 1:2;
                         
                 $qx = "select * from dlc_slide_image_video_tbl "  ;  
                   $dx = $this->db->query($qx)->result();
                    
                    if(count($dx)>0)
                    {    
                        $my_id = $dx[0]->id;
                        $qz = "UPDATE dlc_slide_image_video_tbl SET type = '$my_type' WHERE id = '$my_id' "; 
                        
                           $up =  $this->db->query($qz);
                           
                                    if($up)
                                    {
                                        	$dataTosend = ['status'=>true, 'msg' =>'slide Type Updated Successfully.', 'body'=>''];
            			            	echo json_encode($dataTosend); die();
                                        
                                        
                                    }else{
                                    	$dataTosend = ['status'=>false, 'msg' =>'slide Type Not Update .', 'body'=>''];
            			            	echo json_encode($dataTosend); die();
                                        
                                       
                                    }
                      
                    }
                        $q = "insert into dlc_slide_image_video_tbl (type)VALUES('$my_type')";
                        
                        $res = $this->db->query($q);
                        
                        if($res)
                        {
                            	$dataTosend = ['status'=>true, 'msg' =>'slide Type added successfully.', 'body'=>''];
			            	echo json_encode($dataTosend); die();
                            
                            
                        }else{
                        	$dataTosend = ['status'=>false, 'msg' =>'slide Type Not added .', 'body'=>''];
			            	echo json_encode($dataTosend); die();
                            
                           
                        }
                
                    
                     
            }











}






















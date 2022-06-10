<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Introduation extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Introduation_model');
          $this->load->library("pagination");          
    }  


    public function index(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Introduation/index";
 
       $config["total_rows"] = $this->Introduation_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
       $data["view"] = $this->Introduation_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();
    
      $this->load->view('view_introduation', $data);
        }

      public function add_introduation()
      {
        $this->load->view('add_introduation');
      }

      public function add_introduation_data()
      {
    //           $dat = date("Y-m-d");

    //        $video = $_FILES["video"];
    //        $videoname = $_FILES["video"]["name"];
    //        $videotempname = $_FILES["video"]["tmp_name"];
    //        move_uploaded_file($videotempname, "upload/videos/".$videoname); 

    // $alpha = $this->input->post('alphnm');
    // $videowordnm = $this->input->post('videowrd');
    // $viewdate = $this->input->post('videodt');

    //       $data = array(
    //     'video_url' => $videoname,
    //     'video_name'=> $videowordnm,
    //     'videos_date'=> $dat,
    //     'video_alpha'=> $alpha
    //       );


      if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
       
        $dat = date("Y-m-d");
        $configVideo['upload_path'] = 'upload/Introduation';
        $configVideo['max_size'] = '60000';
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
        
    }else{
        $video = "";
    }

             $dat = date("Y-m-d");

     $tit = $this->input->post('tit');
   $des = $this->input->post('des');
    

   $data = array(
        'video_url' => $video,
        'description'=> $des,
        'videos_date'=> $dat,
        'title'=> $tit
          );


   //print_r($data);exit;
     $insertUserData = $this->Introduation_model->insert($data);  
          if($insertUserData){
                ?>
               <?php 
               $this->session->set_flashdata('success_msg','Introduation have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
            ?> 
            <script type="text/javascript">
                window.location.href ="<?php echo base_url();?>Introduation/add_introduation"  
            </script>
            
            <?php
        // redirect('Videos');
       
      
    }
     public function edit(){ 
         $this->load->helper('form');
         $this->load->helper('url'); 
         $services_id = $this->uri->segment('3'); 
         $query = $this->db->get_where("dlc_introduation",array("id"=>$services_id));
         $data['records'] = $query->result(); 
         $data['services_id'] = $services_id; 
         $this->load->view('edit_introduation',$data); 
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
        $configVideo['upload_path'] = 'upload/Introduation';
        $configVideo['max_size'] = '60000';
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
        
    }else{
        $video = $this->input->post('oldvideo');;
    }



    $dat = date("Y-m-d");
     $tit = $this->input->post('tit');
   $des = $this->input->post('des');
    

   $data = array(
        'video_url' => $video,
        'description'=> $des,
        'videos_date'=> $dat,
        'title'=> $tit
          );
            
      
        $this->load->model('Introduation_model');
        $this->Introduation_model->updata($id,$data);
       ?> 
            <script type="text/javascript">
                window.location.href ="<?php echo base_url();?>Introduation/index"  
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
   public function delete() { 
         $this->load->model('Introduation_model'); 
         $services_id = $this->uri->segment('3'); 
         $this->Introduation_model->delete($services_id); 
   
         redirect('Introduation'); 
      } 

 

}
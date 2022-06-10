<?php error_reporting(E_ALL);
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Demo_video extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Demo_video_model');
          $this->load->library("pagination");          
    }  


  /*  public function index(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Demo_video/index";
 
       $config["total_rows"] = $this->Demo_video_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
       $data["view"] = $this->Demo_video_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();
    
      $this->load->view('view_demo_video', $data);
        } */
        
     public function index()
         { 
          $data["view"] = $this->Demo_video_model->select_demo_video();
          $this->load->view('view_demo_video', $data);
             
         }

      public function add_demo()
      {
        $this->load->view('add_demo_video');
      }

     public function add_demo_data()
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
        $configVideo['upload_path'] = 'upload/defaencodevid';
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
     $insertUserData = $this->Demo_video_model->insert($data);  
          if($insertUserData){
                ?>
               <?php 
               $this->session->set_flashdata('success_msg','Demo video have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
            ?> 
            <script type="text/javascript">
                window.location.href ="<?php echo base_url();?>Demo_video"  
            </script>
            
            <?php
        // redirect('Videos');
       
      
    }
     public function edit(){ 
         $this->load->helper('form');
         $this->load->helper('url'); 
         $services_id = $this->uri->segment('3'); 
         $query = $this->db->get_where("dlc_demo_video",array("id"=>$services_id));
         $data['records'] = $query->result(); 
         $data['services_id'] = $services_id; 
         $this->load->view('edit_demo_video',$data); 
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
        $configVideo['upload_path'] = 'upload/defaencodevid';
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
            
      
        $this->load->model('Demo_video_model');
        $this->Demo_video_model->updata($id,$data);
        $this->session->set_flashdata('successm_msg','Demo video have been updated successfully.');
       ?> 
            <script type="text/javascript">
                window.location.href ="<?php echo base_url();?>Demo_video/index"  
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
  public function add_answer()
        {
           $this->load->view('add_demo_quiz');

        }
		  function add_demos(){

           $qst = $this->input->post('qsnss');
           $pckk = $this->input->post('ppck');
              $dat = date("Y-m-d");
       
   $userDataa = array(
          
          'quizcat_id'=>$this->input->post('cat'),
          'quiz_date'=>$dat,
          'quiz_qs'=>$this->input->post('qsnss'),
          'pack_id'=>$pckk         
            );

             if(!empty($qst))
             {
            $insertUserDataa = $this->Demo_video_model->insert_quiz($userDataa);
             }  
   $id = $this->db->insert_id();
   $query = $this->db->get_where('dlc_initial', array('quiz_id' => $id));
   $data['records'] = $query->row();
   $idd = $data['records']->quiz_id;

            
   $single1 = $this->input->post('sigle1');
   $single2 = $this->input->post('sigle2');
   $single3 = $this->input->post('sigle3');
   $single4 = $this->input->post('sigle4');
   $chk1 = $this->input->post('chk');
   $chk2 = $this->input->post('chk');
   $chk3 = $this->input->post('chk');
   $chk4 = $this->input->post('chk');
   
   $multi1 = $this->input->post('multii1');
   $multi2 = $this->input->post('multii2');
   $multi3 = $this->input->post('multii3');
   $multi4 = $this->input->post('multii4');
   $mchk1 = $this->input->post('mchk1');
   $mchk2 = $this->input->post('mchk2');
   $mchk3 = $this->input->post('mchk3');
   $mchk4 = $this->input->post('mchk4');

    $fillin = $this->input->post('fill');
    $passage = $this->input->post('passage');
    
     
         
     if($single1||$single2||$single3||$single4 > '0')
     {
      
      if($chk1==1)
      {
        $chh1 = 1;
      }
      if($chk2==2)
      {
        $chh2 = 1;
      }
      if($chk3==3)
      {
        $chh3 = 1;
      }
      if($chk4==4)
      {
        $chh4 = 1;
      }

       $data=array(
              array(
                'quiz_id'=>$idd,
                'quiz_answer'=>$single1,
                'quiz_status'=>$chh1
                ),
              array(
                'quiz_id'=>$idd,
                'quiz_answer'=>$single2,
                'quiz_status'=>$chh2
                ),
              array(
                'quiz_id'=>$idd,
                'quiz_answer'=>$single3,
                'quiz_status'=>$chh3
                ),
             array(
                'quiz_id'=>$idd,
                'quiz_answer'=>$single4,
                'quiz_status'=>$chh4
                )
              );
        $this->Demo_video_model->insert_sigle_choice($data);
            }
   elseif($fillin > '0'){
    $answer = array('quiz_id'=>$idd,
                    'quiz_answer'=>$fillin,
                     'quiz_status'=>1
                       );
       $this->Demo_video_model->insert_answer($answer);
     
   }
   elseif($passage >'0'){
     $answerp = array(
                    'passage'=>$passage,
                     'pass_status'=>1,
                     'pack_id'=>$pckk
                       );
    
    $this->Demo_video_model->insert_passage($answerp);
   $ids = $this->db->insert_id();
   $query = $this->db->get_where('dlc_initial_passage',array('passage_id' => $ids));
   $data['recordss'] = $query->row();
   $idds = $data['recordss']->passage_id;
   redirect(base_url()."Demo_video/select_paa_sel/".$idds); 

   }
   elseif($multi1||$multi2||$multi3||$multi4 > '0'){


     if($mchk1==1)
      {
        $mmt1 = 1;
      }
      if($mchk2==2)
      {
        $mmt2 = 1;
      }
      if($mchk3==3)
      {
        $mmt3 = 1;
      }
      if($mchk4==4)
      {
        $mmt4 = 1;
      }


       $dataa=array(
              array(
                'quiz_id'=>$idd,
                'quiz_answer'=>$multi1,
                'quiz_status'=>$mmt1
                ),
              array(
                'quiz_id'=>$idd,
                'quiz_answer'=>$multi2,
                'quiz_status'=>$mmt2
                ),
              array(
                'quiz_id'=>$idd,
                'quiz_answer'=>$multi3,
                'quiz_status'=>$mmt3
                ),
             array(
                'quiz_id'=>$idd,
                'quiz_answer'=>$multi4,
                'quiz_status'=>$mmt4
                )
              );
   
     $this->Demo_video_model->insert_mult_answer($dataa);

 }
      
          if($insertUserDataa){
         $this->session->set_flashdata('success_msg', 'Quiz Category have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
           
     
        redirect('Demo_video/add_answer'); 
    }
     /*
	public function select_demo(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Demo_video/select_quiz";
 
       $config["total_rows"] = $this->Demo_video_model->record_counttq();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     // $courses = $this->input->post('crss');
 
       $data["view"] = $this->Demo_video_model->
 
           fetch_departmentssq($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();

      $this->load->view('view_demo_q', $data);
        } */
        
        public function select_demo()
        {
          $data["view"] = $this->Demo_video_model->selects_videos(); 
           $this->load->view('view_demo_q', $data);
        }
        
        
        
	   public function quiz_answers()
  {
        $qsid = $this->uri->segment(3);
        $data['view'] = $this->Demo_video_model->select_all_answers($qsid); 
        $this->load->view('view_demo_all',$data);

  }
   public function delete() { 
         $this->load->model('Demo_video_model'); 
         $services_id = $this->uri->segment('3'); 
         $this->Demo_video_model->delete($services_id); 
   
         redirect('Demo_video'); 
      } 
     public function select_paa_sel()
    {
      $idg = $this->uri->segment('3');
       $data['spass']= $this->Demo_video_model->select_asperid_pass($idg);
       $this->load->view('passage_demo_view',$data);
    }
    public function add_pass_ans_qs()
     {
        $passage_id = $this->input->post('pss');
         $qq_id = $this->input->post('qzc');
          $dat = date("Y-m-d");

       $userDat = array(
          
          'quizcat_id'=>$this->input->post('catt'),
          'quiz_date'=>$dat,
          'quiz_qs'=>$this->input->post('qsnnp'),
          'passage_id'=>$this->input->post('pss'),
          'pack_id'=>$this->input->post('pckidd')
         
            );
              
   $insertdata = $this->Demo_video_model->insert_quizd($userDat);
   $iid = $this->db->insert_id();
   $query = $this->db->get_where('dlc_demo', array('quiz_id' => $iid));
   $data['records'] = $query->row();
   $iddp = $data['records']->quiz_id;
   $iddps = $data['records']->passage_id;



   $siglee1 = $this->input->post('siglees1');
   $siglee2 = $this->input->post('siglees2');
   $siglee3 = $this->input->post('siglees3');
   $siglee4 = $this->input->post('siglees4');
   $chkp1 = $this->input->post('chkp');
   $chkp2 = $this->input->post('chkp');
   $chkp3 = $this->input->post('chkp');
   $chkp4 = $this->input->post('chkp');

   $multip1 = $this->input->post('multipp1');
   $multip2 = $this->input->post('multipp2');
   $multip3 = $this->input->post('multipp3');
   $multip4 = $this->input->post('multipp4');
   $mchkp1 = $this->input->post('mchkpp1');
   $mchkp2 = $this->input->post('mchkpp2');
   $mchkp3 = $this->input->post('mchkpp3');
   $mchkp4 = $this->input->post('mchkpp4');

    
  $passqsblank = $this->input->post('fillp');

     if($siglee1||$siglee2||$siglee3||$siglee4 > '0')
     {
      
      if($chkp1==1)
      {
        $chhp1 = 1;
      }
      if($chkp2==2)
      {
        $chhp2 = 1;
      }
      if($chkp3==3)
      {
        $chhp3 = 1;
      }
      if($chkp4==4)
      {
        $chhp4 = 1;
      }


       $data=array(
              array(
                'quiz_id'=>$iddp,
                'quiz_answer'=>$siglee1,
                'quiz_status'=>$chhp1,
                'passage_id'=>$iddps
                ),
              array(
                'quiz_id'=>$iddp,
                'quiz_answer'=>$siglee2,
                'quiz_status'=>$chhp2,
                'passage_id'=>$iddps
                ),
              array(
                'quiz_id'=>$iddp,
                'quiz_answer'=>$siglee3,
                'quiz_status'=>$chhp3,
                'passage_id'=>$iddps
                ),
             array(
                'quiz_id'=>$iddp,
                'quiz_answer'=>$siglee4,
                'quiz_status'=>$chhp4,
                'passage_id'=>$iddps
                )
              );
        $this->Demo_video_model->insert_sigle_choicep($data);
            }
      elseif($multip1||$multip2||$multip3||$multip4 >'0'){

     if($mchkp1==1)
      {
        $mmtp1 = 1;
      }
      if($mchkp2==2)
      {
        $mmtp2 = 1;
      }
      if($mchkp3==3)
      {
        $mmtp3 = 1;
      }
      if($mchkp4==4)
      {
        $mmtp4 = 1;
      }


       $dataa=array(
              array(
                'quiz_id'=>$iddp,
                'quiz_answer'=>$multip1,
                'quiz_status'=>$mmtp1,
                'passage_id'=>$iddps
                ),
              array(
                'quiz_id'=>$iddp,
                'quiz_answer'=>$multip2,
                'quiz_status'=>$mmtp2,
                'passage_id'=>$iddps
                ),
              array(
                'quiz_id'=>$iddp,
                'quiz_answer'=>$multip3,
                'quiz_status'=>$mmtp3,
                'passage_id'=>$iddps
                ),
             array(
                'quiz_id'=>$iddp,
                'quiz_answer'=>$multip4,
                'quiz_status'=>$mmtp4,
                'passage_id'=>$iddps
                )
              );
   
     $this->Demo_video_model->insert_mult_answerp($dataa);

 }
  elseif($passqsblank > '0'){
    $answerr = array('quiz_id'=>$iddp,
                    'quiz_answer'=>$passqsblank,
                     'quiz_status'=>1,
                      'passage_id'=>$iddps
                       );
       $this->Demo_video_model->insert_answerp($answerr);     
   }
       
     redirect(base_url()."Demo_video/select_paa_sel/".$iddps); 
   }
 public function delete_quiz()
  {
    $qzid = $this->uri->segment(3);
    $this->Demo_video_model->delete_quiz_data($qzid);
    redirect("Demo_video/select_demo");

  }
 

}
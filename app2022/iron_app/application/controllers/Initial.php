<?php error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Initial extends CI_Controller
{
    function  __construct(){
        parent::__construct();
        $this->load->model('Initial_model');
    }    

    /*  public function select_initial(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Quiz/select_quiz";
 
       $config["total_rows"] = $this->Initial_model->record_countt();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     // $courses = $this->input->post('crss');
 
       $data["view"] = $this->Initial_model->
 
           fetch_departmentss($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();

      $this->load->view('view_initial', $data);
        } */
        
        public function select_initial()
        { 
            $data["view"] = $this->Initial_model->select_all_initial();
            $this->load->view('view_initial', $data);
            
        }
        
        
        

        public function add_answer()
        {
           $this->load->view('add_initial_answer');

        }

         function add_initial(){

           $qst = $this->input->post('qsnss');
          // $pckk = $this->input->post('ppck');
              $dat = date("Y-m-d");
       
   $userDataa = array(
          
          'quizcat_id'=>$this->input->post('cat'),
          'quiz_date'=>$dat,
          'quiz_qs'=>$this->input->post('qsnss'),
          //'pack_id'=>$pckk         
            );

             if(!empty($qst))
             {
            $insertUserDataa = $this->Initial_model->insert_quiz($userDataa);
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
    
    $single11 = $this->input->post('sigle11');
   $single22 = $this->input->post('sigle22');
   $single33 = $this->input->post('sigle33');
   $single44 = $this->input->post('sigle44');
   $chk11 = $this->input->post('chkn');
   $chk22 = $this->input->post('chkn');
   $chk33 = $this->input->post('chkn');
   $chk44 = $this->input->post('chkn');
    
     
         
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
        $this->Initial_model->insert_sigle_choice($data);
            }
   elseif($single11||$single22||$single33||$single44 > '0'){
    if($chk11==1)
      {
        $chh11 = 1;
      }
      if($chk22==2)
      {
        $chh22 = 1;
      }
      if($chk33==3)
      {
        $chh33 = 1;
      }
      if($chk44==4)
      {
        $chh44 = 1;
      }

       $data=array(
              array(
                'quiz_id'=>$idd,
                'quiz_answer'=>$single11,
                'quiz_status'=>$chh11
                ),
              array(
                'quiz_id'=>$idd,
                'quiz_answer'=>$single22,
                'quiz_status'=>$chh22
                ),
              array(
                'quiz_id'=>$idd,
                'quiz_answer'=>$single33,
                'quiz_status'=>$chh33
                ),
             array(
                'quiz_id'=>$idd,
                'quiz_answer'=>$single44,
                'quiz_status'=>$chh44
                )
              );
        $this->Initial_model->insert_sigle_choice($data);
     
   }
   elseif($passage >'0'){
     $answerp = array(
                    'passage'=>$passage,
                     'pass_status'=>1,
                     //'pack_id'=>$pckk
                       );
    
    $this->Initial_model->insert_passage($answerp);
   $ids = $this->db->insert_id();
   $query = $this->db->get_where('dlc_initial_passage',array('passage_id' => $ids));
   $data['recordss'] = $query->row();
   $idds = $data['recordss']->passage_id;
   redirect(base_url()."Initial/select_paa_sel/".$idds); 

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
   
     $this->Initial_model->insert_mult_answer($dataa);

 }
      
          if($insertUserDataa){
         $this->session->set_flashdata('success_msg', 'Quistion and Answer have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
           
     
        redirect('Initial/select_initial'); 
    }

    public function select_paa_sel()
    {
      $idg = $this->uri->segment('3');
       $data['spass']= $this->Initial_model->select_asperid_pass($idg);
       $this->load->view('passage_initial_view',$data);
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
              
   $insertdata = $this->Initial_model->insert_quizd($userDat);
   $iid = $this->db->insert_id();
   $query = $this->db->get_where('dlc_initial', array('quiz_id' => $iid));
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
        $this->Initial_model->insert_sigle_choicep($data);
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
   
     $this->Initial_model->insert_mult_answerp($dataa);

 }
  elseif($passqsblank > '0'){
    $answerr = array('quiz_id'=>$iddp,
                    'quiz_answer'=>$passqsblank,
                     'quiz_status'=>1,
                      'passage_id'=>$iddps
                       );
       $this->Initial_model->insert_answerp($answerr);     
   }
       
     redirect(base_url()."Initial/select_paa_sel/".$iddps); 
   }

  public function delete_quiz()
  {
    $qzid = $this->uri->segment(3);
    $this->Initial_model->delete_quiz_data($qzid);
    redirect("Initial/select_initial");

  }
  public function quiz_answers()
  {
        $qsid = $this->uri->segment(3);
        $data['view'] = $this->Initial_model->select_all_answers($qsid); 
        $this->load->view('view_initial_answers',$data);

  }
  public function update_quistion()
  {

    $qsidm = $this->uri->segment(3); 
     $dfg = $this->input->post('desc');
    
    $sqld = $this->db->query("update dlc_initial set quiz_qs ='$dfg' where quiz_id ='$qsidm'");
    $this->session->set_flashdata('successq_msg', 'Intro Test Question have been updated  successfully.');
     redirect("Initial/select_initial");
  }
  
  public function edit_answers()
  {
      
      //$ansedt = $this->uri->segment(3);
    
    $this->load->helper('form');
         $this->load->helper('url'); 
         $ansedt = $this->uri->segment('3'); 
         
         $querys = $this->db->get_where("dlc_initial",array("quiz_id"=>$ansedt));
         $data['qz'] = $querys->result(); 
         $this->load->view('edit_intro_answer',$data); 
    
  }
  
   public function update_answerss()
   {
    
     $status = $_GET['status'];
     $id = $_GET['id'];
      $nid = $_GET['nid'];
    $sqlsd = $this->db->query("update dlc_initial_answers set quiz_status='0' where quiz_id='$nid'");
 $sqls = $this->db->query("update dlc_initial_answers set quiz_status='$status' where quiz_answers_id='$id'");              
                  
  }
  
 public function update_multiple_data()
  {
      $status = $_GET['status'];
      $id = $_GET['id'];
      $nid = $_GET['nid'];
    //$sqlsd = $this->db->query("update dlc_quiz_answers set quiz_status='0' where quiz_id='$nid'");
 $sqls = $this->db->query("update dlc_initial_answers set quiz_status='$status' where quiz_answers_id='$id'");   
      
  }
  
  public function update_answerss_fill()
   {
    
     $status = $_GET['status'];
     $id = $_GET['id'];
      $nid = $_GET['nid'];
    $sqlsdh = $this->db->query("update dlc_initial_answers set quiz_status='0' where quiz_id='$nid'");
 $sqlsh = $this->db->query("update dlc_initial_answers set quiz_status='$status' where quiz_answers_id='$id'");              
                  
  }


}

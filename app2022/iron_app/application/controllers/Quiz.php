<?php error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Quiz extends CI_Controller
{
    function  __construct(){
        parent::__construct();
        $this->load->model('Quiz_model');
    }    
       
      public function select_quiz(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Quiz/select_quiz";
 
       $config["total_rows"] = $this->Quiz_model->record_countt();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       $courses = $this->input->post('crss');
 
       $data["view"] = $this->Quiz_model->
 
           fetch_departmentss($config["per_page"], $page,$courses);
 
       $data["links"] = $this->pagination->create_links();

      $this->load->view('view_quiz', $data);
        } 
        
    public function add_answer()
        {
           $this->load->view('add_quiz_answer');

        }

         function add_quiz(){
             $pjkd = $_REQUEST['ppck'];
           $qst = $this->input->post('qsnss');
           $pckk = $this->input->post('ppck');
              $dat = date("Y-m-d");
               
               $this->session->unset_userdata('some_value');
               $this->session->set_userdata('some_value',$pckk ); 
               
              
                  $fl = $this->input->post('fill');
                  $cht = $this->input->post('chk');
                  $mchkm1 = $this->input->post('mchk1');
                  $mchkm2 = $this->input->post('mchk2');
                  $mchkm3 = $this->input->post('mchk3');
                  $mchkm4 = $this->input->post('mchk4');  

       /*if(!$fl || !$cht || !$mchkm1 || !$mchkm2 || !$mchkm3 || !$mchkm4)*/
             /* if(empty($cht))*/
             if(empty($mchkm1 || $mchkm2 || $mchkm3 || $mchkm4 || $cht))
             { 
                 $this->session->set_flashdata('success_msg', 'Question and Answer have not been added');
                    redirect('Quiz/add_answer');
             } else {   
                
   $userDataa = array(
          
          'quizcat_id'=>$this->input->post('cat'),
          'quiz_date'=>$dat,
          'quiz_qs'=>$this->input->post('qsnss'),
          'pack_id'=>$pckk         
            );

             if(!empty($qst))
             {
            $insertUserDataa = $this->Quiz_model->insert_quiz($userDataa);
             }  
   $id = $this->db->insert_id();
   $query = $this->db->get_where('dlc_quiz', array('quiz_id' => $id));
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
        $this->Quiz_model->insert_sigle_choice($data);
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
       $this->Quiz_model->insert_sigle_choice($data);
 
   }
   elseif($passage >'0'){
     $answerp = array(
                    'passage'=>$passage,
                     'pass_status'=>1,
                     'pack_id'=>$pckk
                       );
    
    $this->Quiz_model->insert_passage($answerp);
   $ids = $this->db->insert_id();
   $query = $this->db->get_where('dlc_quiz_passage',array('passage_id' => $ids));
   $data['recordss'] = $query->row();
   $idds = $data['recordss']->passage_id;
  redirect(base_url()."Quiz/select_paa_sel/".$idds); 

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
   
     $this->Quiz_model->insert_mult_answer($dataa);

 }
      
          if($insertUserDataa){
         $this->session->set_flashdata('success_msg', 'Question and Answer have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
            
      redirect('Quiz/add_answer');
          }
         
       /* redirect('Quiz/add_answer');*/
        
    }

    public function select_paa_sel()
    {
      $idg = $this->uri->segment('3');
       $data['spass']= $this->Quiz_model->select_asperid_pass($idg);
       $this->load->view('passage_view',$data);
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
              
   $insertdata = $this->Quiz_model->insert_quizd($userDat);
   $iid = $this->db->insert_id();
   $query = $this->db->get_where('dlc_quiz', array('quiz_id' => $iid));
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
        $this->Quiz_model->insert_sigle_choicep($data);
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
   
     $this->Quiz_model->insert_mult_answerp($dataa);

 }
  elseif($passqsblank > '0'){
    $answerr = array('quiz_id'=>$iddp,
                    'quiz_answer'=>$passqsblank,
                     'quiz_status'=>1,
                      'passage_id'=>$iddps
                       );
       $this->Quiz_model->insert_answerp($answerr);     
   }
       
     redirect(base_url()."Quiz/select_paa_sel/".$iddps); 
  }

  public function delete_quiz()
  {
    $qzid = $this->uri->segment(3);
   /* $this->Quiz_model->delete_quiz_data($qzid);
    redirect("Quiz/select_quiz");*/
  
 $mklh = $this->db->query("select * from dlc_quiz_detail where question_id ='$qzid'");
        foreach($mklh->result() as $qww){  $ansidnw = $qww->quiz_andt_id; 
  $mklmg = $this->db->query("delete from dlc_quiz_test where quiz_andt_id ='$ansidnw'");
        } 
 $mklmk = $this->db->query("delete from dlc_quiz_detail where question_id ='$qzid'");
 $mkls = $this->db->query("delete from dlc_quiz_answers where quiz_id ='$qzid'");
 $mkl = $this->db->query("delete from dlc_quiz where quiz_id ='$qzid'");
   redirect("Quiz/select_quiz"); 
  }
  public function quiz_answers()
  {
        $qsid = $this->uri->segment(3);
        $data['view'] = $this->Quiz_model->select_all_answers($qsid); 
        $this->load->view('view_quiz_answers',$data);

  }
  
 public function update_quistion()
  {
     $pkkd = $this->input->post('pksid');  
    $qsidm = $this->uri->segment(3); 
     $dfg = $this->input->post('desc');
    
    $sqld = $this->db->query("update dlc_quiz set quiz_qs ='$dfg' where quiz_id ='$qsidm'");
    $this->session->set_flashdata('successq_msg', 'Question have been updated  successfully.');
     redirect(base_url()."Quiz/select_quiz/".$pkkd);
  }
  
 public function edit_amswers()
  {
      //$ansedt = $this->uri->segment(3);
    
    $this->load->helper('form');
         $this->load->helper('url'); 
         $ansedt = $this->uri->segment('3'); 
         
         $querys = $this->db->get_where("dlc_quiz",array("quiz_id"=>$ansedt));
         $data['qz'] = $querys->result(); 
         $this->load->view('edit_quiz_answer',$data); 
    
  }
  
  
  public function update_answerss()
   {
    
     $status = $_GET['status'];
     $id = $_GET['id'];
      $nid = $_GET['nid'];
    $sqlsd = $this->db->query("update dlc_quiz_answers set quiz_status='0' where quiz_id='$nid'");
 $sqls = $this->db->query("update dlc_quiz_answers set quiz_status='$status' where quiz_answers_id='$id'");              
                  
  }
  
 /*public function update_fill_data()
  {
    $fill = $this->input->post('fill');   
    $qzzid = $this->input->post('qzzid');
    $sqlsd = $this->db->query("update dlc_quiz_answers set quiz_answer='$fill' where quiz_id='$qzzid'");
    
  redirect(base_url()."Quiz/edit_amswers/".$qzzid); 
  }*/
  
 public function update_multiple_data()
  {
      $status = $_GET['status'];
      $id = $_GET['id'];
      $nid = $_GET['nid'];
    //$sqlsd = $this->db->query("update dlc_quiz_answers set quiz_status='0' where quiz_id='$nid'");
 $sqls = $this->db->query("update dlc_quiz_answers set quiz_status='$status' where quiz_answers_id='$id'");   
      
  }
  
  public function update_answerss_fill()
   {
    
     $status = $_GET['status'];
     $id = $_GET['id'];
      $nid = $_GET['nid'];
    $sqlsdh = $this->db->query("update dlc_quiz_answers set quiz_status='0' where quiz_id='$nid'");
 $sqlsh = $this->db->query("update dlc_quiz_answers set quiz_status='$status' where quiz_answers_id='$id'");              
                  
  }
  
  
 public function select_preview()
  {
    $imkh = $this->uri->segment(3); 
    $data['pack_data']= $this->Quiz_model->select_all_packages($imkh);
    $this->load->view('view_preview',$data);
  }
      
  
}

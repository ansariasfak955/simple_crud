<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Openquiz extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Openquiz_model');
        $this->load->model('Common_model','cm');
        $this->load->library("pagination");          
    }  

 public function index()
      {
        $this->load->view('open_quiz');
      }
	  public function add()
      {
		 $date = date('Y-m-d'); 
	    $data = array( 'title'=>$this->input->post('tit'),
                       'date'=>$date
					  );
		$insertUserData = $this->Openquiz_model->insert($data); 
    redirect(base_url('Openquiz/view'));     		
	}
	public function view()
      {
		$data['view']=$this->Openquiz_model->selectcat();
        $this->load->view('view_open_quiz',$data);  
	  }
	 public function add_qu()
        {   
			$id = $this->uri->segment('3');
		   $data["view"] = $this->Openquiz_model->selectcatz($id);
		 
		  $res= array();
		   $res = $this->cm->get_data('open_quiz_titile',['id'=>$id]);
		   
		   $data['my_title'] = (count($res) > 0)? $res[0]->title : '';
		  
		   
           $this->load->view('open_quizpages',$data);

        } 
        
        
     function add_quiz(){
           
		   $dxx = $this->input->post();
		   
		 //  echo "jk == <pre>"; print_r($dxx); die();
		   
		   $idg = $this->input->post('idi');
           $qst = $this->input->post('qsnss');
           $pckk = $this->input->post('ppck');
           $dat = date("Y-m-d");
       
   $userDataa = array(
          
          'quizcat_id'=>$this->input->post('cat'),
          'quiz_date'=>$dat,
		  'test_id'=>$idg,
          'quiz_qs'=>$this->input->post('qsnss'),
          'pack_id'=>$pckk         
            );

             if(!empty($qst))
             {
            $insertUserDataa = $this->Openquiz_model->insert_quiz($userDataa);
             }  
   $id = $this->db->insert_id();
   $query = $this->db->get_where('dlc_openquiz', array('quiz_id' => $id));
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
        $this->Openquiz_model->insert_sigle_choice($data);
            }
   elseif($fillin > '0'){
    $answer = array('quiz_id'=>$idd,
                    'quiz_answer'=>$fillin,
                     'quiz_status'=>1
                       );
       $this->Openquiz_model->insert_answer($answer);
     
   }
   elseif($passage >'0'){
     $answerp = array(
                    'passage'=>$passage,
                     'pass_status'=>1,
                     'pack_id'=>$pckk
                       );
    
    $this->Openquiz_model->insert_passage($answerp);
   $ids = $this->db->insert_id();
   $query = $this->db->get_where('dlc_openquiz_passage',array('passage_id' => $ids));
   $data['recordss'] = $query->row();
   $idds = $data['recordss']->passage_id;
  redirect(base_url()."Openquiz/select_paa_sel/".$idg); 

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
   
     $this->Openquiz_model->insert_mult_answer($dataa);

 }
      
          if($insertUserDataa){
         $this->session->set_flashdata('success_msg', 'Quiz Category have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
           
     
        redirect('Openquiz/add_qu/'.$idg); 
    }
 	public function select_paa_sel()
    {
      $idg = $this->uri->segment('3');
       $data['spass']= $this->Openquiz_model->select_asperid_pass($idg);
       $this->load->view('passage_view',$data);
    }
     public function quiz_answers()
      {
            $qsid = $this->uri->segment(3);
            $data['view'] = $this->Openquiz_model->select_all_answers($qsid); 
            $this->load->view('view_quiz_answers',$data);
        }
        
   public function delete_quiz()
  {
	$idg = $this->uri->segment(4); 
    $qzid = $this->uri->segment(3);
    $this->Openquiz_model->delete_quiz_data($qzid);
    redirect("Openquiz/add_qu/".$idg);

  }
       public function delete_my_quiz()
         {
            $id = $this->input->post('id');
            
            $dx1 = $this->cm->get_data('dlc_openquiz',['test_id'=>$id]);
            $dx1 = ($dx1 == '') ? [] :$dx1;
            foreach($dx1 as $val)
            {
                $opt_id = $val->quiz_id;
                
                 $this->cm->deleteRecord('dlc_openquiz_answers',['quiz_id'=>$opt_id]);
                
                
                
            }    
             $this->cm->deleteRecord('dlc_openquiz',['test_id'=>$id]);
             $res =  $this->cm->deleteRecord('open_quiz_titile',['id'=>$id]);
            
             /*$q = "DELETE FROM `open_quiz_titile` WHERE id = '$id'";
                  $res = $this->db->query($q);*/
                  
                  if($res)
                  {
                     $dataTosend = ['status'=>true, 'msg' =>'Success','body'=>''];
                                   echo json_encode($dataTosend); die();
                  }else{
                      $dataTosend = ['status'=>false, 'msg' =>'faild','body'=>''];
                                   echo json_encode($dataTosend); die();
                  }
         }
              
      public function edit_my_quiz()
             {   
              
                $id = $this->input->post('id');
                $title = $this->input->post('tit');
                  $tit =
                  $q = "UPDATE `open_quiz_titile` SET title = '$title' where id = '$id' ";
                  $res = $this->db->query($q);
                  if($res)
                  {
                      $dataTosend = ['status'=>true, 'msg' =>'Success','body'=>''];
                                   echo json_encode($dataTosend); die();
                  }else{
                      $dataTosend = ['status'=>false, 'msg' =>'faild','body'=>''];
                                   echo json_encode($dataTosend); die();
                  }
                      
                print_r($data);
             }
             
        public function edit_question_option()     
            {
               
             $quiz_id  =  $this->uri->segment('3');
                 $p_q_id =  $this->uri->segment('4');
               $res1= array();   $res2= array();   $res2= array();
		   $res1 = $this->cm->get_data('open_quiz_titile',['id'=>$p_q_id]);
		   $res2 = $this->cm->get_data('dlc_openquiz',['test_id'=>$p_q_id,'quiz_id'=>$quiz_id]);
		   $res3 = $this->cm->get_data('dlc_openquiz_answers',['quiz_id'=>$quiz_id]);
		   
		   $data['my_title'] = (count($res1) > 0)? $res1[0]->title : '';
		   $data['quiz_qs'] = (count($res2) > 0)? $res2[0]->quiz_qs : '';
		   $data['q_type'] = (count($res2) > 0)? $res2[0]->quizcat_id : '';
		   $data['q_data'] = $res3;
		    
                 //echo"<pre>"; print_r($data); die();
                 
                $this->load->view('edit_question_opt_page',$data);
            }
          
          public function q_opt_update()
            {
                                
                       
            		   $dxx = $this->input->post();
            		   
            		  // echo "jk == <pre>"; print_r($dxx); die();  
            		   
            		   $q_id = $this->input->post('q_id');
                       $quiz_id = $this->input->post('Q_id');      
                       $cat = $this->input->post('cat');
                       $qsnss = $this->input->post('qsnss');
                      
                       $chk = $this->input->post('chk');
                    
                       $sigle = array();   $multii = array();    $mchk = array();
                 $sigle[1] = $this->input->post('sigle1');     $multii[1] = $this->input->post('multii1');  $mchk[1] = $this->input->post('mchk1');
                 $sigle[2] = $this->input->post('sigle2');     $multii[2] = $this->input->post('multii2');  $mchk[2] = $this->input->post('mchk2');
                 $sigle[3] = $this->input->post('sigle3');     $multii[3] = $this->input->post('multii3');  $mchk[3] = $this->input->post('mchk3');
                 $sigle[4]= $this->input->post('sigle4');      $multii[4] = $this->input->post('multii4');  $mchk[4] = $this->input->post('mchk4');
               
                       $pckk = $this->input->post('ppck');
                       $dat = date("Y-m-d");
                   
               $userDataa = array('quizcat_id'=>$cat,'quiz_date'=>$dat,'test_id'=>$quiz_id,'quiz_qs'=>$qsnss);
            
                        
                        $res =  $this->cm->update_data('dlc_openquiz',['quiz_id'=>$q_id],$userDataa) ;
                   if($res)     
                    {  
                         $this->cm->deleteRecord('dlc_openquiz_answers',['quiz_id' => $q_id]);
                         
                        
                        if($cat == 1)   
                        {   
                            $rr = [];
                           for($k = 1; $k < 5 ;$k++)
                           {     
                               $ans = ($k == $chk)? 1 : ""; 
                              
                               $rr[] =   $this->cm->insert_data('dlc_openquiz_answers',['quiz_id'=>$q_id,'quiz_answer'=>$sigle[$k],'quiz_status'=>$ans]);
                                     
                          
                           }
                           
                        
                           
                           
                        }else if($cat == 2)
                           {    $arr = array();
                               for($j=1; $j < 5 ; $j++)
                                  {
                                        $sts = ($mchk[$j] == "")? "" : 1; 
                                  $this->cm->insert_data('dlc_openquiz_answers',[ 'quiz_id'=>$q_id,'quiz_answer'=>$multii[$j],
                                                            'quiz_status'=>$sts]);
                                    }
                                
                              
                                    
                            }
                        
                        
                          $this->session->set_flashdata('success_msg', 'Quiz question and option updated successfully.');
                       
                    } else{
                             $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
                         }
                        
                         redirect('Openquiz/add_qu/'.$quiz_id); 
                         
             /*=================end ========================*/
             
             
                
            } 
            
            
         public function bulk_questions_add(){
             
             $data = $this->input->post();
             $quiz_id = $this->input->post('id');
            
             
             date_default_timezone_set('Asia/Kolkata');
				 $date 	  = date('Y-m-d');
				 
             $file_my = $_FILES['image'];  
         
        if(empty($quiz_id)  || !(isset($file_my))) 
        {
            
            $this->session->set_flashdata('error_msg', 'All Field Rquired');
             redirect('Openquiz/add_qu/'.$quiz_id); 
             
            
        }
    
    
     ////////////////////////////////
             $dd = $_FILES['image']['name'];
             $dx =   explode(".", $dd);
             $file_xt_name = (count($dx)>0)? $dx[1] : "";
             
            // echo "sk == ". $file_xt_name; die();
             
            if( $file_xt_name == 'csv' ||  $file_xt_name == 'CSV' ) 
             {
                 $csvFile = fopen($_FILES['image']['tmp_name'], 'r');
              // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
          $arr = array();
          $row_count = 0; $error = false;
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                
                $row_count++;
                $qs   = (count($line)>9)? $line[0]  : "";
                $cat_id   = (count($line)>= 9)? $line[9]  : "";
              if($cat_id == "")
              {
                  $error= true;
                  break;
              }
                $op[1]  = $line[1];       $ans[1]  = $line[5];
                $op[2]  = $line[2];       $ans[2]  = $line[6];    
                $op[3]  = $line[3];       $ans[3]  = $line[7];
                $op[4]  = $line[4];       $ans[4]  = $line[8];
                
            $ins_id =    $this->cm->insert_data ('dlc_openquiz',['quizcat_id'=>$cat_id,'quiz_date'=>$date,'quiz_qs'=>$qs,
                            'test_id'=>$quiz_id]);
            
                     if($ins_id)
                       {
                         for($j=1; $j < 5 ; $j++)
                          {
                               
                             $this->cm->insert_data('dlc_openquiz_answers',[ 'quiz_id'=>$ins_id,'quiz_answer'=>$op[$j],
                                                    'quiz_status'=>$ans[$j]]);
                            }
                       }
              
               
            }
            
            // Close opened CSV file
            fclose($csvFile);
                    
                    
                  if($error)    
                   {
                        $this->session->set_flashdata('error_msg', 'Invalid File formet');
                     redirect('Openquiz/add_qu/'.$quiz_id);  
                   }else{   
                             $this->session->set_flashdata('success_msg', 'File Data Inserted Successfully');
                             redirect('Openquiz/add_qu/'.$quiz_id);  
                           }
             }else{
                    /* $dataTosend = ['status'=>false, 'msg' =>'Invalid File formet','body'=>''];
                      echo json_encode($dataTosend); die();  */
                      $this->session->set_flashdata('error_msg', 'Invalid File formet');
                     redirect('Openquiz/add_qu/'.$quiz_id);   
                    } 
            
             
         }   
            
        public function jk_quiz()
        {
            //$q = "select * from dlc_quiz where quiz_id = '46'";
            $q = "SELECT * FROM dlc_quiz  WHERE quiz_idd  BETWEEN '11' and '22'";
            $res = $this->db->query($q)->result();
          
           $arr = []; $job = [];
            foreach ($res as $val)
            {
                $date = date("Y-m-d");
                $title = $val->quiz_qs;
                
                 $two_id =    $this->cm->insert_data('dlc_openquiz',['quiz_qs'=>$title,'quiz_date'=>$date,
                            'test_id'=>'2','quizcat_id'=>'1']);
                
                $qx = "select * from dlc_quiz_answers where quiz_id = '$val->quiz_id'";
            
                     $sss = $this->db->query($qx)->result();
                 foreach($sss as $tt)
                        {
                          $op =   $tt->quiz_answer;
                          $op_status = $tt->quiz_status;
                       // `quiz_answers_id`, `quiz_id`, `quiz_answer`, `quiz_correct_answer`, `quiz_status`, `passage_id`   
                        
                         $this->cm->insert_data('dlc_openquiz_answers',['quiz_id'=>$two_id,'quiz_answer'=>$op,
                            'quiz_status'=>$op_status]);
                        }
                
               
            }
            
              echo "j k ok <pre>"; ///print_r($job); 
            
            
        }
        
         public function jk_quiz_2()
        {
           $ww = "select * from dlc_course_package ";
            
            $data = $this->db->query($ww)->result();
           $arr = []; $job = []; $work = [];
           foreach ($data as $values)
           {
               
            $q = "select * from dlc_quiz where pack_id = '$values->pack_id'";
            
            $res = $this->db->query($q)->result();
          
         
            foreach ($res as $val)
            {
                
               
                $arr['quiz_id'] = $val->quiz_id;
                $arr['quiz_qs'] = $val->quiz_qs;
                
                $qx = "select * from dlc_quiz_answers where quiz_id = '$val->quiz_id'";
            
                     $count_row = $this->db->query($qx)->result();
                
                if( count($count_row) == 0 ) 
                {
                    $job[] = $arr;
                }else{
                    $work[] = $arr;
                        
                }
            }
            
             
           }  
             //echo "<pre>"; print_r($job); 
            echo "<pre>"; print_r($work); 
        } 
            
}








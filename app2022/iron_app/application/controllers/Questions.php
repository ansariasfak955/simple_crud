<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Questions extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Questions_model');
          $this->load->library("pagination");
          
    }  


    public function index(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Questions/index";
 
       $config["total_rows"] = $this->Questions_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     
      
 
       $data["view"] = $this->Questions_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();
    
      $this->load->view('view_question', $data);
        }

        public function status(){
         $sts = $_GET['status'];
         $id = $_GET['id'];
          $data = array('status'=>$sts);
         $this->Questions_model->update_staus($data,$id);

        }
        public function delete()
        {
          $qid = $this->uri->segment('3');
          $this->Questions_model->delete_question($qid);
          redirect("Questions");
        }

      public function View_answers(){ 
           $qidd = $this->uri->segment(3);
        
       //      $config = array();
 
       // $config["base_url"] = base_url() . "Questions/View_answers";
 
       // $config["total_rows"] = $this->Questions_model->record_countt();
 
       // $config["per_page"] = 10;
 
       // $config["uri_segment"] = 3;
 
       // $this->pagination->initialize($config);
 
       // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     
 
       // $data["view"] = $this->Questions_model->
 
       //     fetch_departmentss($config["per_page"], $page,$qidd);
 
       // $data["links"] = $this->pagination->create_links();
      $data['view'] = $this->Questions_model->select_all_answer($qidd);
    
      $this->load->view('view_answers', $data);
        }

        public function detete_answer()
        {
           $ansids = $this->uri->segment(3);
           $this->Questions_model->delete_answers($ansids);
           // redirect('Questions/View_answers');
           redirect(base_url()."Questions/View_answers/".$ansids);
        }
        public function status_update()
        {
          $stt = $_GET['status'];
          $anidd = $_GET['id'];
          $data = array('status' =>$stt);
          $this->Questions_model->ans_update_status($data,$anidd);
        }
        public function add_ansers()
        {
            $dat = date("Y-m-d");
            $id = $this->input->post('id');
            $data = array( 'answer_detail' =>$this->input->post('ans'),
                            'status'=> '1',
                            'answer_date'=>$dat,
                            'questions_id'=>$id
                          );
            $this->Questions_model->add_ques_answers($id,$data);
            redirect('Questions');

        }

    
       
   }     
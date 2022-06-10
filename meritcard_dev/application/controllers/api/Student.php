<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Student extends REST_Controller {
   
    public function __construct() {
       parent::__construct();
       $this->load->model('Common_model','cm');
      
    }
   

    public function index_post()
     {
           $flag = $this->input->post('flag');
        
                switch ($flag) {
                  case "add_new_student":
                    //echo 123; die;
                        $name = $this->input->post('name');
                        $email = $this->input->post('email');   
                        $section_id = $this->input->post('section_id');     
                        $branch_id = $this->input->post('branch_id'); 
                        $class_id = $this->input->post('class_id'); 
                        
                        if(empty($name) || empty($email) || empty($section_id) || empty($branch_id)){
                            $this->session->set_flashdata('All field Required!!');
                            $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
                            redirect($server);die();
                        }                 
                       // $user_id = $this->cm->get_data('user_tbl',[]);
                        $res = $this->cm->save('user_tbl',['name'=>$name, 'email'=>$email, 'section_id'=>$section_id, 'branch_id'=>$branch_id]);
                        if($res){

                            $this->cm->save('student_tbl',['class_id'=>$class_id, 
                                    'branch_id'=>$branch_id, 'section_id'=>$section_id, 'user_id'=>$res]);
                            $dataTosend = ['status'=>true, 'msg'=>'new student added', 'body'=>''];
                            echo json_encode($dataTosend); die();
                        }else{
                            $dataTosend = ['status'=>false, 'msg'=>'failed', 'body'=>''];
                            echo json_encode($dataTosend); die();
                        }
                    break;

                  case "view_student":
                    $name = $this->input->post('name');
                    $section_id = $this->input->post('section_id'); 
                    $class_id = $this->input->post('class_id'); 
                    
                    $rq = "select student_tbl.section_id,student_tbl.class_id,user_tbl.name,user_tbl.email
                    from student_tbl join user_tbl on student_tbl.user_id=user_tbl.user_id WHERE user_tbl.name LIKE '%".$name."%' and student_tbl.section_id = '".$section_id."' and student_tbl.class_id = '".$class_id."'";
                    $res1 = $this->db->query($rq)->result();
                     //echo $rq; die();
                   
                        if($res1){
                            $dataTosend = ['status'=>true, 'msg'=>'student record', 'body'=>$res1];
                            echo json_encode($dataTosend); die();
                        }else{
                            $dataTosend = ['status'=>false, 'msg'=>'failed', 'body'=>''];
                            echo json_encode($dataTosend); die();
                        }

                    $dataTosend = ['status'=>true,'msg'=>"success blue ",'body'=>''];
                      echo json_encode($dataTosend); die(); 
                    break;
                
                  default:
                     $dataTosend = ['status'=>false,'msg'=>"Invalid Requst",'body'=>''];
                        echo json_encode($dataTosend); die(); 
                }
    } 
  	
}
<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Class_room extends REST_Controller {
   
    public function __construct() {
       parent::__construct();
       $this->load->model('Common_model','cm');
      
    }
   

    public function index_post()
     {
           $flag = $this->input->post('flag');
        
                switch ($flag) {
                  case "viewClass": 
                    
                    $class_id = $this->input->post('class_id');
                    $res = $this->cm->get_data('class_tbl',['class_id'=>$class_id]);
                    if($res){
                      $dataTosend = ['status'=>true, 'msg'=>'all record', 'body'=>$res];
                      echo json_encode($dataTosend); die();
                    }else{
                          $dataTosend = ['status'=>false, 'msg' => 'failed','body'=>''];
                          echo json_encode($dataTosend);die();
                    }
                    break;

                  case "addClass":

                   $branch_id = $this->input->post('branch_id');
                   $name = $this->input->post('name');
                   $age_group = $this->input->post('age_group');
                   $max_occupancy = $this->input->post('max_occupancy');
                   if(empty($branch_id) || empty($name) || empty($age_group) || empty($max_occupancy)){
                    $this->session->set_flashdata('All field Required!!');
                    $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
                    redirect($server);die();
                   }
                   $res = $this->cm->get_data('class_tbl',['branch_id'=>$branch_id, 'name'=>$name, 'age_group'=>$age_group, 'max_occupancy'=>$max_occupancy]);
                   if($res){
                     $dataTosend = ['status'=>true, 'msg'=>'allready record save', 'body'=>''];
                     echo json_encode($dataTosend); die();
                   }else{
                    $rs = $this->cm->save('class_tbl',['branch_id'=>$branch_id, 'name'=>$name, 'age_group'=>$age_group, 'max_occupancy'=>$max_occupancy]);
                    if($rs){
                        $dataTosend = ['status'=>true, 'msg'=>'register successfull', 'body'=>$rs];
                        echo json_encode($dataTosend); die();
                    }else{
                      $dataTosend = ['status'=>false, 'msg'=>'record can not added', 'body'=>''];
                      echo json_encode($dataTosend); die();
                    }
                     
                   }
                    break;
                
                  default:
                     $dataTosend = ['status'=>false,'msg'=>"Invalid Requst",'body'=>''];
                        echo json_encode($dataTosend); die(); 
                }
    } 
  	
}
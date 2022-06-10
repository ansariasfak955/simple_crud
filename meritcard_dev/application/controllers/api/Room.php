<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Room extends REST_Controller {
   
    public function __construct() {
       parent::__construct();
       $this->load->model('Common_model','cm');
      
    }
   

    public function index_post()
     {
           $flag = $this->input->post('flag');
        
                switch ($flag) {
                  case "add_section": 
                    
                    $class_id = $this->input->post('class_id');
                    $branch_id = $this->input->post('branch_id');
                    $name = $this->input->post('name');
                    $max_occupancy = $this->input->post('max_occupancy');
                    if(empty($class_id) || empty($branch_id) || empty($name) || empty($max_occupancy)){
                        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
                        redirect($server);die();
                    }
                    $res = $this->cm->get_data('section_tbl',['class_id'=>$class_id, 'branch_id'=>$branch_id, 'name'=>$name, 'max_occupancy'=>$max_occupancy]);
                    if($res){
                        $dataTosend = ['status'=>true, 'msg'=>'allready record save', 'body'=>''];
                        echo json_encode($dataTosend); die();
                    }else{
                        $res2 = $this->cm->save('section_tbl',['class_id'=>$class_id, 'branch_id'=>$branch_id, 'name'=>$name, 'max_occupancy'=>$max_occupancy]);
                        if($res2){
                            $dataTosend = ['status'=>false, 'msg'=>'record addedd successfull', 'body'=>''];
                            echo json_encode($dataTosend); die();
                        }else{
                            $dataTosend = ['status'=>false, 'msg'=>'record can not addedd', 'body'=>''];
                            echo json_encode($dataTosend); die();
                        }
                        
                    }
                    break;

                  case "view_section":
                    $branch_id = $this->input->post('branch_id');
                    $class_id = $this->input->post('class_id');
                    if(empty($class_id) || empty($branch_id)){
                        $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
                        redirect($server);die();
                    }

                    $whr = array();

                    $whr['branch_id'] = $branch_id;
                    if($class_id){
                        $whr['class_id'] = $class_id;
                    }
                   

                    $result = $this->cm->get_data('section_tbl',$whr);
                    if($result){
                        $dataTosend = ['status'=>true, 'msg'=>'all record show', 'body'=>$result];
                        echo json_encode($dataTosend); die();
                    }else{
                        $dataTosend = ['status'=>false, 'msg'=>'failed', 'body'=>''];
                        echo json_encode($dataTosend); die();
                    }

                    break;
                
                  default:
                     $dataTosend = ['status'=>false,'msg'=>"Invalid Requst",'body'=>''];
                        echo json_encode($dataTosend); die(); 
                }
    } 
  	
}
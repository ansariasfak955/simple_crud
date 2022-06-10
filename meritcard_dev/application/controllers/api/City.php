<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Login extends REST_Controller {
   
    public function __construct() {
       parent::__construct();
      $this->load->model('Common_model','cm');
    }
   

    public function index_post()
     {
           $flag = $this->input->post('flag');
        
                switch ($flag) {
   
                  case "state":
                    
                    $s_id = $this->input->post('s_id');
                    $res = $this->cm->get_data('state_tbl',['s_id'=>$s_id]);
                    if($res){
                        $dataTosend = ['status'=>true, 'msg'=>'all state view', 'body'=>$res];
                        echo json_encode($dataTosend); die();
                    }else{
                        $dataTosend =['status'=>false, 'msg'=>'record not found'];
                        echo json_encode($dataTosend); die();
                    }

                      break;
                      default:
                     $dataTosend = ['status'=>false,'msg'=>"Invalid Requst",'body'=>''];
                        echo json_encode($dataTosend); die(); 
                }
    } 
  	
}
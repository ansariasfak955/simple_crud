<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Organization extends REST_Controller {
   
    public function __construct() {
       parent::__construct();
       $this->load->model('Common_model','cm');
      
    }
   

    public function index_post()
     {
           $flag = $this->input->post('flag');
        
                switch ($flag) {
                  case "addOrganization":

                    $cat_id = $this->input->post('cat_id');
                    $org_name = $this->input->post('org_name');
                    $mobile = $this->input->post('mobile');
                    $school_capacity = $this->input->post('school_capacity');
                    $admin_id = $this->input->post('admin_id');

                    //echo $cat_id;

                    if(empty($org_name) || empty($mobile) || empty($cat_id) || empty($school_capacity) || empty($admin_id)){
                          $dataTosend = array("response"=>array("status" => "false", "msg" => "Enter all parameters!"));	
                          echo json_encode($dataTosend); die();
                          $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
                          redirect($server);die();
                    }
                    $res = $this->cm->get_data('organisation',['cat_id'=>$cat_id, 'org_name'=>$org_name, 'mobile'=>$mobile, 'school_capacity'=>$school_capacity, 'admin_id'=>$admin_id]);
                    //echo "<pre>";print_r($res);die();
                    if($res){
                        $dataTosend = ['status'=>true,'msg'=>"already admin user",'body'=>''];
                        echo json_encode($dataTosend); die();
                    }else{
                        $rs = $this->cm->save('organisation',['cat_id'=>$cat_id, 'org_name'=>$org_name, 'mobile'=>$mobile, 'school_capacity'=>$school_capacity, 'admin_id'=>$admin_id]);
                        if($rs){
                          $r = $this->cm->get_data('organisation',['cat_id'=>$cat_id, 'org_name'=>$org_name, 'mobile'=>$mobile, 'school_capacity'=>$school_capacity, 'admin_id'=>$admin_id]);
                            $dataTosend = ['status'=>true,'msg'=>"Registration successfull",'body'=>$r];
                            echo json_encode($dataTosend); die();
                        }else{
                            $dataTosend = ['status'=>true,'msg'=>"can not register",'body'=>''];
                        echo json_encode($dataTosend); die();
                        }
                        
                    }
                 
                    break;

                  case "blue":
                    $dataTosend = ['status'=>true,'msg'=>"success blue ",'body'=>''];
                      echo json_encode($dataTosend); die(); 
                    break;
                
                  default:
                     $dataTosend = ['status'=>false,'msg'=>"Invalid Requst",'body'=>''];
                        echo json_encode($dataTosend); die(); 
                }
    } 
  	
}
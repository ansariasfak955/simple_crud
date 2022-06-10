<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class School_profile extends REST_Controller {
   
    public function __construct() {
       parent::__construct();
      $this->load->model('Common_model','cm');
    }
   

    public function index_post()
     {
           $flag = $this->input->post('flag');
        
                switch ($flag) {
                  case "school_profile":

                    //$id =   $this->input->post('admin_id');
                    $data = array(); 
                    $data['school_pro']=$tt =  $this->cm->get_data('organisation',[]);
                    $data['state_list'] =  $this->cm->get_data('state_tbl',[]);
                    
                   //echo "<pre>"; print_r($tt); die();
                    if($tt){
                        $dataTosend = ['status'=>true, 'msg'=>'view school profile', 'body'=>$tt];
                        echo json_encode($dataTosend); die();
                    }else{
                        $dataTosend = ['status'=>false, 'msg'=>'No data found!..', 'body'=>''];
                        echo json_encode($dataTosend); die();
                    }
                   
                      break;

                      case "get_city":
                        //$state_id = $this->input->post('state_id');
                        $RES =  $this->cm->get_data('city_tbl',[]);
     
                        if($RES){
                                $dataTosend = ['status'=>true, 'msg' =>'Success','body'=> $RES];
                                echo json_encode($dataTosend); die();
                            }else{
                                $dataTosend = ['status'=>false, 'msg' => 'No data found!..','body'=>''];
                                echo json_encode($dataTosend);die();
                            }

                        break;

                        case "update_school_profile":
                            $org_name = $this->input->post('org_name');
                            $address = $this->input->post('address');
                            $mobile = $this->input->post('mobile');
                            $school_website = $this->input->post('school_website');
                            $state = $this->input->post('state');
                            $city = $this->input->post('city');
                            $school_capacity = $this->input->post('school_capacity');
                            $zip_code = $this->input->post('zip_code');
                            $org_id = $this->input->post('org_id');
                            $whr = ['org_name'=>$org_name,'address'=>$address,'mobile'=>$mobile,'school_website'=>$school_website,
                                 'state'=>$state,'city'=>$city,'school_capacity'=>$school_capacity,'zip_code'=>$zip_code] ;
                                 $res = $this->cm->update('organisation',['org_id'=>$org_id],$whr);
                                 //echo $res;
                                 //echo "<pre>"; print_r($res);
                            // $res = "UPDATE `organisation` SET `org_id`='$org_id', `org_name`='$org_name', `address`='$address',`mobile`='$mobile',`school_website`='$school_website',
                            // `city`='$city',`state`='$state',`zip_code`='$zip_code',`school_capacity`='$school_capacity'";
                            // echo $res;
                                 if($res){
                                     $dataTosend = ['status'=>true, 'msg'=>'success_msg', 'school profile update successfully', 'body'=>$res];
                                     echo json_encode($dataTosend); die();
                                 }else{
                                     $dataTosend = ['status'=>true, 'msg'=>'error_msg', 'something went wrong please try again', 'body'=>''];
                                     echo json_encode($dataTosend); die();
                                 }
    
                            break;
                      default:
                     $dataTosend = ['status'=>false,'msg'=>"Invalid Requst",'body'=>''];
                        echo json_encode($dataTosend); die(); 
                }
    } 
  	
}
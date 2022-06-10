<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Event extends REST_Controller {
   
    public function __construct() {
       parent::__construct();
      $this->load->model('Common_model','cm');
    }
   

    public function index_post()
     {
           $flag = $this->input->post('flag');
        
                switch ($flag) {
   
                  case "add_event":
                    
                   $title = $this->input->post('title');
                   $description = $this->input->post('description');
                   $fees = $this->input->post('fees');
                   $school_id = $this->input->post('school_id');
                   $start_date	 = $this->input->post('start_date');
                   $end_date	 = $this->input->post('end_date');
                   $class_id	 = $this->input->post('class_id');
                   $created_at	 = date('Y-m-d H:i:s');
                   $updated_at	 = date('Y-m-d H:i:s');
                   if(empty($title) || empty($description) || empty($fees) || empty($school_id)){
                    $this->session->set_flashdata('All field Required!!');
                    $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
                    redirect($server);die();
                   }

                   $res = $this->cm->save('event',['title'=>$title, 'description'=>$description, 'fees'=>$fees, 'school_id'=>$school_id,
                        'start_date'=>$start_date, 'end_date'=>$end_date]);
                   if($res){
                       $this->cm->save('event_class',['class_id'=>$class_id, 'event_id'=>$res]);
                       $dataTosend = ['status'=>true, 'msg'=>'success_msg', 'add event successfull'];
                       echo json_encode($dataTosend); die();
                   }else{
                       $dataTosend = ['status'=>false, 'msg'=>'error_msg', 'something went wrong please try again'];
                       echo json_encode($dataTosend); die();
                   }

                      break;

                      case "view_event":
                        //echo 123; die();
                        
                        $id = $this->input->get('id');

                        $q = "select event.title,event.start_date,event.end_date,event.description,event.fees,event.school_id,
                        event_class.class_id,event_class.created_at,event_class.updated_at from event join event_class on event.id=event_class.event_id";
                        //echo $q;
                        $res = $this->db->query($q)->result();
                        if($res){
                            $dataTosend = ['status'=>true, 'msg'=>'view event', 'body'=>$res];
                            echo json_encode($dataTosend); die();
                        }else{
                            $dataTosend = ['status'=>false, 'msg'=>'failed', 'body'=>''];
                            echo json_encode($dataTosend); die();
                        }

                      break;

                      case "update_event":

                        $id = $this->input->post('id');
                        $title = $this->input->post('title');
                        $description = $this->input->post('description');
                        $fees = $this->input->post('fees');
                        $school_id = $this->input->post('school_id');
                        $start_date	 = $this->input->post('start_date');
                        $end_date	 = $this->input->post('end_date');
                        $class_id	 = $this->input->post('class_id');
                        $created_at	 = date('Y-m-d H:i:s');
                        $updated_at	 = date('Y-m-d H:i:s');
                        if(empty($title) || empty($description) || empty($fees) || empty($school_id)){
                            $this->session->set_flashdata('All field Required!!');
                            $server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url();
                            redirect($server);die();
                        }
                        // $whr = ['org_name'=>$org_name,'address'=>$address,'mobile'=>$mobile,'school_website'=>$school_website,
                        //          'state'=>$state,'city'=>$city,'school_capacity'=>$school_capacity,'zip_code'=>$zip_code] ;
                        //          $res = $this->cm->update('organisation',['org_id'=>$org_id],$whr);
                        $up = ['title'=>$title, 'description'=>$description, 'fees'=>$fees, 'school_id'=>$school_id,];
                        $rs = $this->cm->update('event',['id'=>$id],$up);
                        //$res = $this->db->query()->result();
                        if($rs){
                            $dataTosend = ['status'=>true, 'msg'=>'success_msg','update event successfull', 'body'=>''];
                            echo json_encode($dataTosend); die();
                        }else{
                            $dataTosend = ['status'=>false, 'msg'=>'enevt note update', 'body'=>''];
                            echo json_encode($dataTosend); die();
                        }

                      break;
                      default:
                     $dataTosend = ['status'=>false,'msg'=>"Invalid Requst",'body'=>''];
                        echo json_encode($dataTosend); die(); 
                }
    } 
  	
}
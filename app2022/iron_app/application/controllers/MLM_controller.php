<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class MLM_controller extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Openquiz_model');
        $this->load->model('Common_model','cm');
        $this->load->model('MLM_model','mm');
        $this->load->library("pagination");          
    }  

 public function index()
      {
            
            $data = array();
            $data['amount_list'] = $this->cm->get_data('dlc_min_registration_amount_agent_tbl',[]);
            $this->load->view('MLM/index',$data);
      }
      
      
	  public function add()
      {
		 $date = date('Y-m-d'); 
		$amount =  $this->input->post('amount');
		$id     =  $this->input->post('id');
		
		if($id)
		{
		      $res = $this->cm-> update_data('dlc_min_registration_amount_agent_tbl',['id'=>$id],['amount'=>$amount]);  
		       if($res){
		       $this->session->set_flashdata('success_msg', 'Amount Update successfully '); 
		       }else{
		            $this->session->set_flashdata('error_msg', 'Amount Not Update '); 
		       }
		    
		}else{
		    
		     $res = $this->cm->insert_data ('dlc_min_registration_amount_agent_tbl',['amount'=>$amount]);
		    if($res){
		     $this->session->set_flashdata('success_msg', 'Amount Inserted successfully '); 
		    }else{
		        
		         $this->session->set_flashdata('error_msg', 'Amount Not Inserted '); 
		    }
		}
		 
	    
    redirect(base_url('MLM_controller/'));     		
	}
	
public function level_page()
      {
            // dlc_min_registration_amount_agent_tbl  `id`, `amount` 
            $data = array();
        $data['level_list'] = $this->cm->get_data('dlc_agent_level_tbl',[]);
            
        $this->load->view('MLM/level_page',$data);
      }	
	
	
	 public function level_add()
      {
		 $date = date('Y-m-d'); 
		$amount =  $this->input->post('amount');
		$id     =  $this->input->post('id');
	
		
	//	$dd = $this->input->post();
		
    ///	echo "<pre>"; print_r($dd); die();
		
		$level_1 = $this->input->post('level_1');
		$level_2 = $this->input->post('level_2');
		$level_3 = $this->input->post('level_3');   
		$level_4 = $this->input->post('level_4');
		

		$where = ['level_one'=>$level_1,'level_two'=>$level_2,'level_three'=>$level_3,'level_four'=>$level_4];
		if($id != "")
		{
		    
		    
		      $res = $this->cm-> update_data('dlc_agent_level_tbl',['level_id'=>$id],$where);  
		       if($res){
		       $this->session->set_flashdata('success_msg', 'All level Update successfully '); 
		       }else{
		            $this->session->set_flashdata('error_msg', 'All level Not Update '); 
		       }
		       
		}else{
		    	 
		    	
		    
		     $res = $this->cm->insert_data ('dlc_agent_level_tbl',$where);
		    if($res){
		     $this->session->set_flashdata('success_msg', 'All level  Inserted successfully '); 
		    }else{
		        
		         $this->session->set_flashdata('error_msg', 'All level Not Inserted '); 
		    }
		}  
		  
	    
    redirect(base_url('MLM_controller/level_page'));     		
	}
	
	public function post_page()
      {
           
            $data = array();
        $data['post_list'] =$tt = $this->cm->get_data('dlc_mlm_post_cat_tbl',[]);
            
        	//echo "<pre>"; print_r($tt); die();    
              
        $this->load->view('MLM/post_page',$data);
      }	
	
	
 public function post_add()
      {
		 $date = date('Y-m-d'); 
		$Post_name =  $this->input->post('Post_name');
		$Post_limit =  $this->input->post('Post_limit');
		$id     =  $this->input->post('id');
	
		
		/*$dd = $this->input->post();
		
    	echo "<pre>"; print_r($dd); die();*/
	//	`mlm_p_id`, `post_name`, `min_agent_count`
		
		$where = ['post_name'=>$Post_name,'min_agent_count'=>$Post_limit];
		if($id != "")
		{
		    
		    
		      $res = $this->cm-> update_data('dlc_mlm_post_cat_tbl',['mlm_p_id'=>$id],$where);  
		       if($res){
		       $this->session->set_flashdata('success_msg', 'This Post Update successfully '); 
		       }else{
		            $this->session->set_flashdata('error_msg', 'This Post Not Update '); 
		       }
		       
		}else{
		    	 
		    	
		    
		     $res = $this->cm->insert_data ('dlc_mlm_post_cat_tbl',$where);
		    if($res){
		     $this->session->set_flashdata('success_msg', 'This Post Inserted successfully '); 
		    }else{
		        
		         $this->session->set_flashdata('error_msg', 'This Post Not Inserted '); 
		    }
		}  
		  
	    
    redirect(base_url('MLM_controller/post_page'));     		
	}
	
	 
	public function district_view()
      {
           
            $data = array();
            
            $qx = "select a.date,b.user_email,b.user_contact,b.user_fname,s.state_name,d.dist_name  from dlc_mlm_district_tbl as a join dlc_user as b on 
                     a.dist_head_id = b.user_id join dlc_indian_state_tbl as s on s.state_id = a.state_id join 
                     dlc_indian_district_tbl as d on a.dist_id  = d.dist_id";
       
       
       
        $data['district_agt_list']=$rr =$this->db->query($qx)->result_array();
        
        //echo "<pre>"; print_r($rr); die(); 
        
            $q = "select b.* from dlc_mlm_agent_list_tbl as a join dlc_user as b on a.user_id = b.user_id 
                    where a.agent_approval = '1' ";
            
        $data['agent_list'] = $this->db->query($q)->result_array();
        $data['state_list']=$tt = $this->cm->get_data("dlc_indian_state_tbl",[]);
            
        $this->load->view('MLM/district_page',$data);
      }	
		public function get_district()
      {
          $my_state = $this->input->post('state');
          
          
           $arr = array();
           
          $arr = $this->cm->get_data('dlc_indian_district_tbl',['state_id'=>$my_state]);
           
           if($arr){
                     $dataTosend = ['status'=>true, 'msg' =>'Success','body'=>$arr];
                                       echo json_encode($dataTosend); die();  
               }else{
                    $dataTosend = ['status'=>false, 'msg' =>'Invalid State','body'=>''];
                                       echo json_encode($dataTosend); die(); 
               }
            
           
	
      }	
      
    public function add_district_agent()
      {
		 $date = date('Y-m-d'); 
		$district =  $this->input->post('district');
		$state =  $this->input->post('state');
		$agent_id     =  $this->input->post('agent_id');
	     
	     $count =$this->cm->count_row('dlc_mlm_district_tbl',['state_id'=>$state,'dist_id'=>$district,]);
	     
	     if($count) 
	      {
	           $this->session->set_flashdata('error_msg', 'District Already Allotted ');
	           redirect(base_url('MLM_controller/district_view'));  die();
	      }
	      
	      
		$where = ['state_id'=>$state,'dist_id'=>$district,'dist_head_id'=>$agent_id,'date'=>$date];
	
	// (`state_name`, `state_name_2`, `dist_name`, `dist_head_id`, `date`) VALUES (NULL, '4', '39', '37', '2021-03-02')
	
	   $res = $this->cm->insert_data ('dlc_mlm_district_tbl',$where);
		    if($res){
		     $this->session->set_flashdata('success_msg', 'District Allotted successfully '); 
		    }else{
		        
		         $this->session->set_flashdata('error_msg', 'District Not Allot '); 
		    }
	
		  
	    
    redirect(base_url('MLM_controller/district_view'));     		   
	}
	 
     function withdraw_amount()
     {
           $q = "select b.user_id,b.user_fname,b.user_lname from dlc_mlm_agent_list_tbl as a join dlc_user as b on a.user_id = b.user_id 
                    where a.agent_approval = '1' ";
            $data = array();
             $data['agent_list']= $tt = $this->db->query($q)->result_array();
        $id = $this->uri->segment(3);
        
        $res = $this->cm->get_data('dlc_user',['user_id'=> $id]);
       
       
        
        //echo "amount ==".$res2 ; die();
        
        
        if($res){
             $res2 = $this->mm->agetnt_erned ($id);
             $data['agent_earned'] = ($res2)? round($res2, 2)  :'0';
             $data['agent_info'] = $res;
        }
    
       $this->load->view('MLM/agent_withdraw_money',$data);
     }
      
    function withdraw_money()
     {
        $data = $this->input->post();
        $user_id = $this->input->post('id');
        $a_earned = $this->input->post('a_earned');
        $a_paid = $this->input->post('a_paid');
        $taxt = $this->input->post('taxt');
    
          date_default_timezone_set('Asia/Kolkata');
                        $time    = date("H:i");
                        $date = date('Y-m-d');
                        
        if(!($a_paid >0))                       
        {
             $this->session->set_flashdata('error_msg', 'Amount is less than the required Rs 1 minimum '); 
             redirect(base_url("MLM_controller/withdraw_amount/$user_id")); die();  
        }              
      $where = ['user_id'=>$user_id,'text'=>$taxt,'amount'=>$a_paid,'date'=>$date,'time'=>$time];
      
      
      $res = $this->cm->insert_data ('mlm_agent_withdraw_tbl',$where);
		    if($res){
		     $this->session->set_flashdata('success_msg', 'Amount Paid successfully '); 
		    }else{
		        
		         $this->session->set_flashdata('error_msg', 'Amount Not Paid '); 
		    }
      
         redirect(base_url('MLM_controller/withdraw_amount'));     		   
      
     }
     
      function agentReport()
      {
       
         $type = $this->input->get('type');
       
        $data = [];
         if($type == 'newAgent'){
             /*$q= "select a.user_id,a.user_fname,a.user_email,a.user_contact,s.state_name,d.dist_name from  dlc_user as a left join dlc_indian_state_tbl  as s on a.u_state = s.state_id left join dlc_indian_district_tbl 
                 as d on  a.u_district = d.dist_id  ORDER by a.user_id DESC LIMIT 100";*/
              $old_date =   date('Y-m-d', strtotime('-7 days'));
        //  die();
            //   $q= "select a.user_id,a.user_fname,a.user_email,a.user_contact,s.state_name,d.dist_name from  dlc_user as a left join dlc_indian_state_tbl  as s on a.u_state = s.state_id left join dlc_indian_district_tbl 
            //      as d on  a.u_district = d.dist_id  where a.date > '$old_date'  ORDER by a.user_id DESC LIMIT 100"; die();
         
       //  new agent list update 2021-05-11 
         $q = "select b.* from dlc_mlm_agent_list_tbl as a join  dlc_user as b  on a.user_id = b.user_id where a.agent_approval = '1'  ORDER by a.id DESC LIMIT 100";
           
          $res = $this->db->query($q)->result() ; 
         
         
          //  $res = $this->cm->get_data ('dlc_user',['date >' => $old_date]);
            $arr = array(); $job = array();  
            foreach($res as $val)
            {
                $arr['user_id'] = $id = $val->user_id;
                $arr['user_fname'] = $val->user_fname;
                $arr['user_contact'] = $val->user_contact;
                $arr['user_email'] = $val->user_email;
                $arr['address'] = $val->address;
                $arr['amount'] = $this->mm->User_erned ($id);
                $arr['withdrow'] = $this->mm->User_withdraw ($id);
                $arr['users'] = $this->mm-> User_count ($id);
                
                $job[] = (object)$arr;
            }
            
          
           
            
            
            $data['user_info'] = $job; 
             
         }elseif($type == 'activeUser'){
                    
               // $ww =  "SELECT agent_id , sum(amount) as amount FROM dlc_agent_all_level_users_tbl GROUP by agent_id ORDER by amount DESC";   
                /* $qd= "select a.user_id,a.user_fname,a.user_email,a.address,a.user_contact,s.state_name,d.dist_name from  dlc_user as a left join dlc_indian_state_tbl  as s on a.u_state = s.state_id left join dlc_indian_district_tbl 
                 as d on  a.u_district = d.dist_id where a.user_id in
                 (SELECT agent_id FROM dlc_agent_all_level_users_tbl GROUP by agent_id ORDER by amount DESC) LIMIT 100";*/
                  
                $qd = "select  a.agent_id, count(a.user_id) as my_users ,b.user_fname,b.user_email,b.address,b.user_contact   FROM `dlc_agent_all_level_users_tbl` as a 
                        left join dlc_user as b on a.agent_id = b.user_id   GROUP by agent_id  ORDER BY my_users DESC";  
                  
                    $rrr  = $this->db->query($qd)->result(); 
                    
                    $arr = array(); $job = array();  
                            foreach($rrr as $val)
                            {
                                $arr['user_id'] = $id = $val->agent_id;
                                $arr['user_fname'] = $val->user_fname;
                                $arr['user_contact'] = $val->user_contact;
                                $arr['user_email'] = $val->user_email;
                                $arr['address'] = $val->address;
                                $arr['amount'] = $this->mm->User_erned ($id);
                                $arr['withdrow'] = $this->mm->User_withdraw ($id);
                                $arr['users'] = $this->mm-> User_count ($id);
                                
                                $job[] = (object)$arr;
                            }
                         $data['user_info'] = $job;
                 
                  }else if($type == 'districtUser'){
                       $state = $this->input->get('state');
                       $district = $this->input->get('district');
                     
                      $qs= "select a.user_id,a.user_fname,a.user_email,a.address,a.user_contact,s.state_name,d.dist_name from  dlc_user as a left join dlc_indian_state_tbl  as s on a.u_state = s.state_id left join dlc_indian_district_tbl 
                             as d on  a.u_district = d.dist_id where a.u_state = '$state' and a.u_district = '$district' ORDER by a.user_id DESC LIMIT 100";
                       $DIS  = $this->db->query($qs)->result();  
                       
                       $arr = array(); $job = array();  
                            foreach($DIS as $val)
                            {
                                $arr['user_id'] = $id = $val->user_id;
                                $arr['user_fname'] = $val->user_fname;
                                $arr['user_contact'] = $val->user_contact;
                                $arr['user_email'] = $val->user_email;
                                $arr['address'] = $val->address;
                                $arr['amount'] = $this->mm->User_erned ($id);
                                $arr['withdrow'] = $this->mm->User_withdraw ($id);
                                $arr['users'] = $this->mm-> User_count ($id);
                                
                                $job[] = (object)$arr;
                            }
                         $data['user_info'] = $job;
                     
                      
                  }else if($type == 'earningAgent'){
                      
                      $qd= "select a.user_id,a.user_fname,a.user_email,a.address,a.user_contact,s.state_name,d.dist_name from  dlc_user as a left join dlc_indian_state_tbl  as s on a.u_state = s.state_id left join dlc_indian_district_tbl 
                 as d on  a.u_district = d.dist_id where a.user_id in (SELECT agent_id FROM dlc_agent_all_level_users_tbl GROUP by agent_id ORDER by amount DESC) LIMIT 100";
                    $rrr  = $this->db->query($qd)->result(); 
                    
                    $arr = array(); $job = array();  
                            foreach($rrr as $val)
                            {
                                $arr['user_id'] = $id = $val->user_id;
                                $arr['user_fname'] = $val->user_fname;
                                $arr['user_contact'] = $val->user_contact;
                                $arr['user_email'] = $val->user_email;
                                $arr['address'] = $val->address;
                                $arr['amount'] = $this->mm->User_erned ($id);
                                $arr['withdrow'] = $this->mm->User_withdraw ($id);
                                $arr['users'] = $this->mm-> User_count ($id);
                                  $res = $this->mm-> dist_head_erned ($id);
                                 if($res>0)
                                 {
                                      $arr['amount'] =  $arr['amount'] + $res;
                                 }
                                $job[] = (object)$arr;
                            }
                         $data['user_info'] = $job;     
                             
                  }else if($type == 'AmountEarned'){
                       $min = $this->input->get('min');
                       $max = $this->input->get('max');
                       
                     
                     if($min > $max)
                     {
                           $this->session->set_flashdata('error_msg', 'Min  Amount greater than Max Amount '); 
                     }else{
                       
                     /*$qqq = "SELECT  sum(a.amount) as ern_amount ,a.agent_id,b.user_fname,b.user_email,b.user_contact  FROM 
                            dlc_agent_all_level_users_tbl as a join dlc_user as b on a.agent_id = b.user_id  GROUP by 
                                a.agent_id  HAVING ern_amount > $min and ern_amount< $max ORDER by ern_amount DESC";*/
                     
                     
                     $qqq = "SELECT  sum(a.amount) as ern_amount ,a.agent_id,b.user_fname,b.user_email,b.user_contact  FROM 
                            dlc_agent_all_level_users_tbl as a join dlc_user as b on a.agent_id = b.user_id  GROUP by 
                                a.agent_id  HAVING  ern_amount<= $max ORDER by ern_amount DESC";
                     
                       $res = $this->db->query($qqq)->result() ; 
         
                                $arr = array(); $job = array();  
                                foreach($res as $val)
                                {
                                    $arr['user_id'] = $id = $val->agent_id;
                                    $arr['user_fname'] = $val->user_fname;
                                    $arr['user_contact'] = $val->user_contact;
                                    $arr['user_email'] = $val->user_email;
                                   // $arr['address'] = $val->address;
                                    $arr['amount'] = $val->ern_amount;
                                    $arr['withdrow'] = $this->mm->User_withdraw ($id);
                                    $arr['users'] = $this->mm-> User_count ($id);
                                    $res = $this->mm-> dist_head_erned ($id);
                                   
                                 if($res>0)
                                 {
                                      $arr['amount'] =  $arr['amount'] + $res;
                                 }
                                 
                                 if(($arr['amount'] >= $min)  && ($arr['amount'] <= $max) )
                                    {
                                    $job[] = (object)$arr;
                                }
                                }
                                
                                
                                
                                
                                $data['user_info'] = $job;  
                        }
                      
                  }
                      
         $data['state_list'] = $this->cm->get_data('dlc_indian_state_tbl',[]);     
                 
         $this->load->view('MLM/agent_report',$data); 
         
       }
     
      function agent_donline()
      {
           /*  $q = " SELECT count(a.user_id) as my_users,a.agent_id,b.user_fname  FROM `dlc_agent_all_level_users_tbl` as a  join dlc_user as b on  a.agent_id = b.user_id  GROUP by a.agent_id
                     ORDER by my_users DESC";
                     
             $data['agent_list'] = $dd = $this->db->query($q)->result();          
            */         
                $id = $this->uri->segment(3);
                $d_line = $this->uri->segment(4);
                $d_line = ($d_line)? $d_line : 1; 
                $id = ($id)? $id : 0;
                
             $res = $this->cm->get_data ('dlc_user',['user_id' => $id]);
            $arr = array(); $job = array();  
            foreach($res as $val)
            {
                $arr['user_id'] = $id = $val->user_id;
                $arr['user_fname'] = $val->user_fname;
                $arr['user_contact'] = $val->user_contact;
                $arr['user_email'] = $val->user_email;
                $arr['address'] = $val->address;
                $arr['amount'] = $this->mm->User_erned ($id);
                $arr['withdrow'] = $this->mm->User_withdraw ($id);
                $arr['users'] = $this->mm-> User_count ($id);
                
                $job[] = (object)$arr;
            }
           
            $data['user_info'] = $job;           
                        
            $data['down_all'] =  $this->mm->User_downline ($id,$d_line);   
            
             $this->load->view('MLM/agent_downline',$data);  
             
      }
     
     
}   
	
	
	
	
	
	
	
<?php
	 if(!defined('BASEPATH'))
        exit('No direct script access allowed');
        
    class MLM_model extends CI_Model {
            
        public function __construct()
        {  
             $this->load->model('Common_model','cm');
            parent::__construct();
        }    
	
		
	public function agetnt_erned ($user_id)
			{
				/*$q = "select (sum(a.amount) - (sum(b.amount) + sum(b.text) ) as amount  from dlc_agent_all_level_users_tbl as a left join mlm_agent_withdraw_tbl as b
				      on a.user_id = b.user_id where user_id = '$user_id' ";*/	
               $q = "select sum(amount) as amount  from dlc_agent_all_level_users_tbl  where agent_id = '$user_id' ";    
				$res = $this->db->query($q)->result_array();
                if($res)
                {
                      $qx = "select sum(amount) as amount,sum(text) as text from mlm_agent_withdraw_tbl  where user_id = '$user_id' ";    
				          $res2 = $this->db->query($qx)->result_array(); 
                    
                     $one_am = $res[0]['amount'] ;
                     $two_am = ($res2)? $res2[0]['amount'] : 0 ;
                     $text = ($res2)? $res2[0]['text'] : 0 ;
                     $new_am =  $one_am - $two_am - $text ;
                    // echo "<br> one ==".$one_am. "== jk== ".$two_am." ==sk== ".$text. "==finl == ".$new_am; die();
                     
                   return $new_am ;   
                     
                }else{
                       return '0';
                }
			}
			
			public function User_erned ($user_id)
			{
			   $q = "select sum(amount) as amount  from dlc_agent_all_level_users_tbl  where agent_id = '$user_id' ";    
				$res = $this->db->query($q)->result_array();
			    return $dd = ($res)? $res[0]['amount'] : 0 ;
				 
			}			
			public function User_withdraw ($user_id)
			{
			   $qx = "select sum(amount) as amount,sum(text) as text from mlm_agent_withdraw_tbl  where user_id = '$user_id' ";    
				          $res = $this->db->query($qx)->result_array(); 
				       return $data = ($res)? $res[0]['amount'] : 0 ;  
				      
				         
				                
			}		
	   public function User_text ($user_id)
			{
			   $q = "select sum(amount) as amount  from dlc_agent_all_level_users_tbl  where agent_id = '$user_id' ";    
				$res = $this->db->query($q)->result_array();
			 
			  return $data = ($res)? $res[0]['text'] : 0 ;
				 
			}
	  public function User_count ($user_id)
			{
			   $q = "select count(user_id) as users  from dlc_agent_all_level_users_tbl  where agent_id = '$user_id' ";    
				$res = $this->db->query($q)->result_array();
			    return $dd = ($res)? $res[0]['users'] : 0 ;
				 
			}		
		 function dist_head_erned ($user_id)
          {
               
                $q = "select sum(a.amount) as amount  from district_earned_head_tbl as a join dlc_mlm_district_tbl as b on a.dist_id = b.dist_id and a.state_id = b.state_id 
                        and a.date >= b.date where b.dist_head_id = '$user_id'"; 
                 
                
                   $re = $this->db->query($q)->result_array();
        			$amount = '0'; 
        	        	foreach($re as $rows)
                        {
                             $amount = is_null($rows['amount'])? '0' : $rows['amount'] ; 
                           }
                   
                    return $amount;                                                                   
           }
           
        public function User_downline ($id,$num = 5)
			{
			    $num = ($num == 5)? '1,2,3,4' : $num; 
			    
			   $q = "SELECT b.user_fname, a.level_stage  FROM dlc_agent_all_level_users_tbl as a join dlc_user as b on a.user_id = b.user_id  WHERE
			            agent_id = '$id'  and level_stage in($num) order by a.level_stage ";    
			    
			   
			
			return	$res = $this->db->query($q)->result();
			  
				 
			}   
           
           
           
           
           
           
           
    }
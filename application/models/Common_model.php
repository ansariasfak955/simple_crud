<?php
	 if(!defined('BASEPATH'))
        exit('No direct script access allowed');
        
    class Common_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }    
	
		function check_value($where,$tbl)
			{
			    $this->db->where($where);
			    $query = $this->db->get($tbl)->result_array();
			    if (count($query) > 0)
			    {  return $query[0]['user_id'];
			    }
			    else{
			        return false;
		   }
		
	}
    public function count_row($tbl,$whr)
      {
            $res = $this->db->where($whr)->count_all_results($tbl);     
            return $res;
        }
	public function save($tbl,$data)
			{
					$res = $this->db->insert($tbl,$data);

				return ($res)? $this->db->insert_id() : false;

			}

		public function get_data ($tbl,$data)
			{
					$res = $this->db->where($data)->get($tbl)->result();

				return $res;

			}
    
        public function get_data_orderBy($tbl,$data,$myorder)
            {
                    $res = $this->db->where($data)->order_by($myorder)->get($tbl)->result();

                return $res;

            }
    
		public function delete($tbl,$wh)
			 {

			    $this->db->where($wh);
			    $del=$this->db->delete($tbl);   
			    return $del;

			}
			
			
	public function update($tbl,$wh,$tag)
	{
	   return  $res = $this->db->where($wh)->update($tbl, $tag);

	}		

	public function file_upload($m_file, $path)  
	{
	        $img_name =''; 
            if(isset($_FILES[$m_file]) && $_FILES[$m_file]['size'] >0 )   
            {                                                                  
                $str_imgName =  $_FILES[$m_file]['name'];       
                  $value = explode(".", $str_imgName);    
           $img_name = rand(100000,999999).'.'.strtolower($value[1]); 
            
                 $Path1 =  $path.$img_name; 
                // $Path1 =  'assets/Selfie_img/'.$img_name; 
       			if(!move_uploaded_file($_FILES[$m_file]['tmp_name'],$Path1))
				    {
				        $img_name = ''; 
				    }
            }                                                
	  
	   return  $img_name;                

	}

    public function get_days($date_1,$date_2)
        {
                $start = strtotime($date_1);
                $end = strtotime($date_2);
           return    $days_between = ceil(abs($end - $start) / 86400);
        }
	
	public function get_years($date_1,$date_2)
        {
                $start = strtotime($date_1); $end = strtotime($date_2);
             $days =     $days_between = ceil(abs($end - $start) / 86400);
             return   $res = floor($days/365);
        }
			
   public function getTimeDiff($dtime,$atime)
    {
        $nextDay = $dtime>$atime?1:0;   
        $dep = explode(':',$dtime);
        $arr = explode(':',$atime);
        $diff = abs(mktime($dep[0],$dep[1],0,date('n'),date('j'),date('y'))-mktime($arr[0],$arr[1],0,date('n'),date('j')+$nextDay,date('y')));
        $hours = floor($diff/(60*60));
        $mins = floor(($diff-($hours*60*60))/(60));
        $secs = floor(($diff-(($hours*60*60)+($mins*60))));
        if(strlen($hours)<2){$hours="0".$hours;}
        if(strlen($mins)<2){$mins="0".$mins;}
        if(strlen($secs)<2){$secs="0".$secs;}
        return $hours.':'.$mins;
    }	
    
     public function getTimes($t1,$t2)
    {
             $start = strtotime($t1);
            $end = strtotime($t2);
            $delta = $end - $start;
            
            $hours = floor($delta / 3600);
            $remainder = $delta - $hours * 3600;
            $formattedDelta = sprintf('%02d', $hours) . gmdate(':i:s', $remainder);
            return  $formattedDelta;
    }	
    
    
			
	public function sen_url($rupee,$contact_no,$email){
	    
	     $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER,
                        array("X-Api-Key:test_c2c2da7eedd9cf949eccd114bb9",
                                      "X-Auth-Token:test_12d832645ed792f06b38ada89b3"));
            $payload = Array(
                'purpose' => 'Skysa_token_purchase',
                'amount' => $rupee,
                'phone' => $contact_no,
                'buyer_name' => 'Chandru',
                'redirect_url' => base_url('HomeController/buy_rupee_pyments'),
                'send_email' => true,
            
                'send_sms' => true,
                'email' => $email,
                'allow_repeated_payments' => false
            );
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
            $response = curl_exec($ch);
            curl_close($ch);     
                     
                           $response = json_decode($response);
                               $arr =  (array)$response;
                          $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER,
                        array("X-Api-Key:test_c2c2da7eedd9cf949eccd114bb9",
                                      "X-Auth-Token:test_12d832645ed792f06b38ada89b3"));
            $payload = Array(
                'purpose' => 'Skysa_token_purchase',
                'amount' => $rupee,
                'phone' => $contact_no,
                'buyer_name' => 'Chandru',
                'redirect_url' => base_url('HomeController/buy_rupee_pyments'),
                'send_email' => true,
            
                'send_sms' => true,
                'email' => $email,
                'allow_repeated_payments' => false
            );
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
            $response = curl_exec($ch);
            curl_close($ch);     
                     
                           $response = json_decode($response);
                         return      $arr =  (array)$response;
                         
	    
	}		
                                                              
	public function send_otp($otp,$mobile)
	    {
      
       //  $url = "https://2factor.in/API/V1/4d306f96-dcb0-11ea-9fa5-0200cd936042/SMS/$mobile/".$otp;
        
         $url = "https://2factor.in/API/V1/e213c682-bc5c-11eb-8089-0200cd936042/SMS/$mobile/".$otp;
         
           $ch = curl_init($url);
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $output = curl_exec($ch);
                        curl_close($ch);
                return true;
   
          
	    }

        function getSingleRecordById($table,$conditions)
        {
            $query = $this->db->get_where($table,$conditions);
            return $query->row_array();
        }

        function addRecords($table,$post_data)
        {
            $this->db->insert($table,$post_data);
            return $this->db->insert_id();
        }


        public function curl_url_post_wallet($url)
        {

            $curl = curl_init();
            curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'Cookie: __cfduid=d1839221f9f80bf7be06488dab02c10d01620628939'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        return $response;
        }

        public function curl_url_post($url,$data_string){

        $ch = curl_init($url);
         
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tx_response = json_decode(curl_exec($ch));
            $err = curl_error($ch);
            
            curl_close($ch);
            if ($err) {
              // return $err;
            } else {

                return $tx_response;
            }
    }


        public function curl_url_get($url){

            $dx_curl = curl_init();

            curl_setopt_array($dx_curl, array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_POSTFIELDS => "",
              CURLOPT_HTTPHEADER => array(
                "Postman-Token: e33f8e2c-7713-46cc-8b25-17ff6166e765",
                "cache-control: no-cache"
              ),
            ));

            $dx_response = json_decode(curl_exec($dx_curl));
            $err = curl_error($dx_curl);
            curl_close($dx_curl);
            if ($err) {
                // print_r($err);
                // die();
              return $err;
            } else {
              return($dx_response);
              
            }
        }

        function generateRandomString($length = 6) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }			
			
          function kycRandString(){
               $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
               return $str_result = 'SKY'.substr(str_shuffle($str_result), 0, 7);
                }
              
                     
       function get_client_ip() {
                      $ipaddress = '';
                      if (getenv('HTTP_CLIENT_IP'))
                          $ipaddress = getenv('HTTP_CLIENT_IP');
                      else if(getenv('HTTP_X_FORWARDED_FOR'))
                          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
                      else if(getenv('HTTP_X_FORWARDED'))
                          $ipaddress = getenv('HTTP_X_FORWARDED');
                      else if(getenv('HTTP_FORWARDED_FOR'))
                          $ipaddress = getenv('HTTP_FORWARDED_FOR');
                      else if(getenv('HTTP_FORWARDED'))
                         $ipaddress = getenv('HTTP_FORWARDED');
                      else if(getenv('REMOTE_ADDR'))
                          $ipaddress = getenv('REMOTE_ADDR');
                      else
                          $ipaddress = 'UNKNOWN';
                      return $ipaddress;
                  }        
           function get_user_Activitys($user_id,$activity_id) {
            
                $q = "SELECT c.title,b.feild_name ,a.activity_fild_values,a.student_id,c.activity_id  FROM activity_logs as a
                        join activity_feild as b on a.act_feild_id = b.id join activity_tbl as c on
                        b.activity_id = c.activity_id WHERE c.activity_id = '$activity_id' and a.student_id = '$user_id'"; 
            
                    return $res = $this->db->query($q)->result(); 
           } 
           
          public function file_types($file_name){
          
                        $filename = $_FILES[$file_name]['name'];
                       $ext = pathinfo($filename, PATHINFO_EXTENSION);
                  $image_type_array = [ 'image'  => ['jpg' ,'jpeg' ,'jfif' ,'pjpeg' ,'png','svg','gif'],
                                        'file'   => ['txt' ,'doc' ,'docx' ,'pdf' ,'xls','xlsx','ppt','pptx'],
                                        'video'  => ['mp4' ,'m4p' ,'m4pv' ,'pdf' ,'xls','xlsx','ppt','pptx']
                                      ];
            $ext = strtolower($ext); $m_type = '';
           foreach ($image_type_array as $key => $value) {
              if (in_array($ext  , $value)) {  $m_type = $key; }
             }
             
             return $m_type;
             
             
             
             }   
           
           
           
    }

		
<?php 
ob_start();
error_reporting(0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notification_model extends CI_Model{
    function __construct() {
        $this->tableName = ' dlc_notification';
       
        $this->primaryKey = 'no';
  
    }
    
  /*  public function insert($data = array()){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }*/


 
  
   public function delete($services_id)
   {
      $this->db->where('no',$services_id);
      $this->db->delete('dlc_notification');

   }
 

  /*
   public function record_count() {
 
       return $this->db->count_all("dlc_notification");
 
   }
  
   public function fetch_departments($limit, $start) {

       //$this->db->group_by('title');
      // $this->db->group_by('message');
       $this->db->order_by('no', 'DESC');
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("dlc_notification");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;

 
   } */
   
  public function select_all_notificatios()
   {
       
       $this->db->select('*');
       $this->db->from('dlc_notification');
       $this->db->order_by('no', 'DESC');
       $query = $this->db->get();
        return $query->result();
       
   }


        function push_notification_android($tokens,$title,$msg)
            {
                $date = date('Y-m-d');
                    $url = 'https://fcm.googleapis.com/fcm/send';
                 
               	$api_key = 'AAAALvZiuLA:APA91bExJt5QIxnFB3us9mxP6xxKM-Pojrjeg-GnK_lD9hJat0SnL-Rm0Q4qPTq1glHEquDB-_9Xf00Gy7eYycAIKDFgYxqq4k-ajCScFHN0tDkCUYItDTynpzNQH57uHrO7awRKv9aN';
		      
		            $messageArray = array();
                    $messageArray["data"] = array (
                        'title' => $title,
                        'message' => $msg,
                        'timestamp'=>$date,
                        'sound' => 'default', 
                        'badge' => '1',
                    );
                    $fields = array(
                        'registration_ids' => $tokens,
                        'data' => $messageArray,
                        'priority'=>'high',
                    );
                    $headers = array(
                        'Authorization: key=' . $api_key, //GOOGLE_API_KEY
                        'Content-Type: application/json'
                    );
                    
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                    $result = curl_exec($ch);
                    //print_r($result);
                   
                    // Close connection     
                     curl_close($ch);
                    return true;
                }
   


}
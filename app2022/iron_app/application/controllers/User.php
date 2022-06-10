<?php 
error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Common_model','cm');
        $this->load->model('User_model');
          $this->load->library("pagination");
          
    }  

  /*
    public function index(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "User/index";
 
       $config["total_rows"] = $this->User_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $user =  $this->input->post('usr');
        $eml =  $this->input->post('em');
 
 
       $data["view"] = $this->User_model->
 
           fetch_departments($config["per_page"], $page,$user,$eml);
 
       $data["links"] = $this->pagination->create_links();

      $this->load->view('view_user', $data);
        } */
        
    public function index()
    {
         ini_set('memory_limit', '1024M');
        $user =  $this->input->get('usr');
        $eml =  $this->input->get('em');
        $F_date =  $this->input->get('F_date');
        $T_date =  $this->input->get('T_date');
      if(!empty($F_date) && !empty($T_date) ) 
        {
             $data['view'] = $this->cm->get_data ('dlc_user',['date>=' =>$F_date, 'date <='=>$T_date]);
            
            
        }else{
             $data['view']  = $this->User_model->select_all_users($user,$eml);
        }
       // echo "<pre>"; print_r($dx); die();
        
        
      
      $this->load->view('view_user', $data); 
        
    }
    
   public function emptyy(){
       $id = $this->uri->segment('3');
      $sqld = $this->db->query("update dlc_user set device_id ='' where user_id ='$id'"); 
      redirect('User');
   }
   
    public function user_device_id_empty(){
       $mobile = $this->uri->segment('3');
       if($mobile != ''){
            $sqld = $this->db->query("update dlc_user set device_id ='' where user_contact ='$mobile'"); 
            file_get_contents("http://www.smsjust.com/blank/sms/user/urlsms.php?username=dictionary&pass=Aayush@33&senderid=DLCBPL&dest_mobileno=$mobile&message=Dear+user+Your+device+id+has+been+cleaned+You+can+now+login+to+DLC+App+Thanks+DLC+The+Learning+Club+App&response=Y");
         }
     redirect('User/getdevicerequests');
   }
   
     public function Contacts()
    {
      $id = $this->uri->segment('3'); 
        
       $data['view']  = $this->User_model->con_users($id);
      $this->load->view('view_con', $data); 
        
    }
    public function getdevicerequests()
    {
      $data['view']  = $this->User_model->getdevicerequests();
      $this->load->view('view_deviceid_requests', $data); 
        
    }
        
        

   public function friendsearch() { 
   
     $name = $_POST['keyword'];
  
    ?>
<ul id="country-list">
<?php   $datauser=$this->User_model->myfriendname($name);

foreach($datauser as $country) {
?>
<li onClick="selectCountry('<?php echo $country->user_fname; ?>');" style="text-align:left !important; display: block !important;background: #272b34; color:#fff"><?php echo $country->user_fname; ?> </li>
<?php } ?>
</ul>
                             
 <?php     }
 public function friendsearchh() { 
   
     $name = $_POST['keyword'];
    
    ?>
<ul id="country-list">
<?php   $datauser=$this->User_model->myfriendnamee($name);

foreach($datauser as $country) {
?>
<li onClick="selectCountryy('<?php echo $country->user_email; ?>');" style="text-align:left !important; display: block !important;background: #272b34; color:#fff"><?php echo $country->user_email; ?> </li>
<?php } ?>
</ul>
                             
 <?php     }  


      public function add_user()
      {
        $this->load->view('add_user');
      }
      public function add_user_data()
      {
        
     $email=$this->input->post('email');
     $record = $this->db->query("select * from dlc_user where user_email = '$email'");
          foreach($record->result_array() as $rrsd)
          {
            $uid = $rrsd['user_id'];   
          }
    
        if(!empty($uid))
          { 
 $this->session->set_flashdata('success_msg', 'Email address already register please add another email address.');
        ?>
  <script> window.location.assign('<?php echo base_url(); ?>User/add_user'); </script>       
         <?php }
          else {


        $otp = rand(1000,99999);
          if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'upload/user/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['image']['name'];
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image')){
                    $uploadData = $this->upload->data();
                    $image = $uploadData['file_name'];
                }else{
                    $image = '';
                }
            }else{
                $image = '';
            }
 

        $data = array( 'user_fname'=>$this->input->post('fname'),
                       'user_lname'=>$this->input->post('lname'),
                       'user_email'=>$this->input->post('email'),
                       'user_contact'=>$this->input->post('contactno'),
                       'user_status'=>'1',
                       'user_password'=>$this->input->post('password'),
                       'user_otp'=>$otp,
                       'user_verification'=>'0',
                       'user_image'=>$image
                    ); 
           $insertUserData = $this->User_model->insert($data);  
          if($insertUserData){
                ?>
                <?php 
               $this->session->set_flashdata('success_msg', 'User have been added successfully.');
               ?>
        	<script> window.location.assign('<?php echo base_url(); ?>User'); </script>       
               <?php
            }
            else {
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            } ?> <script> window.location.assign('<?php echo base_url(); ?>User/add_user');</script> <?php
         // redirect('User');       
      }
    }

        public function delete(){ 

         $this->load->model('User_model'); 
         $services_id = $this->uri->segment('3'); 
         $this->User_model->delete($services_id); 
   
         redirect('User'); 
      } 
        public function status(){ 
          $status = $_GET['status'];
          $id = $_GET['id'];
          $data = array('user_status'=> $status);
        $res =  $this->User_model->update_status($data,$id);
         if($res)
          {  
               $dataTosend = ['status'=>true, 'msg' => 'success','body'=> $res];
                   echo json_encode($dataTosend); die();
          }else{
                 $dataTosend = ['status'=>false, 'msg' => 'No data Found!..','body'=>''];
                   echo json_encode($dataTosend);die();
              }    
    }



   public function update_row()
    {
                          
      $id=$this->input->post('uid');
                                 
      // echo "jkk  <pre>"; print_r($_FILES['image']); die(); 
                         
             $image = $this->cm->file_upload_with_inverted('image','./uploads/user/');
       
                                
      //  echo "new img ==   $image"; die();                          

        $data = array( 'user_fname'=>$this->input->post('fname'),
                       'user_lname'=>$this->input->post('lname'),
                       'user_email'=>$this->input->post('email'),
                       'user_contact'=>$this->input->post('contactno'),
                       'user_password'=>$this->input->post('password'),
                      ); 
                    
          if($image){ $data['user_image']= $image; }            
      
            $this->User_model->updata($id,$data);
        
        $this->session->set_flashdata('successm_msg', 'User have been updated successfully.');
              redirect('User'); 
  }

         public function edit(){ 
         $this->load->helper('form');
         $this->load->helper('url'); 
         $services_id = $this->uri->segment('3'); 
         $query = $this->db->get_where("dlc_user",array("user_id"=>$services_id));
       
         $data['records'] = $query->result(); 
         $data['services_id'] = $services_id; 
         $this->load->view('edit_user',$data); 
      } 

      public function emp_type(){ 
        $data = array(); 
        $data['views'] = $this->cm->get_data('emp_type_tbl',[]);
          $this->load->view('emp_type',$data); 
      }

 public function add_emp_type(){ 
     $name = trim($this->input->post('name'));
    
    if(empty($name)){
                         $this->session->set_flashdata('error_msg','All fields are required');
                          redirect(base_url('User/emp_type')); die();                  
                     }
    
         $res = $this->cm->insert_data('emp_type_tbl',['emp_type'=>$name]); 
    
        if($res){
                     $this->session->set_flashdata('success_msg', 'Employee Type addd successfully.');
                 }else{
                        $this->session->set_flashdata('error_msg', 'Employee Type Not add');
                    }
    
       redirect(base_url('User/emp_type'));  
        
      }

    public function update_emp_type(){ 
     $name = trim($this->input->post('name'));
     $id    = trim($this->input->post('id'));
    
                 if(empty($name) || empty($id)  ){
                         $this->session->set_flashdata('error_msg','All fields are required');
                          redirect(base_url('User/emp_type')); die();                  
                     }
    
         $res = $this->cm->update_data('emp_type_tbl',['emp_type_id'=>$id],['emp_type'=>$name]); 
    
        if($res){
                     $this->session->set_flashdata('success_msg', 'Employee Type Update successfully.');
                 }else{
                        $this->session->set_flashdata('error_msg', 'Employee Type Not Update');
                    }
    
      redirect(base_url('User/emp_type'));    
        
      }

    public function delete_emp_type(){ 
    
     $id    = $this->uri->segment(3); 
    
                 if(empty($id)  ){
                         $this->session->set_flashdata('error_msg','All fields are required');
                          redirect(base_url('User/emp_type')); die();                  
                     }
 
         $res = $this->cm->deleteRecord('emp_type_tbl',['emp_type_id'=>$id]); 
    
        if($res){
                     $this->session->set_flashdata('success_msg', 'Employee Type Delete successfully.');
                 }else{
                        $this->session->set_flashdata('error_msg', 'Employee Type Not Delete');
                    }
    
      redirect(base_url('User/emp_type'));    
        
      }


}
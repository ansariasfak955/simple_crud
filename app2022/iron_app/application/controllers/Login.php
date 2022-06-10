<?php
error_reporting(0);
class Login extends CI_Controller{

      function __construct()
  {
    parent::__construct();
   $this->load->model('Login_model');
    
  }


public function index()
  {

     $this->load->model('Login_model');
    //  $data['view']=$this->Login_model->selectdata();
    // $this->load->view('login',$data);
     $this->load->view('login.php');
  }


        public function log() {
       if ($this->form_validation->run('loginuser') == FALSE)
        {
        redirect('Login/index');
         }

      else {
                          
   $email = $this->input->post('email');
  $password = $this->input->post('password');
//echo $password;exit;
  $user_id = $this->Login_model->login_user($email,$password);
  
 // echo "<pre>"; print_r($user_id); die(); 
  
 if($user_id>0)
       {
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $result=$this->Login_model->logindata($email,$password);
       // print_r($result);
       // die();
        if($result>0)
        {   
          $data=array(
              'name'=>$result[0]->admin_name,
              'email'=>$result[0]->admin_email,
              'password'=>$result[0]->password,
              'id'=>$result[0]->id,
             
              );
          $this->session->set_userdata('id', $data);
          $this->session->set_userdata('name', $data);
          $this->session->set_userdata('email', $data);
            redirect('Home');
        }
       }
                     
     else{
 $this->session->set_flashdata('login_failed','User Not Found');
?>
  <script> alert('User not Found.');
  window.location.assign("<?php echo base_URL(); ?>Login");</script><?php
                
             }
            }
          }

        public function logout() {
                $this->session->sess_destroy();
                redirect ('Login/index');
             }



      public function forget()
     {
       $email=$this->input->post('email');

     $this->load->model('Login_model');
       $sql = $this->db->query("SELECT * FROM admin where admin_email = '$email'");

       foreach($sql->result_array() as $row)
       { $emails = $row['admin_email'];}

     if($emails){
 
    $email=$emails;
    $links = rand(10000000,90000002);
    $to=$email;

     $querd = $this->db->query("UPDATE `admin` SET `otp` = '$links' where admin_email = '$email'");

    $link =  "http://webbinart.tk/diet/dlc/admin/Login/reset/".$links;
                   $to=$email;
                    $strSubject="dlc.com";
                        $message = 'hello user,';
                       
                        $message = 'reset your password<br>';
                         //$message .= $headsmy ;
                        $message .= '<p> message : - click to these link to reset your password - '.$link.'</p>' ; 
                        $message .= '<p>email : - </p>'.$email.'</p>' ;
                        $message .=$foot ; 

                        $headers = 'MIME-Version: 1.0'."\r\n";
                     $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                     $headers .= "From: http://webbinart.com";            
                     $mail_sent=mail($to, $strSubject, $message, $headers);

                     if($mail_sent)
                      {?><script> alert("Your password reset sucessfully, new password send your email address.");
           window.location.assign("<?php echo base_url(); ?>Login/index"); </script>  <?php }
         }
         else {?>
         <script> alert("Invalid email address please enter valid email address.");
           window.location.assign("<?php echo base_url(); ?>Login/index"); </script>  <?php }
         

      //  redirect($_SERVER['HTTP_REFERER']); 
     }
       public function reset()
     { $this->load->view('reset_password');}
       public function change()
    {
      
         $email=$this->input->post('keys');  
         $newpassword=$this->input->post('newpassword');   
         $rnewpassword=$this->input->post('rnewpassword'); 

          if($rnewpassword == $newpassword){ 
      
        $data=array(
             'password'=>$this->input->post('newpassword'),
      );
        $this->load->model('Login_model');
        $changes = $this->Login_model->updatapass($email,$data);
       {?><script> alert('Password changed successfully please login to your session.');
       window,location.assign("<?php echo base_url(); ?>/Home");
       </script> <?php }
    

}
    else {
        ?><script> alert('Password and re-enter password not matched');
          window,location.assign("<?php echo base_url(); ?>/Login/reset/<?php echo $email; ?>"); </script><?php
    }

      
    }


              }
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Profile_model');
          $this->load->library("pagination");
    } 
     public function myprofile() { 
         $this->load->helper('form');
         $this->load->helper('url'); 
       $user_id = $this->session->userdata['id']['id'];
         $query = $this->db->get_where("admin",array("id"=>$user_id));
         $data['records'] = $query->result(); 
   $this->load->view('admin_profile',$data); 
      } 

    public function changepassword()
    {
        $id = $this->session->userdata['id']['id']; 
       
      $oldpassword=$this->input->post('oldpassword');  
        $newpassword=$this->input->post('newpassword');   
         $rnewpassord=$this->input->post('rnewpassword'); 
          $old=$this->input->post('old'); 

      
          if($rnewpassord == $newpassword){ 
        if($old === $oldpassword){
        $data=array(
             'password'=>$this->input->post('newpassword'),
    
      );
        $this->load->model('Profile_model');
        $changes = $this->Profile_model->updatapass($id,$data);
       {

         $this->session->set_flashdata('success_msgn', 'Password changed successfully please login to your session.'); 
       ?><script> alert('Password changed successfully please login to your session.');
         window.location.assign('<?php echo base_url(); ?>Login/logout');</script> <?php }
       // redirect('Login/logout'); 
    }
    else {

       
         $this->session->set_flashdata('success_msgn', 'Old password not matched'); 
         ?><script> //alert('Old password not matched'); 
         window.location.assign('<?php echo base_url(); ?>Profile/myprofile'); </script><?php }

}
    else {

         $this->session->set_flashdata('success_msgn', 'Password and re-enter password not matched'); 
        ?><script> //alert('Password and re-enter password not matched'); 

        window.location.assign('<?php echo base_url(); ?>Profile/myprofile'); </script><?php
    }

      
    }
//update profile


        public function update_admin()
    {
         $id= $this->session->userdata['id']['id'];
         
 $data=array(
             'admin_name'=>$this->input->post('name'),
             'admin_email'=>$this->input->post('email'),
             'contact'=>$this->input->post('contactno'),
    
      );
        $this->load->model('Profile_model');
        $this->Profile_model->updata($id,$data);
          $this->session->set_flashdata('success_msg', 'Profile have been update successfully.');
        redirect($_SERVER['HTTP_REFERER']); 
    }
   

}
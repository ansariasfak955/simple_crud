<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class User_subscription extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('User_subscription_model');
          $this->load->library("pagination");
          
    }  

   /*
    public function index(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "User_subscription/index";
 
       $config["total_rows"] = $this->User_subscription_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
       $data["view"] = $this->User_subscription_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();

      $this->load->view('view_user_subscription', $data);
        } */
        
        public function index()
        {
         $data["view"] = $this->User_subscription_model->select_all_subscription();   
          $this->load->view('view_user_subscription', $data);   
            
        }
        
        

       /*  public function friendsearchs() { 
   
     $name = $_POST['keyword'];
   
    ?>
<ul id="country-list">
<?php   $datauser = $this->User_subscription_model->myfriendnames($name);

foreach($datauser as $country) {
?>
<li onClick="selectCountrys('<?php echo $country->user_id;?>');" style="text-align:left !important; display: block !important;"><?php echo $country->user_fname;?> </li>
<?php } ?>
</ul>
                             
 <?php } */


      public function add_subcription()
      {
        $this->load->view('add_user_subscription');
      }
      public function add_subscription_data()
      {   

                   $dat = date("Y-m-d");        
         
        $data = array( 'user_id'=>$this->input->post('uname'),
                       'pack_id'=>$this->input->post('courss'),
                       'subscrip_date'=>$dat                      
                    ); 
           $insertUserData = $this->User_subscription_model->insert($data);  
          if($insertUserData){
                ?>
                <script> //alert('Special region Successfully Added');</script><?php 
               $this->session->set_flashdata('success_msg', 'User Subscription have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
          redirect('User_subscription');           
    }
    public function delete()
    {
      $id = $this->uri->segment(3);
      $this->User_subscription_model->delete_subscription($id);
       redirect('User_subscription');   
    }
    public function status(){ 
      $status = $_GET['status'];
          $id = $_GET['id'];
        $data = array('status'=> $status);
      $this->User_subscription_model->update_status($data,$id);
    }

public function search()
{

  $this->load->view('view_user_subscription');
}


public function listing() { 

     $name = $_POST['keyword'];
    ?>
<ul id="country-list">
<?php   $datausers=$this->User_subscription_model->myuser($name);
foreach($datausers as $country) {
?>
<li onClick="selectCountry('<?php echo $country->user_fname;?>');" style="text-align:left !important; display: block !important;background: #272b34; color:#fff"><?php echo $country->user_fname; ?></li>
<?php } ?>
</ul>
                             
 <?php  }  




}
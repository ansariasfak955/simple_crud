<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Referrals extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Referrals_model');
          $this->load->library("pagination");
          
    }  
          /*
    public function select_all_referrals(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Referrals/select_all_referrals";
 
       $config["total_rows"] = $this->Referrals_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      
 
       $data["view"] = $this->Referrals_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();
    
      $this->load->view('view_referrals', $data);
        } */
        
     public function select_all_referrals()
      { 
          
        $data["view"] = $this->Referrals_model->selec_all_refferals();
         $this->load->view('view_referrals', $data);
        
      }
        
        
        

   
        /* public function friendsearch() { 
    
     $name = $_POST['keyword'];
  
    ?>
<ul id="country-list">
<?php   $datauser=$this->Referrals_model->myfriendname($name);
//print_r($datauser);
foreach($datauser as $country) {
?>
<li onClick="selectCountry('<?php echo $country->user_id; ?>');" style="text-align:left !important; display: block !important;"><?php echo $country->user_fname; ?> </li>
<?php } ?>
</ul>
                             
 <?php  } */
  public function search() { 
        $this->load->model('Referrals_model');
        $this->load->view('view_referrals'); 
      } 


 public function selec_referrals_as_per_user()
 {
     $id = $this->uri->segment(3);
     $data['rf'] = $this->Referrals_model->select_reff($id);
     $this->load->view('view_all_referrals',$data);

 }

 public function listing() { 
    
     $name = $_POST['keyword'];
    ?>
<ul id="country-list">
<?php   $datausers=$this->Referrals_model->myuser($name);
foreach($datausers as $country) {
?>
<li onClick="selectCountry('<?php echo $country->user_fname; ?>');" style="text-align:left !important; display: block !important;background: #272b34; color:#fff"><?php echo $country->user_fname; ?></li>
<?php } ?>
</ul>
                             
 <?php } 
       
   }     
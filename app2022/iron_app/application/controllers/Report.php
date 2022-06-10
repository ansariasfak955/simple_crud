<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Report_model');
          $this->load->library("pagination");
          
    }  

  /*
    public function index() { 
            $config = array();
 
       $config["base_url"] = base_url() . "Report/index";
 
       $config["total_rows"] = $this->Report_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $user =  $this->input->post('name');
 
       $data["view"] = $this->Report_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();

      $this->load->view('view_report',$data);
        } */
        
    public function index() {
             
    $data["view"] = $this->Report_model->select_all_report();         
    $this->load->view('view_report',$data);         
         }
        
        
        

   /*
         public function friendsearch() { 
    
     $name = $_POST['keyword'];
   
    ?>
<ul id="country-list">
<?php   $datauser=$this->Report_model->myfriendname($name);

foreach($datauser as $country) {
?>
<li onClick="selectCountry('<?php echo $country->user_id; ?>');" style="text-align:left !important; display: block !important;"><?php echo $country->user_fname; ?> </li>
<?php } ?>
</ul>
                             
 <?php  } */

  public function search() { 
        $this->load->model('Report_model');
        $this->load->view('view_report'); 
      } 

      public function listing() { 
    
     $name = $_POST['keyword'];
    ?>
<ul id="country-list">
<?php   $datausers=$this->Report_model->myuser($name);
foreach($datausers as $country) {
?>
<li onClick="selectCountry('<?php echo $country->user_fname; ?>');" style="text-align:left !important; display: block !important;background: #272b34; color:#fff"><?php echo $country->user_fname; ?></li>
<?php } ?>
</ul>
                             
 <?php } 



  }
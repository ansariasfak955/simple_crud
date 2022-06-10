<?php //error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Rating extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('Rating_model');
		$this->load->library("pagination");
    }
    public function add_ret()
    {
        $this->load->view('add_ratings');
    }
    
   public function add(){
      
        //if($this->input->post('submit')){
            $this->load->model('Rating_model');
    
   $userData = array(
          
          'pack_id'=>$this->input->post('pack'),
          'rateStar'=>$this->input->post('ratt'),
          'comment'=>$this->input->post('cmt'),
          'user_id'=>'0',
            );
           
            
            $insertUserData = $this->Rating_model->insert($userData);
          
          if($insertUserData){
         $this->session->set_flashdata('success_msg', 'Rating have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
           
      //  }
     
        redirect('Rating/viewreview'); 
    }
    
   /* public function viewreview()
	{ 
        $config = array();
        $config["base_url"] = base_url() . "Rating/viewreview";
        $config["total_rows"] = $this->Rating_model->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $dtss = $this->input->post('sears');
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["view"] = $this->Rating_model->
        fetch_departments($config["per_page"], $page,$dtss);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('reviews_list', $data);
    }*/
    
     public function viewreview()
     {
      //$dtss = $this->input->post('sears');   
       $pkgiid = $this->uri->segment(3);
      $data['view'] = $this->Rating_model->select_all_review($pkgiid);     
      $this->load->view('reviews_list', $data);   
     }
    
    
    /*
     public function search() { 
        $this->load->model('Rating_model');
        $this->load->view('reviews_list'); 
      }*/ 
    
    
    
    
    
    public function status()
    { 
        $status = $_GET['status'];
        $id = $_GET['id'];
	    $sqls = $this->db->query("update dlc_rating  set status='$status' where rating_id='$id'");
	    
	}
	public function delete()
	{ 
        $this->load->model('Rating_model'); 
        $services_id = $this->uri->segment('3'); 
        $this->Rating_model->delete($services_id); 
        ?><script> window.location.assign('<?php echo base_url(); ?>Rating/viewreview'); </script><?php
          
    }
    
   /* 
    public function viewpack()
	{ 
        $config = array();
        $config["base_url"] = base_url() . "Rating/index";
        $config["total_rows"] = $this->Rating_model->record_countp();
        $config["per_page"] = 10  ;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["view"] = $this->Rating_model->
        fetch_departmentsp($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $this->load->view('pack_list', $data);
    } */
    
    public function viewpack()
    {
     $data["view"] = $this->Rating_model->select_packs_data(); 
     $this->load->view('pack_list', $data);
    }
    public function packd()
    {
        $pac_id = $this->uri->segment(3);
        
        
        $this->load->view('packd_details');
    }
    public function packdg()
	{ 
       
	     $this->load->helper('form');
         $this->load->helper('url'); 
          $pac_id = $this->uri->segment('3'); 
         $services_id = $this->uri->segment('3'); 
         $query = $this->db->get_where("dlc_course_package",array("pack_id"=>$services_id));
          $data['pack'] = $this->Rating_model->pack($pac_id);
         $data['records'] = $query->result(); 
         $data['services_id'] = $services_id; 
         $this->load->view('packd_details',$data); 
    }
    
    
    public function edit(){ 
         $this->load->helper('form');
         $this->load->helper('url'); 
         $services_id = $this->uri->segment('3'); 
         $query = $this->db->get_where("dlc_rating",array("rating_id"=>$services_id));
         $data['records'] = $query->result(); 
         $this->load->view('edit_rating',$data); 
      } 
      
public function update_row()
{
    
    $rtid = $this->input->post('rtng_id'); 
    $data = array(
          'user_id'=>$this->input->post('usre'),
          'pack_id'=>$this->input->post('ppk'),
          'rateStar'=>$this->input->post('rts'),
          'comment'=>$this->input->post('cmtss'),
        );
        
  $this->Rating_model->update_rating($data,$rtid);
  
 redirect('Rating/viewreview');
        
    
}


/*
public function listing() { 
    
     $name = $_POST['keyword'];
    ?>
<ul id="country-list">
<?php   $datausers=$this->Rating_model->myuser($name);
foreach($datausers as $country) {
?>
<li onClick="selectCountry('<?php echo $country->user_fname; ?>');" style="text-align:left !important; display: block !important;background: #272b34; color:#fff"><?php echo $country->user_fname; ?></li>
<?php } ?>
</ul>
                             
 <?php } */
    

}
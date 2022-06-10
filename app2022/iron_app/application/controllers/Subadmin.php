<?php error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Subadmin extends CI_Controller
{
    function  __construct() {
        parent::__construct();
       $this->load->model('Subadmin_model');
       $this->load->model('Common_model','cm');
        $this->load->library("pagination");
    }    

 public function index()
  {    $data = array(); 
     $data['type_list'] = $this->cm->get_data('emp_type_tbl',[]);    
         $this->load->view('addsubadmin',$data);    
  }
  public function add_subadmin()
  {
       $cont = $this->input->post('contactno');
       $records = $this->Subadmin_model->db->where('contact', $cont)->get('admin')->row();
       $uids = $records->id; 

     $email=$this->input->post('email');
       $record = $this->Subadmin_model->db->where('admin_email', $email)->get('admin')->row();
     $uid = $record->id;
    
      if($uid)
        { 
          
 $this->session->set_flashdata('success_msg', 'Email address already register please add another email address.' );
           redirect('Subadmin/index'); }
       elseif ($uids){
      $this->session->set_flashdata('success_msg', 'Contact already register please add another contact.' );
      redirect('Subadmin/index');
        
         }

            else { 
                     
      
     $data = array( 'admin_name'=> $this->input->post('name'),
                    'admin_email'=> $this->input->post('email'),
                    'contact'=> $this->input->post('contactno'),
                    'password'=> $this->input->post('password'),
                    'emp_type'=> $this->input->post('emp_type'),
                    'status'=> 1,
                  

                );
    $insertUserData = $this->Subadmin_model->addsubadmin_data($data);

  // $id = $this->db->insert_id();
    $id = $insertUserData;
   //$query = $this->db->get_where('admin', array('id' => $id));
   //$data['records'] = $query->row();
   //$idd = $data['records']->id;

     //$hm = $this->input->post('check_home');
     $cat  = $this->input->post('check_cat');
     $usr  = $this->input->post('check_user');
     $order  = $this->input->post('check_order');
    //  $ref  = $this->input->post('check_ref');
     $quizz  = $this->input->post('check_quiz');
      $advertise  = $this->input->post('check_advertise');
      $word  = $this->input->post('check_word');
      $page  = $this->input->post('check_page');
      $report  = $this->input->post('check_report');
      $packag  = $this->input->post('check_package');
      $subscrib  = $this->input->post('check_subscription');
     
       $ssdq = $this->db->query("insert into subadmin_contant(sbad_id,category,user,orderr,quiz,  advertisement,words,pages,packages) values('$id','$cat','$usr','$order','$quizz','$advertise','$word','$page','$packag')");
   
        if($insertUserData){
		
		$this->session->set_flashdata('success_msg', 'Subadmin have been added successfully.');	
		?>
	<script> window.location.assign('<?php echo base_url(); ?>Subadmin/select_subadmin_data'); </script>
		 <?php               
     }
     else
  	{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
    }
   ?><script> window.location.assign('<?php echo base_url(); ?>Subadmin');</script><?php
       
    }
  }
 

  /*
  public function select_subadmin_data() { 
            $config = array();
 
       $config["base_url"] = base_url() . "Subadmin/select_subadmin_data";
 
       $config["total_rows"] = $this->Subadmin_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
       $data["view"] = $this->Subadmin_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();

      $this->load->view('view_subadmin', $data);
        } */
        
 public function select_subadmin_data()                               
 {      $q = "SELECT * FROM `admin` as a join emp_type_tbl as b on  a.emp_type = b.emp_type_id ";
       $data["view"] = $this->db->query($q)->result();
     $this->load->view('view_subadmin', $data);
 }


  public function status(){ 
          $status = $_GET['status'];
          $id = $_GET['id'];
          $data = array('status'=> $status);
   $this->Subadmin_model->update_status($data,$id);
}

   public function delete() { 
         $this->load->model('Subadmin_model'); 
         $services_id = $this->uri->segment('3'); 
         $this->Subadmin_model->delete($services_id); 
   
         redirect('Subadmin/select_subadmin_data'); 
      } 

      public function update_rows(){ 
         $this->load->helper('form');
         $this->load->helper('url'); 
         $services_id = $this->uri->segment('3'); 
         $query = $this->db->get_where("admin",array("id"=>$services_id));
         $data['records'] = $query->result(); 
         $data['services_id'] = $services_id; 
         $data['cont'] = $this->Subadmin_model->select_subadmin_contant($services_id);
         
           $data['type_list'] = $this->cm->get_data('emp_type_tbl',[]);    
         
         $this->load->view('edit_subadmin',$data); 
      } 
      
      
   public function update_row()
    {
        $id = $this->input->post('uid');                           
        $data=array(
             'admin_name'=>$this->input->post('name'),
             'admin_email'=>$this->input->post('email'),
             'contact'=>$this->input->post('contactno'),
             'emp_type'=>$this->input->post('emp_type')
            
      );                      
        $sdbid = $this->input->post('uidd');
        $ddt = array(
          //'home' => $this->input->post('hm'),                     
          'category'=> $this->input->post('catt'),
          'user'=> $this->input->post('ussr'),
          'orderr'=> $this->input->post('ord'),
        //   'referral'=> $this->input->post('rfll'),
          'quiz'=> $this->input->post('qzz'),
          'advertisement'=> $this->input->post('abts'),
          'words'=> $this->input->post('wrd'),
          'pages'=> $this->input->post('pg'),
         
          'packages'=> $this->input->post('pkg'),
          
         );
        $this->load->model('Subadmin_model');
        $this->Subadmin_model->updata($id,$data);
        $this->Subadmin_model->update_data($ddt,$sdbid);
        //redirect($_SERVER['HTTP_REFERER']); 
	$this->session->set_flashdata('successn_msg', 'Subadmin have been updated successfully.');
         redirect('Subadmin/select_subadmin_data'); 
    }


}
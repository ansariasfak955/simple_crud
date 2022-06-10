<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Orders_model');
        $this->load->model('Common_model','cm');
          $this->load->library("pagination");
          
    }  

    /*
    public function select_all_order(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Orders/select_all_order";
 
       $config["total_rows"] = $this->Orders_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       $sdate = $this->input->post('sdate');
       $edate = $this->input->post('edate');
       //$user =  $this->input->post('usr');
      
 
       $data["view"] = $this->Orders_model->
 
           fetch_departments($config["per_page"], $page,$sdate,$edate);
 
       $data["links"] = $this->pagination->create_links();
    
      $this->load->view('view_orders', $data);
        } */
        
   public function select_all_order()
    {
        //  $usrid = $this->uri->segment(3); 
         $usrname = $this->input->post('usrname');
         $sdate = $this->input->post('sdate');
         $edate = $this->input->post('edate');
         $data["view"] = $this->Orders_model->select_all_data($sdate,$edate,$usrname);
      $this->load->view('view_orders', $data);
    }
 public function view_payments()
    {   $data = array(); 
             $usrname = $this->input->post('usrname');
         $sdate = $this->input->post('sdate');
         $edate = $this->input->post('edate');
         $data["view"] = $this->Orders_model->select_all_data($sdate,$edate,$usrname);
         
        
            $this->load->view('view_payments', $data);
    }

    public function select_order()
    {
         $ids = $this->uri->segment('3');
        $data['ordetail']  = $this->Orders_model->select_all_order_detail($ids);
       
        $sql="SELECT a.order_id , b.user_fname , b.user_lname , b.user_email , b.user_contact from dlc_orders as a JOIN 
              dlc_user as b on a.user_id=b.user_id WHERE a.order_id='$ids'";
        $result=$this->db->query($sql)->result_array();
        
        
        $sql12="SELECT a.order_id , a.pack_id , a.quantity , a.price , a.offer_price ,b.prod_name from dlc_order_detail as a JOIN 
              products as b on a.pack_id=b.prod_id WHERE a.order_id='$ids'";
        $result12=$this->db->query($sql12)->result();
        
        $data['user_order_list']=$result;
        $data['order_detail_list']=$result12;
       
        
       // echo"<pre>";print_r($result12);die();
        
        
        
        $this->load->view('view_order_alldetail',$data);
    }
    public function subscription_users()
       {
          $q = "SELECT a.* , b.user_fname,b.user_lname,b.user_contact ,c.prod_name,c.prod_image  FROM `dlc_order_detail`as a join dlc_user as b on a.user_id = b.user_id
                    LEFT join products as c on a.pack_id = c.prod_id order by a.order_detail_id DESC " ;
         
            $data['view'] = $this->db->query($q)->result();  
                    //   echo "<pre>"; print_r($res); die();   
                    
        $this->load->view('subscription_users',$data);
        
       }
       
       
       
       
       
   }     
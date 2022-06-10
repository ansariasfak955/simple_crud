<?php

class Employee extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->helper('url', 'form');
    }

    function userRegister(){
        $this->load->view('sregister');
    }
    function index(){
        $emp = $this->Employee_model->all();
        $data = array();
        $data['emp'] = $emp;
       //echo "<pre>";print_r($data['emp']);die();
        $this->load->view('showRecord',$data);
    }
    public function updatedata($id)
	{

        //print_r($_FILES['image']);die;
        //print_r($this->input->post());die;
        if($this->input->post('save') != NULL ){ 
            $data = array(); 
            if(!empty($_FILES['image']['name'])){ 
               // Set preference 
               $config['upload_path'] = 'uploads/'; 
               $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
               $config['max_size'] = '10000'; // max_size in kb 
               $config['file_name'] = $_FILES['image']['name']; 
      
               // Load upload library 
               $this->load->library('upload',$config); 
         
               // File upload
               if($this->upload->do_upload('image')){ 
                  // Get data about the file
                  $uploadData = $this->upload->data(); 
                  $filename = $uploadData['file_name']; 
                  $dataa['response'] = 'successfully uploaded '.$filename; 
                  $data['name']=$this->input->post('name');
                  $data['city']=$this->input->post('city');
                  $data['description']=$this->input->post('description');
                  $data['gender']=$this->input->post('option');
                  $data['item']=  implode(",",$this->input->post('chk'));
                  $data['image']=$filename;
                  $response=$this->Employee_model->updateUser($id,$data);
                  if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}       
               }else{ 
                  $dataa['response'] = 'failed'; 
               } 
            }else{ 
               $dataa['response'] = 'failed'; 
            } 
          
            redirect("Employee/");
			
        }
    }

    public function savedata()
	{

        //print_r($_FILES['image']);die;
        //print_r($this->input->post('save'));die;
        if($this->input->post('save') != NULL ){ 
            $data = array(); 
            if(!empty($_FILES['image']['name'])){ 
               // Set preference 
               $config['upload_path'] = 'uploads/'; 
               $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
               $config['max_size'] = '10000'; // max_size in kb 
               $config['file_name'] = $_FILES['image']['name']; 
      
               // Load upload library 
               $this->load->library('upload',$config); 
         
               // File upload
               if($this->upload->do_upload('image')){ 
                  // Get data about the file
                  $uploadData = $this->upload->data(); 
                  $filename = $uploadData['file_name']; 
                  $dataa['response'] = 'successfully uploaded '.$filename; 
                  $data['name']=$this->input->post('name');
                  $data['city']=$this->input->post('city');
                  $data['description']=$this->input->post('description');
                  $data['gender']=$this->input->post('option');
                  $data['item']=  implode(",",$this->input->post('chk'));
                  $data['image']=$filename;
                  $response=$this->Employee_model->saverecords($data);
                  if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}       
               }else{ 
                  $dataa['response'] = 'failed'; 
               } 
            }else{ 
               $dataa['response'] = 'failed'; 
            } 
          
            redirect("Employee/");
			
        }
    }

    function delete($userId){
          //$user = $this->Student_model->getUser($userId);
          $this->Employee_model->deleteEmployee($userId);
          redirect("Employee/");
      }

      function edit($userId){
        $employee = $this->Employee_model->getUser($userId);
        //print_r($employee);die;
        $data = array();
        $data['employee'] = $employee;
        $this->load->view('eupdate',$data);
      
    }
        
}


?>
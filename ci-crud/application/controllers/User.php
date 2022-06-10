<?php

class User extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    function create(){
        $this->load->view('create');
    }

    function index(){
        $users = $this->User_model->all();
        $data = array();
        $data['users'] = $users;
        //echo "<pre>";print_r($data['users']);die();
        $this->load->view('show',$data);
    }

    public function registerData()
    {

        //print_r($_FILES['image']);die;
        //print_r($this->input->post('save'));die;
        if($this->input->post('save') != NULL ){ 
            $formArray = array(); 
            $Image=['image1','image2'];
            foreach($Image as $i){
            if(!empty($_FILES[$i]['name'])){ 
               // Set preference 
               $config['upload_path'] = 'uploads/'; 
               $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
               $config['max_size'] = '10000'; // max_size in kb 
               $config['file_name'] = $_FILES[$i]['name']; 
      
               // Load upload library 
               $this->load->library('upload',$config); 
         
               // File upload
               if($this->upload->do_upload($i)){ 
                  // Get data about the file
                  $uploadData = $this->upload->data(); 
                  $filename = $uploadData['file_name']; 
                  $data['response'] = 'successfully uploaded '.$filename;
                  $file[]=$filename;
               }
            }
        } 
                      $formArray['name'] =  $this->input->post('name');
                      $formArray['email'] =  $this->input->post('email');
                      $formArray['contact'] =  $this->input->post('number');
                      $formArray['password'] =  $this->input->post('password');
                      $formArray['dob'] =  $this->input->post('dob');
                      $formArray['city'] =  $this->input->post('city');
                      $formArray['image'] =  $file[0];
                      $formArray['image1'] =  $file[1];
                      $formArray['gender'] =  $this->input->post('option');
                      $formArray['items'] = implode(",",$this->input->post('chk'));
                      $formArray['created_at'] = date('y-m-d h:i:s');
                      $this->User_model->create($formArray);
                      redirect("User/");
                  $response=$this->User_model->saverecords($formArray);
                  if($response==true){
			        echo "Records Saved Successfully";
			}else{
					echo "Insert error !";
			}       
               
            }else{ 
               $dataa['response'] = 'failed'; 
            } 
        

    }

    

     function delete($userId){
         //$user = $this->Student_model->getUser($userId);
         $this->User_model->deleteUser($userId);
         redirect("User/");
     }

     function edit($userId){
        $user = $this->User_model->getUser($userId);
        //print_r($user);die;
        $data = array();
        $data['user'] = $user;
        $this->load->view('updateUser',$data);
      
    }

    // function updateData($id){
    //   $formArray = array();
    //   $formArray['name'] =  $this->input->post('name');
    //   $formArray['email'] =  $this->input->post('email');
    //   $formArray['contact'] =  $this->input->post('number');
    //   $formArray['password'] =  $this->input->post('password');
    //   $formArray['dob'] =  $this->input->post('dob');
    //   $formArray['city'] =  $this->input->post('city');
    //   $formArray['gender'] =  $this->input->post('option');
    //   $formArray['items'] = implode(",",$this->input->post('chk'));
    //   $formArray['created_at'] = date('y-m-d h:i:s');
    //   $response=$this->User_model->updateUser($id,$formArray);
    //               if($response==true){
	// 		        echo "Records Saved Successfully";
	// 		}
	// 		else{
	// 				echo "Insert error !";
	// 		}
    //   //$this->User_model->create($formArray);
    //   redirect("User/");
    // }

    public function updateData($id)
    {

        //print_r($_FILES['image']);die;
        //print_r($this->input->post('save'));die;
        if($this->input->post('save') != NULL ){ 
            $formArray = array(); 
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
                  $data['response'] = 'successfully uploaded '.$filename; 
                      $formArray['name'] =  $this->input->post('name');
                      $formArray['email'] =  $this->input->post('email');
                      $formArray['contact'] =  $this->input->post('number');
                      $formArray['password'] =  $this->input->post('password');
                      $formArray['dob'] =  $this->input->post('dob');
                      $formArray['city'] =  $this->input->post('city');
                      $formArray['image'] =  $filename;
                      $formArray['gender'] =  $this->input->post('option');
                      $formArray['items'] = implode(",",$this->input->post('chk'));
                      $formArray['created_at'] = date('y-m-d h:i:s');
                  $response=$this->User_model->updateUser($id,$formArray);
                  if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}       
               }else{ 
                  $data['response'] = 'failed'; 
               } 
            }else{ 
               $data['response'] = 'failed'; 
            }
            redirect("User/"); 
        }

    }
    
}

?>
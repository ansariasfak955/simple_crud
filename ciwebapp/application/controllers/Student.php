<?php

class Student extends CI_Controller{
    public function __construct()
	{
		parent::__construct();
        $this->load->helper('url'); 
		$this->load->database();
        $this->load->library('form_validation');
        $this->load->library('session');
		$this->load->model('Student_model');
	}
	public function register()
	{
		$this->load->view('student');
	}
    public function savedata()
	{
        	$name=$this->input->post('name');
			$email=$this->input->post('email');
			$contact=$this->input->post('contact');
			$password=$this->input->post('password');
            // $id = $this->input->post(); 
            // echo "<pre>"; print_r($id); die(); 
			$res = $this->Student_model->saverecords($name,$email,$contact,$password);	
			if($res){
                $sendData = ['status'=>true,'msg' => 'data insert successfully','body'=>''];
                echo  json_encode($sendData);
            }else{
                $sendData = ['status'=>false,'msg' => 'data not insert','body'=>''];
                echo  json_encode($sendData);
            }
	}

    function updaterecords()
	{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$contact=$this->input->post('contact');
			$password=$this->input->post('password');
			$this->Student_model->updaterecords($id,$name,$email,$contact,$password);
			echo json_encode(array(
				"statusCode"=>200
			));
	}

    function deleterecords()
	{
		if($this->input->post('type')==2)
		{
			$id=$this->input->post('id');
			$this->Student_model->deleterecords($id);	
			echo json_encode(array(
				"statusCode"=>200
			));
		} 
	}

    public function viewajax()
	{
        $data=$this->Student_model->display_records();
        $i=1;
        //print_r($data);die;
        foreach($data as $row)
        {
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$row->name."</td>";
            echo "<td>".$row->email."</td>";
            echo "<td>".$row->contact."</td>";
            echo "<td><button type='button' class='btn btn-success' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#update_country'
			data-id=".$row->id."
			data-name=".$row->name."
			data-email=".$row->email."
			data-contact=".$row->contact."
			>Edit</button></td>";
            echo "<td><button type='button' class='btn btn-danger btn-sm delete' data-id='".$row->id."'>Delete</button></td>";
            echo "</tr>";
            $i++;
        }
	}
}

?>
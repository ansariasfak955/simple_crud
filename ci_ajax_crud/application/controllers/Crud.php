<?php
class Crud extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->database();
		$this->load->model('Crud_model');
	}
	public function register()
	{
		$this->load->view('student/register');
	}
    public function savedata()
	{
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$phone=$this->input->post('phone');
			$city=$this->input->post('city');
		    $res = $this->Crud_model->saverecords($name,$email,$phone,$city);
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
			$phone=$this->input->post('phone');
			$city=$this->input->post('city');
			$this->Crud_model->updaterecords($id,$name,$email,$phone,$city);
			echo json_encode(array(
				"statusCode"=>200
			));
	}

    function deleterecords()
	{
		if($this->input->post('type')==2)
		{
			$id=$this->input->post('id');
			$this->Crud_model->deleterecords($id);	
			echo json_encode(array(
				"statusCode"=>200
			));
		} 
	}

    public function viewajax()
	{
        $data=$this->Crud_model->display_records();
        $i=1;
        //print_r($data);die;
        foreach($data as $row)
        {
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$row->name."</td>";
            echo "<td>".$row->email."</td>";
            echo "<td>".$row->phone."</td>";
            echo "<td>".$row->city."</td>";
            echo "<td><button type='button' class='btn btn-success btn-sm update text-center' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#update_country'
			data-id=".$row->id."
			data-name=".$row->name."
			data-email=".$row->email."
			data-phone=".$row->phone."
			data-city=".$row->city."
			>Edit</button></td>";
            echo "<td><button type='button' class='btn btn-danger btn-sm delete' data-id='".$row->id."'>Delete</button></td>";
            echo "</tr>";
            $i++;
        }
	}
}
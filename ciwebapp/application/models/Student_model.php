<?php

class Student_model extends CI_Model{

    function saverecords($name,$email,$contact,$password)
	{
		$query="INSERT INTO `crud`( `name`, `email`, `contact`, `password`) 
		VALUES ('$name','$email','$contact','$password')";
		return $this->db->query($query);
	}

    function display_records()
	{
		$query=$this->db->query("select * from crud");
		return $query->result();
	}
    function updaterecords($id,$name,$email,$contact,$password)
	{
		$query="UPDATE `crud` 
		SET `name`='$name',
		`email`='$email',
		`contact`='$contact',
		`password`='$password' WHERE id=$id";
		$this->db->query($query);
	}
    function deleterecords($id)
	{
		$query="DELETE FROM `crud` WHERE id=$id";
		$this->db->query($query);
	}
}

?>
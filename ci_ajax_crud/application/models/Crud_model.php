<?php
class Crud_model extends CI_Model 
{
	function saverecords($name,$email,$phone,$city)
	{
		$query="INSERT INTO `register`( `name`, `email`, `phone`, `city`) 
		VALUES ('$name','$email','$phone','$city')";
	    return $this->db->query($query);
	}

    function display_records()
	{
		$query=$this->db->query("select * from register");
		return $query->result();
	}
    function updaterecords($id,$name,$email,$phone,$city)
	{
		$query="UPDATE `register` 
		SET `name`='$name',
		`email`='$email',
		`phone`='$phone',
		`city`='$city' WHERE id=$id";
		$this->db->query($query);
	}
    function deleterecords($id)
	{
		$query="DELETE FROM `register` WHERE id=$id";
		$this->db->query($query);
	}
}
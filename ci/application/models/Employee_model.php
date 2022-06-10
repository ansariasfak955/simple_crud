<?php

class Employee_model extends CI_Model{
    function sregister($formArray){
        $this->db->insert('emp',$formArray);
    }

     function all(){
         return $this->db->get('emp')->result_array();
     }
     function getUser($userId){
         $this->db->where('id',$userId);
         return $emp = $this->db->get('emp')->row_array(); //select * from users where user_id = ?
     
       }
       
    function saverecords($data)
	{
        $this->db->insert('emp',$data);
        return true ;
	}

    function updateUser($userId,$formArray){
        $this->db->where('id',$userId);
        $this->db->update('emp',$formArray); //update users set name = ?, email = ? where user_id =?
    }

    function deleteEmployee($userId){
        $this->db->where('id',$userId);
        $this->db->delete('emp');
    }
}

?>
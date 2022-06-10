<?php

class User_model extends CI_Model{
    function create($formArray){
        $this->db->insert('users',$formArray);
    }

    function all(){
        return $this->db->get('users')->result_array();  //SELECT * FROM users
    }
    function saverecords($formArray)
	{
        $this->db->insert('user',$formArray);
        return true ;
	}

    function getUser($userId){
        $this->db->where('id',$userId);
        return $user = $this->db->get('users')->row_array(); //select * from users where user_id = ?
    }

     function deleteUser($userId){
         $this->db->where('id',$userId);
         $this->db->delete('users');
     }

     function updateUser($userId,$formArray){
        $this->db->where('id',$userId);
        $this->db->update('users',$formArray); //update users set name = ?, email = ? where user_id =?
    }
}
?>
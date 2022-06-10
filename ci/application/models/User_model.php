<?php

class User_model extends CI_model{
    function create($formArray){
        $this->db->insert('users',$formArray);  //INSERT INTO users (name,email,created) VALUES (?,?,?);
    }

    function all(){
        return $this->db->get('users')->result_array();  //SELECT * FROM users
    }
    function getUser($userId){
        $this->db->where('user_id',$userId);
        return $user = $this->db->get('users')->row_array(); //select * from users where user_id = ?
    }
    function updateUser($userId,$formArray){
        $this->db->where('user_id',$userId);
        $this->db->update('users',$formArray); //update users set name = ?, email = ? where user_id =?
    }
    
    function deleteUser($userId){
        $this->db->where('user_id',$userId);
        $this->db->delete('users'); //DELETE FORM users where id = ?
    }
}

?>
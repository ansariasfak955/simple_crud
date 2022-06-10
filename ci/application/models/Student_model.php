<?php

class Student_model extends CI_Model{
    function register($formArray){
        $this->db->insert('students',$formArray);
    }
    function all(){
        return $this->db->get('students')->result_array();  //SELECT * FROM users
    }

    function getUser($userId){
        $this->db->where('id',$userId);
        return $student = $this->db->get('students')->row_array(); //select * from users where user_id = ?
    }

    function updateUser($userId,$formArray){
        $this->db->where('id',$userId);
        $this->db->update('students',$formArray); //update users set name = ?, email = ? where user_id =?
    }

    function deleteUser($userId){
        $this->db->where('id',$userId);
        $this->db->delete('students');
    }
}

?>
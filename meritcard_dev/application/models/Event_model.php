<?php

if(!defined('BASEPATH'))
        exit('No direct script access allowed');

        class Event_model extends CI_Model {
        
            function addEvent($data){
              return $this->db->insert("event",$data);
            }

            function all(){
               return $this->db->get('event')->result_array();
            }

            function getUser($id){
                $this->db->where('id',$id);
                return $event = $this->db->get('event')->row_array(); //select * from users where user_id = ?
            }
            
            function getStudent($id){
                $res = "select u.name, ev.event_id, ev.created_at from user_tbl as u join event_join_student as ev on u.user_id=ev.student_id where ev.event_id=".$id;
                //print_r($res);die;
                return $this->db->query($res)->result_array();
            }
            function deleteUser($id){
                $this->db->where('id',$id);
                $this->db->delete('event');
            }
            function event_update($id,$data){
                $this->db->where('id',$id);
                $this->db->update('event',$data);
            }

        }


?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Teacherdata extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function addnotes($data) {
        $this->db->query("INSERT INTO `teachdata`(`user_id`, `notes`) VALUES ('".$data['user_id']."', '".addslashes($data['notes'])."')");
    }

    public function viewnotes($userid) {
 if($userid==""){
            $condition="";
        }else{
            $condition= "AND `teachdata`.`user_id`='".$userid."'";
        }
        $user_query = $this->db->query("SELECT `users`.`f_name` as `teacherfname`, `users`.`l_name` as `teacherlname`, `users`.`image` as `userimage`, `teachdata`.* FROM `teachdata`, `users` WHERE  `teachdata`.`user_id`=`users`.`id` $condition");
        return $user_query->result();
    }

    public function countnotes($userid) {
        $user_query = $this->db->query("SELECT *, `teachdata`.`id` as `notes_id` FROM `teachdata`, `users` WHERE  `teachdata`.`user_id`=`users`.`id` AND `teachdata`.`user_id`='" . $userid . "'");
        return $user_query->num_rows();
    }

    public function singlenote($id) {

        $user_query = $this->db->query("SELECT `teachdata`.*, `users`.`image` as `userimage`,  `users`.`f_name` as `userfname`, `users`.`l_name` as `userlname` FROM `users`, `teachdata` WHERE `teachdata`.`id`='".$id."' AND `users`.`id`=`teachdata`.`user_id`");
        return $user_query->result();
    }

    public function updatenote($data) {

        $user_query = $this->db->query("UPDATE `teachdata` SET `notes`='".addslashes($data['notes'])."' WHERE `id`='" .$data['id']."'");
        return $user_query;
    }

    public function deletenote($id) {
        $user_query = $this->db->query("DELETE FROM `teachdata` WHERE `id`='".$id."'");
    }

}

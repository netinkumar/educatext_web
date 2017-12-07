<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Authordata extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function addquotes($data) {
        $data = $this->db->query("INSERT INTO `authorquotes`(`user_id`, `quotes`) VALUES ('" . $data['user_id'] . "', '" . addslashes($data['quotes']) . "')");
        return $data;
    }

    public function viewquotes($userid) {
        if($userid==""){
            $condition="";
        }else{
            $condition= "AND `authorquotes`.`user_id`='" . $userid . "'";
        }
        $user_query = $this->db->query("SELECT *, `authorquotes`.`id` as `quoteid` FROM `authorquotes`, `users` WHERE  `authorquotes`.`user_id`=`users`.`id` $condition");
        return $user_query->result();
    }

    public function countquotes($userid) {
        $user_query = $this->db->query("SELECT *, `authorquotes`.`id` as `quoteid` FROM `authorquotes`, `users` WHERE  `authorquotes`.`user_id`=`users`.`id` AND `authorquotes`.`user_id`='" . $userid . "'");
        return $user_query->num_rows();
    }

    public function singlequote($id) {

        $user_query = $this->db->query("SELECT `authorquotes`.*, `users`.`image` as `userimage`,  `users`.`f_name` as `userfname`, `users`.`l_name` as `userlname` FROM `users`, `authorquotes` WHERE `authorquotes`.`id`='" . $id . "' AND `users`.`id`=`authorquotes`.`user_id`");
        return $user_query->result();
    }

    public function updatequote($data) {

        $user_query = $this->db->query("UPDATE `authorquotes` SET `quotes`='" . addslashes($data['quotes']) . "' WHERE `id`='" . $data['id'] . "'");
        return $user_query;
    }

    public function deletequote($id) {

        $user_query = $this->db->query("DELETE FROM `authorquotes` WHERE `id`='" . $id . "'");
    }

    public function dailyquote() {
        $query = $this->db->query("SELECT `todayquotes`.*, `users`.`f_name` as `authorfname`, `users`.`l_name` as `authorlname`, `authorquotes`.`quotes` as `todayquote` FROM `todayquotes`, `users`, `authorquotes` WHERE `todayquotes`.`authorquotes_id`=`authorquotes`.`id` AND `authorquotes`.`user_id`=`users`.`id` ORDER BY `todayquotes`.`id` DESC");
        return $query->result();
    }

    public function getallquotes() {
        $query = $this->db->query("SELECT `authorquotes`.*, `users`.`f_name`, `users`.`l_name` FROM `authorquotes`, `users` WHERE `users`.`id`=`authorquotes`.`user_id`");
        return $query->result();
    }

    public function addtodaysquote($data) {

        $query = $this->db->query("INSERT INTO `todayquotes`(`authorquotes_id`, `publish_date`) VALUES ('" . $data['authorquotes_id'] . "', '" . $data['publish_date'] . "')");
        return $query;
    }

    public function gettodayquote() {
        $query = $this->db->query("SELECT `todayquotes`.*, `users`.`f_name` as `authorfname`, `users`.`l_name` as `authorlname`, `authorquotes`.`quotes` as `todayquote` FROM `todayquotes`, `users`, `authorquotes` WHERE `todayquotes`.`authorquotes_id`=`authorquotes`.`id` AND `authorquotes`.`user_id`=`users`.`id` ORDER BY `todayquotes`.`id` DESC LIMIT 1");
        return $query->result();
    }
    
    public function getauthorlist(){
        $query=$this->db->query("SELECT * FROM `users` WHERE `role`='author'");
        return $query->result();
    }
    public function getauthorqoutes($authorid){
        
        $authordata=$this->db->query("SELECT * FROM `authorquotes` WHERE `user_id`='".$authorid."'");
        return $authordata->result();
        
    }

}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Users extends CI_Model {
public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
         public function usersave($data)
        {
             $checkexisting=$this->db->query("SELECT * FROM `users` WHERE `email`='".$data['email']."' || `username`='".$data['username']."' LIMIT 1");
            $result= $checkexisting->result();
          
            if(!empty($result)){
                if($result[0]->email==$data['email']){
                    $error['msg']="email already exist";
                    $error['status']="false";
                }else if($result[0]->username==$data['username']){
                    $error['msg']="username already exist";
                    $error['status']="false";
                }
                return $error;
             }else{
                 $user_query=$this->db->query("INSERT INTO `users`(`f_name`, `l_name`, `username`, `email`, `password`) VALUES ('".$data['f_name']."','".$data['l_name']."','".$data['username']."','".$data['email']."','".$data['password']."')");
                //$query = $this->db->get('entries', 10);
             $user_id['id'] =  $this->db->insert_id();
             $user_id['status'] = 'true';
                return $user_id;
            }
            
        }
        
       public function userlogin($data)
        {
             $user_query=$this->db->query("SELECT * FROM `users` WHERE `email`='".$data['email']."' && `password`='".$data['password']."' LIMIT 1");
                //$query = $this->db->get('entries', 10);
            // $user_id =  $this->db->insert_id();
             $userdata=$user_query->result();
                return $userdata;
        } 
        
        
 }
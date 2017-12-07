<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Users extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function usersave($data) {
        $checkexisting = $this->db->query("SELECT * FROM `users` WHERE `email`='" . $data['email'] . "' || `username`='" . $data['username'] . "' LIMIT 1");
        $result = $checkexisting->result();

        if (!empty($result)) {
            if ($result[0]->email == $data['email']) {
                $error['msg'] = "email already exists";
                $error['status'] = "false";
            }else if($result[0]->username == $data['username']){
                $error['msg'] = "username already exists";
                $error['status'] = "false";
            }
            return $error;
        } else {
            $user_query = $this->db->query("INSERT INTO `users`(`f_name`, `l_name`, `username`, `email`, `password`) VALUES ('" . $data['f_name'] . "','" . $data['l_name'] . "','" . $data['username'] . "','" . $data['email'] . "','" . $data['password'] . "')");
            //$query = $this->db->get('entries', 10);
            $user_id['id'] = $this->db->insert_id();
            $user_id['status'] = 'true';
            return $user_id;
        }
    }

    public function userlogin($data) {
        $user_query = $this->db->query("SELECT * FROM `users` WHERE `email`='" . $data['email'] . "' && `password`='" . $data['password'] . "' LIMIT 1");
        //$query = $this->db->get('entries', 10);
        // $user_id =  $this->db->insert_id();
        $userdata = $user_query->result();
        return $userdata;
    }

    public function usercount() {
        $this->db->where('role !=', 'admin');
        $this->db->from('users');
        $user_query = $this->db->count_all_results();

        return $user_query;
    }

    public function fetch_data() {
        $checkexisting = $this->db->query("SELECT * FROM `users` WHERE `role`!='admin'");
        $result = $checkexisting->result();


        if ($checkexisting->num_rows() > 0) {
            foreach ($result as $row) {
                $data[] = $row;
            }

            return $data;
        }
        return false;
    }

    public function deleteuser($id) {
        $user_query = $this->db->query("DELETE FROM `users` WHERE `id`='" . $id . "'");
        return $user_query;
    }

    public function getuser($id) {
        $user_query = $this->db->query("SELECT * FROM `users` WHERE `id`='" . $id . "'");
        //$query = $this->db->get('entries', 10);
        // $user_id =  $this->db->insert_id();
        $userdata = $user_query->result();
        return $userdata;
    }

    public function savewebuser($data) {
        $checkexisting = $this->db->query("SELECT * FROM `users` WHERE `email`='" . $data['email'] . "' || `username`='" . $data['username'] . "' LIMIT 1");
        $result = $checkexisting->result();

        if (!empty($result)) {
            if ($result[0]->email == $data['email']) {
                $error['msg'] = "email already exist";
                $error['status'] = "false";
            } else if ($result[0]->username == $data['username']) {
                $error['msg'] = "username already exist";
                $error['status'] = "false";
            }
            return $error;
        } else {
            $user_query = $this->db->query("INSERT INTO `users`(`f_name`, `l_name`, `role`, `image`, `username`, `email`, `phone`, `password`) VALUES ('" . $data['f_name'] . "','" . $data['l_name'] . "','" . $data['role'] . "','" . $data['image'] . "','" . $data['username'] . "','" . $data['email'] . "','" . $data['phone'] . "','" . $data['password'] . "')");
            //$query = $this->db->get('entries', 10);
            $user_id['id'] = $this->db->insert_id();
            $user_id['msg'] = "User Saved Successfully";
            $user_id['status'] = 'true';
            return $user_id;
        }
    }

    public function updateuser($data) {
        $user_query = $this->db->query("UPDATE `users` SET `f_name`='" . $data['f_name'] . "',`l_name`='" . $data['l_name'] . "',`role`='" . $data['role'] . "',`image`='" . $data['image'] . "',`username`='" . $data['username'] . "',`email`='" . $data['email'] . "',`phone`='" . $data['phone'] . "' WHERE `id`='" . $data['id'] . "'");
        return $user_query;
    }

    public function updateimage($data) {
        $upimage = $this->db->query("UPDATE `users` SET `image`='" . $data['image'] . "' WHERE `id`='" . $data['id'] . "'");
        return $upimage;
    }

    public function getaboutpage() {
        $aboutpage = $this->db->query("SELECT * FROM `custompages` WHERE `id`=1");
        return $aboutpage->result();
    }

    public function newteacherreq() {
        $newreq = $this->db->query("SELECT u1.id as student_id, u1.f_name as student_fname,  u1.l_name as student_lname, u2.id as teacher_id, u2.f_name as teacher_fname, u2.l_name as teacher_lname, st.status as status, st.created as created, st.id as id FROM student_teacher st LEFT JOIN users u1 ON st.student_id = u1.id LEFT JOIN users u2 ON st.teacher_id = u2.id WHERE st.status=0");
        return $newreq->result();
    }

    public function approveteacher($id) {
        $updatestatus = $this->db->query("UPDATE `student_teacher` SET `status`=1 WHERE `id`='" . $id . "'");
        return $updatestatus;
    }

    public function discardteacher($id) {
        $discardteacher = $this->db->query("UPDATE `student_teacher` SET `status`=2 WHERE `id`='" . $id . "'");
        return $discardteacher;
    }

    public function alteacherreq() {
        $newreq = $this->db->query("SELECT u1.id as student_id, u1.f_name as student_fname,  u1.l_name as student_lname, u2.id as teacher_id, u2.f_name as teacher_fname, u2.l_name as teacher_lname, st.status as status, st.created as created, st.id as id FROM student_teacher st LEFT JOIN users u1 ON st.student_id = u1.id LEFT JOIN users u2 ON st.teacher_id = u2.id");
        return $newreq->result();
    }

    public function getteacherslist($stu_id) {
        $query = $this->db->query("SELECT * FROM `student_teacher` WHERE `student_id`='" . $stu_id . "'");
        $result = $query->result();
        if (!empty($result)) {
            $query = $this->db->query("SELECT *,(SELECT GROUP_CONCAT(student_id)FROM `student_teacher` WHERE `teacher_id` = users.id and student_teacher.student_id='".$stu_id."') as allstudent, (SELECT status FROM `student_teacher` WHERE `teacher_id` = users.id and student_teacher.student_id='".$stu_id."') as status  FROM `users` WHERE `role` LIKE 'teacher'");

            $output = $query->result();
            foreach ($output as &$d) {
                if ($d->status == NULL) {
                    $d->status = "0";
                }else if($d->status=="0"){
                   $d->status = "3"; 
                }
            }
        } else {
            $query = $this->db->query("SELECT * FROM `users` WHERE `role`='teacher'");
            $output = $query->result();

            foreach ($output as &$d) {
                $d->status = "0";
                $d->teacher_id = $d->id;
            }
        }

        return $output;
    }
    
    public function teacherreq($data){
      $savereq=  $this->db->query("INSERT INTO `student_teacher`(`student_id`, `teacher_id`, `status`) VALUES ('".$data['student_id']."','".$data['teacher_id']."','0')");
      return $savereq;
      }
      
      public function unfollowteacher($data){
          $unfollow=$this->db->query("DELETE FROM `student_teacher` WHERE `student_id`='".$data['student_id']."' AND `teacher_id`='".$data['teacher_id']."'");
          return $unfollow;
      }
      
      public function teachalert($data){
          $alerts=$this->db->query("SELECT `teachdata`.* FROM teachdata LEFT JOIN student_teacher ON teachdata.user_id=student_teacher.teacher_id WHERE student_teacher.student_id='".$data['student_id']."'");
          return $alerts->result();
         }
         
          public function updateappuser($data){
              $update=$this->db->query("UPDATE `users` SET `f_name`='".$data['f_name']."',`l_name`='".$data['l_name']."' WHERE id='".$data['id']."'");
              return $update;
          }
}

<?php

class Ebook extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function addcat($data) {
        $val = $this->db->query("INSERT INTO `ebookcat`(`name`) VALUES ('" . $data['name'] . "')");
        return $val;
    }

    public function allecat() {
        $cat = $this->db->query("SELECT * FROM `ebookcat`");
        return $cat->result();
    }

    public function delcat($id) {

        $delcat = $this->db->query("DELETE FROM `ebookcat` WHERE `id`='" . $id . "'");
        return $delcat;
    }

    public function saveebook($data) {
        $savedata = $this->db->query("INSERT INTO `ebooks`(`author_name`, `cat_id`, `name`, `saved_name`, `edition`) VALUES ('" . $data['author_name'] . "','" . $data['cat_id'] . "','" . $data['name'] . "','" . $data['saved_name'] . "','" . $data['edition'] . "')");
        return $savedata;
    }
      public function editebook($data) {
        $updatedata = $this->db->query("UPDATE `ebooks` SET `author_name`='".$data['author_name']."',`cat_id`='".$data['cat_id']."',`name`='".$data['name']."',`saved_name`='".$data['saved_name']."',`edition`='".$data['edition']."' WHERE `id`='".$data['bookid']."'");
        return $updatedata;
    }
    
    
    
    
    
    public function getebook($catid){
        $catbook=$this->db->query("SELECT `ebooks`.*, `ebookcat`.`name` as `catname` FROM `ebooks`,`ebookcat` WHERE `cat_id`='".$catid."' AND `ebooks`.`cat_id`=`ebookcat`.`id`");
        return $catbook->result();
    }
    public function getsinglebook($bookid){
        $book=$this->db->query("SELECT * FROM `ebooks` WHERE `id`='".$bookid."'");
        return $book->result();
    }
    public function savenotefile($data){
        $savedata=$this->db->query("INSERT INTO `studentnotes`(`student_id`, `file_name`, `actual_name`, `notes`) VALUES ('".$data['student_id']."','".$data['file_name']."','".$data['actual_name']."','".$data['notes']."')");
        return $savedata;
    }
    public function savetextnote($data){
        $savedata=$this->db->query("INSERT INTO `studentnotes`(`student_id`, `file_name`, `actual_name`, `notes`) VALUES ('".$data['student_id']."','".$data['file_name']."','".$data['actual_name']."','".addslashes($data['notes'])."')");
        return $savedata;
    }
     public function getstunotes($data){
        $savedata=$this->db->query("SELECT * FROM `studentnotes` WHERE `student_id`='".$data['student_id']."'");
        return $savedata->result();
    }
    public function delbook($bookid){
        $deletebook= $this->db->query("DELETE FROM `ebooks` WHERE `id`='".$bookid."'");
        return $deletebook;
        
    } 
    public function view_ebook($id){
        $bookdetail=$this->db->query("SELECT * FROM `ebooks` WHERE `id`='".$id."'");
        return $bookdetail->result();
    }
    
    

}

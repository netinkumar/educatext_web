<?php



/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */



class Catageorymodel extends CI_Model {



    public function __construct() {

        parent::__construct();

        // Your own constructor code

    }



    public function savecatageory($data) {

        $inserdata = $this->db->query("INSERT INTO `catageory`(`name`, `description`, `image`) VALUES ('" . $data['name'] . "','" . $data['description'] . "','" . $data['image'] . "')");

        return $inserdata;

    }



    public function countcategory() {



        $this->db->from('catageory');

        $user_query = $this->db->count_all_results();



        return $user_query;

    }



    public function viewcatageories($limit, $id) {



//        if($limit !=null && $id !=null){

//            $limitdata='LIMIT'." ".$id.','.$limit;

//        }else{

//            $limitdata="";

//        }

        if (isset($limit)) {

            $limitdata = 'LIMIT' . " " . $id . ',' . $limit;

        } else {

            $limitdata = null;

        }

        $checkexisting = $this->db->query("SELECT * FROM `catageory` $limitdata");

        // SELECT * FROM `catageory` LIMIT $id, $limit

        // SELECT * FROM `catageory` $limitdata

        $result = $checkexisting->result();

        return $result;

    }



    public function singlecat($id) {

        $user_query = $this->db->query("SELECT * FROM `catageory` WHERE `id`='" . $id . "'");

        return $user_query->result();

    }



    public function updatecat($data) {

        $update_query = $this->db->query("UPDATE `catageory` SET `name`='" . $data['name'] . "',`description`='" . addslashes($data['description']) . "',`image`='" . $data['image'] . "' WHERE `id`='" . $data['id'] . "'");

        return $update_query;

    }



    public function deletecatageory($id) {



        $delete_query = $this->db->query("DELETE FROM `catageory` WHERE `id`='" . $id . "'");

        return $delete_query;

    }



    public function addclas($data) {

        $add_class = $this->db->query("INSERT INTO `catageorydata`(`catageory_id`, `classes`) VALUES ('" . $data['catageory_id'] . "', '" . $data['classes'] . "')");

        return $add_class;

    }



    public function getclasses($catid) {

        $add_class = $this->db->query("SELECT `catageorydata`.`id` as `classid`, `catageorydata`.`classes` as `classname`,`catageory`.`name` as `catname`, `catageory`.`image` as `catageoryimage`,`catageory`.`description` as `catageorydescription`, `catageory`.`id` as `catageoryid` FROM `catageorydata`, `catageory` WHERE `catageorydata`.`catageory_id`=`catageory`.`id` AND `catageorydata`.`catageory_id`='" . $catid . "'");

        return $add_class->result();

    }



    public function deleteclas($classid) {

        $delete_query = $this->db->query("DELETE FROM `catageorydata` WHERE `id`='" . $classid . "'");

        return $delete_query;

    }



    public function deletesub($subid) {



        $delete_query = $this->db->query("DELETE FROM `subjects` WHERE `id`='" . $subid . "'");

        return $delete_query;

    }



    public function getsubjects($id) {

        $add_class = $this->db->query("SELECT `subjects`.`id` as `subjectid`, `subjects`.`subjects` as `subjectname`, `catageory`.`name` as `catageoryname`,`catageory`.`id` as `catageoryid`, `catageory`.`description` as `catdescription`, `catageorydata`.`id` as `classid`, `catageorydata`.`classes` as `classname` FROM `subjects`, `catageory`,`catageorydata` WHERE `subjects`.`catageorydata_id`=`catageorydata`.`id` AND `catageorydata`.`catageory_id`=`catageory`.`id` AND `subjects`.`catageory_id`='" . $id['catid'] . "' AND `subjects`.`catageorydata_id`='" . $id['classid'] . "'");

        return $add_class->result();

    }



    public function addsubject($data) {

        $add_subject = $this->db->query("INSERT INTO `subjects`(`catageory_id`, `catageorydata_id`, `subjects`) VALUES ('" . $data['catageory_id'] . "','" . $data['catageorydata_id'] . "','" . $data['subjects'] . "')");

        return $add_subject;

    }



    public function getqa($id) {

        $add_qa = $this->db->query("SELECT `questions`.`id` as `questionid`, `questions`.`question` as `question`,`questions`.`catageorydata_id` as `classid`, `questions`.`answer` as `answer`, `subjects`.`id` as `subjectid`, `subjects`.`subjects` as `subjectname` FROM `questions`, `subjects` WHERE `subjects`.`id`=`questions`.`subject_id` AND `questions`.`subject_id`='" . $id['subid'] . "'");

        return $add_qa->result();

    }



    public function addqa($data) {

        $add_qa = $this->db->query("INSERT INTO `questions`(`catageorydata_id`, `subject_id`, `question`, `answer`) VALUES ('" . $data['catageorydata_id'] . "', '" . $data['subject_id'] . "','" . $data['question'] . "','" . $data['answer'] . "')");

        return $add_qa;

    }



    public function deleteqa($id) {



        $delete_query = $this->db->query("DELETE FROM `questions` WHERE `id`='" . $id . "'");

        return $delete_query;

    }



    public function getsingleqa($id) {

        $data = $this->db->query("SELECT * FROM `questions` WHERE `id`='" . $id . "'");

        return $data->result();

    }



    public function updateqa($data) {

        $updatedata = $this->db->query("UPDATE `questions` SET `question`='" . addslashes($data['question']) . "',`answer`='" . addslashes($data['answer']) . "' WHERE `id`='" . $data['id'] . "' ");

        return $updatedata;

    }



    public function saveaudio($data) {

        $savedata = $this->db->query("INSERT INTO `audio`(`user_id`, `name`) VALUES ('" . $data['user_id'] . "','" . $data['name'] . "')");

        return $savedata;

    }



    public function getaudio($data) {

        $audios = $this->db->query("SELECT * FROM `audio` WHERE `user_id`='" . $data['user_id'] . "'");

        return $audios->result();

    }



    public function deleteaudioo($id) {

        $delete = $this->db->query("DELETE FROM `audio` WHERE `id`='" . $id . "'");

        return $delete;

    }



    public function savepdf($data) {

        $savedata = $this->db->query("INSERT INTO `pdf`(`user_id`, `name`) VALUES ('" . $data['user_id'] . "','" . $data['name'] . "')");

        return $savedata;

    }



    public function getpdf($data) {

        $audios = $this->db->query("SELECT * FROM `pdf` WHERE `user_id`='" . $data['user_id'] . "'");

        return $audios->result();

    }



    public function deletepdff($id) {

        $delete = $this->db->query("DELETE FROM `pdf` WHERE `id`='" . $id . "'");

        return $delete;

    }



    public function getaudioo() {

        $audios = $this->db->query("SELECT * FROM `audio`");

        return $audios->result();

    }

   public function savevideo($data){


// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die("debug..");
$insert_video=$this->db->query("INSERT INTO `videos`(`user_id`, `youtube_url`, `video_id`, `category_id`, `title`) VALUES ('".$data->uid."','".$data->posturl."','".$data->video_id."','".$data->cat_id."','".$data->title."')");

   } 

    

   public function getvideos($data){

       $select_video=$this->db->query("SELECT * FROM `videos` WHERE `user_id`='".$data."'");

       return $select_video->result();

   }
   public function get_searched_videos($data){


        if($data)
       $select_video=$this->db->query("SELECT * FROM `videos` WHERE `title` LIKE '%".$data."%' OR `description` LIKE '%".$data."%'");
        else
        $select_video=$this->db->query("SELECT * FROM `videos` ");
       return $select_video->result();
   }
   public function getcategories(){

       $get_categories=$this->db->query("SELECT * FROM `video_categories`");
       return $get_categories->result();

   }

   public function teachalert_cat(){
       
       $catageory= $this->db->query("SELECT * FROM `teachalert_catagory`");
       return $catageory->result();
   }
   
   
   public function deletecat($id){
       $delete = $this->db->query("DELETE FROM `teachalert_catagory` WHERE `id`='".$id."'");
     return $delete;
   }
   
   public function addcat($data){
    $addcat= $this->db->query("INSERT INTO `teachalert_catagory`(`name`) VALUES ('". $data['name'] ."')");
    return $addcat;
   }


}


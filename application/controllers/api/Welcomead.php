<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Welcomead extends REST_Controller {

    public function __construct() {
        parent::__construct();

        // Your own constructor code
        $this->load->model('users');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        //$this->load->view('api/welcome_message');
        echo "ff";
        exit;
    }

    public function usersave_post() {
        $redata = $this->post();
        $id = json_decode($redata[0]);
        $userdata = [];
        $userdata['f_name'] = $id->firstname;
        $userdata['l_name'] = $id->lastname;
        $userdata['username'] = $id->username;
        $userdata['email'] = $id->email;
        $userdata['password'] = md5($id->password);

        $data = $this->users->usersave($userdata);
        if (!empty($data)) {
            if ($data['status'] == "false") {
                $response['user_id'] = $data;
                $response['msg'] = "false";
            } else {
                $response['user_id'] = $data;
                $response['msg'] = "true"; //$this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        } else {
            $response['user_id'] = $data;
            $response['msg'] = "false";
        }


        echo json_encode($response);
        exit;
    }

    public function userlogin_post() {
        $redata = $this->post();
        $id = json_decode($redata[0]);
        $userdata = [];

        $userdata['email'] = $id->email;
        $userdata['password'] = md5($id->password);
        $this->load->model('users');
        $data = $this->users->userlogin($userdata);
        if (!empty($data)) {
            $response['user_data'] = $data;
            $response['msg'] = "true"; //$this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $response['user_data'] = $data;
            $response['msg'] = "false";
        }


        echo json_encode($response);
        exit;
    }

    public function userprofile_post() {
        $data = json_decode($this->input->raw_input_stream);
        $id = $data->userid;
        $userdata['userdata'] = $this->users->getuser($id);
        $userdata['imgburl'] = base_url() . "assets/user/images/";
        echo json_encode($userdata);
        exit;
    }

    public function updateimg_post() {
        $data = json_decode($this->input->raw_input_stream);
        $myval = array();
        $val['id'] = $data->id;
        $val['img'] = $data->image;
        $img = base64_decode($val['img']);
        $im = imagecreatefromstring($img);
        if ($im !== false) {
            $val['image'] = time() . ".png";
            $filepath = $_SERVER['DOCUMENT_ROOT'] . "/xamarine/assets/user/images/" . $val['image'];
            imagepng($im, $filepath);
            imagedestroy($im);
            $updateimg = $this->users->updateimage($val);
            if ($updateimg) {
                $myval['msg'] = "uploaded successfully";
                $myval['status'] = 1;
            } else {
                $myval['msg'] = "Not uploaded successfully";
                $myval['status'] = 0;
            }
        }
        echo json_encode($myval);
        exit;
    }

    public function getabout_get() {
        $about['about'] = $this->users->getaboutpage();
        echo json_encode($about);
        exit;
    }
   
    public function getteacherlist_post(){
        $val = json_decode($this->input->raw_input_stream);
      $studentid=$val->student_id;
    
       $data['alllist']=$this->users->getteacherslist($studentid);
        echo json_encode($data);
        exit;
    }
    public function followteacher_post(){
        $postdata=json_decode($this->input->raw_input_stream);
       $data['student_id']=$postdata->s_id;
       $data['teacher_id']=$postdata->t_id;
       $save=$this->users->teacherreq($data);
        $result['alllist']=$this->users->getteacherslist($data['student_id']);
        echo json_encode($result);
        exit;
    }
      public function unfollowteacher_post(){
        $postdata=json_decode($this->input->raw_input_stream);
       $data['student_id']=$postdata->s_id;
       $data['teacher_id']=$postdata->t_id;
       $save=$this->users->unfollowteacher($data);
        $result['alllist']=$this->users->getteacherslist($data['student_id']);
        echo json_encode($result);
        exit;
    }
    public function teachalerts_post(){
        $postdata=json_decode($this->input->raw_input_stream);
        $studentid['student_id']=$postdata->student_id;
        $result['alerts']=$this->users->teachalert($studentid);
     echo json_encode($result);
        exit;
    }
    public function updateprofile_post(){
        
    $postdata=json_decode($this->input->raw_input_stream);
    $data['f_name']=$postdata->userinfo->fname;
    $data['l_name']=$postdata->userinfo->lname;
    $data['id']=$postdata->userinfo->user_id;
      $update=$this->users->updateappuser($data);  
    $userdata['userdata'] = $this->users->getuser($data['id']);
     $userdata['imgburl'] = base_url() . "assets/user/images/";
     echo json_encode($userdata);
    }

}

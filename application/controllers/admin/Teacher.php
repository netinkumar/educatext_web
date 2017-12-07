<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        // load user model
        $this->load->model('users');
        $this->load->model('teacherdata');
        // Your own constructor code
        $this->load->helper('form');
        $this->load->model('catageorymodel');

// Load form validation library
        $this->load->library('form_validation');

// Load session library
        $this->load->library('session');
        if (!isset($_SESSION['userdata'])) {
            redirect('admin');
        }

// Load pagination library
        $this->load->library('pagination');
    }

    public function addnotes() {

        $this->load->view("admin/teacher/addteach");
    }

    public function savenotes() {

        $qutosdata = [];
        $qutosdata['user_id'] = $this->input->post('teacherid');
        $qutosdata['notes'] = $this->input->post('authorquotes');
        $quotes = $this->teacherdata->addnotes($qutosdata);
        redirect('admin/teacher/viewnotes');
    }

    public function editquote($id = NULL) {

        $data['notes'] = $this->teacherdata->singlenote($id);

        $this->load->view('admin/teacher/editteach', $data);
    }

    public function updatenotes() {

        $quotedata['id'] = $this->input->post('noteid');
        $quotedata['notes'] = $this->input->post('teachernotes');
        $quotedata['user_id'] = $this->input->post('userid');
        $update = $this->teacherdata->updatenote($quotedata);
        //     $allquotes['allnotes']=$this->teacherdata->viewnotes($quotedata['user_id']);


        if ($update) {
            setcookie('update_sucess_msg', "Note Updated Successfully", time() + 6, "/");
        } else {
            setcookie('update_error_msg', "Note Not Updated", time() + 6, "/");
        }



        redirect('admin/teacher/viewnotes');
        //$this->load->view("admin/teacher/viewteach", $allquotes);
        //exit;
    }

    public function viewnotes() {
//          
//$config = array();
//$config["base_url"] = base_url() . "admin/teacher/viewnotes";
//$total_row = $this->teacherdata->countnotes(11);
//$config["total_rows"] = $total_row;
//$config["per_page"] = 3;
//$config['use_page_numbers'] = TRUE;
//$config['num_links'] = $total_row;
//$config['cur_tag_open'] = '&nbsp;<a class="current">';
//$config['cur_tag_close'] = '</a>';
//$config['next_link'] = 'Next';
//$config['prev_link'] = 'Previous';
//       $this->pagination->initialize($config);
//if($this->uri->segment(4)){
//$page = ($this->uri->segment(4)) ;
//}
//else{
//$page = 1;
//}
//$page=($page-1)*$config["per_page"];
        if ($_SESSION['userdata'][0]->role == "admin") {
            $uid = "";
        } else {
            $uid = $_SESSION['userdata'][0]->id;
        }

        $allquotes['allnotes'] = $this->teacherdata->viewnotes($uid);
//$str_links = $this->pagination->create_links();
//$allquotes["links"] = explode('&nbsp;',$str_links );

        $this->load->view("admin/teacher/viewteach", $allquotes);
    }

    public function deletenotes($id = NULL) {
        $this->teacherdata->deletenote($id);

        redirect('admin/teacher/viewnotes');
    }

    public function viewsinglenote($id = null) {
        $result['notedata'] = $this->teacherdata->singlenote($id);
        $this->load->view("admin/teacher/viewsinglenote", $result);
    }
    
    public function teachcatageories(){
         $teachcatageories['catageories']= $this->catageorymodel->teachalert_cat();  
         $this->load->view("admin/teacher/teachcatageory", $teachcatageories);
    }
    public function delet_cat($id=null){
        $this->catageorymodel->deletecat($id);
        redirect('admin/teacher/teachcatageories');
     
    }
    public function savecat(){
        $data['name']=$this->input->post('teachercategoryname1');
   $save=  $this->catageorymodel->addcat($data);
   if($save){
            $custommsg['success_msg'] = "User Updated Successfully";
            $custommsg["true"] = 1;
            setcookie('update_sucess_msg', "E-book Category saved Successfully", time() + 6, "/");
        } else {
            $custommsg['error_msg'] = "User Not Updated";
            $custommsg["true"] = 0;
            setcookie('update_error_msg', "E-book Category not Saved", time() + 6, "/");
        }
       echo json_encode($custommsg);

        exit;
  //    exit;
    }
    
}

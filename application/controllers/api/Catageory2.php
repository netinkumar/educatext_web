<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Catageory extends REST_Controller {

    public function __construct() {
        parent::__construct();
// load user model
        $this->load->model('users');
        $this->load->model('catageorymodel');
// Your own constructor code
        $this->load->helper('form');

// Load form validation library
        $this->load->library('form_validation');

// Load session library
        $this->load->library('session');
        $this->load->helper('cookie');

// Load pagination library
        $this->load->library('pagination');
    }

    public function index() {
        
    }

    public function getcatageory_post(){
       $data= json_decode($this->input->raw_input_stream);
        $total=$this->catageorymodel->countcategory();
        $perpage=3;
        $a=$total/$perpage;
        $totalpages =ceil($a);
        $current_page=$data->page;
        $page = ($current_page - 1) *$perpage;
        $alldata['perpage']=$perpage;
        $alldata['page']=$page;
        $alldata['result'] = $this->catageorymodel->viewcatageories($perpage, $page);
        $alldata['totalPages']=$totalpages;
        $alldata['imagebaseurl']= base_url()."assets/catageory/images/";
       echo json_encode($alldata);
       exit;
    }
    public function getgrade_post(){
        $data= json_decode($this->input->raw_input_stream);
        $id=$data->catid;
        $result['classes'] = $this->catageorymodel->getclasses($id);
        $result['imagebaseurl']= base_url()."assets/catageory/images/";
       echo json_encode($result);
       exit;
    }
    public function getsub_post(){
        $data= json_decode($this->input->raw_input_stream);
        $subjectdata['classid']=$data->classid;
        $subjectdata['catid']=$data->catid;
        $result['subjects']=$this->catageorymodel->getsubjects($subjectdata);
          echo json_encode($result);
        exit;
    }
   public function getqa_post(){
         $data= json_decode($this->input->raw_input_stream);
         $subjectid['subid']=$data->sub_id;
         $getqa['sharelink']=  base_url().'categoryctrl/sharedqa/';
         $getqa['allqa']=$this->catageorymodel->getqa($subjectid);
         
       echo json_encode($getqa);
        exit;
   } 
   public function getaudios_get(){
       $audio['baseurl']=base_url(). 'assets/user/audio/';
       $audio['audio']=  $this->catageorymodel->getaudioo();
       echo json_encode($audio);
       exit;
   }
    
   public function getteahalertcat_post(){
    
    $teachcatageories= $this->catageorymodel->teachalert_cat;   
    echo json_encode($teachcatageories);
    exit;
        
    }
    
    
    
    

}

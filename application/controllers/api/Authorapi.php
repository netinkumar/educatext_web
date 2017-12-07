<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Authorapi extends REST_Controller {
      public function __construct() {
        parent::__construct();
// load user model
        $this->load->model('users');
        $this->load->model('catageorymodel');
        $this->load->model('authordata');
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
    
    
   public function todaysquote_get(){
    $todayQuote=$this->authordata->gettodayquote();
    echo json_encode($todayQuote);
    exit;
   } 
   
   public function getauthorlist_post(){
       $authors['authors']=$this->authordata->getauthorlist();
       echo json_encode($authors);
       exit;
    }
   
   public function getauthorquotes_post(){
      $data= json_decode($this->input->raw_input_stream);
      $author_id=$data->author_id;
      $result['quotes']=$this->authordata->getauthorqoutes($author_id);
      
       echo json_encode($result);
       exit;
       
   } 
    
    
    
    
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staticpagec extends Admin_Controller {
public function __construct()
        {
                parent::__construct();
                // load user model
                 $this->load->model('users');
                 $this->load->model('staticpage');
                // Your own constructor code
                $this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');
 if(!isset($_SESSION['userdata'])){
         redirect('admin');
        }

// Load pagination library
$this->load->library('pagination');
        }
        
        
        public function addpages(){
 
     $this->load->view("admin/staticpage/addpage");
     
     
 }   
  public function savepages(){
 
     $qutosdata=[];
     $qutosdata['name']=$this->input->post('name1');
     $qutosdata['pagecontent']=$this->input->post('pagecontent');
     $quotes=$this->staticpage->addpage($qutosdata);
     
     $allquotes['allnotes']=$this->staticpage->viewpage();
     
     $this->load->view("admin/staticpage/viewpage", $allquotes);
  } 
  
    public function editpages($id=NULL){
      
        $data['notes']=$this->staticpage->singlepage($id);
        
       $this->load->view('admin/staticpage/editpage',$data);


   } 
   public function updatepages(){
       
      $quotedata['id']=$this->input->post('pageid');
      $quotedata['notes']=$this->input->post('teachernotes');
      $quotedata['user_id']=$this->input->post('userid');
       $this->staticpage->updatepage($quotedata);
       $allquotes['allnotes']=$this->staticpage->viewpage();
     
     $this->load->view("admin/staticpage/viewpage", $allquotes);
       //exit;
   }
      public function viewpages(){
           $allquotes['allnotes']=$this->staticpage->viewpage();
     
     $this->load->view("admin/staticpage/viewpage", $allquotes);
      }  
      
      public function deletepage($id=NULL){
           $this->staticpage->deletepage($id);
         
           redirect('admin/staticpagec/viewpages');
      }
  
  
  
  
        
      
}
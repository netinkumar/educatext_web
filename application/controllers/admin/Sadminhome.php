<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sadminhome extends Admin_Controller {
public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');
  if(!isset($_SESSION['userdata'])){
         redirect('admin');
        }
        }
       public function index()
	{       
		
                $this->load->view('admin/sadminhome');
	}    
        
        
        
        
        
}
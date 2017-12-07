<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
// load user model
        $this->load->model('users');
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

    public function getcatageory() {
       echo "nitin";
       exit;
    }

}

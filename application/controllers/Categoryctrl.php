<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoryctrl extends CI_Controller {

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
// Load pagination library
$this->load->library('pagination');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
        public function sharedqa($id){
            $qa['question']=$this->catageorymodel->getsingleqa($id);
            $this->load->view('sharedqa', $qa);
            
        }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcomead extends Admin_Controller {
public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');
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
                
		$this->load->view('admin/welcome_message');
	}
        
       public function adminlogin()
               {
   $userdata['email']= $this->input->post('adminmail');
   $userdata['password']= md5($this->input->post('adminpassword'));
   $this->load->model('users');
   $data=$this->users->userlogin($userdata);
 if (!empty($data))
        {
              $response['user_data']= $data;
              $response['msg']= "true";//$this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
             redirect('admin/sadminhome');
        }
        else
        {
           $response['user_data']= $data;
           $response['error']="Incorrect Username or Password";
              $response['msg']= "false";
         $this->load->view('admin/welcome_message', $response);
           // redirect('welcome_message');
        }
      } 
        
        
}

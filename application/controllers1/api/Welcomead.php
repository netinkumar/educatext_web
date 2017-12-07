<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Welcomead extends REST_Controller {
public function __construct()
        {
                parent::__construct();
                // Your own constructor code
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
		//$this->load->view('api/welcome_message');
		echo "ff";
		exit;
	}
	
	public function usersave_post()
    {
        $redata=$this->post();
$id=  json_decode($redata[0]);
$userdata=[];
$userdata['f_name']=$id->firstname;
$userdata['l_name']=$id->lastname;
$userdata['username']=$id->username;
$userdata['email']=$id->email;
$userdata['password']=md5($id->password);
$this->load->model('users');
 $data=$this->users->usersave($userdata);
   if (!empty($data))
        {
      if($data['status']=="false"){
           $response['user_id']= $data;
              $response['msg']= "false";
       }else{
            $response['user_id']= $data;
              $response['msg']= "true";//$this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
       }
       }
        else
        {
           $response['user_id']= $data;
              $response['msg']= "false";
        }
 
 
echo json_encode($response);
exit;

    }
    
  public function userlogin_post()
    {
        $redata=$this->post();
$id=  json_decode($redata[0]);
$userdata=[];

$userdata['email']=$id->email;
$userdata['password']=md5($id->password);
$this->load->model('users');
 $data=$this->users->userlogin($userdata);
   if (!empty($data))
        {
              $response['user_data']= $data;
              $response['msg']= "true";//$this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
           $response['user_data']= $data;
              $response['msg']= "false";
        }
 
 
echo json_encode($response);
exit;

    }  
    
    
    
}

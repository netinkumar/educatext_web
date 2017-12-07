<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Userlists extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        // load user model
        $this->load->model('users');
        // Your own constructor code
        $this->load->helper('form');

// Load form validation library
        $this->load->library('form_validation');

// Load session library

        $this->load->helper('cookie');

// Load pagination library
        $this->load->library('pagination');
        $this->load->library('session');
        if (!isset($_SESSION['userdata'])) {
            redirect('admin');
        }
    }

    public function index() {
//               
//		
//$config = array();
//$config["base_url"] = base_url() . "admin/userlists/index";
//$total_row = $this->users->usercount();
//$config["total_rows"] = $total_row;
//$config["per_page"] = 2;
//$config['use_page_numbers'] = TRUE;
//$config['num_links'] = $total_row;
//$config['cur_tag_open'] = '&nbsp;<a class="current">';
//$config['cur_tag_close'] = '</a>';
//$config['next_link'] = 'Next';
//$config['prev_link'] = 'Previous';
//
//$this->pagination->initialize($config);
//if($this->uri->segment(4)){
//$page = ($this->uri->segment(4)) ;
//}
//else{
//$page = 1;
//}
//$page=($page-1)*$config["per_page"];
        $data["results"] = $this->users->fetch_data();
//$str_links = $this->pagination->create_links();
//$data["links"] = explode('&nbsp;',$str_links );
        $this->load->view('admin/userlists', $data);
    }

    public function deleteuser($id = NULL) {
        $deluser = $this->users->deleteuser($id);
        redirect('admin/userlists');
    }

    public function edituser($id = NULL) {
        $data['userdata'] = $this->users->getuser($id);
        $this->load->view('admin/edituser', $data);
    }

    public function userform() {
        $this->load->view('admin/adduser');
    }

    public function saveuser() {

        $this->form_validation->set_rules('firstname1', 'First Name', 'required|alpha', array('required' => "First Name is required", 'alpha' => 'Letters Only'));

        $this->form_validation->set_rules('phonenumber1', 'Phone Number', 'required', array('required' => "Phone Number is required"));
        $this->form_validation->set_rules('email1', 'Email ', 'required|valid_email', array('required' => "Email is required", 'valid_email' => 'Email is Wrong'));
//        $this->form_validation->set_rules('username1','Username ','required',
//               array('required'=>"Username is required"));
        $this->form_validation->set_rules('password1', 'Password', 'required', array('required' => "Password is required"));

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/adduser');
        } else {
            $userdata = [];
            if (!empty($_FILES['image1']['name'])) {
                $target_dir = 'assets/user/images/';
                $filename = basename(time() . $_FILES["image1"]["name"]);
                $target_file = $target_dir . $filename;
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) {
                    $userdata['f_name'] = $this->input->post('firstname1');
                    $userdata['l_name'] = $this->input->post('lastname1');
                    $userdata['role'] = $this->input->post('role1');
                    $userdata['phone'] = $this->input->post('phonenumber1');
                    $userdata['image'] = $filename;
                    $userdata['username'] = $userdata['f_name'] . $userdata['l_name'];
                    $userdata['password'] = md5($this->input->post('password1'));
                    $userdata['email'] = $this->input->post('email1');
                    $savedata = $this->users->savewebuser($userdata);
                    //echo "The file ". basename($_FILES["image1"]["name"]). " has been uploaded.";
                    if ($savedata) {
                        $custommsg['success_msg'] = "User Updated Successfully";
                        setcookie('update_sucess_msg', "User Added Successfully", time() + 6, "/");
                    } else {
                        $custommsg['error_msg'] = "User Not Updated";
                        setcookie('update_error_msg', "User Not Added", time() + 6, "/");
                    }

                    redirect('admin/userlists');
                } else {
                    echo "Sorry, there was an error uploading your file. User Not Saved";
                }
            } else {

                $userdata['f_name'] = $this->input->post('firstname1');
                $userdata['l_name'] = $this->input->post('lastname1');
                $userdata['role'] = $this->input->post('role1');
                $userdata['phone'] = $this->input->post('phonenumber1');
                $userdata['image'] = "noimage.jpg";
                $userdata['username'] = $userdata['f_name'] . $userdata['l_name'];
                $userdata['password'] = md5($this->input->post('password1'));
                $userdata['email'] = $this->input->post('email1');
                $savedata = $this->users->savewebuser($userdata);
                if ($savedata) {
                    $custommsg['success_msg'] = "User Updated Successfully";
                    setcookie('update_sucess_msg', "User Added Successfully", time() + 6, "/");
                } else {
                    $custommsg['error_msg'] = "User Not Updated";
                    setcookie('update_error_msg', "User Not Added", time() + 6, "/");
                }

                redirect('admin/userlists');
            }
        }
    }

    public function updateuser() {
        $userdata = [];
        if (!empty($_FILES['image1']['name'])) {
            $target_dir = 'assets/user/images/';
            $filename = basename(time() . $_FILES["image1"]["name"]);
            $target_file = $target_dir . $filename;
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) {
                $userdata['f_name'] = $this->input->post('firstname1');
                $userdata['l_name'] = $this->input->post('lastname1');
                $userdata['role'] = $this->input->post('role1');
                $userdata['phone'] = $this->input->post('phonenumber1');
                $userdata['image'] = $filename;
                $userdata['username'] = $this->input->post('username1');
                if (!empty($this->input->post('password1'))) {
                    $userdata['password'] = md5($this->input->post('password1'));
                } else {
                    $userdata['password'] = $this->input->post('password2');
                }
                $userdata['email'] = $this->input->post('email1');
                $userdata['id'] = $this->input->post('userid1');
                $updateuser = $this->users->updateuser($userdata);
                if ($updateuser) {
                    $custommsg['success_msg'] = "User Updated Successfully";
                    setcookie('update_sucess_msg', "User Updated Successfully", time() + 6, "/");
                } else {
                    $custommsg['error_msg'] = "User Not Updated";
                    setcookie('update_error_msg', "User Not Updated", time() + 6, "/");
                }

                redirect('admin/userlists');
                //redirect('admin/userlists/edituser/'. $userdata['id']);
            } else {
                echo "Sorry, there was an error uploading your file. User Not Saved";
            }
        } else {

            $userdata['f_name'] = $this->input->post('firstname1');
            $userdata['l_name'] = $this->input->post('lastname1');
            $userdata['role'] = $this->input->post('role1');
            $userdata['phone'] = $this->input->post('phonenumber1');
            $userdata['image'] = $this->input->post('savedimage1');
            $userdata['username'] = $this->input->post('username1');
            if (!empty($this->input->post('password1'))) {
                $userdata['password'] = md5($this->input->post('password1'));
            } else {
                $userdata['password'] = $this->input->post('password2');
            }
            $userdata['email'] = $this->input->post('email1');
            $userdata['id'] = $this->input->post('userid1');
            $updateuser = $this->users->updateuser($userdata);
            // $savedata= $this->users->savewebuser($userdata);

            if ($updateuser) {
                $custommsg['success_msg'] = "User Updated Successfully";
                setcookie('update_sucess_msg', "User Updated Successfully", time() + 6, "/");
            } else {
                $custommsg['error_msg'] = "User Not Updated";
                setcookie('update_error_msg', "User Not Updated", time() + 6, "/");
            }

            redirect('admin/userlists');
            // $this->load->view('admin/userlists',$custommsg);
            //  redirect('admin/userlists'. $userdata['id']);
        }
    }

    public function viewuser($userid) {
        $userdata['user'] = $this->users->getuser($userid);
        $this->load->view('admin/viewuser', $userdata);
    }

    public function newteacherreq(){


        $data['newreq'] = $this->users->newteacherreq();
        $this->load->view('admin/newteacherreq', $data);
    }
    
    public function approveteacher($reqid){
        
        $update=$this->users->approveteacher($reqid);
        if($update){
         $custommsg['success_msg'] = "User Updated Successfully";
                setcookie('update_sucess_msg', "Student Added Successfully", time() + 6, "/");
            } else {
                $custommsg['error_msg'] = "User Not Updated";
                setcookie('update_error_msg', "Student Not Added", time() + 6, "/");
            }
            redirect('admin/userlists/newteacherreq');
   }
   
   public function discardteacher($reqid){
         $update=$this->users->discardteacher($reqid);
        if($update){
         $custommsg['success_msg'] = "User Updated Successfully";
                setcookie('update_sucess_msg', "Student Added Successfully", time() + 6, "/");
            } else {
                $custommsg['error_msg'] = "User Not Updated";
                setcookie('update_error_msg', "Student Not Added", time() + 6, "/");
            }
               redirect('admin/userlists/newteacherreq');
   }
   
   
  public function allteacherreq(){
        $data['allreq'] = $this->users->alteacherreq();
        $this->load->view('admin/allteacherreq', $data);
   }
}

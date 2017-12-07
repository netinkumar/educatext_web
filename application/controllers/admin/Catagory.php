<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catagory extends Admin_Controller {

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
        if (!isset($_SESSION['userdata'])) {
            redirect('admin');
        }
    }

    public function addcatagory() {
        $this->load->view("admin/catagory/addcatagory");
    }

    public function savecatageory() {
        $catdata = [];
        if (!empty($_FILES['catimage1']['name'])) {
            $target_dir = 'assets/catageory/images/';
            $filename = basename(time() . $_FILES["catimage1"]["name"]);
            $target_file = $target_dir . $filename;
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES["catimage1"]["tmp_name"], $target_file)) {
                $catdata['name'] = $this->input->post('catageoryname1');
                $catdata['description'] = $this->input->post('catageorydescription1');
                $catdata['image'] = $filename;
                $savedata = $this->catageorymodel->savecatageory($catdata);
                if ($savedata) {
                    $custommsg['success_msg'] = "User Updated Successfully";
                    setcookie('update_sucess_msg', "Catageory Added Successfully", time() + 6, "/");
                } else {
                    $custommsg['error_msg'] = "User Not Updated";
                    setcookie('update_error_msg', "Catageory Not Added", time() + 6, "/");
                }
                redirect('admin/catagory/viewcats');
            }
        } else {
            $catdata['name'] = $this->input->post('catageoryname1');
            $catdata['description'] = $this->input->post('catageorydescription1');
            $catdata['image'] = "noimage.png";

            $savedata = $this->catageorymodel->savecatageory($catdata);
            if ($savedata) {
                $custommsg['success_msg'] = "User Updated Successfully";
                setcookie('update_sucess_msg', "Catageory Added Successfully", time() + 6, "/");
            } else {
                $custommsg['error_msg'] = "User Not Updated";
                setcookie('update_error_msg', "Catageory Not Added", time() + 6, "/");
            }

            redirect('admin/catagory/viewcats');
        }
    }

    public function viewcats() {

//        $config = array();
//        $config["base_url"] = base_url() . "admin/catagory/viewcats";
//        $total_row = $this->catageorymodel->countcategory();
//        $config["total_rows"] = $total_row;
//        $config["per_page"] = 3;
//        $config['use_page_numbers'] = TRUE;
//        $config['num_links'] = $total_row;
//        $config['cur_tag_open'] = '&nbsp;<a class="current">';
//        $config['cur_tag_close'] = '</a>';
//        $config['next_link'] = 'Next';
//        $config['prev_link'] = 'Previous';
//        $this->pagination->initialize($config);
//        if ($this->uri->segment(4)) {
//            $page = ($this->uri->segment(4));
//        } else {
//            $page = 1;
//        }
//        $page = ($page - 1) * $config["per_page"];
        $config["per_page"] = null;
        $page = null;
        $alldata['allnotes'] = $this->catageorymodel->viewcatageories($config["per_page"], $page);
//        $str_links = $this->pagination->create_links();
//        $alldata["links"] = explode('&nbsp;', $str_links);
        $this->load->view("admin/catagory/listcatageory", $alldata);

        //  $this->load->view("admin/teacher/viewteach", $allquotes);
    }

    public function editcatageory($id = NULL) {

        $data['cat'] = $this->catageorymodel->singlecat($id);

        $this->load->view('admin/catagory/editcatageory', $data);
    }

    public function updatecatageory() {
        $catdata = [];
        if (!empty($_FILES['catimage1']['name'])) {
            $target_dir = 'assets/catageory/images/';
            $filename = basename(time() . $_FILES["catimage1"]["name"]);
            $target_file = $target_dir . $filename;
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if (move_uploaded_file($_FILES["catimage1"]["tmp_name"], $target_file)) {
                $catdata['name'] = $this->input->post('catageoryname1');
                $catdata['description'] = $this->input->post('catageorydescription1');
                $catdata['image'] = $filename;
                $catdata['id'] = $this->input->post('catageoryid1');
                $updatecatdata = $this->catageorymodel->updatecat($catdata);
                if ($updatecatdata) {
                    $custommsg['success_msg'] = "User Updated Successfully";
                    setcookie('update_sucess_msg', "Data Updated Successfully", time() + 6, "/");
                } else {
                    $custommsg['error_msg'] = "User Not Updated";
                    setcookie('update_error_msg', "Data Not Updated", time() + 6, "/");
                }

                redirect('admin/catagory/viewcats');
                //redirect('admin/userlists/edituser/'. $userdata['id']);
            } else {
                echo "Sorry, there was an error uploading your file. User Not Saved";
            }
        } else {

            $catdata['name'] = $this->input->post('catageoryname1');
            $catdata['description'] = $this->input->post('catageorydescription1');
            $catdata['image'] = $this->input->post('savedimage1');
            $catdata['id'] = $this->input->post('catageoryid1');
            $updatecatdata = $this->catageorymodel->updatecat($catdata);
            // $savedata= $this->users->savewebuser($userdata);

            if ($updatecatdata) {
                $custommsg['success_msg'] = "User Updated Successfully";
                setcookie('update_sucess_msg', "User Updated Successfully", time() + 6, "/");
            } else {
                $custommsg['error_msg'] = "User Not Updated";
                setcookie('update_error_msg', "User Not Updated", time() + 6, "/");
            }

            redirect('admin/catagory/viewcats');
            // $this->load->view('admin/userlists',$custommsg);
            //  redirect('admin/userlists'. $userdata['id']);
        }
    }

    public function deletequote($id = NULL) {
        $delete = $this->catageorymodel->deletecatageory($id);
        if ($delete) {
            $custommsg['success_msg'] = "User Updated Successfully";
            setcookie('update_sucess_msg', "Catageory Deleted Successfully", time() + 6, "/");
        } else {
            $custommsg['error_msg'] = "User Not Updated";
            setcookie('update_error_msg', "Catageory Not Deleted", time() + 6, "/");
        }

        redirect('admin/catagory/viewcats');
    }

    public function viewclasses($id = NULL) {
        // echo $id;

        $data['catid'] = $id;
        $data['classes'] = $this->catageorymodel->getclasses($id);
        $this->load->view('admin/catagory/viewclasses', $data);
    }

    public function addclass() {

        //  echo json_encode($this->input->post('classname1'));
        $savedata = [];
        $savedata['catageory_id'] = $this->input->post('catid1');
        $savedata['classes'] = $this->input->post('classname1');
        $saveclass = $this->catageorymodel->addclas($savedata);
        $custommsg = [];
        if ($saveclass) {
            $custommsg['success_msg'] = "User Updated Successfully";
            $custommsg["true"] = 1;
            setcookie('update_sucess_msg', "Class saved Successfully", time() + 6, "/");
        } else {
            $custommsg['error_msg'] = "User Not Updated";
            $custommsg["true"] = 0;
            setcookie('update_error_msg', "Class not Saved", time() + 6, "/");
        }

        echo json_encode($custommsg);

        exit;
    }

    public function deleteclass($catid = null, $classid = null) {
        $deleteclas = $this->catageorymodel->deleteclas($classid);
        redirect('admin/catagory/viewclasses/' . $catid);
    }

    public function deletesubject($catid = null, $classid = null, $subjectid = null) {
        $deletesubject = $this->catageorymodel->deletesub($subjectid);
        redirect('admin/catagory/viewsubjects/' . $catid . "/" . $classid);
    }

    public function viewsubjects($catid = null, $classid = null) {
        $data['catid'] = $classid;
        $id['catid'] = $catid;
        $id['classid'] = $classid;
        $id['subjects'] = $this->catageorymodel->getsubjects($id);
        $this->load->view('admin/catagory/viewsubject', $id);
    }

    public function addsubject() {
        $savedata = [];
        $savedata['catageory_id'] = $this->input->post('catid1');
        $savedata['catageorydata_id'] = $this->input->post('classid');
        $savedata['subjects'] = $this->input->post('subjectname1');
        $savesubject = $this->catageorymodel->addsubject($savedata);
        $custommsg = [];
        if ($savesubject) {
            $custommsg['success_msg'] = "User Updated Successfully";
            $custommsg["true"] = 1;
            setcookie('update_sucess_msg', "Subject saved Successfully", time() + 6, "/");
        } else {
            $custommsg['error_msg'] = "User Not Updated";
            $custommsg["true"] = 0;
            setcookie('update_error_msg', "Subject not Saved", time() + 6, "/");
        }

        echo json_encode($custommsg);

        exit;
    }

    public function viewqa($classid = null, $subid = null) {
        $id['subid'] = $subid;
        $id['classid'] = $classid;
        $id['qa'] = $this->catageorymodel->getqa($id);
        $this->load->view('admin/catagory/viewqa', $id);
    }

    public function addqa() {
        $savedata['catageorydata_id'] = $this->input->post('classid1');
        $savedata['subject_id'] = $this->input->post('subid1');
        $savedata['question'] = $this->input->post('quesname1');
        $savedata['answer'] = $this->input->post('ansname1');
        $saveqa = $this->catageorymodel->addqa($savedata);
        $custommsg = [];
        if ($saveqa) {
            $custommsg['success_msg'] = "User Updated Successfully";
            $custommsg["true"] = 1;
            setcookie('update_sucess_msg', "QA saved Successfully", time() + 6, "/");
        } else {
            $custommsg['error_msg'] = "User Not Updated";
            $custommsg["true"] = 0;
            setcookie('update_error_msg', "QA not Saved", time() + 6, "/");
        }
        echo json_encode($custommsg);
        exit;
    }

    public function deleteqa($classid = null, $subjectid = null, $questionid = null) {
        $deletesubject = $this->catageorymodel->deleteqa($questionid);
        redirect('admin/catagory/viewqa/' . $classid . "/" . $subjectid);
    }

    public function editqa($qid) {
        $data['cat'] = $this->catageorymodel->getsingleqa($qid);
        $this->load->view('admin/catagory/editqa', $data);
    }

    public function updateqa() {
        $updata['id'] = $this->input->post("qaid1");
        $updata['question'] = $this->input->post("quesname1");
        $updata['answer'] = $this->input->post("ansname1");
        $classid = $this->input->post("classid1");
        $subjectid = $this->input->post("subject1");

        $update = $this->catageorymodel->updateqa($updata);
        if ($update) {
            $custommsg['success_msg'] = "User Updated Successfully";
            setcookie('update_sucess_msg', "Data Updated Successfully", time() + 6, "/");
        } else {
            $custommsg['error_msg'] = "User Not Updated";
            setcookie('update_error_msg', "Data Not Updated", time() + 6, "/");
        }
        redirect('admin/catagory/viewqa/' . $classid . "/" . $subjectid);
    }

    public function viewmp3() {
        $data['user_id'] = $_SESSION['userdata'][0]->id;
        $audios['audio'] = $this->catageorymodel->getaudio($data);
        $this->load->view('admin/catagory/viewmp3', $audios);
    }

    public function addaudio() {
        $this->load->view('admin/catagory/addaudio');
    }

    public function addmp3() {

        $userdata = [];
        if (!empty($_FILES['audio1']['name'])) {
            $target_dir = 'assets/user/audio/';
            $filename = basename(time() . $_FILES["audio1"]["name"]);
            $target_file = $target_dir . $filename;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            if ($imageFileType != "mp3") {
                setcookie('update_error_msg', "File is not mp3", time() + 6, "/");
                redirect('admin/catagory/viewmp3');
            } else {
                if (move_uploaded_file($_FILES["audio1"]["tmp_name"], $target_file)) {
                    $insertdata['name'] = $filename;
                    $insertdata['user_id'] = $_SESSION['userdata'][0]->id;
                    $addaudio = $this->catageorymodel->saveaudio($insertdata);
                    if ($addaudio) {

                        $custommsg['success_msg'] = "User Updated Successfully";
                        setcookie('update_sucess_msg', "File Saved Successfully", time() + 6, "/");
                    } else {
                        $custommsg['error_msg'] = "User Not Updated";
                        setcookie('update_error_msg', "File Not Saved", time() + 6, "/");
                    }
                    redirect('admin/catagory/viewmp3');
                }
            }
        }
    }

    public function deleteaudio($id = null) {
        $deletefile = $this->catageorymodel->deleteaudioo($id);
        if ($deletefile) {

            $custommsg['success_msg'] = "User Updated Successfully";
            setcookie('update_sucess_msg', "File Removed Successfully", time() + 6, "/");
        } else {
            $custommsg['error_msg'] = "User Not Updated";
            setcookie('update_error_msg', "File Not Removed", time() + 6, "/");
        }

        redirect('admin/catagory/viewmp3');
    }

    public function viewpdf() {
        $data['user_id'] = $_SESSION['userdata'][0]->id;
        $pdfs['pdf'] = $this->catageorymodel->getpdf($data);
        $this->load->view('admin/catagory/viewpdf', $pdfs);
    }

    public function addpdf() {
        $this->load->view('admin/catagory/addpdf');
    }

    public function addpdffile() {

        $userdata = [];
        if (!empty($_FILES['pdf1']['name'])) {
            $target_dir = 'assets/user/pdf/';
            $filename = basename(time() . $_FILES["pdf1"]["name"]);
            $target_file = $target_dir . $filename;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if ($imageFileType != "pdf") {
                setcookie('update_error_msg', "File is not pdf", time() + 6, "/");
                redirect('admin/catagory/viewpdf');
            } else {
                if (move_uploaded_file($_FILES["pdf1"]["tmp_name"], $target_file)) {
                    $insertdata['name'] = $filename;
                    $insertdata['user_id'] = $_SESSION['userdata'][0]->id;
                    $savepdf = $this->catageorymodel->savepdf($insertdata);
                    if ($savepdf) {
                        $custommsg['success_msg'] = "User Updated Successfully";
                        setcookie('update_sucess_msg', "File Saved Successfully", time() + 6, "/");
                    } else {
                        $custommsg['error_msg'] = "User Not Updated";
                        setcookie('update_error_msg', "File Not Saved", time() + 6, "/");
                    }
                    redirect('admin/catagory/viewpdf');
                }
            }
        }
    }

    public function deletepdf($id = null) {
        $deletefile = $this->catageorymodel->deletepdff($id);
        if ($deletefile) {

            $custommsg['success_msg'] = "User Updated Successfully";
            setcookie('update_sucess_msg', "File Removed Successfully", time() + 6, "/");
        } else {
            $custommsg['error_msg'] = "User Not Updated";
            setcookie('update_error_msg', "File Not Removed", time() + 6, "/");
        }

        redirect('admin/catagory/viewpdf');
    }

    public function uploadcsv() {
        
        if($_FILES){
    $ok = true;
    $file = $_FILES['csv1']['tmp_name'];
    $handle = fopen($file, "r");
    if ($file == NULL) {
     echo 'Please select a file to import';
     }else{
        while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
            
            $data['name']=$filesop[0];
            $data['description']=$filesop[1];
            $data['image']=$filesop[2];
            $savedata = $this->catageorymodel->savecatageory($data);
           }
        
    }
        }
     redirect('admin/catagory/viewcats');
    }

}

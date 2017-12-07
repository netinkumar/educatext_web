<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Ebookapi extends REST_Controller {

    public function __construct() {
        parent::__construct();
// load user model
        $this->load->model('users');
        $this->load->model('ebook');
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

    public function getebookcat_post() {
        $data['ebookcat'] = $this->ebook->allecat();
        echo json_encode($data);
        //  $data= json_decode($this->input->raw_input_stream);
    }

    public function getebook_post() {

        $data = json_decode($this->input->raw_input_stream);
        $catid = $data->cat_id;
        $catdata['ebooks'] = $this->ebook->getebook($catid);
        $catdata['pdfb_url'] = base_url() . 'assets/ebooks/books/';
        echo json_encode($catdata);
        exit;
    }

    public function getsinglebook_post() {

        $data = json_decode($this->input->raw_input_stream);
        $bookid = $data->book_id;
        $book['pdfb_url'] = base_url() . 'assets/ebooks/books/';
        $book['book'] = $this->ebook->getsinglebook($bookid);
        echo json_encode($book);
        exit;
    }

    public function notesupload_post() {

        if (!empty($_FILES['fileUpload']['name'])) {
            $target_dir = 'assets/user/studentnotes/';
            $filename = basename(time() . $_FILES["fileUpload"]["name"]);
            $target_file = $target_dir . $filename;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                $data['student_id'] = $_POST['student_id'];
                $data['file_name'] = $filename;
                $data['actual_name'] = $_FILES['fileUpload']['name'];
                $data['notes'] = "";
                $saven_file = $this->ebook->savenotefile($data);
                if ($saven_file) {
                    echo "success";
                } else {
                    echo "error";
                }
            }
        }
    }

    public function textnotes_post() {
        $data = json_decode($this->input->raw_input_stream);
        $val['student_id'] = $data->stu_id;
        $val['file_name'] = "";
        $val['actual_name'] = "";
        $val['notes'] = $data->note;
        $saven_file = $this->ebook->savetextnote($val);
        if ($saven_file) {
            echo "success";
        } else {
            echo "error";
        }
        exit;
    }
    
    public function getstunotes_post(){
        $data= json_decode($this->input->raw_input_stream);
        $val['student_id'] = $data->stu_id;
        $saven_file['docbase_url']=  base_url().'assets/user/studentnotes/';
        $saven_file['docs'] = $this->ebook->getstunotes($val); 
        echo json_encode($saven_file);
        exit;
    }

}

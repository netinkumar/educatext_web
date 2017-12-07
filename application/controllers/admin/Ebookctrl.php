<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ebookctrl extends Admin_Controller {
public function __construct()
        {
                parent::__construct();
                // load user model
                 $this->load->model('users');
                 $this->load->model('teacherdata');
                 $this->load->model('ebook');
                // Your own constructor code
                $this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load pagination library
$this->load->library('pagination');
 if(!isset($_SESSION['userdata'])){
         redirect('admin');
        }
        }
 public function viewcatageory(){
     
     $data['allcat']=$this->ebook->allecat();
     
     $this->load->view('admin/ebook/viewcatageory', $data);
  }
 
  public function savecategory(){
   $data['name']=$this->input->post('categoryname1');
   $save=  $this->ebook->addcat($data);
   if($save){
            $custommsg['success_msg'] = "User Updated Successfully";
            $custommsg["true"] = 1;
            setcookie('update_sucess_msg', "E-book Category saved Successfully", time() + 6, "/");
        } else {
            $custommsg['error_msg'] = "User Not Updated";
            $custommsg["true"] = 0;
            setcookie('update_error_msg', "E-book Category not Saved", time() + 6, "/");
        }
       echo json_encode($custommsg);

        exit;
  //    exit;
  }
  
  public function delcat($id=null){
      
      $delcat=$this->ebook->delcat($id);
     if($delcat){
            $custommsg['success_msg'] = "User Updated Successfully";
            $custommsg["true"] = 1;
            setcookie('update_sucess_msg', "E-book Category deleted Successfully", time() + 6, "/");
        } else {
            $custommsg['error_msg'] = "User Not Updated";
            $custommsg["true"] = 0;
            setcookie('update_error_msg', "E-book Category not Deleted", time() + 6, "/");
        }
       redirect('admin/ebookctrl/viewcatageory');
      
  }
  
  
  
  public function delebook($id=null, $cat_id=null){
      $deletebook=$this->ebook->delbook($id);
       if($deletebook){
            $custommsg['success_msg'] = "User Updated Successfully";
            $custommsg["true"] = 1;
            setcookie('update_sucess_msg', "E-book deleted Successfully", time() + 6, "/");
        } else {
            $custommsg['error_msg'] = "User Not Updated";
            $custommsg["true"] = 0;
            setcookie('update_error_msg', "E-book not Deleted", time() + 6, "/");
        }
         redirect('admin/ebookctrl/viewbooks/'.$cat_id);
  }
  
  
  public function editbook($bookid=null){
      $ebookdetail=$this->ebook->view_ebook($bookid);
      $data['bookdetail']=$ebookdetail;
      $this->load->view('admin/ebook/editbook', $data);
      
  }
  
  
  public function viewbooks($catid){
      $data['catid']=$catid;
      $data['ebooks']=$this->ebook->getebook($catid);
     $this->load->view('admin/ebook/viewbooks', $data);
     // $data['']
   }
   public function addebook($catid){
       $data['catid']=$catid;
       $this->load->view('admin/ebook/addebook', $data);
   }
   public function saveebook(){
        $catdata = [];
       if (!empty($_FILES['bookfile1']['name'])) {
           $target_dir = 'assets/ebooks/books/';
            $filename = basename(time() . $_FILES["bookfile1"]["name"]);
            $target_file = $target_dir . $filename;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
           if ($imageFileType != "pdf") {
                setcookie('update_error_msg', "File is not pdf", time() + 6, "/");
                redirect('admin/ebookctrl/viewcatageory');
            }else {
                if (move_uploaded_file($_FILES["bookfile1"]["tmp_name"], $target_file)) {
                     $data['author_name']=$this->input->post('authorname1');
                     $data['cat_id']=$this->input->post('catid');
                     $data['name']=$this->input->post('bookname1');
                     $data['saved_name']=$filename;
                     $data['edition']=$this->input->post('edition1');
                    $addbook = $this->ebook->saveebook($data);
                    if ($addbook) {

                        $custommsg['success_msg'] = "User Updated Successfully";
                        setcookie('update_sucess_msg', "File Saved Successfully", time() + 6, "/");
                    } else {
                        $custommsg['error_msg'] = "User Not Updated";
                        setcookie('update_error_msg', "File Not Saved", time() + 6, "/");
                    }
                    redirect('admin/ebookctrl/viewcatageory');
                }
            }
           
           
           
       }
     
   }
   
   
   public function editbookdetail(){
        $catdata = [];
       if (!empty($_FILES['bookfile1']['name'])) {
           $target_dir = 'assets/ebooks/books/';
            $filename = basename(time() . $_FILES["bookfile1"]["name"]);
            $target_file = $target_dir . $filename;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
           if ($imageFileType != "pdf") {
                setcookie('update_error_msg', "File is not pdf", time() + 6, "/");
                redirect('admin/ebookctrl/viewcatageory');
            }else {
                if (move_uploaded_file($_FILES["bookfile1"]["tmp_name"], $target_file)) {
                     $data['author_name']=$this->input->post('authorname1');
                     $data['cat_id']=$this->input->post('catid');
                     $data['name']=$this->input->post('bookname1');
                     $data['saved_name']=$filename;
                     $data['edition']=$this->input->post('edition1');
                     $data['bookid']=$this->input->post('bookid1');
                    $addbook = $this->ebook->editebook($data);
                    if ($addbook) {

                        $custommsg['success_msg'] = "User Updated Successfully";
                        setcookie('update_sucess_msg', "File Saved Successfully", time() + 6, "/");
                    } else {
                        $custommsg['error_msg'] = "User Not Updated";
                        setcookie('update_error_msg', "File Not Saved", time() + 6, "/");
                    }
                     redirect('admin/ebookctrl/viewbooks/'.$data['cat_id']);
                    //redirect('admin/ebookctrl/viewcatageory');
                }
            }
           
           
           
       }else{
                     $data['author_name']=$this->input->post('authorname1');
                     $data['cat_id']=$this->input->post('catid');
                     $data['name']=$this->input->post('bookname1');
                     $data['saved_name']=$this->input->post('savedname1');
                     $data['edition']=$this->input->post('edition1');
                     $data['bookid']=$this->input->post('bookid1');
                     $addbook = $this->ebook->editebook($data);  
                     redirect('admin/ebookctrl/viewbooks/'.$data['cat_id']);
       }
     
   }
   
   
   
   
   
}
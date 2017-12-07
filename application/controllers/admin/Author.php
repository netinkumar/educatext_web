<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Author extends Admin_Controller {
public function __construct()
        {
                parent::__construct();
                // load user model
                 $this->load->model('users');
                 $this->load->model('authordata');
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
        
 public function addquotes(){
     
     $this->load->view("admin/author/addquotes");
     
     
 }   
 
 public function savequotes(){
 
     $qutosdata=[];
     $qutosdata['user_id']=$this->input->post('authorid');
     $qutosdata['quotes']=$this->input->post('authorquotes');
     $quotes=$this->authordata->addquotes($qutosdata);
     if($quotes){
                  setcookie('update_sucess_msg', "Quote Added Successfully", time() + 6, "/");
                   
               }else{
                   setcookie('update_error_msg', "Quote Not Added", time() + 6, "/");
                   
               }
               
               redirect('admin/author/viewquotes');
  } 
  
  
  
    public function editquote($id=NULL){
      
        $data['qoutes']=$this->authordata->singlequote($id);
        
       $this->load->view('admin/author/editquotes',$data);


   } 
   public function updatequotes(){
      $quotedata['id']=$this->input->post('quoteid');
      $quotedata['quotes']=$this->input->post('authorquotes');
      $quotedata['user_id']=$this->input->post('userid');
     $update=  $this->authordata->updatequote($quotedata);
       //$allquotes['allquotes']=$this->authordata->viewquotes($quotedata['user_id']);
     
        if($update){
                  setcookie('update_sucess_msg', "Quote Updated Successfully", time() + 6, "/");
                   
               }else{
                   setcookie('update_error_msg', "Quote Not Updated", time() + 6, "/");
                   
               }
               
               redirect('admin/author/viewquotes');
       
       
       
       
       
   //  $this->load->view("admin/author/viewquotes", $allquotes);
       //exit;
   }
      public function viewquotes(){
//          	$config = array();
//$config["base_url"] = base_url() . "admin/author/viewquotes";
//$total_row = $this->authordata->countquotes(14);
//$config["total_rows"] = $total_row;
//$config["per_page"] = 3;
//$config['use_page_numbers'] = TRUE;
//$config['num_links'] = $total_row;
//$config['cur_tag_open'] = '&nbsp;<a class="current">';
//$config['cur_tag_close'] = '</a>';
//$config['next_link'] = 'Next';
//$config['prev_link'] = 'Previous';
//       $this->pagination->initialize($config);
//if($this->uri->segment(4)){
//$page = ($this->uri->segment(4)) ;
//}
//else{
//$page = 1;
//}
//  $page = ($page - 1) * $config["per_page"];
          
        if($_SESSION['userdata'][0]->role=="admin"){
            $uid="";
        }else{
            $uid=$_SESSION['userdata'][0]->id;
        }
          
$allquotes["allquotes"] = $this->authordata->viewquotes($uid);
//$str_links = $this->pagination->create_links();
//$allquotes["links"] = explode('&nbsp;',$str_links );

     $this->load->view("admin/author/viewquotes", $allquotes);
      }  
      
     public function viewsinglequote($id=null){
       $result['quotedata']=$this->authordata->singlequote($id);
       $this->load->view("admin/author/viewsinglequote", $result);
       
     } 
    public function deletequote($id=NULL){
           $this->authordata->deletequote($id);
         
           redirect('admin/author/viewquotes');
      }
      
    public function dailyquotes(){
        $data['dailyquotes']=$this->authordata->dailyquote();
        $data['allquotes']=$this->authordata->getallquotes();
        $this->load->view('admin/author/dailyquotes', $data);
        
    }  
   public function todayquote(){
     $data['publish_date']=date('Y-m-d H:i:s');
     $data['authorquotes_id']=$this->input->post('todayquote');
       $savedata=$this->authordata->addtodaysquote($data);
       $custommsg = [];
        if ($savedata) {
            $custommsg['success_msg'] = "User Updated Successfully";
            $custommsg["true"] = 1;
            setcookie('update_sucess_msg', "Today's quotes addeds Successfully", time() + 6, "/");
        } else {
            $custommsg['error_msg'] = "Today's quotes not Updated";
            $custommsg["true"] = 0;
            setcookie('update_error_msg', "Today's quotes not Updated", time() + 6, "/");
        }
        echo json_encode($custommsg);
        exit;
 } 
    
    
    
    
      
      
      
        
}
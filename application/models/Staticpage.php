<?php


class Staticpage extends CI_Model {
public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
        
        
        public function addpage($data){
          $this->db->query("INSERT INTO `custompages`(`name`, `pagecontent`) VALUES ('".$data['name']."', '".$data['pagecontent']."')");
     }  
     
     
     public function viewpage(){
         $user_query= $this->db->query("SELECT * FROM `custompages`");
         return $user_query->result();
          
     }  
     
     
     
       public function singlepage($id){
         
           $user_query= $this->db->query("SELECT * FROM `custompages` WHERE `id`='".$id."'");
         return $user_query->result();
         
         
     }
      public function updatepage($data){
         
           $user_query= $this->db->query("UPDATE `custompages` SET `pagecontent`='".$data['notes']."' WHERE `id`='".$data['id']."'");
     
         
     }
      
         public function deletepage($id){
         
           $user_query= $this->db->query("  DELETE FROM `custompages` WHERE `id`='".$id."'");
     
         
     }
        
        
}
<?php
namespace App\Controllers;
class Home extends BaseController
{
      
    
    public function ForgotPassword()
   {
         $email = $this->input->post('email');      
         $findemail = $this->usermodel->ForgotPassword($email);  
         if($findemail){
          $this->usermodel->sendpassword($findemail);        
           }else{
          $this->session->set_flashdata('msg',' Email not found!');
          redirect(base_url().'auth/login','refresh');
      }
   }





}
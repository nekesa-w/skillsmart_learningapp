<?php namespace App\Models;
 
    use CodeIgniter\Model;
 
    class NewUserModel extends Model{
        protected $table = 'tbl_new_userrequest';
    
        
        protected $allowedFields = ['first_name','last_name','gender','dob','email','password','role','status','link'];
    
        public function getNewUser(){
            return $this->findAll();
        }
}         
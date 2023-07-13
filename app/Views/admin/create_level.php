<?= $this->extend('layouts/adminlayout') ?>
<?= $this->section('content') ?>

<div class="container top">
      
      
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
             echo '<a class="close" data-dismiss="alert">×</a>';
               echo '<strong>Well done!</strong> New account created with success.';
                echo '</div>';       
        }else{
           echo '<div class="alert alert-error">';
              echo '<a class="close" data-dismiss="alert">×</a>';
                 echo '<strong>Oh snap!</strong> New account could not be created.';
          echo '</div>';          
        }
      }

      ?>
      
      <?php
      //form data
      //form validation
      echo validation_errors();
      
      echo form_open('admin/create_course', $attributes);
      ?>

     <fieldset>

     <div class="right _box"> 
      <div class= "account _box">
        <h3> Add Course </h3>
          <form class = "login_form">
             <select class= "login_formele">

<input type ="text" placeholder="level_title" class="Login_formele" required = "">
<input type="text" placeholder= "content" class="login_formele" required="">
<input type="button" placeholder= "level_requirement" class="login_formele" required=""> 

             </select>

 <button class="login_btn"> Submit </button>
 <button class="btn" type="reset">Cancel</button>
 </div>

</form>
</div>
</fieldset>
<?php echo form_close(); ?>
</div>






<?= $this->endSection() ?>
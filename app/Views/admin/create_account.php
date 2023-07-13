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
      
      echo form_open('admin/create_account', $attributes);
      ?>
        <fieldset>

    <div class="right _box"> 
      <div class= "account _box">
        <h3> Add Account </h3>
          <form class = "login_form">
             <select class= "login_formele">
         <option value= "user" > User Type </option>
        <option value = "admin">   1   </option>
      
   </select>

<input type = "text" placeholder="First Name" class="Login_formele" required = "">
<input type="text" placeholder= "Last Name" class="login_formele" required="">
<input type="button" placeholder= "Gender" class="login_formele" required=""> 
<input type="date" placeholder= "dob" class="login_formele" required=""> 
<input type="email" placeholder= "Email" class="login_formele" required="">
<input type="password" placeholder= "password" class="login_formele" required=""> 



<div class="login_binsc">
 <button class="login_btn"> Submit </button>
 <button class="btn" type="reset">Cancel</button>
</div>

</form>

     </div>

       </fieldset>

      <?php echo form_close(); ?>

    </div>




<?= $this->endSection() ?>
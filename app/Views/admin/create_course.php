<?= $this->extend('layouts/adminlayout') ?>
<?= $this->section('content') ?>


<div class="container">


  <?php
  //flash messages
  if (isset($flash_message)) {
    if ($flash_message == TRUE) {
      echo '<div class="alert alert-success">';
      echo '<a class="close" data-dismiss="alert">×</a>';
      echo '<strong>Well done!</strong> New course created with success.';
      echo '</div>';
    } else {
      echo '<div class="alert alert-error">';
      echo '<a class="close" data-dismiss="alert">×</a>';
      echo '<strong>Oh snap!</strong> New courses could not be created.';
      echo '</div>';
    }
  }

  ?>

  <?php
  //form data
  //form validation
  echo validation_errors();

  // echo form_open('admin/create_course', $attributes);
  ?>

  <fieldset>

    <div class="right _box">
      <div class="account _box">
        <h3> Add Course </h3>
        <form class="login_form">
          <select class="login_formele">
            <option value="skillone"> 1 </option>
            <option value="skilltwo"> 2 </option>
            <option value="skillthree">3 </option>
            <option value="skillfour"> 4 </option>
            <option value="skillfive"> 5</option>
            <option value="skillsix"> 6 </option>
            <option value="skillseven">7 </option>
            <option value="skilleight">8 </option>
            <option value="skillnine"> 9 </option>
            <option value="skillten"> 10 </option>
          </select>

          <button class="login_btn"> Submit </button>
          <button class="btn" type="reset">Cancel</button>
      </div>

      </form>
    </div>
  </fieldset>

  <?php
  // echo form_close(); 
  ?>
</div>





<?= $this->endSection() ?>
<?php include_once('includes/header.php'); ?>
<div class="col-lg-8 col-lg-offset-2">
	<form action="<?= base_url(); ?>Site_Login/register" method="post">
	  <div class="form-group">
	    <label for="email">Email address:</label>
	    <input type="email" name="email" class="form-control" id="email">
	    <?php echo form_error('email','<span class="text-danger">','</span>'); ?>
	  </div> 
	  <div class="form-group">
	    <label for="pwd">Password:</label>
	    <input type="password" name="password" class="form-control" id="pwd">
	    <?php echo form_error('password','<span class="text-danger">','</span>'); ?>
	  </div>
	  <div class="form-group">
	    <label for="pwd">Confirm Password:</label>
	    <input type="confirm_password" name="confirm_password" class="form-control" id="confirm_password">
	    <?php echo form_error('confirm_password','<span class="text-danger">','</span>'); ?>
	  </div>


	  <button name="submitRegistration" class="btn btn-default" value="true">Submit</button>
	  <a href="<?= base_url(); ?>Site_Login/login_form">Back</a>
	</form>
</div>
<?php include_once('includes/footer.php'); ?>
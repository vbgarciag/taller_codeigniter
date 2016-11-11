<article class="article-md">
<img src="<?php echo base_url(); ?>assets/images/codeigniter-logo.png" alt="" class="img-responsive img-circle" id="img-logo">
	<?php echo form_open('/register/register_user'); ?>
		<?php echo $this->session->flashdata('mensaje_error'); ?>
		<input type="text" class="form-control" name="name" id="name" placeholder="Name"><br>
		<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"><br>
		<input type="text" class="form-control" name="other_name" id="other_name" placeholder="Other Name"><br>
		<input type="email" class="form-control" name="email" id="email" placeholder="Email"><br>
		<input type="phone" class="form-control" name="cellphone" id="cellphone" placeholder="Cell Phone"><br>
		<input type="password" class="form-control" name="password" id="password" placeholder="Password"><br>
		<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password"><br>
		<button class="btn btn-warning" style="width: 100%">SIGN UP</button>
	<?php echo form_close(); ?>
</article>
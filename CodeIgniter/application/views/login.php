<section class="well section_login">
<img src="<?php echo base_url(); ?>assets/images/codeigniter-logo.png" alt="" class="img-responsive img-circle" id="img-logo">
<br>
	<article class="article-md">
		<?php echo form_open('/login/login_user'); ?>
		<input type="email" class="form-control" name="email" id="email" placeholder="Email"><br>
		<input type="password" class="form-control" name="password" id="password" placeholder="Password"><br>
		<?php echo $this->session->flashdata('error_msg'); ?>
		<button class="btn btn-primary" style="width: 100%" type="submit">SIGN IN</button>
		<?php echo form_close(); ?>
		<br>
		<br>
		<a href="/register">Sign up here!</a>
	</article>		
</section>
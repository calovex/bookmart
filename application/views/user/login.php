<h1>Bookmart Account - Login</h1>

<?php if( isset($status) && ($status == 'failed') ): ?>
	<div class="bg-danger">
		Incorrect username or password.
	</div>
<?php endif; ?>

<?php echo form_open('login'); ?>
	<ul class="form">
		<li>
			Email: <br>
			<?php echo form_input('email', set_value('email')); ?>
			<?php echo form_error('email'); ?>
		</li>
		<li>
			Password: <br>
			<?php echo form_password('password'); ?>
			<?php echo form_error('password'); ?>
		</li>
		<li>
			<?php echo form_submit('submit', 'Login', 'class="input-btn"'); ?>
		</li>
	</ul>
<?php echo form_close(); ?>
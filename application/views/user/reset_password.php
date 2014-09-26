<h1>Reset Password</h1>

<?php echo form_open('login/reset_password/'.$hash); ?>
	<ul class="form">
		<li>
			Password: <br>
			<?php echo form_password('password'); ?>
			<?php echo form_error('password'); ?>
		</li>
		<li>
			Retype Password: <br>
			<?php echo form_password('confirm_password'); ?>
			<?php echo form_error('confirm_password'); ?>
		</li>
		<li>
			<?php echo form_submit('submit', 'Reset Password', 'class="input-btn"'); ?>
		</li>
	</ul>
<?php echo form_close(); ?>
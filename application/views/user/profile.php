<h1>
	My Bookmart Profile Details
	<span class="change-password">
		<?php echo anchor('login/change_password', 'Change Password'); ?>
	</span>
</h1>

<?php echo $this->session->flashdata('message'); ?>

<?php echo form_open('profile'); ?>
	<ul class="form">
		<li>
			First Name: *<br>
			<?php echo form_input('first_name', set_value('first_name', $profile->first_name)); ?>
			<?php echo form_error('first_name'); ?>
		</li>
		<li>
			Last Name: *<br>
			<?php echo form_input('last_name', set_value('last_name', $profile->last_name)); ?>
			<?php echo form_error('last_name'); ?>
		</li>
		<li>
			Country: *<br>
			<?php echo form_dropdown('country', $countries, set_value('country', $profile->country_id)); ?>
			<?php echo form_error('country'); ?>
		</li>
		<li>
			City: *<br>
			<?php echo form_input('city', set_value('city', $profile->city)); ?>
			<?php echo form_error('city'); ?>
		</li>
		<li>
			Phone: <br>
			<?php echo form_input('phone', set_value('phone', $profile->phone)); ?>
			<?php echo form_error('phone'); ?>
		</li>
		<li>
			<?php echo form_submit('submit', 'Update', 'class="input-btn"'); ?>
		</li>
	</ul>
<?php echo form_close(); ?>
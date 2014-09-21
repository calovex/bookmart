<h1>New Category</h1>

<?php echo form_open('categories/create'); ?>
	<ul class="form">
		<li>
			Name: *<br>
			<?php echo form_input('name', set_value('name')); ?>
			<?php echo form_error('name'); ?>
		</li>
		<li>
			Status: *<br>
			<div class="category-status">
				<label>
					<?php echo form_checkbox('status', 1, set_checkbox('status', 1)); ?>
					Enabled / Disabled				
				</label>
			</div>
			<?php echo form_error('status'); ?>
		</li>
		<li>
			Weightage (to manage the sort order of top menu): *<br>
			<?php echo form_input('weightage', set_value('weightage')); ?>
			<?php echo form_error('weightage'); ?>
		</li>
		<li>
			<?php echo form_submit('submit', 'Create category', 'class="input-btn"'); ?> &nbsp; &nbsp;
		</li>
	</ul>
<?php echo form_close(); ?>
<h1>Edit Category - <?php echo $category->name; ?></h1>

<?php echo $this->session->flashdata('message'); ?>

<?php echo form_open('categories/edit/'.$category->category_id); ?>
	<ul class="form">
		<li>
			Name: *<br>
			<?php echo form_input('name', set_value('name', $category->name)); ?>
			<?php echo form_error('name'); ?>
		</li>
		<li>
			Status: *<br>
			<div class="category-status">
				<label>
					<?php echo form_checkbox('status', $category->status, set_checkbox('status', $category->status, ($category->status) ? true : false)); ?>
					Enabled / Disabled				
				</label>
			</div>
			<?php echo form_error('status'); ?>
		</li>
		<li>
			Weightage (to manage the sort order of top menu): *<br>
			<?php echo form_input('weightage', set_value('weightage', $category->weightage)); ?>
			<?php echo form_error('weightage'); ?>
		</li>
		<li>
			<?php echo form_submit('submit', 'Update category', 'class="input-btn"'); ?>
		</li>
	</ul>
<?php echo form_close(); ?>
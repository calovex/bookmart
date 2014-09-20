<h1>Manage Product Images <?php echo ($product_name) ? '- '.$product_name : ''; ?></h1>

<?php echo $this->session->flashdata('message'); ?>

<?php echo form_open_multipart('products/images/'.$product_id); ?>
	<ul class="form">
		<li>
			Product Image (max size: 250KB, max width: 1024px, max height: 768px): <br><br>
			<input type="file" name="userfile" id="userfile" size="20">
			<?php echo ($_POST) ? '<div class="error">'.$errors.'</div>' : ''; ?>
		</li>
		<li>
			<?php echo form_submit('submit', 'Upload', 'class="input-btn"'); ?>
		</li>
	</ul>
<?php echo form_close(); ?>

<?php if($images): ?>
	<div class="product-images">
		<?php foreach ($images as $image): ?>
			<div class="product-image">
				<a href="<?php echo base_url('uploads/'.$image->name); ?>">
					<img src="<?php echo base_url('uploads/'.$image->name); ?>">
				</a>
				<div class="product-image-delete">
					<?php echo anchor('products/delete_image/'.$image->products_images_id, 'Delete', 'class="confirm"'); ?>
				</div>
			</div>
		<?php endforeach; ?>		
		<span class="clear"></span>
	</div>
<?php endif; ?>
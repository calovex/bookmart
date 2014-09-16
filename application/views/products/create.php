<h1>New Product</h1>

<?php echo form_open('products/create'); ?>
	<ul class="form">
		<li>
			Title: *<br>
			<?php echo form_input('title', set_value('title'), 'class="large"'); ?>
			<?php echo form_error('title'); ?>
		</li>
		<li>
			Author: *<br>
			<?php echo form_input('author', set_value('author')); ?>
			<?php echo form_error('author'); ?>
		</li>
		<li>
			Can be: *<br>
			<?php echo form_dropdown('type', $types, $this->input->post('type')); ?>
			<?php echo form_error('type'); ?>
		</li>
		<li>
			<div class="col-1">
				Original price: *<br>
				<?php echo form_input('original_price', set_value('original_price')); ?>
			</div>
			<div class="col-1">
				Sale price: *<br>
				<?php echo form_input('sale_price', set_value('sale_price')); ?>
			</div>
			<div class="col-1">
				Shipping costs: *<br>
				<?php echo form_input('shipping_costs', set_value('shipping_costs', 0)); ?>
			</div>
			<span class="clear"></span>
			<?php echo form_error('original_price'); ?>
			<?php echo form_error('sale_price'); ?>
			<?php echo form_error('shipping_costs'); ?>
		</li>
		<li>
			Categories: *<br>
			<div class="product-categories">
				<label><?php echo form_checkbox('category[]', 1, set_checkbox('category[]', 1)); ?> Hot Deals</label>
				<label><?php echo form_checkbox('category[]', 2, set_checkbox('category[]', 2)); ?> Education</label>
				<label><?php echo form_checkbox('category[]', 3, set_checkbox('category[]', 3)); ?> Magazines</label>
				<label><?php echo form_checkbox('category[]', 4, set_checkbox('category[]', 4)); ?> Gift</label>
				<label><?php echo form_checkbox('category[]', 5, set_checkbox('category[]', 5)); ?> Reading Accessories</label>
				<label class="last"><?php echo form_checkbox('category[]', 6, set_checkbox('category[]', 6)); ?> Bulk Sales</label>
			</div>
			<?php echo form_error('category[]'); ?>
		</li>
		<li>
			Sorting Weightage in products listing pages: <br>
			<?php echo form_input('weightage', set_value('weightage')); ?>
			<?php echo form_error('weightage'); ?>
		</li>
		<li>
			Meta keywords: <br>
			<?php echo form_input('meta_keywords', set_value('meta_keywords'), 'class="large"'); ?>
			<?php echo form_error('meta_keywords'); ?>
		</li>
		<li>
			Meta description: <br>
			<?php echo form_input('meta_desc', set_value('meta_desc'), 'class="large"'); ?>
			<?php echo form_error('meta_desc'); ?>
		</li>
		<li>
			Summary: <br>
			<?php echo form_textarea('summary', set_value('summary'), 'class="large"'); ?>
			<?php echo form_error('summary'); ?>
		</li>
		<li>
			Description: *<br>
			<?php echo form_textarea('desc', set_value('desc'), 'class="xlarge"'); ?>
			<?php echo form_error('desc'); ?>
		</li>
		<li>
			<?php echo form_submit('submit', 'Save product', 'class="input-btn"'); ?>
		</li>
	</ul>
<?php echo form_close(); ?>
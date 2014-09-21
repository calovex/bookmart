<h1>
	Edit Product - <?php echo $product->title; ?>
	<span>
		<?php echo anchor('products/images/'.$product->product_id, ' | Images'); ?>
	</span>
	<span>
		<?php echo anchor('products/ebooks/'.$product->product_id, ' | Ebooks'); ?>
	</span>
</h1>

<?php echo $this->session->flashdata('message'); ?>

<?php echo form_open('products/edit/'.$product->product_id, 'autocomplete="off"'); ?>
	<ul class="form">
		<li>
			Title: *<br>
			<?php echo form_input('title', set_value('title', $product->title), 'class="large"'); ?>
			<?php echo form_error('title'); ?>
		</li>
		<li>
			Author: *<br>
			<?php echo form_input('author', set_value('author', $product->author)); ?>
			<?php echo form_error('author'); ?>
		</li>
		<li>
			Service Type: *<br>
			<?php echo form_dropdown('service_type', $service_types, set_value('service_type', $product->service_type)); ?>
			<?php echo form_error('service_type'); ?>
		</li>
		<li>
			Can be: *<br>
			<?php echo form_dropdown('type', $types, set_value('type', $product->type)); ?>
			<?php echo form_error('type'); ?>
		</li>
		<li>
			<div class="col-1">
				Original price: *<br>
				<?php echo form_input('original_price', set_value('original_price', $product->original_price)); ?>
			</div>
			<div class="col-1">
				Sale price: *<br>
				<?php echo form_input('sale_price', set_value('sale_price', $product->sale_price)); ?>
			</div>
			<div class="col-1">
				Shipping costs: *<br>
				<?php echo form_input('shipping_costs', set_value('shipping_costs', $product->shipping_costs)); ?>
			</div>
			<span class="clear"></span>
			<?php echo form_error('original_price'); ?>
			<?php echo form_error('sale_price'); ?>
			<?php echo form_error('shipping_costs'); ?>
		</li>
		<li>
			Categories: *<br>
			<div class="product-categories">
				<?php if($categories): ?>
					<?php foreach ($categories as $category): ?>
						<label>
							<?php
								echo form_checkbox('category[]', $category->category_id, set_checkbox('category[]', $category->category_id, ($category->is_checked) ? true : false));
								echo $category->name;
							?>
						</label>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<?php echo form_error('category[]'); ?>
		</li>
		<li>
			Sorting Weightage in products listing pages: <br>
			<?php echo form_input('weightage', set_value('weightage', $product->weightage)); ?>
			<?php echo form_error('weightage'); ?>
		</li>
		<li>
			Meta keywords: <br>
			<?php echo form_input('meta_keywords', set_value('meta_keywords', $product->meta_keywords), 'class="large"'); ?>
			<?php echo form_error('meta_keywords'); ?>
		</li>
		<li>
			Meta description: <br>
			<?php echo form_input('meta_desc', set_value('meta_desc', $product->meta_desc), 'class="large"'); ?>
			<?php echo form_error('meta_desc'); ?>
		</li>
		<li>
			Summary: <br>
			<?php echo form_textarea('summary', set_value('summary', $product->summary), 'class="large"'); ?>
			<?php echo form_error('summary'); ?>
		</li>
		<li>
			Description: *<br>
			<?php echo form_textarea('desc', set_value('desc', $product->desc), 'class="xlarge"'); ?>
			<?php echo form_error('desc'); ?>
		</li>
		<li>
			<?php echo form_submit('submit', 'Update product', 'class="input-btn"'); ?> &nbsp; &nbsp;
			<?php echo anchor('products/delete/'.$product->product_id, 'Delete this product', 'class="confirm"'); ?>
		</li>
	</ul>
<?php echo form_close(); ?>
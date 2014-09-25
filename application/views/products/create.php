<h1>New Product</h1>

<?php echo form_open('products/create', 'autocomplete="off"'); ?>
	<ul class="form">
		<li>
			Title: *<br>
			<?php echo form_input('title', set_value('title'), 'class="large"'); ?>
			<?php echo form_error('title'); ?>
		</li>
		<li>
			Tags (comma separated words, max 255 characters, used to display the related products, eg: fiction, comdey etc. ): *<br>
			<?php echo form_input('tags', set_value('tags'), 'class="large" maxlength="255"'); ?>
			<?php echo form_error('tags'); ?>
		</li>
		<li>
			Author: *<br>
			<?php echo form_input('author', set_value('author')); ?>
			<?php echo form_error('author'); ?>
		</li>
        <li>
            Published: <br>
            <div class="category-status">
                <label>
                    <?php echo form_checkbox('published', 1, set_checkbox('published', 1)); ?>
                    Yes / No
                </label>
            </div>
            <?php echo form_error('published'); ?>
        </li>
        <li>
            Our Product: <br>
            <div class="category-status">
                <label>
                    <?php echo form_checkbox('our_product', 1, set_checkbox('our_product', 1)); ?>
                    Yes / No
                </label>
            </div>
            <?php echo form_error('our_product'); ?>
        </li>
		<li>
			Service Type: *<br>
			<?php echo form_dropdown('service_type', $service_types, set_value('service_type')); ?>
			<?php echo form_error('service_type'); ?>
		</li>
		<li>
			Can be: *<br>
			<?php echo form_dropdown('type', $types, $this->input->post('type')); ?>
			<?php echo form_error('type'); ?>
			<div class="bg-info dev">
				Note: For the time being only digital goods can be managed,
				no shipment tracking or billing address management features are available and
				creating products with 'can be shipped' mode is not recommended as of now.
			</div>
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
				<?php if($categories): ?>
					<?php foreach ($categories as $category): ?>
						<label>
							<?php
								echo form_checkbox('category[]', $category->category_id, set_checkbox('category[]', $category->category_id));
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
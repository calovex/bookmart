<h1><?php echo $category->name; ?></h1>

<?php if($products): ?>
	<div class="product-items">
		<?php foreach ($products as $product): ?>
			<div class="product-item">
				<div class="product-cover">
					<a href="<?php echo base_url('products/'.$product->product_id.'/'.$product->slug); ?>" title="<?php echo $product->title; ?>">
						<img src="<?php echo base_url('uploads/thumbs/'.$product->cover_image); ?>" title="<?php echo $product->title; ?>" alt="<?php echo $product->summary; ?>">
					</a>
				</div>
				<div class="product-info">
					<div class="product-title">
						<a href="<?php echo base_url('products/'.$product->product_id.'/'.$product->slug); ?>" title="<?php echo $product->title; ?>">
							<?php echo (strlen($product->title) > 30) ? substr($product->title, 0, 30) . ' ...' : $product->title; ?>
						</a>
						<span class="book-author">
							<a href="<?php echo base_url('search/results/?author='.urlencode($product->author)); ?>" title="<?php echo $product->author; ?>">
								by <?php echo $product->author; ?>
							</a>
						</span>
					</div>
					<div class="product-price">
						<span class="sale-price">70.00</span>
						<span class="original-price">85.00</span>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<span class="clear"></span>
	</div>
<?php endif; ?>
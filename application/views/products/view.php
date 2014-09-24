<div class="px-page">
	<div class="px-cover">
        <?php if($product->cover_image): ?>
            <img src="<?php echo base_url('uploads/'.$product->cover_image); ?>" title="<?php echo $product->title; ?>" alt="<?php echo $product->title; ?>">
        <?php else: ?>
		    <img src="<?php echo base_url('images/book.png'); ?>" title="<?php echo $product->title; ?>" alt="<?php echo $product->title; ?>">
        <?php endif; ?>
	</div>
	<div class="px-info">
		<h1><?php echo $product->title; ?></h1>
		<div class="px-author">
			<strong>By Author : </strong>
            <?php echo anchor('search/results/?author='.urlencode($product->author), $product->author, 'class="px-author-name"'); ?>
		</div>
		<div class="px-price">
			<div class="px-original-price">
				SGD <?php echo number_format((float)$product->original_price, 2); ?>
			</div>
			<div class="px-sale-price">
                SGD <?php echo number_format((float)$product->sale_price, 2); ?>
			</div>
			<div class="px-status">
				<?php if($product->type == 'Downloadable'): ?>
                    Available Instantly
                <?php endif; ?>
			</div>
			<div class="px-checkout-btn">
				<?php
					$buy_btn_title = 'title="Buy Now - '.$product->title.'"';
					echo anchor('cart/add/'.$product->product_id, 'Buy Now', $buy_btn_title);
				?>
			</div>
			<div class="px-readable">
				<?php echo anchor('read-instantly-on-your-web-browser', 'Read Instantly on your Web Browser'); ?> <br>
				<?php echo anchor('also-read-on-ios-android-and-windowsphone', 'Also read on iOS, Android and WindowsPhone'); ?>
			</div>
		</div>
		<div class="px-actions">
			<ul>
				<li><?php echo anchor('search/results/?author='.urlencode($product->author), 'More from '.$product->author); ?></li>
				<li class="px-tags">Tags</li>
				<?php $tags = explode(',', $product->tags); ?>
				<?php foreach ($tags as $tag): ?>
					<li><?php echo anchor('search/results/?tag='.urlencode($tag), $tag); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<span class="clear"></span>
	</div>
	<span class="clear"></span>
	<div class="px-gallery-summary">
		<div class="px-summary">
			<h2>Summary</h2>
			<?php echo $product->summary; ?>
		</div>
		<div class="px-gallery">
            <?php if($images): ?>
                <?php foreach ($images as $image): ?>
    			    <div class="px-gallery-img">
                        <a href="<?php echo base_url('uploads/'.$image->name); ?>" data-lightbox="product-lb-images">
                            <img src="<?php echo base_url('uploads/thumbs/'.$image->name); ?>" title="<?php echo $product->title; ?>" alt="<?php echo $product->title; ?>">
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
			<span class="clear"></span>
		</div>
		<span class="clear"></span>
	</div>
	<div class="px-details">
		<h2>Details</h2>
        <?php echo $product->desc; ?>
	</div>
	<?php if($related_products): ?>
		<div class="px-related">
			<h3>You might also like</h3>
			<div class="product-items">
				<?php foreach ($related_products as $related_product): ?>
					<div class="product-item">
						<div class="product-cover">
							<a href="<?php echo base_url('product/'.$related_product->product_id.'/'.$related_product->slug); ?>" title="<?php echo $related_product->title; ?>">
								<img src="<?php echo base_url('uploads/thumbs/'.$related_product->cover_image); ?>" title="<?php echo $related_product->title; ?>" alt="<?php echo $related_product->summary; ?>">
							</a>
						</div>
						<div class="product-info">
							<div class="product-title">
								<a href="<?php echo base_url('product/'.$related_product->product_id.'/'.$related_product->slug); ?>" title="<?php echo $related_product->title; ?>">
									<?php echo (strlen($related_product->title) > 30) ? substr($related_product->title, 0, 30) . ' ...' : $related_product->title; ?>
								</a>
								<span class="book-author">
									<a href="<?php echo base_url('search/results/?author='.urlencode($related_product->author)); ?>" title="<?php echo $related_product->author; ?>">
										by <?php echo $related_product->author; ?>
									</a>
								</span>
							</div>
							<div class="product-price">
								<span class="sale-price">
									<?php echo number_format((float)$related_product->sale_price, 2); ?>
								</span>
								<span class="original-price">
									<?php echo number_format((float)$related_product->original_price, 2); ?>
								</span>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<span class="clear"></span>
			</div>
		</div>
	<?php endif; ?>
</div>
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
				<a href="#">Buy Now</a>
			</div>
			<div class="px-readable">
				<a href="#">Read Instantly on your Web Browser</a><br>
				<a href="#">Also read on iOS, Android and WindowsPhone</a>
			</div>
		</div>
		<div class="px-actions">
			<ul>
				<li><a href="#">Add to My Wishlist</a></li>
				<li><?php echo anchor('search/results/?author='.urlencode($product->author), 'More from '.$product->author); ?></li>
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
	<div class="px-related">
		<h3>You might also like</h3>
		<div class="product-items">
			<div class="product-item">
				<div class="product-cover">
					<a href="#"><img src="http://localhost/bookmart/uploads/thumbs/emma.jpg"></a>
				</div>
				<div class="product-info">
					<div class="product-title">
						<a href="#">Emma</a>
						<span class="book-author">
							<a href="#">by Jane Austen</a>
						</span>
					</div>
					<div class="product-price">
						<span class="sale-price">70.00</span>
						<span class="original-price">85.00</span>
					</div>
				</div>
			</div>
			<div class="product-item">
				<div class="product-cover">
					<a href="#"><img src="http://localhost/bookmart/uploads/thumbs/leaves-grass-classic-collection-walt-whitman-cd-cover-art.jpg"></a>
				</div>
				<div class="product-info">
					<div class="product-title">
						<a href="#">Emma</a>
						<span class="book-author">
							<a href="#">by Jane Austen</a>
						</span>
					</div>
					<div class="product-price">
						<span class="sale-price">70.00</span>
						<span class="original-price">85.00</span>
					</div>
				</div>
			</div>
			<div class="product-item">
				<div class="product-cover">
					<a href="#"><img src="http://localhost/bookmart/uploads/thumbs/709306_w185.png"></a>
				</div>
				<div class="product-info">
					<div class="product-title">
						<a href="#">Emma</a>
						<span class="book-author">
							<a href="#">by Jane Austen</a>
						</span>
					</div>
					<div class="product-price">
						<span class="sale-price">70.00</span>
						<span class="original-price">85.00</span>
					</div>
				</div>
			</div>
			<div class="product-item">
				<div class="product-cover">
					<a href="#"><img src="http://localhost/bookmart/uploads/thumbs/72.jpg"></a>
				</div>
				<div class="product-info">
					<div class="product-title">
						<a href="#">Emma</a>
						<span class="book-author">
							<a href="#">by Jane Austen</a>
						</span>
					</div>
					<div class="product-price">
						<span class="sale-price">70.00</span>
						<span class="original-price">85.00</span>
					</div>
				</div>
			</div>
			<div class="product-item">
				<div class="product-cover">
					<a href="#"><img src="http://localhost/bookmart/uploads/thumbs/mysteriousaffairatstyles.jpg"></a>
				</div>
				<div class="product-info">
					<div class="product-title">
						<a href="#">Emma</a>
						<span class="book-author">
							<a href="#">by Jane Austen</a>
						</span>
					</div>
					<div class="product-price">
						<span class="sale-price">70.00</span>
						<span class="original-price">85.00</span>
					</div>
				</div>
			</div>
			<div class="product-item">
				<div class="product-cover">
					<a href="#"><img src="http://localhost/bookmart/uploads/thumbs/thepictureofdoriangray.jpg"></a>
				</div>
				<div class="product-info">
					<div class="product-title">
						<a href="#">Emma</a>
						<span class="book-author">
							<a href="#">by Jane Austen</a>
						</span>
					</div>
					<div class="product-price">
						<span class="sale-price">70.00</span>
						<span class="original-price">85.00</span>
					</div>
				</div>
			</div>
			<span class="clear"></span>
		</div>
	</div>
</div>
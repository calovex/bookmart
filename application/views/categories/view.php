<h1><?php echo $category->name; ?></h1>

<?php if($products): ?>
    <div class="product-items">
        <?php foreach ($products as $product): ?>
            <div class="product-item">
                <div class="product-cover">
                    <a href="<?php echo base_url('product/'.$product->product_id.'/'.$product->slug); ?>" title="<?php echo $product->title; ?>">
                        <img src="<?php echo base_url('uploads/thumbs/'.$product->cover_image); ?>" title="<?php echo $product->title; ?>" alt="<?php echo $product->summary; ?>">
                    </a>
                </div>
                <div class="product-info">
                    <div class="product-title">
                        <a href="<?php echo base_url('product/'.$product->product_id.'/'.$product->slug); ?>" title="<?php echo $product->title; ?>">
                            <?php echo (strlen($product->title) > 30) ? substr($product->title, 0, 30) . ' ...' : $product->title; ?>
                        </a>
                        <span class="book-author">
                            <a href="<?php echo base_url('search/?query='.urlencode($product->author)); ?>" title="<?php echo $product->author; ?>">
                                by <?php echo $product->author; ?>
                            </a>
                        </span>
                    </div>
                    <div class="product-price">
                        <span class="sale-price">
                            <?php echo CURRENCY_SYMBOL.' '.number_format((float)$product->sale_price, 2); ?>
                        </span>
                        <?php if($product->original_price > $product->sale_price): ?>
                            <span class="original-price">
                                <?php echo CURRENCY_SYMBOL.' '.number_format((float)$product->original_price, 2); ?>
                            </span>
                            <span class="savings">
                                <?php echo $product->savings; ?>% OFF
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <span class="clear"></span>
    </div>
<?php endif; ?>

<div class="pagination">
    <?php echo $this->pagination->create_links(); ?>
</div>

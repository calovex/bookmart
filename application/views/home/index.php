<?php if($promotion): ?>
    <div class="offer">
        <div class="offer-img">
            <a href="<?php echo base_url('product/view/'.$promotion->product_id.'/'.$promotion->slug); ?>" title="<?php echo $promotion->title; ?>">
                <img src="<?php echo base_url('uploads/'.$promotion->image); ?>" class="offer-book" alt="Offer Book">
            </a>
        </div>
        <div class="offer-desc">
            <p>
                <?php echo (strlen($promotion->summary) > 126) ? substr($promotion->summary, 0, 120).' ...' : $promotion->summary; ?>
            </p>
            <?php echo anchor('product/view/'.$promotion->product_id.'/'.$promotion->slug, '+ View Promotion', 'class="promo-link" title="View Promotion"'); ?>
        </div>
        <span class="clear"></span>
    </div>
<?php endif; ?>
<?php if($slides): ?>
    <div class="slides">
        <div id="slideshow">
            <?php foreach ($slides as $slide): ?>
                <div class="slide" style="background-image: url(<?php echo base_url('uploads/'.$slide->image); ?>)">
                    <a href="<?php echo base_url('product/view/'.$slide->product_id.'/'.$slide->slug); ?>"><?php echo base_url('uploads/'.$slide->image); ?></a>
                </div>
            <?php endforeach; ?>
        </div>
        <span class="clear"></span>
    </div>
<?php endif; ?>
<h3 class="sub-header our-product">Our Books</h3>
<div class="our-books">
    <?php if($our_products): ?>
        <?php foreach ($our_products as $our_product): ?>
            <div class="item">
                <a href="<?php echo base_url('product/view/'.$our_product->product_id.'/'.$our_product->slug); ?>" title="<?php echo $our_product->title; ?>">
                    <img src="<?php echo base_url('uploads/thumbs/'.$our_product->cover_image); ?>" alt="<?php echo $our_product->title; ?>">
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <span class="clear"></span>
</div>
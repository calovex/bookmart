<?php if($this->cart->contents()): ?>
	<h1>Shopping Cart</h1>
	<div class="cart">
		<table>
			<tr>
				<th>Item Description</th>
				<th>QTY</th>
				<th class="right">Item Price</th>
				<th class="right">Sub-Total</th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach ($this->cart->contents() as $items): ?>
				<?php
					echo form_hidden($i.'[rowid]', $items['rowid']);
					$options = $this->cart->has_options($items['rowid']) ? $this->cart->product_options($items['rowid']) : false;
				?>
				<tr>
				  	<td>
				  		<div class="cart-item-image">
				  			<a href="<?php echo $options['url']; ?>">
				  				<img src="<?php echo base_url('uploads/thumbs/'.$options['cover_image']); ?>">
				  			</a>
				  		</div>
						<div class="cart-item-name">
							<?php echo $items['name']; ?>
							<div class="cart-item-remove">
								<?php echo anchor('cart/remove_item/'.$items['rowid'], 'Remove'); ?>
							</div>
						</div>
						<span class="clear"></span>
				  	</td>
				  	<td>
				  		<?php 
					  		//echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'class' => 'qty', 'disabled' => 'true'));
					  		echo $items['qty'];
				  		?>
				  	</td>
				  	<td class="right">
				  		<div class="cart-item-sale-price">
				  			<?php echo $this->cart->format_number($items['price']); ?>
				  		</div>
				  		<div class="cart-item-original-price">
				  			<?php echo $this->cart->format_number($options['original_price']); ?>
				  		</div>
				  	</td>
				  	<td class="right">
				  		<?php echo $this->cart->format_number($items['subtotal']); ?>
				  	</td>
				</tr>
				<?php $i++; ?>
			<?php endforeach; ?>
			<tr>
				<td colspan="2" class="last"></td>
			  	<td class="right last"><strong>Total</strong></td>
			  	<td class="right last">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
			</tr>
		</table>
		<div class="checkout">
			<?php echo anchor($options['url'], 'Continue Shopping', 'class="input-btn light"'); ?>
			<?php echo anchor('checkout', 'Checkout', 'class="input-btn"'); ?>
		</div>
	</div>
<?php else: ?>
	<h1>Your shopping cart is empty</h1>
	<p>To put something in your Shopping Cart, start by searching or browsing through any of our products. When an item interests you, click the Buy Now button. Items in your Shopping Cart always reflect the most recent price displayed on their product pages.</p>
	<div class="spacer">
		<?php echo anchor('/', 'Continue Shopping', 'class="input-btn light"'); ?>
	</div>
<?php endif; ?>
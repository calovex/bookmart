<div class="ex-customer">
	<div class="item-summary">
		<h1>Summary</h1>
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
					<tr>
					  	<td><?php echo $items['name']; ?></td>
					  	<td><?php  echo $items['qty']; ?>
					  	</td>
					  	<td class="right">
					  		<?php echo CURRENCY_SYMBOL.' '.$this->cart->format_number($items['price']); ?>
					  	</td>
					  	<td class="right">
					  		<?php echo CURRENCY_SYMBOL.' '.$this->cart->format_number($items['subtotal']); ?>
					  	</td>
					</tr>
					<?php $i++; ?>
				<?php endforeach; ?>
				<tr>
					<td colspan="2" class="last"></td>
				  	<td class="right last"><strong>Total</strong></td>
				  	<td class="right last"><?php echo CURRENCY_SYMBOL.' '.$this->cart->format_number($this->cart->total()); ?></td>
				</tr>
			</table>
		</div>
		<div class="payment-methods">
			<img src="<?php echo base_url('images/payment.png'); ?>">
		</div>
	</div>
	<h2>Existing Customer</h2>
	<?php if( isset($status) && ($status == 'failed') ): ?>
		<div class="bg-danger checkout-login">
			Incorrect username or password.
		</div>
	<?php endif; ?>
	<?php echo form_open('checkout/login'); ?>
		<ul class="form">
			<li>
				Email: *<br>
				<?php echo form_input('email', set_value('email')); ?>
				<?php echo form_error('email'); ?>
			</li>
			<li>
				Password: *<br>
				<?php echo form_password('password'); ?>
				<?php echo form_error('password'); ?>
			</li>
			<li>
				<?php echo form_submit('submit', 'Login', 'class="input-btn"'); ?>
			</li>
		</ul>
	<?php echo form_close(); ?>
	<a href="#" class="modal-link">Forgot Password</a>
	<div class="modal">
		<div class="modal-content forgot-pwd">
			<?php echo form_open('login/forgot_password', 'id="forgot-pwd-form"'); ?>
				<ul class="form">
					<li>
						Email: <br>
						<?php echo form_input('user_email', set_value('user_email'), 'id="forgot-pwd-email"'); ?>
						<?php echo form_error('user_email'); ?>
						<div class="ajax-resp"></div>
					</li>
					<li>
						<?php echo form_submit('submit', 'Send Link', 'class="input-btn"'); ?>
					</li>
				</ul>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<div class="new-customer">
	<h2>Guest Checkout</h2>
	<?php echo form_open('checkout/guest'); ?>
		<ul class="form">
			<li>
				Email: *<br>
				<?php echo form_input('guest_email', set_value('guest_email')); ?>
				<?php echo form_error('guest_email'); ?>
			</li>
			<li>
				First Name: *<br>
				<?php echo form_input('first_name', set_value('first_name')); ?>
				<?php echo form_error('first_name'); ?>
			</li>
			<li>
				Last Name: *<br>
				<?php echo form_input('last_name', set_value('last_name')); ?>
				<?php echo form_error('last_name'); ?>
			</li>
			<li>
				Country: *<br>
				<?php echo form_dropdown('country', $countries, $this->input->post('country')); ?>
				<?php echo form_error('country'); ?>
			</li>
			<li>
				City: *<br>
				<?php echo form_input('city', set_value('city')); ?>
				<?php echo form_error('city'); ?>
			</li>
			<li>
				<?php echo form_submit('submit', 'Checkout as Guest', 'class="input-btn"'); ?>
			</li>
			<?php
				/*
					for the time being only digital products can be purchased / managed
					for a future version of bookmart we can make use of checkout / index form
					checkout / index - not used anywhere as of now
				*/
			?>
		</ul>
	<?php echo form_close(); ?>
</div>
<span class="clear"></span>
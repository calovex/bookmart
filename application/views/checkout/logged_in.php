<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="Book Mart Online Store">
    <meta name="keywords" content="Book Mart Online Store">
    <meta name="author" content="Nivin CP">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo isset($page_title) ? $page_title : SITE_TITLE; ?></title>
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('favicon.png'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oxygen:400,700">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?php echo base_url('js/core.js'); ?>"></script>
</head>
<body>	
	<div class="checkout-header">
		<div class="checkout-header-logo">
			<img src="<?php echo base_url('images/logo.png'); ?>" alt="Book Mart">
		</div>
	</div>
	<div class="ex-customer logged-in">
		<div class="item-summary">
			<h1>Order Summary</h1>
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
		<div class="payment-center-btn">
			<form action="<?php echo PAYPAL_CHECKOUT_URL; ?>" method="post">
			    <input type="hidden" name="cmd" value="_cart">
			    <input type="hidden" name="upload" value="1">
			    <input type="hidden" name="business" value="<?php echo PAYPAL_RECEIVER_EMAIL; ?>">
			    <input type="hidden" name="currency_code" value="USD">
			    <input type="hidden" name="return" value="<?php echo base_url('checkout/success'); ?>">
			    <input type="hidden" name="cancel_return" value="<?php echo base_url('checkout/cancelled'); ?>">
			    <input type="hidden" name="notify_url" value="<?php echo base_url('ipn/paypal'); ?>">
			    <?php $i = 1; ?>
			    <?php foreach ($this->cart->contents() as $items): ?>
			    	<?php $return_items[] = $items['id']; ?>
			    	<input type="hidden" name="item_name_<?php echo $i ;?>" value="<?php echo $items['name']; ?>">
			    	<input type="hidden" name="amount_<?php echo $i ;?>" value="<?php echo $this->cart->format_number($items['subtotal']); ?>">
			    	<?php $i++; ?>
			    <?php endforeach; ?>
			    <input type="hidden" name="custom" value="<?php echo $order_id; ?>">
			    <?php echo form_submit('submit', 'Proceed to Payment', 'class="input-btn"'); ?>
			</form>
		</div>
		<div class="cancel-order">
			<?php echo anchor('orders/cancel/'.$order_id, 'Cancel this order', 'class="confirm"'); ?>
		</div>
		<div class="order-terms">
			By placing your order, you agree to Bookmart's privacy notice and conditions of use.
		</div>
	</div>
</body>
</html>
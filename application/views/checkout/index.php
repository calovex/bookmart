<div class="ex-customer">
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
                            <?php echo $this->cart->format_number($items['price']); ?>
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
        </div>
        <div class="payment-methods">
            <img src="<?php echo base_url('images/payment.png'); ?>">
        </div>
    </div>
    <h2>Existing Customer</h2>
    <?php if( isset($status) && ($status == 'failed') ): ?>
        <div class="bg-danger">
            Incorrect username or password.
        </div>
    <?php endif; ?>

    <?php echo form_open('login'); ?>
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
</div>
<div class="new-customer">
    <h2>Guest Checkout</h2>

    <?php if( isset($status) && ($status == 'failed') ): ?>
        <div class="bg-danger">
            Incorrect username or password.
        </div>
    <?php endif; ?>

    <?php echo form_open('guest/checkout'); ?>
        <ul class="form">
            <li>
                Email: *<br>
                <?php echo form_input('email', set_value('email')); ?>
                <?php echo form_error('email'); ?>
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
                State: *<br>
                <?php echo form_input('state', set_value('state')); ?>
                <?php echo form_error('state'); ?>
            </li>
            <li>
                City: *<br>
                <?php echo form_input('city', set_value('city')); ?>
                <?php echo form_error('city'); ?>
            </li>
            <li>
                Address Line1: *<br>
                <?php echo form_input('address_line1', set_value('address_line1')); ?>
                <?php echo form_error('address_line1'); ?>
            </li>
            <li>
                Address Line2: <br>
                <?php echo form_input('address_line1', set_value('address_line1')); ?>
                <?php echo form_error('address_line1'); ?>
            </li>
            <li>
                ZIP/Postal Code: *<br>
                <?php echo form_input('zip_code', set_value('zip_code')); ?>
                <?php echo form_error('zip_code'); ?>
            </li>
            <li>
                Mobile Number: *<br>
                <?php echo form_input('mobile_number', set_value('mobile_number')); ?>
                <?php echo form_error('mobile_number'); ?>
            </li>
            <li class="billing-address">
                Billing Address: *<br>
                <label>
                    <?php echo form_radio('billing_address', 1, set_radio('billing_address', 1, true), 'id="same-as-shipping"'); ?>
                    Same As Shipping
                </label>
                <label>
                    <?php echo form_radio('billing_address', 0, set_radio('billing_address', 0), 'id="new-billing-adress"'); ?>
                    Enter a New Billing Address
                </label>
            </li>
            <div id="new-billing-adress-form">
                <li>
                    Full Name: *<br>
                    <?php echo form_input('full_name', set_value('full_name')); ?>
                    <?php echo form_error('full_name'); ?>
                </li>
                <li>
                    Country: *<br>
                    <?php echo form_dropdown('country', $countries, $this->input->post('country')); ?>
                    <?php echo form_error('country'); ?>
                </li>
                <li>
                    State: *<br>
                    <?php echo form_input('state', set_value('state')); ?>
                    <?php echo form_error('state'); ?>
                </li>
                <li>
                    City: *<br>
                    <?php echo form_input('city', set_value('city')); ?>
                    <?php echo form_error('city'); ?>
                </li>
                <li>
                    Address Line1: *<br>
                    <?php echo form_input('address_line1', set_value('address_line1')); ?>
                    <?php echo form_error('address_line1'); ?>
                </li>
                <li>
                    Address Line2: <br>
                    <?php echo form_input('address_line1', set_value('address_line1')); ?>
                    <?php echo form_error('address_line1'); ?>
                </li>
                <li>
                    ZIP/Postal Code: *<br>
                    <?php echo form_input('zip_code', set_value('zip_code')); ?>
                    <?php echo form_error('zip_code'); ?>
                </li>
                <li>
                    Mobile Number: *<br>
                    <?php echo form_input('mobile_number', set_value('mobile_number')); ?>
                    <?php echo form_error('mobile_number'); ?>
                </li>
            </div>
            <li>
                <?php echo form_submit('submit', 'Proceed to Payment', 'class="input-btn"'); ?>
            </li>
        </ul>
    <?php echo form_close(); ?>
</div>
<span class="clear"></span>
<div class="order-terms">
    By placing your order, you agree to Bookmart's privacy notice and conditions of use.
</div>

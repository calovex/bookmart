<h1>Order Details</h1>

<table class="table table-hover order-details">
    <tbody>
        <tr>
           <th class="right">Name</th>
           <td class="left"><?php echo $order->full_name; ?></td>
        </tr>
        <tr>
           <th class="right">Email</th>
           <td class="left"><?php echo $order->email; ?></td>
        </tr>
        <tr>
           <th class="right">Order Amount</th>
           <td class="left"><?php echo number_format((float)$order->order_amount, 2); ?></td>
        </tr>
        <tr>
           <th class="right">Paid Amount</th>
           <td class="left"><?php echo $order->paid_amount; ?></td>
        </tr>
        <tr>
           <th class="right">Currency</th>
           <td class="left"><?php echo $order->payment_currency; ?></td>
        </tr>
        <tr>
           <th class="right">Status</th>
           <td class="left"><?php echo $order->status; ?></td>
        </tr>
        <tr>
           <th class="right">Paid</th>
           <td class="left"><?php echo $order->paid_at; ?></td>
        </tr>
        <tr>
           <th class="right">Products</th>
           <td class="left">
                <?php foreach ($products as $product): ?>
                   <div class="order-products">
                       <?php echo anchor('product/view/'.$product->product_id.'/'.$product->slug, $product->title); ?>
                       <?php echo CURRENCY_SYMBOL.' '.number_format((float)$product->sale_price, 2); ?>
                   </div>
                <?php endforeach; ?>
           </td>
        </tr>
    </tbody>
</table>
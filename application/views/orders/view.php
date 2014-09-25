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
           <th class="right">Payer Email</th>
           <td class="left"><?php echo $order->payer_email; ?></td>
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
           <th class="right">Created</th>
           <td class="left"><?php echo $order->created_at; ?></td>
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

<div class="transaction-log">
    <h3>Transaction Log</h3>
    <?php if($log): ?>
        <table class="table table-condensed table-hover">
            <thead>
                <th>Transaction ID</th>
                <th>Status</th>
                <th>Gateway</th>
                <th>Created</th>
                <th>IPN Request</th>
            </thead>
            <tbody>
                <?php foreach ($log as $log_item): ?>
                    <tr>
                        <td><?php echo $log_item->txn_id; ?></td>
                        <td><?php echo $log_item->status; ?></td>
                        <td><?php echo $log_item->gateway; ?></td>
                        <td><?php echo $log_item->created_at; ?></td>
                        <td>
                            <?php if($log_item->ipn_request): ?>
                                <div class="ipn-req"><?php echo $log_item->ipn_request; ?></div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>
</div>
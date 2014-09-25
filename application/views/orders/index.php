<h1>Manage Orders</h1>

<?php echo $this->session->flashdata('message'); ?>

<?php if($orders): ?>
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Payer Email</th>
                <th>Order Amount</th>
                <th>Paid Amount</th>
                <th>Currency</th>
                <th>Status</th>
                <th>Paid At</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order->full_name; ?></td>
                    <td><?php echo $order->email; ?></td>
                    <td><?php echo $order->payer_email; ?></td>
                    <td><?php echo $order->order_amount; ?></td>
                    <td><?php echo $order->paid_amount; ?></td>
                    <td><?php echo $order->payment_currency; ?></td>
                    <td><?php echo $order->status; ?></td>
                    <td><?php echo $order->paid_at; ?></td>
                    <td><?php echo anchor('orders/view/'.$order->order_id, 'View'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No records found.</p>
<?php endif; ?>
<div class="pagination">
    <?php echo $this->pagination->create_links(); ?>
</div>
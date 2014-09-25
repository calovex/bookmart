<h1>Dashboard</h1>
<?php echo $this->session->flashdata('message'); ?>

<div class="my-ebooks">
    <h3 class="dash-header">My Ebooks</h3>
    <?php if($ebooks): ?>
        <table>
            <thead>
                <th>Title</th>
                <th>Download Link</th>
            </thead>
            <tbody>
                <?php foreach ($ebooks as $ebook): ?>
                    <tr>
                        <td><?php echo anchor('product/view/'.$ebook->product_id.'/'.$ebook->slug, $ebook->title); ?></td>
                        <td><?php echo anchor('download/'.$ebook->product_id.'/'.$ebook->name, 'Download', 'target="_blank"'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>
</div>

<div class="my-orders">
    <h3 class="dash-header">My Orders</h3>
    <?php if($orders): ?>
        <table>
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Order Amount</th>
                <th>Paid Amount</th>
                <th>Currency</th>
                <th>Date</th>
                <th>Status</th>
                <th>Details</th>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $order->full_name; ?></td>
                        <td><?php echo $order->email; ?></td>
                        <td><?php echo $order->order_amount; ?></td>
                        <td><?php echo $order->paid_amount; ?></td>
                        <td><?php echo $order->payment_currency; ?></td>
                        <td><?php echo $order->paid_at; ?></td>
                        <td><?php echo $order->status; ?></td>
                        <td><?php echo anchor('orders/details/'.$order->order_id, 'View'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>
</div>
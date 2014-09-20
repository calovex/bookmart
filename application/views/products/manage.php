<h1>Manage Products</h1>

<?php echo $this->session->flashdata('message'); ?>

<?php if($products): ?>
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>Title</th>
				<th>Type</th>
				<th>Price</th>
				<th>Weightage</th>
				<th>Views</th>
				<th>Created at</th>
				<th>Updated at</th>
				<th>Ebooks</th>
				<th>Details</th>
				<th>Images</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($products as $product): ?>
				<tr>
					<td><?php echo anchor('product/'.$product->product_id.'/'.$product->slug, $product->title); ?></td>
					<td><?php echo $product->service_type; ?></td>
					<td><?php echo $product->sale_price; ?></td>
					<td><?php echo $product->weightage; ?></td>
					<td><?php echo $product->views; ?></td>					
					<td><?php echo $product->created_at; ?></td>
					<td><?php echo $product->updated_at; ?></td>
					<td><?php echo anchor('products/ebooks/'.$product->product_id, 'Edit'); ?></td>
					<td><?php echo anchor('products/edit/'.$product->product_id, 'Edit'); ?></td>
					<td><?php echo anchor('products/images/'.$product->product_id, 'Edit'); ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
<div class="pagination">
	<?php echo $this->pagination->create_links(); ?>
</div>
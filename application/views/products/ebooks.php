<h1>
	Manage Ebooks <?php echo ($product_name) ? '- '.$product_name : ''; ?>
	<span>
		<?php echo anchor('products/images/'.$product_id, ' | Images'); ?>
	</span>
	<span>
		<?php echo anchor('products/edit/'.$product_id, ' | Details'); ?>
	</span>
</h1>

<?php echo $this->session->flashdata('message'); ?>

<?php echo form_open_multipart('products/ebooks/'.$product_id); ?>
	<ul class="form">
		<li>
			Ebook (max size: 2MB file types: epub, pdf, doc, docx): <br><br>
			<input type="file" name="userfile" id="userfile" size="20">
			<?php echo ($_POST) ? '<div class="error">'.$errors.'</div>' : ''; ?>
		</li>
		<li>
			<?php echo form_submit('submit', 'Upload', 'class="input-btn"'); ?>
		</li>
	</ul>
<?php echo form_close(); ?>

<?php if($ebooks): ?>
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>Ebook</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($ebooks as $ebook): ?>
				<tr>
					<td><?php echo anchor('uploads/books/'.$ebook->name, $ebook->name); ?></td>
					<td><?php echo anchor('products/delete_ebook/'.$ebook->products_ebooks_id, 'Delete', 'class="confirm"'); ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
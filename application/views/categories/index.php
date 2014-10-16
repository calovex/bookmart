<h1>
    Manage Categories 
    <span class="new-category">
        <?php echo anchor('categories/create', ' - New Category'); ?>
    </span>
</h1>

<?php echo $this->session->flashdata('message'); ?>

<?php if($categories): ?>
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Weightage</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo $category->name; ?></td>
                    <td><?php echo $category->status ? 'Enabled' : 'Disabled'; ?></td>
                    <td><?php echo $category->weightage; ?></td>
                    <td><?php echo $category->created_at; ?></td>
                    <td><?php echo $category->updated_at; ?></td>
                    <td><?php echo anchor('categories/edit/'.$category->category_id, 'Edit'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<div class="pagination">
    <?php echo $this->pagination->create_links(); ?>
</div>

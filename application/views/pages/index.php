<h1>Manage Pages</h1>

<?php echo $this->session->flashdata('message'); ?>

<?php if($pages): ?>
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Updated</th>
                <th>Views</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pages as $pages): ?>
                <tr>
                    <td><?php echo $pages->title; ?></td>
                    <td><?php echo $pages->updated_at; ?></td>
                    <td><?php echo $pages->views; ?></td>
                    <td><?php echo anchor('pages/edit/'.$pages->page_id, 'Edit'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<div class="pagination">
    <?php echo $this->pagination->create_links(); ?>
</div>

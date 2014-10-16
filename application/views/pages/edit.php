<h1>Edit Page - <?php echo $page->title; ?></h1>

<?php echo $this->session->flashdata('message'); ?>

<?php echo form_open('pages/edit/'.$page->page_id); ?>
    <ul class="form">
        <li>
            Title: *<br>
            <?php echo form_input('title', set_value('title', $page->title), 'class="large"'); ?>
            <?php echo form_error('title'); ?>
        </li>
        <li>
            Meta Keywords: <br>
            <?php echo form_input('meta_keywords', set_value('meta_keywords', $page->meta_keywords), 'class="large"'); ?>
            <?php echo form_error('meta_keywords'); ?>
        </li>
        <li>
            Meta Description: <br>
            <?php echo form_input('meta_desc', set_value('meta_desc', $page->meta_desc), 'class="large"'); ?>
            <?php echo form_error('meta_desc'); ?>
        </li>
        <li>
            Description: *<br>
            <?php echo form_textarea('desc', set_value('desc', $page->desc), 'class="xlarge"'); ?>
            <?php echo form_error('desc'); ?>
        </li>
        <li>
            <?php echo form_submit('submit', 'Update page', 'class="input-btn"'); ?>
        </li>
    </ul>
<?php echo form_close(); ?>

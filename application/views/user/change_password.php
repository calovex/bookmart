<h1>Change Password</h1>

<?php echo $this->session->flashdata('message'); ?>

<?php echo form_open('login/change_password'); ?>
    <ul class="form">
        <li>
            Password: <br>
            <?php echo form_password('password'); ?>
            <?php echo form_error('password'); ?>
        </li>
        <li>
            Retype Password: <br>
            <?php echo form_password('confirm_password'); ?>
            <?php echo form_error('confirm_password'); ?>
        </li>
        <li>
            <?php echo form_submit('submit', 'Change Password', 'class="input-btn"'); ?>
        </li>
    </ul>
<?php echo form_close(); ?>

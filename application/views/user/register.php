<h1>Create a Bookmart Account !</h1>
    
<?php echo form_open('register'); ?>
    <ul class="form">
        <li>
            First Name: *<br>
            <?php echo form_input('first_name', set_value('first_name')); ?>
            <?php echo form_error('first_name'); ?>
        </li>
        <li>
            Last Name: *<br>
            <?php echo form_input('last_name', set_value('last_name')); ?>
            <?php echo form_error('last_name'); ?>
        </li>
        <li>
            Country: *<br>
            <?php echo form_dropdown('country', $countries, $this->input->post('country')); ?>
            <?php echo form_error('country'); ?>
        </li>
        <li>
            City: *<br>
            <?php echo form_input('city', set_value('city')); ?>
            <?php echo form_error('city'); ?>
        </li>
        <li>
            Email: *<br>
            <?php echo form_input('email', set_value('email')); ?>
            <?php echo form_error('email'); ?>
        </li>
        <li>
            Password: *<br>
            <?php echo form_password('password'); ?>
            <?php echo form_error('password'); ?>
        </li>
        <li>
            Confirm Password: *<br>
            <?php echo form_password('confirm_password'); ?>
            <?php echo form_error('confirm_password'); ?>
        </li>
        <li>
            <?php echo form_checkbox('terms1', 'terms1', set_checkbox('terms1', 'terms1')); ?>
            * Click to agrees to terms of use.
            <?php if(form_error('terms1')): ?>
                <div class="error">
                    You should accept the terms of service.
                </div>
            <?php endif; ?>
        </li>
        <li>
            <?php echo form_submit('submit', 'Register', 'class="input-btn"'); ?>
        </li>
    </ul>
<?php echo form_close(); ?>

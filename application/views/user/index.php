<h1>Manage Users</h1>

<?php echo $this->session->flashdata('message'); ?>

<?php if($users): ?>
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Location</th>
                <th>Phone</th>
                <th>Birthday</th>
                <th>Joined</th>
                <th>Access</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user->first_name .' '.$user->last_name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->country . ' - ' . $user->city; ?></td>
                    <td><?php echo $user->phone; ?></td>
                    <td><?php echo $user->dob; ?></td>
                    <td><?php echo $user->joined; ?></td>
                    <td>
                        <?php if($user->blocked): ?>
                            <?php echo anchor('users/unblock/'.$user->user_id, 'Unblock', 'class="confirm"'); ?>
                        <?php else: ?>
                            <?php echo anchor('users/block/'.$user->user_id, 'Block', 'class="confirm"'); ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<div class="pagination">
    <?php echo $this->pagination->create_links(); ?>
</div>

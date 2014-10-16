<h1>Payment Confirmation</h1>
<p>
    Thank you for the payment, you will be redirected to the dashboard in 10 seconds.
</p>
<div class="spacer">
    <?php echo anchor('/dashboard', 'Dashboard', 'class="input-btn light"'); ?>
</div>

<script>
    redirect_to("<?php echo base_url('dashboard'); ?>", 5000);
</script>

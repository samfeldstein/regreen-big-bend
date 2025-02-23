<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
    <input type="text" name="name" required>
    <input type="email" name="email" required>
    <textarea name="message"></textarea>
    <?php wp_nonce_field('contact_form_submit'); ?>
    <input type="hidden" name="action" value="contact_form_submission">
    <button type="submit">Send</button>
</form>
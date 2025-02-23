<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<header>
  <nav>
    <a href="/">Home</a>
    <a href="/land-for-sale/">Land for Sale</a>
  </nav>
  <h1>Get in Touch</h1>
</header>
<main>
  <form clang="contact" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Your name" required>
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="Your email" required>
    <label for="message">Message</label>
    <textarea name="message" placeholder="Message" required></textarea>
    <?php wp_nonce_field('contact_form_submit'); ?>
    <input type="hidden" name="action" value="contact_form_submission">
    <button type="submit">Send</button>
  </form>
</main>

<?php get_footer(); ?>
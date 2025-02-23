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
<form class="contact" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
      <div><label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" autocomplete="true" required>
      </div>

      <div><label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" autocomplete="true" required>
      </div>

      <div><label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Message" required></textarea>
      </div>

      <?php wp_nonce_field('contact_form_submit'); ?>
      <input type="hidden" name="action" value="contact_form_submission">
      <button type="submit">Send</button>
    </form>
</main>

<?php get_footer(); ?>
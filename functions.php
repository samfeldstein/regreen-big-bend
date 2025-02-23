<?php

function preload_fonts()
{
  ?>
  <link rel="preload" as="font"
    href="<?php echo esc_url(get_template_directory_uri() . '/assets/fonts/subset-JacquesFrancoisShadow-Regular.woff2'); ?>"
    type="font/woff2" crossorigin="anonymous">
  <link rel="preload" as="font"
    href="<?php echo esc_url(get_template_directory_uri() . '/assets/fonts/subset-Nashville.woff2'); ?>" type="font/woff2"
    crossorigin="anonymous">
  <link rel="preload" as="font"
    href="<?php echo esc_url(get_template_directory_uri() . '/assets/fonts/subset-Sexsmith-Regular.woff2'); ?>"
    type="font/woff2" crossorigin="anonymous">
  <?php
}

function load_css()
{
  // Always load reset CSS
  wp_enqueue_style("fonts", get_theme_file_uri("/assets/css/_fonts.css"));
  wp_enqueue_style('reset', get_theme_file_uri("/assets/css/reset.css"));

  // Load page-specific CSS
  if (is_page("home")) {
    wp_enqueue_style("home", get_theme_file_uri("/assets/css/_front-page.css"));
  }

  if (is_page("map")) {
    wp_enqueue_style("modal", get_theme_file_uri("/assets/css/_modal.css"));
  }

  if (is_page("land-for-sale")) {
    wp_enqueue_style("land", get_theme_file_uri("/assets/css/_land.css"));
  }

  if (is_page("contact")) {
    wp_enqueue_style("contact", get_theme_file_uri("/assets/css/_contact.css"));
  }

  if (is_page("success")) {
    wp_enqueue_style("success", get_theme_file_uri("/assets/css/_success.css"));
  }
}

function load_map_modal()
{
  if (is_page("map")) {
    wp_enqueue_script("modal", get_theme_file_uri("/assets/js/modal.js"), array());
  }
}

function dynamic_meta_description()
{
  if (is_singular()) {
    global $post;
    // Use the excerpt or trim the content if no excerpt exists.
    $description = $post->post_excerpt ? $post->post_excerpt : wp_trim_words($post->post_content, 55, '');
  } else {
    $description = get_bloginfo('description');
  }
  echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
}

function enable_page_excerpts()
{
  add_post_type_support('page', 'excerpt');
}

// Contact form
function handle_contact_form()
{
  if (!wp_verify_nonce($_POST['_wpnonce'], 'contact_form_submit')) {
    wp_die('Invalid nonce');
  }

  $name = sanitize_text_field($_POST['name']);
  $email = sanitize_email($_POST['email']);
  $message = sanitize_textarea_field($_POST['message']);

  // Send email
  // $to = array('cgitom@gmail.com', get_option('admin_email'));
  $to = get_option('admin_email');

  $subject = 'New Contact Form Submission';
  $body = "Name: $name\nEmail: $email\nMessage: $message";

  wp_mail($to, $subject, $body);

  // // Redirect back
  wp_redirect(home_url('/success/'));
  exit;
}

// Actions
add_action('wp_enqueue_scripts', 'load_css');
add_action("wp_enqueue_scripts", "load_map_modal");
add_action('wp_head', 'dynamic_meta_description');
add_action('init', 'enable_page_excerpts');
add_action('wp_head', 'preload_fonts');
add_action('admin_post_nopriv_contact_form_submission', 'handle_contact_form');
add_action('admin_post_contact_form_submission', 'handle_contact_form');
add_theme_support('title-tag');
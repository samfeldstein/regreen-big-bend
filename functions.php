<?php
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
    wp_enqueue_style("modal", get_theme_file_uri("/assets/css/_land.css"));
  }
}

function load_map_modal()
{
  if (is_page("map")) {
    wp_enqueue_script("modal", get_theme_file_uri("/assets/js/modal.js"), array());
  }
}

// Actions
add_action('wp_enqueue_scripts', 'load_css');
add_action("wp_enqueue_scripts", "load_map_modal");
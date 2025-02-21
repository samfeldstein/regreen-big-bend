<?php

// Load css reset
function load_css_reset()
{
  wp_enqueue_style(
    'reset',
    get_theme_file_uri("/assets/css/reset.css")
  );
}

function load_modal_css()
{
  if (is_page("map")) {
    wp_enqueue_style("modal", get_theme_file_uri("/assets/css/_modal.css"));
  }

}

function load_map_modal()
{
  if (is_page("map")) {
    wp_enqueue_script("modal", get_theme_file_uri("/assets/js/modal.js"), array());
  }
}

// Actions
add_action('wp_enqueue_scripts', 'load_css_reset');
add_action("wp_enqueue_scripts", "load_modal_css");
add_action("wp_enqueue_scripts", "load_map_modal");
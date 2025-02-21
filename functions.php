<?php

function load_css()
{
  wp_enqueue_style(
    'reset',
    get_theme_file_uri("/assets/css/reset.css")
  );
}

add_action('wp_enqueue_scripts', 'load_css');
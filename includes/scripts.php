<?php
function scripts_styles()
{
  $ver = defined('WP_DEBUG') && WP_DEBUG === true ? time() : '1.04';

  wp_enqueue_style('main-css', get_template_directory_uri() . '/dist/bundle.css', array(), $ver);
  wp_enqueue_style( 'slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), $static_version );

  
  wp_enqueue_script( 'autosize', 'https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js', array( 'jquery' ), '1.7.2', true );
  wp_enqueue_script( 'cookies', 'https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js', array( 'jquery' ), '1.7.2', true );
  wp_enqueue_script('main-js', get_template_directory_uri() . '/dist/bundle.js', array('jquery'), $ver, true);

  wp_localize_script('main-js', 'variables', array('ajaxUrl' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'scripts_styles');

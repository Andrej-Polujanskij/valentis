<?php
// enquee scripts and styles
include('includes/scripts.php');
include('includes/disable_comments.php');

// create post types and taxonomies if needed
include('includes/post_types.php');

// add post thumbnails with sizes
add_theme_support('post-thumbnails');
if (function_exists('add_image_size')) {
  add_image_size('thumbas', 500, 500, false);
  add_image_size('aboutIMG', 800, 600, false);
  add_image_size('aboutIMGdouble', 1600, 1200, false);
  add_image_size('icon', 50, 50, false);
  add_image_size('big_icon', 90, 90, false);
  add_image_size('quality_icon', 120, 80, false);
  add_image_size('product_image', 190, 190, false);
  add_image_size('product_image__inner', 406, 406, false);
  add_image_size('single_news', 700, 550, false);
  add_image_size('single_news_inner', 1000, 750, false);
}

// custom function for returning excerpt from post
function excerpt($limit)
{
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt) >= $limit) {
    array_pop($excerpt);
    $excerpt = implode(" ", $excerpt) . '...';
  } else {
    $excerpt = implode(" ", $excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
  return $excerpt;
}

// get image url from attachment id
function get_correct_image_link_thumb($thumb_id = '', $size = 'large')
{

  if ($thumb_id != '') {
    $imagepermalink = wp_get_attachment_image_src($thumb_id, $size, true);
  } else {
    $imagepermalink[0] = get_stylesheet_directory_uri() . '/images/cover.jpg';
  }
  return $imagepermalink[0];
}

// disable admin bar if needed
show_admin_bar(false);

// get url by page template
function get_about_page_url(){
  $page_var = get_pages(array(
      'meta_key' => '_wp_page_template',
      'meta_value' => 'template-about.php'
  ));
  return get_permalink($page_var[0]->ID);
}

function get_products_page_url(){
  $page_var = get_pages(array(
      'meta_key' => '_wp_page_template',
      'meta_value' => 'template-products.php'
  ));
  return get_permalink($page_var[0]->ID);
}

function get_services_page_url(){
  $page_var = get_pages(array(
      'meta_key' => '_wp_page_template',
      'meta_value' => 'template-services.php'
  ));
  return get_permalink($page_var[0]->ID);
}

function get_science_page_url(){
  $page_var = get_pages(array(
      'meta_key' => '_wp_page_template',
      'meta_value' => 'template-science.php'
  ));
  return get_permalink($page_var[0]->ID);
}

function get_policy_page_url(){
  $page_var = get_pages(array(
      'meta_key' => '_wp_page_template',
      'meta_value' => 'template-p_policy.php'
  ));
  return get_permalink($page_var[0]->ID);
}
function get_news_page_url(){
  $page_var = get_pages(array(
      'meta_key' => '_wp_page_template',
      'meta_value' => 'template-news.php'
  ));
  return get_permalink($page_var[0]->ID);
}

//Search product function
function template_chooser($template)   
{    
  global $wp_query;
//  $post_type = get_query_var('post_type');
  if( $wp_query->is_search  )
  {
    return locate_template('product-search.php');
  }
  return $template;
}
add_filter('template_include', 'template_chooser');

// Create ACF options page
if (function_exists('acf_add_options_sub_page')) {
  acf_add_options_sub_page('Options');
}

// Create wordpress menu locations
function register_theme_menus()
{
  register_nav_menus(array(
    'header-menu' => __('Header menu')
  ));
}

add_action('init', 'register_theme_menus');

// AJAX function
add_action('wp_ajax_send_contact_form_message',        'send_contact_form_message');
add_action('wp_ajax_nopriv_send_contact_form_message', 'send_contact_form_message');
function send_contact_form_message(){
    $to = get_option('admin_email');
    // print_r($_POST);

    $message ='
        Name: '.$_POST['name'].' <br />
        Email: '.$_POST['email'].' <br />
        Message: '.$_POST['message'].' <br />
    ';

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From:  '.$_POST['email'].'',
        'Reply-To: <'.$_POST['email'].'>'
    );

    $subject = 'Valentis message';

   wp_mail($to, $subject, $message, $headers);

    die();
}

add_action('wp_ajax_subscribe_email',        'subscribe_email');
add_action('wp_ajax_nopriv_subscribe_email', 'subscribe_email');
function subscribe_email(){
    $to = get_option('admin_email');
    print_r($_POST);

    $message ='
        Email: '.$_POST['subscribe_news'].' <br />
    ';

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From:  '.$_POST['subscribe_news'].'',
        'Reply-To: <'.$_POST['subscribe_news'].'>'
    );

    $subject = 'Subscribe newsletter';

   wp_mail($to, $subject, $message, $headers);

    die();
}

  // Load more products
add_action('wp_ajax_load_more_products',        'load_more_products');
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products');
function load_more_products() {


   if( $_POST['terID'] ) {
      $product = array(
          'post_type' => 'products',
          'posts_per_page' => 4,
          'offset' => $_POST['number'],
          'tax_query' => array(
              array(
                  'taxonomy' => 'categories',
                  'field' => 'term_id',
                  'terms' => $_POST['terID']
              )
          )
      );
   }else{
       $product = array(
           'post_type' => 'products',
           'posts_per_page' => 4,
           'offset' => $_POST['number'],
       );
   }
  $products = new WP_Query($product);

  $productArr= [];

  if($products->have_posts()) : 
  while($products->have_posts()) : 
      $products->the_post();


      $title = get_the_title();

      $productArr[] = [
        'title' => get_the_title(),
        'image' => get_correct_image_link_thumb(get_field('product_image'), 'product_image' ),
        'sub_title' => get_field('product_sub_title'),
        'is_new' => get_field('product_new'),
        'url' => get_the_permalink()
      ];

 endwhile;
 endif;
 wp_reset_query();

  echo json_encode($productArr);
  die();
}


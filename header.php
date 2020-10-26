<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=9;IE=10;IE=Edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/src/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/src/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/src/images/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/src/images/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/src/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="<?php echo get_template_directory_uri(); ?>/src/images/favicon#da532c">
  <meta name="theme-color" content="#ffffff">

  <meta property="fb:app_id"        content="APPID"/>
  <meta property="og:url"           content="<?php echo get_permalink(); ?>" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content=" <?php echo get_bloginfo('name') ?> " />
  <meta property="og:description"   content="<?php if (is_front_page()) {
                                                  echo get_bloginfo('name');
                                                } else {
                                                  echo get_bloginfo('name') . ' | ';
                                                  wp_title('', true, 'right');
                                                } ?>" />
  <meta property="og:image"         content=" <?php if (is_front_page()) {
                 echo get_correct_image_link_thumb(get_field('header_logo', 'option'), 'thumbas');
                                                } elseif(is_single()) {
                echo get_correct_image_link_thumb(get_field('product_image'), 'product_image__inner' ); 
                                                } ?> "/>

  <title>
    <?php if (is_front_page()) {
      echo get_bloginfo('name');
    } else {
      echo get_bloginfo('name') . ' | ';
      wp_title('', true, 'right');
    } ?>
  </title>
  <?php wp_head(); ?>
</head>

<header>
  <div class="header">
    <div class="container">
      <a href="<?php echo get_option("siteurl"); ?>">
        <div class="header-left logo"
          style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('header_logo', 'option'), 'thumbas'); ?>)">
        </div>
      </a>

      <div class="header-right">
        <div class="header-right__search"></div>

        <div class="header-right__burger"></div>

        <div class="header-right__select select">
          <?php if( have_rows('country_list', 'option')): ?>
          <select name="" id="country" class="contry">
            <option placeholder>Global</option>

            <?php while(have_rows('country_list', 'option')): the_row(); ?>
            <option value="<?php the_sub_field('coutry_name'); ?>"><?php the_sub_field('coutry_name'); ?></option>

            <?php endwhile; ?>
          </select>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>

  <div class="drop-container search-container">
    <div class="container">
      <div class="drop-container__header">
        <a href="<?php echo get_option("siteurl"); ?>">
          <div class="logo"
            style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('header_logo', 'option'), 'thumbas'); ?>)">
          </div>
        </a>
        <div class="drop-container__header___out search-container__header___out"></div>
      </div>

      <div class="drop-container__content search-container__content">
        <div class="search-container__row">
          <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
            <div class="search-container__input">
              <input type="text" name="s" placeholder="Search by keyword...">
<!--              <input type="hidden" name="post_type" value="products" />-->
            </div>

            <div class="search-container__btn">
              <div class="section-btn">
                <div class="section-btn__text">Search</div>
                <a onclick="document.getElementById('searchform').submit()">
                  <div class="section-btn__circle section-btn__circle---big">
                    <div class="section-btn__circle___red"></div>
                    <div class="section-btn__circle___search"></div>
                  </div>
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="drop-container mobile-menu-container">
    <div class="container">
      <div class="drop-container__header">
        <a href="<?php echo get_option("siteurl"); ?>">
          <div class="logo"
            style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('header_logo', 'option'), 'thumbas'); ?>)">
          </div>
        </a>

        <div class="drop-container__header---right">
          <div class="header-right__search"></div>
          <div class="drop-container__header___out mobile-menu__header___out"></div>
        </div>

      </div>

      <div class="drop-container__content mobile-menu__content">
        <div class="navigation">
          <div class="navigation-item navigation-item__menu">
            <nav>

              <?php wp_nav_menu(array( 
                'container'  => '<ul></ul>',
                'menu_class' => 'meniuitem menu-menu',
                'theme_location' => 'header-menu'
              )); ?>

            </nav>
          </div>

          <div class="navigation-item">
            <div class="navigation-item__title">
              <?php the_field('country_list_title', 'option'); ?>
            </div>
            <?php if( have_rows('country_list', 'option')): ?>
            <ul>
              <?php while(have_rows('country_list', 'option')): the_row(); ?>
              <li>
                <a href="">
                  <?php the_sub_field('coutry_name'); ?>
                </a>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>

          </div>

          <div class="navigation-item">
            <div class="navigation-item__title">
              <?php the_field('terms_title', 'option'); ?>
            </div>
            <ul>
              <li>
                <a href=""><?php the_field('terms_link_text', 'option'); ?></a>
              </li>
            </ul>
          </div>

          <div class="navigation-item">
            <div class="navigation-item__title">
              <?php the_field('follow_us_title', 'option'); ?>
            </div>
            <?php if( have_rows('soc_networks', 'option')): ?>
            <ul>
              <?php while(have_rows('soc_networks', 'option')): the_row(); ?>
              <li>
                <a target="_blanc" href="<?php the_sub_field('network_link'); ?>">
                  <?php the_sub_field('network_link_title'); ?>
                </a>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>
          </div>

        </div>

      </div>
    </div>

  </div>
  <!-- </div>
  </div> -->

</header>

<body <?php body_class(); ?>>

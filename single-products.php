<?php get_header(); ?>

<div class="product-inner">

  <div class="product-inner__block product-inner__block---top product-inner__block---left">
    <div class="product-inner__block___content">
      <div class="product-inner__block___image">
        <img src="<?php echo get_correct_image_link_thumb(get_field('product_image'), 'product_image__inner' ); ?>"
          alt="">
      </div>

      <div class="product-inner__share">
        <div class="product-inner__share-text">
          <?php the_field('product_share_block', 'option') ?>
        </div>

        <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/">
          <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>">
            <div class="product-inner__share-item">
              <div class="product-inner__share-logo product-inner__share-logo---fb"></div>
            </div>
          </a>
        </div>

        <div class="in-share-button">
          <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>">
            <div class="product-inner__share-item">
              <div class="product-inner__share-logo product-inner__share-logo---in"></div>
            </div>
          </a>
        </div>
        <!-- <div class="product-inner__share-item">
          <div class="product-inner__share-logo product-inner__share-logo---insta"></div>
        </div> -->
      </div>
    </div>
  </div>

  <div class="product-inner__block product-inner__block---top product-inner__block---right">
    <div class="product-inner__block___content product-inner__block___content---right">

      <div class="hero__nav">
        <a href="<?php echo get_option("siteurl"); ?>">Home</a>
        <div class="hero__nav___arrow"></div>

        <a href="<?php echo get_products_page_url(); ?>">Products</a>
        <div class="hero__nav___arrow"></div>

        <a href="
        <?php 
          global $wp;
          echo home_url( $wp->request )
        ?>
        "><?php the_title(); ?>
        </a>
      </div>

      <div class="product-inner__title">
        <h1><?php the_title(); ?></h1>
        <h2><?php the_field('product_sub_title'); ?></h2>
      </div>

      <div class="product-inner__kind">
        <?php the_field('product_kind'); ?>
      </div>

      <div class="product-inner__sort-description">
        <?php the_field('product_short_description'); ?>
      </div>

      <div class="product-inner__benefits">
        <?php if( have_rows('product_benefits_list' )): ?>
        <ul>
          <?php while(have_rows('product_benefits_list')): the_row(); ?>
          <li>
            <div class="product-inner__benefits___icon"></div>
            <div class="product-inner__benefits___text">
              <?php the_sub_field('product_benefits_text'); ?>
            </div>
          </li>

          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
      </div>

      <div class="product-inner__links">
<?php
  $byNow = get_field('product_by_now_link');
 if($byNow) {?>
        <div class="section-btn product-inner__links---btn">
          <div class="section-btn__text"><?php the_field('product_buy_now_text', 'options'); ?></div>
          <a target="_blank" href="<?php echo $byNow ?>" class="product-inner__links---buy">
            <div class="section-btn__circle">
              <div class="section-btn__circle___red"></div>
              <div class="section-btn__circle___arrow"></div>
            </div>
          </a>
        </div>
<?php }
$website = get_field('product_website_link');
 if($website) {
 ?>
        <div class="links-item product-inner__links---visit">
          <div class="links-item__link">
            <a target="_blank" href="<?php echo $website ?>"><?php the_field('product_website_text', 'options'); ?></a>
          </div>
          <div class="links-item__icon"></div>
        </div>
<?php } ?>
      </div>

    </div>
  </div>

  <div class="product-inner__block product-inner__block---empty">
    <div class="product-inner__block___content">

    </div>
  </div>

  <div class="product-inner__block ">
    <div class="product-inner__tabs product-inner__tabs---top">
      <div class="product-inner__tabs-title">
        <?php if( have_rows('product_description_list' )): 
          $i = 1;
        ?>
        <ul class="product-tabs">
          <?php while(have_rows('product_description_list')): the_row(); ?>
          <?php if($i == 1){ ?>
          <li class="current" tada-tab="<?php echo $i ?>">
            <?php } else {  ?>
          <li class="" tada-tab="<?php echo $i ?>">
            <?php }?>
            <?php the_sub_field('description_list_button'); ?>
          </li>

          <?php 
          $i++;
        endwhile; ?>
        </ul>
        <?php endif; ?>
      </div>
    </div>
    <div class="product-inner__tabs">
      <div class="product-inner__tabs-content">

        <?php if( have_rows('product_description_list' )): 
          $i = 1;
        ?>
        <?php while(have_rows('product_description_list')): the_row(); ?>
        <?php if($i == 1){ ?>
        <div id="<?php echo $i ?>" class="product-inner__tabs-item current">
          <?php } else {  ?>
          <div id="<?php echo $i ?>" class="product-inner__tabs-item">
            <?php }?>
            <?php the_sub_field('description_list_content'); ?>
          </div>

          <?php 
          $i++;
        endwhile; ?>
          <?php endif; ?>

        </div>
      </div>
    </div>

  </div>

  <section>
    <div class="product-inner---section">

      <div class="container">
        <div class="inner-section__title">
          <h2><?php the_field('section_title', 'option'); ?></h2>
        </div>
      </div>
    </div>

    <div class="kind_list products-page__list">
      <?php 
        $product = array('post_type' => 'products',
                         'posts_per_page' => 4,
                         'post__not_in' => array($post->ID) 
                        );
        $products = new WP_Query($product);

        if($products->have_posts()) : 
        while($products->have_posts()) : 
            $products->the_post();
      ?>


      <div class="kind_list__item single-product">
        <a href="<?php the_permalink(); ?>">
          <div class="single-product__row ">
            <?php if(get_field('product_new')){ ?>
            <div class="single-product__new">
              New
            </div>
            <?php } ?>
          </div>

          <div class="single-product__row ">
            <div class="single-product__image">
              <img src="<?php echo get_correct_image_link_thumb(get_field('product_image'), 'product_image' ); ?>"
                alt="">
            </div>
          </div>

          <div class="single-product__row">
            <div class="single-product__name">
              <div class="single-product__name___title">
                <?php the_title(); ?>
              </div>
              <div class="single-product__name___sub-title">
                <?php the_field('product_sub_title'); ?>
              </div>
            </div>

            <div class="section-btn single-product__btn">
              <div class="section-btn__circle ">
                <div class="section-btn__circle___red"></div>
                <div class="section-btn__circle___arrow"></div>
              </div>
            </div>
          </div>

        </a>
      </div>

      <?php
       endwhile;
       endif;
    ?>

    </div>
  </section>


  <?php get_footer(); ?>
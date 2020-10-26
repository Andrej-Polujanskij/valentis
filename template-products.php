<?php
/* Template name: Products */
get_header(); ?>
  <div class="hero hero---inner_page products-page---inner"
       style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('section_background_image'), 'full'); ?>)">
    <video autoplay muted loop class="video">
      <source src="<?php the_field('background_video'); ?>" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
    <div class="container">

      <div class="hero__container">

        <div class="hero__nav">
          <a href="<?php echo get_option("siteurl"); ?>">Home</a>
          <div class="hero__nav___arrow"></div>

          <a href="
        <?php
          global $wp;
          echo home_url($wp->request)
          ?>
        "><?php the_title(); ?>
          </a>
        </div>

        <div class="hero__title hero__title---inner">
          <h1>
              <?php the_field('section_title'); ?>
          </h1>
        </div>

        <div class="header-right__select select products-filter">
          <div class="products-filter__title">
              <?php the_field('search_select_head_text') ?>
          </div>
            <?php
            $allCateg = get_terms([
                'taxonomy' => 'categories',
                'hide_empty' => true,
            ]);

            ?>

            <?php if (sizeof($allCateg) > 0): ?>
              <form id="filter-form" action="<?php echo get_products_page_url(); ?>" method="get" id="filter-form">
                <select name="filter" id="products" class="contry">
                    <?php if (!$_GET['filter']) { ?>
                      <option placeholder>All products</option>
                        <?php
                    } else {
                        ?>
                      <option placeholder><?php echo $_GET['filter'] ?></option>
                        <?php
                    }
                    ?>
                    <?php foreach ($allCateg as $singleCat) { ?>
                      <option value="<?php echo $singleCat->name ?>">
                          <?php echo $singleCat->name ?>
                      </option>
                    <?php } ?>
                </select>
              </form>
            <?php endif; ?>


        </div>

      </div>

    </div>
  </div>

  <section class="products-page">

    <div class="kind_list products-page__list">
        <?php

        if (!$_GET['filter']) {

            $product = array('post_type' => 'products', 'posts_per_page' => 4,);
            $products = new WP_Query($product);

            if ($products->have_posts()) :
                while ($products->have_posts()) :
                    $products->the_post();
                    ?>
                  <div class="kind_list__item single-product">

                    <a href="<?php the_permalink(); ?>">
                      <div class="single-product__row ">
                          <?php if (get_field('product_new')) { ?>
                            <div class="single-product__new">
                              New
                            </div>
                          <?php } ?>
                      </div>
                      <div class="single-product__row ">
                        <div class="single-product__image">
                          <img
                              src="<?php echo get_correct_image_link_thumb(get_field('product_image'), 'product_image'); ?>"
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
            wp_reset_query();
        } else {
//
            $termID = get_term_by('name', $_GET['filter'], 'categories');

            $product = array(
                'post_type' => 'products',
                'posts_per_page' => 4,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categories',
                        'field' => 'term_id',
                        'terms' => $termID->term_id

                    )
                )
            );

            $products = new WP_Query($product);

            if ($products->have_posts()) :
                while ($products->have_posts()) :
                    $products->the_post();
                    ?>
                  <div class="kind_list__item single-product">

                    <a href="<?php the_permalink(); ?>">
                      <div class="single-product__row ">
                          <?php if (get_field('product_new')) { ?>
                            <div class="single-product__new">
                              New
                            </div>
                          <?php } ?>
                      </div>
                      <div class="single-product__row ">
                        <div class="single-product__image">
                          <img
                              src="<?php echo get_correct_image_link_thumb(get_field('product_image'), 'product_image'); ?>"
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
            wp_reset_query();

        }
        ?>

    </div>


    <div class="products-page__more">
      <div class="section-btn section-btn__more">
        <div class="section-btn__text"><?php the_field('load_more_button_text'); ?></div>
        <a class="load-products" term-data="<?php echo $termID->term_id; ?>">
          <div class="section-btn__circle">
            <div class="section-btn__circle___red"></div>
            <div class="section-btn__circle___plus"></div>
          </div>
        </a>
      </div>
    </div>

  </section>

<?php get_footer(); ?>
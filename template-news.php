<?php 
  /* Template name: News */
get_header(); ?>
<div class="hero hero---inner_page"
  style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('section_background_image'), 'full'); ?>)">
  <div class="container">

    <div class="hero__container">

      <div class="hero__nav">
        <a href="<?php echo get_option("siteurl"); ?>">Home</a>
        <div class="hero__nav___arrow"></div>

        <a href="
          <?php

            global $wp;
            echo home_url( $wp->request )
          ?>
          "><?php the_title(); ?>
        </a>
      </div>

      <div class="hero__title hero__title---inner">
        <h1>
          <?php the_field('section_title'); ?>
        </h1>
      </div>

    </div>

  </div>
</div>



<section class="news">

  <div class="container">
    <div class="news-container">
      <?php 
        $post = array('post_type' => 'post', 'posts_per_page' => 4,);
        $news = new WP_Query($post);

        if($news->have_posts()) : 
        while($news->have_posts()) : 
            $news->the_post();

//            $date = ( new \DateTime($post->post_date))->format("Y m d");
   ?>
      <div class="news_single">
        <a href="<?php the_permalink(); ?>">
          <div class="news_single__image"
            style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('single_news_image'), 'single_news' ); ?>)">
          </div>


          <div class="news_single__text">

            <div class="news_single__title">
              <h3><?php echo wp_trim_words(get_the_title(), 10) ; ?></h3>
            </div>

            <div class="section-btn news_single---btn">
              <div class="section-btn__text">read more</div>
              <a href="<?php the_permalink(); ?>">
                <div class="section-btn__circle">
                  <div class="section-btn__circle___red"></div>
                  <div class="section-btn__circle___arrow"></div>
                </div>
              </a>
            </div>
            
          </div>
        </a>

      </div>

      <?php
       endwhile;
       endif;
       wp_reset_query();
    ?>
    </div>
  </div>

  <div class="products-page__more news_single---more">
    <div class="section-btn">
      <div class="section-btn__text"><?php the_field('load_more_button_text'); ?></div>
      <a class="load-products">
        <div class="section-btn__circle">
          <div class="section-btn__circle___red"></div>
          <div class="section-btn__circle___plus"></div>
        </div>
      </a>
    </div>
  </div>

</section>

<?php get_footer(); ?>
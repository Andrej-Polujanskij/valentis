<?php get_header(); ?>

<div class="hero hero---inner_page news-inner"
  style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('section_background_image'), 'full'); ?>)">
  <div class="container">

    <div class="hero__container news-inner---container">

      <div class="hero__nav">
        <a href="<?php echo get_option("siteurl"); ?>">Home</a>
        <div class="hero__nav___arrow"></div>

        <a href="<?php echo get_news_page_url(); ?>">News</a>
        <div class="hero__nav___arrow"></div>

        <a href="
        <?php 
          global $wp;
          echo home_url( $wp->request )
        ?>
        ">
          <?php echo wp_trim_words(get_the_title(), 4) ; ?>
        </a>
      </div>

      <div class="hero__title news-inner---title">
        <h1>
          <?php the_title(); ?>
        </h1>
      </div>
      <?php $date = ( new \DateTime($post->post_date))->format("Y-m-d"); ?>
      <div class="news-inner_date">
        <?php echo $date; ?>
      </div>

    </div>

  </div>
</div>


<section class="news-inner__content ">
  <div class="container">
    <div class="hero__container news-inner---container">
      <?php $item1 = get_field('single_news_sub_title_text'); if($item1){ ?>
      <div class="news-inner__content___row">
        <?php echo $item1; ?>
      </div>
      <?php } ?>

      <?php $item2 = get_field('single_news_main_text'); if($item2){ ?>
      <div class="news-inner__content___row">
        <?php echo $item2; ?>
      </div>
      <?php } ?>

      <?php $item3 = get_field('single_news_image'); if($item3){ ?>
      <div class="news-inner__content___row">
        <div class="news-inner__content___image">
          <img src="<?php echo get_correct_image_link_thumb($item3, 'single_news_inner' ); ?>" alt="">
          <div class="news-inner__content___image-author">
            <?php the_field('image_author_name'); ?>
          </div>
        </div>
      </div>
      <?php } ?>

      <?php $item4 = get_field('single_news_extra_text'); if($item4){ ?>
      <div class="news-inner__content___row">
        <?php echo $item4; ?>
      </div>
      <?php } ?>

      <div class="section-btn news-inner---btn">
        <div class="section-btn__text"><?php the_field('all_news_buttom_text', 'option'); ?></div>
        <a href="<?php echo get_news_page_url(); ?>">
          <div class="section-btn__circle">
            <div class="section-btn__circle___red"></div>
            <div class="section-btn__circle___arrow"></div>
          </div>
        </a>
      </div>

    </div>
  </div>
</section>

<section class="news-inner__related ">

    <div class="container">
      <div class="inner-section__title">
        <h2><?php the_field('section_title', 'option'); ?></h2>
      </div>
    </div>
<!--  </div>-->

  <div class="container">
    <div class="news-container news-inner__related---container">
      <?php 
        $post = array('post_type' => 'post', 'posts_per_page' => 2,);
        $news = new WP_Query($post);

        if($news->have_posts()) : 
        while($news->have_posts()) : 
            $news->the_post();

            $date = ( new \DateTime($post->post_date))->format("Y m d");
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
              <div class="section-btn__text">Read more</div>
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

</section>

<?php get_footer(); ?>
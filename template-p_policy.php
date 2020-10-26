<?php
/* Template name: Privacy Policy */
get_header(); ?>
<div class="hero hero---inner_page p_policy-page"
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

<section class="p_policy-page__content">
  <div class="container">
    <?php 
        if( have_rows('private_policy_list')): 
          while(have_rows('private_policy_list')): the_row(); 
      ?>

    <div class="p_policy-page__content___row">
      <div class="p_policy-page__content__title">
        <?php the_sub_field('private_policy_title'); ?>
      </div>

      <?php  if( have_rows('private_policy_text') ):
        while ( have_rows('private_policy_text') ) : the_row();
        if( get_row_layout() == 'text' ):
        ?>

      <div class="p_policy-page__content__text">
        <?php the_sub_field('text'); ?>
      </div>

      <?php  elseif( get_row_layout() == 'list' ):  ?>

      <div class="p_policy-page__content__list">
        <div class="p_policy-page__content__list--title">
          <?php the_sub_field('list_title'); ?>
        </div>
        <div class="p_policy-page__content__list--text">
          <?php the_sub_field('list_text'); ?>
        </div>
      </div>

      <?php
       endif;
     endwhile;
    endif; 
    ?>
    </div>

    <?php 
        endwhile;
        endif; 
      ?>

  </div>
</section>

<?php get_footer(); ?>
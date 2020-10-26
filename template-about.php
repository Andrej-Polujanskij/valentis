<?php
/* Template name: About us */
get_header(); ?>
<div class="hero hero---inner_page"
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

<section class="">
  <div class="inner-section section-about">
    <div class="container">
      <div class="inner-section__title">
        <h2><?php the_field('second_section_title'); ?></h2>
      </div>
    </div>

    <div class="inner-section__wrapper inner-section__wrapper---border">
      <div class="inner-section__wrapper___item">
        <div class="inner-section__wrapper___image"
          style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('second_section_image'), 'full'); ?>)">
        </div>
      </div>
      <div class="inner-section__wrapper___item">
        <div class="inner-section__wrapper___text">
          <?php the_field('second_section_text'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="inner-section inner-section---activities">
    <div class="container">
      <div class="inner-section__title inner-section__title---right ">
        <h2 class="custom--title"><?php the_field('third_section_title'); ?></h2>
      </div>

      <div class="inner-section__content">
        <div class="inner-section__content___item">
          <div class="inner-section__content___inner">

            <div class="slider-content slider-activities">
              <?php if( have_rows('activities_slides')): 
                    while(have_rows('activities_slides')): the_row(); 
              ?>
              <div class="slider-content_slide">
                <div class="slider-content_slide__icon"
                  style="background-image: url(<?php echo get_correct_image_link_thumb(get_sub_field('activities_slide_icon'), 'big_icon'); ?>)">
                </div>
                <div class="slider-content_slide__title"><?php the_sub_field('activities_slide_title'); ?></div>
                <div class="slider-content_slide__text"><?php the_sub_field('activities_slide_text'); ?></div>
              </div>
              <?php
                  endwhile;
                endif;
              ?>
            </div>

            <div class="slider-btns">
              <button class="slider-btns__btn slider-btns__btn---left activities--left">
                <div class="slider-btns__hover"></div>
                <div class="slider-btns__btn___arrow slider-btns__btn___arrow---left"></div>
              </button>
              <button class="slider-btns__btn slider-btns__btn---right activities--right">
                <div class="slider-btns__hover"></div>
                <div class="slider-btns__btn___arrow slider-btns__btn___arrow---right"></div>
              </button>
            </div>

          </div>

        </div>
        <div class="inner-section__content___item slider-activities__image">

          <?php if( have_rows('activities_slides')): 
                  while(have_rows('activities_slides')): the_row(); 
            ?>

          <div class="inner-section__content___image"
            style="background-image: url(<?php echo get_correct_image_link_thumb(get_sub_field('activities_slide_image'), 'aboutIMGdouble'); ?>)">
          </div>

          <?php
              endwhile;
            endif;
          ?>

        </div>
      </div>

    </div>
  </div>
</section>

<section>
  <div class="inner-section inner-section---begining">
    <div class="inner-section__wrapper">
      <div class="inner-section__wrapper___item inner-section__wrapper___item---begining">

        <div class="inner-section__wrapper___text inner-section__wrapper___text---begining">
          <div class="inner-section__title inner-section__title---begining"><?php the_field('fourth_section_title'); ?>
          </div>

          <div class="slider-btns slider-btns---begining">
            <button class="slider-btns__btn slider-btns__btn---left slider-btns__btn---red begining--left">
              <div class="slider-btns__hover slider-btns__hover---white"></div>
              <div class="slider-btns__btn___arrow slider-btns__btn___arrow---left---red"></div>
            </button>
            <button class="slider-btns__btn slider-btns__btn---right slider-btns__btn---red begining--right">
              <div class="slider-btns__hover slider-btns__hover---white"></div>
              <div class="slider-btns__btn___arrow slider-btns__btn___arrow---right---red"></div>
            </button>
          </div>
        </div>

      </div>
      <div class="inner-section__wrapper___item inner-section__wrapper___item---begining_img ">

        <?php if( have_rows('beginings_slides')): 
          while(have_rows('beginings_slides')): the_row(); 
        ?>
        <div class="begining__slide">
          <div class="slider-begining"
            style="background-image: url(<?php echo get_correct_image_link_thumb(get_sub_field('beginings_slides_image'), 'full'); ?>)">
          </div>

          <div class="slider-begining__content">
            <div class="slider-begining__content___years"><?php the_sub_field('beginings_slides_years'); ?></div>
            <div class="slider-begining__content___title"><?php the_sub_field('beginings_slides_title'); ?></div>
            <div class="slider-begining__content___text"><?php the_sub_field('beginings_slides_text'); ?></div>
          </div>
        </div>
        <?php endwhile; 
          endif; ?>

      </div>
    </div>
  </div>
</section>

<section class="inner-section inner-section---standarts">
  <div class="container">
    <div class="inner-section__title inner-section__title---standarts">
      <h2><?php the_field('fifth_section_title'); ?></h2>


      <div class="slider-btns slider-btns---standarts">
        <button class="slider-btns__btn slider-btns__btn---left standarts--left">
          <div class="slider-btns__hover"></div>
          <div class="slider-btns__btn___arrow slider-btns__btn___arrow---left"></div>
        </button>
        <button class="slider-btns__btn slider-btns__btn---right standarts--right">
          <div class="slider-btns__hover"></div>
          <div class="slider-btns__btn___arrow slider-btns__btn___arrow---right"></div>
        </button>
      </div>

    </div>
  </div>

  <div class="slider-container standarts-slider">
    <?php if( have_rows('quality_standart_cards')): 
          while(have_rows('quality_standart_cards')): the_row(); 
    ?>
    <div class="standarts-item">
      <div class="standarts-item__row">
        <div class="standarts-item__row___icon"
          style="background-image: url(<?php echo get_correct_image_link_thumb(get_sub_field('quality_cards_icon'), 'quality_icon'); ?>)">
        </div>
      </div>
      <div class="standarts-item__row">
        <div class="standarts-item__row___name">
          <?php the_sub_field('quality_cards_name'); ?>
        </div>
        <div class="standarts-item__row___text">
          <?php the_sub_field('quality_cards_text'); ?>
        </div>
      </div>
    </div>
    <?php endwhile; 
          endif; ?>
  </div>

</section>

<section class="development">
  <div class="development_bg"
  style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('sixth_section_image'), 'full'); ?>)"
  ></div>
  <div class="container">

    <div class="development-content">
      <div class="development-content__title"><?php the_field('sixth_section_title'); ?></div>
      <div class="development-content__text"><?php the_field('sixth_section_text'); ?></div>
    </div>

  </div>

</section>








<?php get_footer(); ?>
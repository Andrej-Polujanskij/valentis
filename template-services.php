<?php
/* Template name: Services */
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

<section>

  <div class="services-block">
    <div class="container services-block---wrapper">
      <div class="services-block__item services-block__item---image-content">
        <div class="inner-section__wrapper___image"
          style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('second_section_image'), 'aboutIMGdouble'); ?>)">
        </div>
      </div>
      <div class="services-block__item services-block__item---text-content">
        <div class="services-block___title">
          <?php the_field('second_section_title'); ?>
        </div>
        <div class="services-block___text">
          <?php the_field('second_section_text'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="hero contract-block "
  style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('third_section_background_image'), 'full'); ?>)">

  <div class="container">
    <div class="contract-block__title">
      <div class="services-block___title">
        <?php the_field('third_section_title'); ?>
      </div>
      <div class="services-block___text">
        <?php the_field('third_section_text'); ?>
      </div>
    </div>
  </div>

  <div class="contract-block-list">
    <?php 
      if( have_rows('contract_list_')): 
        $count = 1;
        while(have_rows('contract_list_')): the_row(); 
      ?>

    <div class="kind_list__item contract-block-list__item">
      <div class="kind_list__item___text contract-block-list___text">
        <h4>
          <?php the_sub_field('contract_list_title'); ?>
        </h4>
        <?php the_sub_field('contract_list_text'); ?>
      </div>

      <div class="contract-block-list__count contract-block-list__count---<?php echo $count; ?>">
      </div>

    </div>

    <?php 
          $count++;
        endwhile;
        endif; 
      ?>
  </div>

</section>

<section>
  <div class="services-block label-block">
    <div class="container services-block---wrapper label-block---wrapper">
      <div class="services-block__item services-block__item---image-content">
        <div class="inner-section__wrapper___image"
          style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('fourth_section_image'), 'aboutIMGdouble'); ?>)">
        </div>
      </div>

      <div class="services-block__item label-block---text-content">
        <div class="services-block___title">
          <?php the_field('fourth_section_title'); ?>
        </div>
        <div class="services-block___text">
          <?php the_field('fourth_section_text'); ?>
        </div>

        <div class="label-block__list">
          <?php 
          if( have_rows('fourth_section_list')): 
            while(have_rows('fourth_section_list')): the_row(); 
          ?>

          <div class="label-block__list___item">
            <div class="label-block__list___title">
              <?php the_sub_field('fourth_section_list_title'); ?>
            </div>
            <div class="label-block__list___text">
              <?php the_sub_field('fourth_section_list_text'); ?>
            </div>
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
  <div class="inner-section packaging-block">
    <div class="container">
      <div class="inner-section__title ">
        <h2><?php the_field('fifth_section_title'); ?></h2>
      </div>
    </div>
  </div>

  <div class="contract-block-list packaging-block-list">
    <?php 
      if( have_rows('fifth_section_list')): 
        while(have_rows('fifth_section_list')): the_row(); 
      ?>

    <div class="kind_list__item contract-block-list__item packaging-block-list__item">

      <div class="packaging-block-list___icon"
        style="background-image: url(<?php echo get_correct_image_link_thumb(get_sub_field('fifth_section_list_icon'), 'big_icon'); ?>)">
      </div>

      <div class="kind_list__item___text contract-block-list___text packaging-block-list___text">
        <h4>
          <?php the_sub_field('fifth_section_list_title'); ?>
        </h4>
        <?php the_sub_field('fifth_section_list_text'); ?>
      </div>

    </div>

    <?php 
        endwhile;
        endif; 
      ?>
  </div>

</section>

<section class="servicies logistics"
  style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('sixth_section_background_image'), 'full'); ?>)">
  <div class="container">
    <div class="inner-section__title inner-section__title---science logistics__title">
      <h2><?php the_field('six_section_title'); ?></h2>
      <?php the_field('six_section_text'); ?>
    </div>


    <div class="servicies-body logistics-list">
      <?php 
      if( have_rows('logistics_list_')): 
        while(have_rows('logistics_list_')): the_row(); 
    ?>
      <div class="servicies-body__item logistics-list__item">
        <div class="servicies-body__item___logo"
          style="background-image: url(<?php echo get_correct_image_link_thumb(get_sub_field('logistics_list_icon'), 'big_icon'); ?>)">
        </div>
        <div class="servicies-body__item___title">
          <h3>
            <?php the_sub_field('logistics_list_title'); ?>
          </h3>
        </div>
        <div class="servicies-body__item___text">
          <?php the_sub_field('logistics_list_text'); ?>
        </div>
      </div>
      <?php 
        endwhile;
      endif; 
    ?>
    </div>

  </div>
</section>

<?php get_footer(); ?>
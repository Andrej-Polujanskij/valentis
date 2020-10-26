<?php
/* Template name: Homepage */
get_header(); ?>
<div class="hero homepage-hero"
  style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('section_background_image'), 'full'); ?>)">

  <video autoplay muted loop class="video">
    <source src="<?php the_field('background_video'); ?>" type="video/mp4">
    Your browser does not support HTML5 video.
  </video>

  <div class="container">

    <div class="hero__container">
      <div class="hero__title">
        <h1>
          <?php the_field('section_title'); ?>
        </h1>
      </div>

      <div class="section-btn">
        <div class="section-btn__text"><?php the_field('section_button_text') ?></div>
        <a href="<?php echo get_science_page_url(); ?>">
          <div class="section-btn__circle">
            <div class="section-btn__circle___red"></div>
            <div class="section-btn__circle___arrow"></div>
          </div>
        </a>
      </div>

    </div>

    <div class="homepage-hero__icon"
      style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('section_small_icon'), 'thumbas'); ?>)">
    </div>
  </div>
</div>

<section class="about">
  <?php if( have_rows('about_block')): ?>
  <?php 

    while(have_rows('about_block')): the_row(); 
  ?>

  <div class="about-item ">
    <div class="about-item---active"
      style="background-image: url(<?php echo get_correct_image_link_thumb(get_sub_field('about_hover_image'), 'aboutIMG'); ?>)">
    </div>
    <div class="about-item---container">
      <div class="about-item__row">
        <div class="about-item__row___heading">
          <?php the_sub_field('about_heading'); ?>
        </div>
      </div>

      <div class="about-item__row">
        <div class="about-item__row___title">
          <?php the_sub_field('about_title'); ?>
        </div>
        <div class="about-item__row___text">
          <?php the_sub_field('about_text'); ?>
        </div>
      </div>
    </div>
  </div>

  <?php endwhile; ?>
  <?php endif; ?>
</section>

<section class="about-note"
  style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('third_section_background_image'), 'full'); ?>)">
<!--  <video autoplay muted loop class="video video-2">-->
<!--    <source src="--><?php //echo get_template_directory_uri(); ?><!--/src/video/01.mp4" type="video/mp4">-->
<!--    Your browser does not support HTML5 video.-->
<!--  </video>-->
  <div class="container">
    <div class="about-note_item">
      <div class="about-note_item__text">
        <?php the_field('short_about_text'); ?>
      </div>
    </div>
    <div class="about-note_item">
      <div class="about-note_item__title">
        <?php the_field('short_about_title'); ?>
      </div>

      <div class="section-btn">
        <div class="section-btn__text"><?php the_field('short_about_button_text') ?></div>
        <a href="<?php echo get_about_page_url(); ?>">
          <div class="section-btn__circle">
            <div class="section-btn__circle___red"></div>
            <div class="section-btn__circle___arrow"></div>
          </div>
        </a>
      </div>

    </div>
  </div>
</section>

<section class="products-kind">
  <div class="container">
    <div class="products-kind_item">
      <div class="products-kind_item---inner">
      <div class="products-kind_item__title">
        <h2>
          <?php the_field('fourth_section_title'); ?>
        </h2>
      </div>
      <div class="section-btn">
        <div class="section-btn__text"><?php the_field('fourth_section_button_text') ?></div>
        <a href="<?php echo get_products_page_url(); ?>">
          <div class="section-btn__circle">
            <div class="section-btn__circle___red"></div>
            <div class="section-btn__circle___arrow"></div>
          </div>
        </a>
      </div>
      </div>
    </div>

    <div class="products-kind_item kind_list">
      <?php 
      if( have_rows('products_kind_list')): 
        while(have_rows('products_kind_list')): the_row(); 
      ?>

      <div class="kind_list__item">
        <?php $filterName = urlencode (get_sub_field('products_kind_name'));
        ?>
        <a href="<?php echo get_products_page_url() . '?filter=' . $filterName ?>">
          <div class="kind_list__item___icon"
            style="background-image: url(<?php echo get_correct_image_link_thumb(get_sub_field('products_kind_icon'), 'icon'); ?>)">
          </div>
        </a>
        <div class="kind_list__item___text">
          <h4>
            <?php the_sub_field('products_kind_name'); ?>
          </h4>
        </div>
      </div>

      <?php 
        endwhile;
        endif; 
      ?>

    </div>
  </div>
</section>

<section class="servicies"
  style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('fifth_section_backgroud_image'), 'full'); ?>)">
  <div class="container">
    <div class="servicies-head">
      <div class="servicies-head__title">
        <h2><?php the_field('fifth_section_title'); ?></h2>
      </div>

      <div class="section-btn servicies-head---btn">
        <div class="section-btn__text section-btn__text---white"><?php the_field('fifth_section_button_text') ?></div>
        <a href="<?php echo get_services_page_url(); ?>">
          <div class="section-btn__circle section-btn__circle---red">
            <div class="section-btn__circle___red section-btn__circle___red---white"></div>
            <div class="section-btn__circle___arrow section-btn__circle___arrow---white"></div>
          </div>
        </a>
      </div>

    </div>

    <div class="servicies-body">
		<?php 
      if( have_rows('all_servicies')): 
        while(have_rows('all_servicies')): the_row(); 
    ?>
			<div class="servicies-body__item">
				<div class="servicies-body__item___logo"
				style="background-image: url(<?php echo get_correct_image_link_thumb(get_sub_field('servicies_icon'), 'big_icon'); ?>)"
				></div>
				<div class="servicies-body__item___title">
					<h3>
						<?php the_sub_field('servicies_title'); ?>
					</h3>
				</div>
				<div class="servicies-body__item___text">
					<?php the_sub_field('servicies_text'); ?>
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
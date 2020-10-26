<?php
/* Template name: 404 */
get_header(); ?>
<div class="hero hero---inner_page"
  style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('first_section_background_image', 'option'), 'full'); ?>)">
  <div class="container">

    <div class="hero__container">

      <div class="hero__title hero__title---inner">
        <h1>
          <?php the_field('first_secton_title_', 'option'); ?>
        </h1>
      </div>

      <div class="error-page__content">
        <?php the_field('first_section_text', 'option'); ?>
      </div>

      <div class="section-btn error-page---section-btn">
        <div class="section-btn__text"><?php the_field('first_section_button_text', 'option') ?></div>
        <a href="<?php echo get_option("siteurl"); ?>">
          <div class="section-btn__circle">
            <div class="section-btn__circle___red"></div>
            <div class="section-btn__circle___arrow"></div>
          </div>
        </a>
      </div>

    </div>

  </div>
</div>

<?php get_footer(); ?>
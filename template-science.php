<?php
/* Template name: Science */
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
  <div class="inner-section section-science">
    <div class="container">
      <div class="inner-section__title inner-section__title---science">
        <h2><?php the_field('second_section_title'); ?></h2>
        <?php the_field('secod_section_text'); ?>
      </div>
    </div>

    <div class="inner-section__wrapper inner-section__wrapper---border inner-section__wrapper---science">
      <div class="inner-section__wrapper___item">
        <div class="inner-section__wrapper___image inner-section__wrapper___image---science"
          style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('second_section_image'), 'full'); ?>)">
        </div>
      </div>
      <div class="inner-section__wrapper___item">
        <div class="inner-section__wrapper___text inner-section__wrapper___text---science">
          <?php the_field('second_section_content_text'); ?>

          <div class="links-wrapper">
            <?php if( have_rows('second_section_content_links')): 
                    while(have_rows('second_section_content_links')): the_row(); 
            ?>
            <div class="links-item">
              <div class="links-item__link">
                <a
                  href="<?php the_sub_field('content_links_link'); ?>"><?php the_sub_field('content_links_text'); ?></a>
              </div>
              <div class="links-item__icon"></div>
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
  <div class="inner-section enzymes-section">
    <div class="container">
      <div class="inner-section__title inner-section__title---science">
        <h2><?php the_field('third_section_title'); ?></h2>
        <?php the_field('third_section_text'); ?>
      </div>
    </div>


    <div class="products-kind_item kind_list enzymes-list">
      <?php 
      if( have_rows('enzimes_list')): 
        $count = 1;
        while(have_rows('enzimes_list')): the_row(); 
      ?>

      <div class="kind_list__item enzymes-list__item item-<?php echo $count; ?>">
        <div class="kind_list__item___text enzymes-list__item___text">
          <h4>
            <?php the_sub_field('enzimes_list_name'); ?>
          </h4>
        </div>

        <div class="kind_list__item___btn">

          <div class="section-btn">
            <a class="section-btn__a" tada-count="<?php echo $count ?>">
              <div class="section-btn__circle section-btn__circle---small">
                <div class="section-btn__circle___red"></div>
                <div class="section-btn__circle___plus"></div>
              </div>
            </a>
          </div>

        </div>

     

      <div id="<?php echo $count; ?>" class="drop-container kind-drop">
        <div class="container">
          <div class="drop-container__header">
            <a href="<?php echo get_option("siteurl"); ?>">
              <div class="logo"
                style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('header_logo', 'option'), 'thumbas'); ?>)">
              </div>
            </a>
            <div class="drop-container__header___out kind-drop__out"></div>
          </div>

          <div class="drop-container__content search-container__content">
            <div class="search-container__row kind-drop__title">
              <h4>
                <?php the_sub_field('enzimes_list_name'); ?>
              </h4>
            </div>

            <div class="kind-drop__content">
              <?php
                if( have_rows('enzimes_description')): 
              ?>
              <ul id="list-data-<?php echo $count ?>" class="top-column column-1-<?php echo $count ?>">
              <?php 
                while(have_rows('enzimes_description')): the_row();
              ?>
                <li>
                  <div class="kind-drop__content___title">
                    <?php the_sub_field('enzimes_description_title'); ?>
                  </div>
                  <div class="kind-drop__content___text">
                    <?php the_sub_field('enzimes_description_text'); ?>
                  </div>
                </li>
                <?php endwhile; ?>
              </ul>
              <?php endif; ?>
              <ul class="column-2-<?php echo $count ?>"></ul>
            </div>

          </div>
        </div>
      </div>

      </div>

      <?php 
            $count++;
          endwhile;
        endif; 
      ?>

    </div>


  </div>


</section>

<?php get_footer(); ?>
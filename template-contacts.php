<?php
/* Template name: Contacts */
get_header(); ?>
<div class="hero hero---inner_page contacts"
  style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('first_section_background_image'), 'full'); ?>)">
  <video autoplay muted loop class="video">
    <source src="<?php the_field('background_video'); ?>" type="video/mp4">
    Your browser does not support HTML5 video.
  </video>

  <div class="drop-container contacts-drop drop-form">
    <div class="container">
      <div class="drop-container__header">
        <a href="<?php echo get_option("siteurl"); ?>">
          <div class="logo"
            style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('header_logo', 'option'), 'thumbas'); ?>)">
          </div>
        </a>
        <div class="drop-container__header___out white_us___out"></div>
      </div>

      <div class="drop-container__content contacts-drop__content">
        <div class="contacts-drop__title">
          <?php the_field('contacts_form_title'); ?>
        </div>

        <div class="contacts-drop__form">
          <form id="contacts_form" method="post">

            <div class="search-container__input input---size contacts-drop---input">
              <input  class="required mess-content inputText" name="name" type="text" placeholder=" ">
              <span class="floating-label">Full name</span>
            </div>
            <div class="search-container__input input---size contacts-drop---input">
              <input  class="requiredemail mess-content inputText" name="email" type="text" placeholder=" ">
              <span class="floating-label">Email address</span>
            </div>
            <div class="search-container__input input---size contacts-drop---input">
              <textarea id="textarea" cols="30" rows="1" class="minSeven mess-content inputText" name="message" type="text" placeholder=" "></textarea>
              <span class="floating-label">Your message</span>
            </div>


            <div class="section-btn contacts-drop---section-btn">
              <div class="section-btn__text"><?php the_field('contacts_form_button_text') ?></div>
              <a class="submit_contact_form">
                <div class="section-btn__circle">
                  <div class="section-btn__circle___red"></div>
                  <div class="section-btn__circle___arrow"></div>
                </div>
              </a>
            </div>

          </form>

          <div class="contacts-drop__message">
            <div class="contacts-drop__message___content">
              <div class="contacts-drop__message___title"><?php the_field('contacts_form_message_title'); ?></div>
              <div class="contacts-drop__message___text"><?php the_field('contacts_form_message_text'); ?></div>
            </div>

            <div class="section-btn contacts-drop__message---section-btn">
              <div class="section-btn__text"><?php the_field('contacts_form_message_button_text') ?></div>
              <a href="<?php echo get_option("siteurl"); ?>" class="">
                <div class="section-btn__circle">
                  <div class="section-btn__circle___red"></div>
                  <div class="section-btn__circle___arrow"></div>
                </div>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



  <div class="container">

    <div class="hero__container contacts-hero__container">

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

      <div class="hero__title contacts__title">
        <h1>
          <?php the_field('first_section_title'); ?>
        </h1>

        <div class="section-btn contacts---section-btn">
          <div class="section-btn__text"><?php the_field('first_section_button_text') ?></div>
          <a>
            <div class="section-btn__circle section-btn__circle---big">
              <div class="section-btn__circle___red"></div>
              <div class="section-btn__circle___pen"></div>
            </div>
          </a>
        </div>
      </div>

      <div class="contacts-container">

        <?php 
          if( have_rows('contacts_blocks')): 
            while(have_rows('contacts_blocks')): the_row(); 
        ?>

        <div class="contacts-container__item">
          <div class="contacts-container__title"><?php the_sub_field('contacts_blocks_title'); ?></div>
          <?php
            $address = get_sub_field('contacts_blocks_addres');
            if($address !== ''){
          ?>
          <div class="contacts-container__address"><?php echo $address; ?></div>
          <?php } 
              if( have_rows('contacts_kind') ):
            ?>
          <ul>
            <?php while ( have_rows('contacts_kind') ) : the_row(); 
                    if( get_row_layout() == 'phone' ):
            ?>
            <li>
              <div class="contacts__kind">
                <div class="contacts__kind___name">Phone</div>
                <div class="contacts__kind___contacts">
                  <a href="tel:<?php the_sub_field('phone'); ?>">
                    <?php the_sub_field('phone'); ?>
                  </a>
                </div>
              </div>
            </li>

            <?php  elseif( get_row_layout() == 'fax' ):  ?>
            <li>
              <div class="contacts__kind">
                <div class="contacts__kind___name">Fax</div>
                <div class="contacts__kind___contacts">
                  <a href="tel:<?php the_sub_field('fax'); ?>">
                    <?php the_sub_field('fax'); ?>
                  </a>
                </div>
              </div>
            </li>
            <?php  elseif( get_row_layout() == 'email' ):  ?>
            <li>
              <div class="contacts__kind">
                <div class="contacts__kind___name">Email</div>
                <div class="contacts__kind___contacts">
                  <a href="mailto:<?php the_sub_field('email'); ?>">
                    <?php the_sub_field('email'); ?>
                  </a>
                </div>
              </div>
            </li>

            <?php 
                endif;
              endwhile; 
              ?>
          </ul>
          <?php endif; ?>
        </div>

        <?php 
            endwhile;
            endif; 
          ?>
      </div>

    </div>

  </div>
</div>

<?php get_footer(); ?>
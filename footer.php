<footer>
  <div class="drop-container drop-container---footer">
    <div class="container">

      <div class="drop-container__header drop-container__header---footer">
        <a href="<?php echo get_option("siteurl"); ?>">
          <div class="logo"
            style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('header_logo', 'option'), 'thumbas'); ?>)">
          </div>
        </a>
      </div>

      <div class="drop-container__content mobile-menu__content">
        <div class="navigation">
          <div class="navigation-item navigation-item__menu">
            <nav>

              <?php wp_nav_menu(array( 
                'container'  => '<ul></ul>',
                'menu_class' => 'meniuitem menu-menu',
                'theme_location' => 'header-menu'
              )); ?>

            </nav>
          </div>

          <div class="footer-item__subscribe footer-item__subscribe---mobile">
            <div class="footer-item__subscribe___title footer-item__subscribe___title---mobile">
              <?php the_field('subscribe_email_title', 'option'); ?>
            </div>
            <form id="subscribe_form" action="" method="post">

              <div class="search-container__input input---size subscribe_news">
                <input type="text" class="requiredemail subscribe_input" name="subscribe_news"
                  placeholder="Enter your email">
                <button type="submit" class="input-arrow_btn"></button>

                <div class="subscribe-message">
                  <?php the_field('after_subscribing_message_text', 'option'); ?>
                </div>
              </div>

            </form>
          </div>


          <div class="navigation-item">
            <div class="navigation-item__title">
              <?php the_field('country_list_title', 'option'); ?>
            </div>
            <?php if( have_rows('country_list', 'option')): ?>
            <ul>
              <?php while(have_rows('country_list', 'option')): the_row(); ?>
              <li>
                <a href="">
                  <?php the_sub_field('coutry_name'); ?>
                </a>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>

          </div>

          <div class="navigation-item">
            <div class="navigation-item__title">
              <?php the_field('terms_title', 'option'); ?>
            </div>
            <ul>
              <li>
                <a href="<?php echo get_policy_page_url(); ?>"><?php the_field('terms_link_text', 'option'); ?></a>
              </li>
            </ul>
          </div>

          <div class="navigation-item navigation-item---footer">
            <div class="navigation-item__title">
              <?php the_field('follow_us_title', 'option'); ?>
            </div>
            <?php if( have_rows('soc_networks', 'option')): ?>
            <ul>
              <?php while(have_rows('soc_networks', 'option')): the_row(); ?>
              <li>
                <a target="_blanc" href="<?php the_sub_field('network_link'); ?>">
                  <?php the_sub_field('network_link_title'); ?>
                </a>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>
          </div>

        </div>

      </div>

      <div class="footer">
        <div class="footer-item">
          <a href="<?php echo get_option("siteurl"); ?>">
            <div class="header-left logo"
              style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('header_logo', 'option'), 'thumbas'); ?>)">
            </div>
          </a>
        </div>
        <div class="footer-item">
          <div class="footer-item__subscribe">
            <div class="footer-item__subscribe___title">
              <?php the_field('subscribe_email_title', 'option'); ?>
            </div>
            <form id="subscribe_form2" action="" method="post">

              <div class="search-container__input input---size subscribe_news">
                <input type="text" class="requiredemail subscribe_input inputText" name="subscribe_news"
                  placeholder=" ">
                <span class="floating-label">Enter your email</span>
                <button type="submit" class="input-arrow_btn"></button>

                <div class="subscribe-message">
                  <?php the_field('after_subscribing_message_text', 'option'); ?>
                </div>
              </div>

            </form>
          </div>

          <div class="footer-item__copyright">
            <div class="footer-item__copyright___item">
              <?php the_field('copy_right_text', 'option'); ?>
            </div>
            <div class="footer-item__copyright___item">
              <?php the_field('created_text', 'option'); ?>
              <span></span>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
</footer>

<div class="p_policy">
  <div class="p_policy__text">
    <?php the_field('privite_policy_text', 'option'); ?>
  </div>

  <div class="drop-container__header___out p_policy---out"></div>

  <div class="section-btn p_policy---section-btn">
    <div class="section-btn__text"><?php the_field('privite_policy_button_text', 'option') ?></div>
    <a href="<?php echo get_policy_page_url(); ?>">
      <div class="section-btn__circle">
        <div class="section-btn__circle___red"></div>
        <div class="section-btn__circle___arrow"></div>
      </div>
    </a>
  </div>
</div>

<?php wp_footer(); ?>
<div id="fb-root"></div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>


</body>

</html>
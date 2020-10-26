<?php
/* Template name: Custom Search */
get_header(); ?>

  <div class="hero hero---inner_page search-hero"
       style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('section_background_image'), 'full'); ?>)">
    <div class="container">

      <div class="hero__container">

        <div class="hero__nav search-hero__nav">
          <a href="<?php echo get_option("siteurl"); ?>">Home</a>
          <div class="hero__nav___arrow"></div>

          <a>
            Search results
          </a>
        </div>

        <div class="hero__title hero__title---inner search-hero__title">
          <h1>
            <?php the_field('search_results_by_keyword', 'option') ?><br>
              <?php echo wp_trim_words("$s", 5); ?>
          </h1>
        </div>

      </div>

    </div>
  </div>
  <section class="news-inner__content ">
    <div class="container">
      <div class="hero__container news-inner---container">
          <?php
          global $wp_query;

          if (!$_GET['/paged']) {
              $paged = 1;
          } else {
              $paged = $_GET['/paged'];
          }

//          $kindOfPost = $post->post_type;
          $allPost = $wp_query->found_posts;
          $display_count = 2;
          $offset = ($paged - 1) * $display_count;

          $args = array(
              "posts_per_page" => $display_count,
              'paged' => $paged,
              'offset' => $offset,
              's' => $s
          );

          $the_query = new WP_Query($args);

          if ($the_query->have_posts()) :
              ?>
            <div class="showing">
                <?php
                $num1;
                $num2;
                if($pages == 1){
                    $num1 = 1;
                }else{
                    $num1 = ($paged * $display_count) -1;
                }
                $num2 = 1 + $num1;

                if($num2 > $allPost){
                    $num2 = $allPost;
                }
                ?>

              Showing <?php echo $num1; ?>- <?php echo $num2 ?> out of <?php echo $allPost; ?>

            </div>

              <?php
              while ($the_query->have_posts()) :
                  $the_query->the_post();
                  ?>

                <div class="search-item">
                  <div class="search-item__title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                  </div>

                  <div class="search-item__content">
                      <?php echo wp_trim_words(get_field('single_news_sub_title_text'), 40); ?>
                      <?php echo wp_trim_words(get_field('product_short_description'), 40); ?>
                  </div>
                </div>

              <?php
              endwhile;
          else: ?>
            <div class="search-item__title">
                <?php the_field('couldnt_find_any_results_text', 'option') ?>
            </div>
            <div class="search-item__home">

              <div class="section-btn">
                <div class="section-btn__text"><?php the_field('back_to_home_buttom_text', 'option') ?></div>
                <a href="<?php echo get_option("siteurl"); ?>">
                  <div class="section-btn__circle">
                    <div class="section-btn__circle___red"></div>
                    <div class="section-btn__circle___arrow"></div>
                  </div>
                </a>
              </div>

            </div>
          <?php
          endif;
          wp_reset_query();
          ?>

        <div class="pagination">

            <?php
            echo paginate_links(array(
//                'base' => preg_replace('/\?.*/', '/', get_pagenum_link()) . '%_%',
                'format' => '?/paged=%#%',
                'total' => $the_query->max_num_pages,
                'current' => $paged,
                'mid_size' => 1,
                'end_size' => 0,
                'prev_next' => True,
                'prev_text' => __('
                                    <div class="section-btn__circle">
                                      <div class="section-btn__circle___red"></div>
                                      <div class="section-btn__circle___arrow"></div>
                                    </div>
                                 '),
                'next_text' => __(' 
                                     <div class="section-btn__circle">
                                        <div class="section-btn__circle___red"></div>
                                        <div class="section-btn__circle___arrow"></div>
                                      </div>
                                  '),
            ));
            ?>

        </div>

      </div>
    </div>
  </section>


<?php get_footer(); ?>
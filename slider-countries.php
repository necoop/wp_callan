<?php
/*
Template Name: slider-countries
*/
?>

<section class="universities container" id="universities">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-xl-4 col-md-6 col-sm-12 ">
        <div class="white-box-text">
          <h2><?php echo get_the_category_by_ID(3); ?></h2>
          <?php echo category_description(3); ?>
        </div>
      </div>
    </div>

    <!-- Slider main container -->
    <div class="swiper-box">
      <div class="swiper mySwiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper text-center">

          <!-- Slides -->

          <?php
          global $post;

          $myposts = get_posts([
            'numberposts' => -1,
            'category' => 3,
            'orderby' => 'title',
            'sortby' => 'name'
          ]);

          if ($myposts) {
            foreach ($myposts as $post) {
              setup_postdata($post); ?>
              <div class="swiper-slide col-xl-3 col-lg-4 col-md-6 col-sm-12 slide-universities-wrapper">
                <?php the_post_thumbnail(
                  array(246, 156),
                  array('class' => 'slide-universities-inner')
                ); ?>
                <div class="slider-text-bottom">
                  <div class="slider-country"><?php the_title(); ?></div>
                  <div class="slider-numbers"><?php the_content(); ?></div>
                </div>
              </div>
          <?php
            }
          }
          wp_reset_postdata(); // Сбрасываем $post
          ?>
        </div>
      </div>
      <div class="swiper-button-prev swiper-prev"></div>
      <div class="swiper-button-next swiper-next"></div>
    </div>
  </div>
</section>
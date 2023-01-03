<?php
/*
Template Name: reviews-students
*/
?>

<section class="student-reviews">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <div class="white-box-text">
          <h2><?php echo get_the_category_by_ID( 4 ); ?></h2>
        </div>
      </div>
    </div>

    <!-- Slider main container -->
    <div class="swiper-box">
      <div class="swiper-rewiews mySwiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper text-center">
          <!-- Slides -->

          <?php
          global $post;

          $myposts = get_posts([
            'numberposts' => -1,
            'offset'      => 1,
            'category'    => 4
          ]);

          if ($myposts) {
            foreach ($myposts as $post) {
              setup_postdata($post);
          ?>
              <!-- Вывод постов, функции цикла: the_title() и т.д. -->
              <div class="swiper-slide slide-reviews col-xl-4 col-md-6 col-sm-12">
                <div class="slide-reviews-inner">
                  <?php the_post_thumbnail(
                    array(145, 190)
                  ); ?>
                </div>
                <div class="slide-reviews-box">
                  <div class="reviews-box-inner">
                    <div class="slide-reviews-text">
                      <?php the_title(); ?>
                    </div>
                    <span><?php the_content(); ?></span>
                  </div>
                </div>
              </div>
          <?php
            }
          } else
            wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="swiper-reviews-prev swiper-prev"></div>
      <div class="swiper-reviews-next swiper-next"></div>
    </div>
  </div>
</section>
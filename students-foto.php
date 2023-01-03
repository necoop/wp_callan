<?php
/*
Template Name: students-foto
*/
?>

<section class="students-foto" id="students">
    <div class="container">
        <h2><?php echo get_the_category_by_ID(7); ?></h2>

        <!-- Slider main container -->
        <div class="swiper-box">
            <div class="swiper-foto mySwiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper text-center">

                    <?php
                    global $post;

                    $myposts = get_posts([
                        'numberposts' => -1,
                        'offset'      => 1,
                        'category'    => 7
                    ]);

                    if ($myposts) {
                        foreach ($myposts as $post) {
                            setup_postdata($post);
                    ?>
                            <!-- Вывод постов, функции цикла: the_title() и т.д. -->
                            <?php the_post_thumbnail(
                                array(-264, 265), // размер изображения
                                array('class' => 'swiper-slide slide-students-foto col-xl-3 col-md-6 col-sm-12') // передаем класс
                            ); ?>

                    <?php
                        }
                    }

                    wp_reset_postdata(); // Сбрасываем $post
                    ?>

                </div>
            </div>
            <div class="swiper-foto-prev swiper-prev"></div>
            <div class="swiper-foto-next swiper-next"></div>
        </div>
    </div>
</section>
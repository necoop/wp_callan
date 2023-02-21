<?
/*
Template Name: Студенты
*/

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style-unis', get_template_directory_uri() . '/assets/students/css/style.css');
    wp_enqueue_script('swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', 'null', 'null', true);
    wp_enqueue_script('slider-students-review', get_template_directory_uri() . '/assets/unis/js/slider.js', array('swiper-bundle'), 'null', true);
});

get_header();



?>

<section class="students container">
    <div class="page-link col-12">
        <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/ui/home.svg">Главная &nbsp &nbsp ></a>Студенты
    </div>
    <h2>Студенты</h2>
    <ul class="students__list">

        <?php

        global $post;

        $myposts = get_posts([
            'numberposts' => -1,
            'offset'      => 0,
            'category'    => 13
        ]);

        if ($myposts) {
            foreach ($myposts as $post) {
                setup_postdata($post); ?>
                <!-- Вывод постов, функции цикла: the_title() и т.д. -->
                <li class="students__item">
                    <!-- Slider main container -->
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <? foreach (get_post_gallery_images() as $item) {
                                echo ('<div class="swiper-slide"><img class="students__img" src="' . $item . '"></div>');
                            } ?>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="student__info">
                        <p class="student__name"><? the_title(); ?></p>
                        <p class="university__name"><? the_field('university__name') ?></p>
                        <p class="student__text"><? the_field('review') ?></p>
                    </div>
                </li>

        <?php
            }
        }

        wp_reset_postdata(); // Сбрасываем $post
        ?>

    </ul>
    <!-- <form method="post">
        <button class="form__button" name="numberOfPosts" value="<? echo ($numberOfPosts) ?>">Ещё</button>
    </form> -->
</section>

<?php

get_template_part('contact_us');
get_template_part('contacts');

// Модальное окно
get_template_part('connect-window');

get_footer();

?>
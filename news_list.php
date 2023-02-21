<?php
/*
Template Name: Новости
*/

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style-unis', get_template_directory_uri() . '/assets/news_list/css/style.css');
});

//Подключаем файл с обработкой массивов и строк
require(get_template_directory() . '/assets/unis/sort_arrays.php');

get_header();

?>

<section class="news container">
    <div class="page-link col-12">
        <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/ui/home.svg"><?php echo get_the_title(8); ?> &nbsp &nbsp ></a><?php wp_title('', 'true', ''); ?>
    </div>
    <h2 class="news__caption text-center col-12">Новости</h2>
    <ul class="news__list">
        <?php
        global $post;

        $myposts = get_posts([
            'numberposts' => -1,
            'offset'      => 1,
            'category'    => 14
        ]);

        if ($myposts) {
            foreach ($myposts as $post) {
                setup_postdata($post);
        ?>
                <!-- Вывод постов, функции цикла: the_title() и т.д. -->
                <li class="news__item">
                    <a href="<? bloginfo('url') ?>/news_item?news_id=<? the_ID() ?>" class="news__inner__box">
                        <img src="<?php the_field('news_foto') ?>" alt="Новость фото" class="news__img">
                        <div class="news__text__box">
                            <div class="news__box__inner">
                                <p class="news__title"><? the_title() ?></p>
                                <div class="news__content">
                                    <? the_field('news_content') ?>
                                </div>
                                <!-- <div class="news__shade__cover"></div> -->
                                <div class="news__shade"></div>
                            </div>
                            <div class="time__to__read">
                                <span>Время чтения: <b><? the_field('time_to_read') ?> минут</b></span>
                            </div>
                        </div>
                    </a>
                </li>
        <?php
            }
        }

        wp_reset_postdata(); // Сбрасываем $post
        ?>
    </ul>
</section>

<script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?
// Модальное окно
get_template_part('connect-window');

get_template_part('contact_us');
get_template_part('contacts');
get_footer();
?>
<?
/*
Template Name: Содержимое новости
*/

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style-unis', get_template_directory_uri() . '/assets/news_item/css/style.css');
    wp_enqueue_script('cooke', get_template_directory_uri() . '/assets/unis/js/cooke.js', 'null', 'null', true);
    wp_enqueue_script('swiper-news', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', 'null', 'null', true);
    wp_enqueue_script('slider-unis', get_template_directory_uri() . '/assets/news_item/scripts/slider.js', array('swiper-news'), 'null', true);
});

// Предзагрузка иконок кнопок
add_filter('wp_resource_hints', 'button_preload', 10, 2);
function button_preload($urls, $relation_type)
{
    if ('preload' === $relation_type) {
        $urls[] = [
            'href'        => get_bloginfo('template_directory') . "/assets/unis/img/checkbox_off.svg",
            'as'          => 'image'
        ];
    }
    return $urls;
}
// Окончание предзагрузки иконок кнопок

get_header();

// Подключение файла обработки массивов
require(get_template_directory() . '/assets/unis/sort_arrays.php');

//Подключаем описание класса новости
require('class_news.php');

$current_news = new News;

if (isset($_GET['news_id'])) {
    global $post;
    $myposts = get_posts([
        'numberposts' => -1,
        'offset'      => 1,
        'category'    => 14
    ]);
    if ($myposts) {
        foreach ($myposts as $post) {
            setup_postdata($post);
            if ($_GET['news_id'] == get_the_ID()) {
                $current_news->title = get_the_title();
                $current_news->foto = get_field('news_foto');
                $current_news->content = get_field('news_content');
                $current_news->time = get_field('time_to_read');
                $current_news->color = get_field('time_color');
                $current_news->tags = get_field('tags');
                break;
            }
        }
    } else {
        // Постов не найдено
    }
}


wp_reset_postdata(); // Сбрасываем $post

?>

<section class="news__item container">
    <div class="page-link col-12">
        <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/ui/home.svg"><?php echo get_the_title(8); ?> &nbsp &nbsp ></a><a href="<? the_permalink(453) ?>"> <?php echo get_the_title(453) ?></a> &nbsp &nbsp > &nbsp &nbsp
        <?
        if (mb_strlen($current_news->title) > 33) {
            echo (mb_substr($current_news->title, 0, 30) . '...');
        } else {
            echo $current_news->title;
        }
        ?>
    </div>
    <h2 class="news__caption text-center col-12"><? echo $current_news->title ?></h2>
    <div class="news__box">
        <img class="news__image" src="<? echo $current_news->foto ?>" alt="">
        <div class="time__to__read">
            <span style="color: #<? echo $current_news->color ?>;">Время чтения: <b><? echo $current_news->time ?> минут</b></span>
        </div>
        <? echo '<p>' . str_replace("\n", '</p><p>', $current_news->content) . '</p>'  ?>
    </div>
</section>
<section class="similar__news container">
    <h2 class="col-12 text-center">Похожие новости</h2>
    <div class="swiper__box">
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <a href="#!" class="news__item__href">
                        <div class="similar__news__box">
                            <img src="./news_item/img/img.jpg" alt="Новость фото" class="similar__news__img">
                            <div class="similar__news__inner">
                                <p class="similar__news__title">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit,
                                    sed
                                    do eiusmod
                                    tempor incididunt ut labore</p>
                                <p class="similar__news__text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit,
                                    sed
                                    do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis
                                    nostrud
                                    exercitation. Lorem ipsum dolor sit amet, consectetur adipiscing elit! Lorem
                                    ipsum
                                    dolor
                                    sit amet,
                                    consectetur adipiscing elit...;</p>
                                <div class="time__to__read">
                                    <span>Время чтения: <b>10 минут</b></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#!" class="news__item__href">
                        <div class="similar__news__box">
                            <img src="./news_item/img/img.jpg" alt="Новость фото" class="similar__news__img">
                            <div class="similar__news__inner">
                                <p class="similar__news__title">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit,
                                    sed
                                    do eiusmod
                                    tempor incididunt ut labore</p>
                                <p class="similar__news__text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit,
                                    sed
                                    do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis
                                    nostrud
                                    exercitation. Lorem ipsum dolor sit amet, consectetur adipiscing elit! Lorem
                                    ipsum
                                    dolor
                                    sit amet,
                                    consectetur adipiscing elit...;</p>
                                <div class="time__to__read">
                                    <span>Время чтения: <b>10 минут</b></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#!" class="news__item__href">
                        <div class="similar__news__box">
                            <img src="./news_item/img/img.jpg" alt="Новость фото" class="similar__news__img">
                            <div class="similar__news__inner">
                                <p class="similar__news__title">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit,
                                    sed
                                    do eiusmod
                                    tempor incididunt ut labore</p>
                                <p class="similar__news__text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit,
                                    sed
                                    do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis
                                    nostrud
                                    exercitation. Lorem ipsum dolor sit amet, consectetur adipiscing elit! Lorem
                                    ipsum
                                    dolor
                                    sit amet,
                                    consectetur adipiscing elit...;</p>
                                <div class="time__to__read">
                                    <span>Время чтения: <b>10 минут</b></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

<?

echo $current_news->title;
echo $current_news->foto;

?>
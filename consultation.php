<?

/*
Template Name: Бланк заявки
*/

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style-unis', get_template_directory_uri() . '/assets/consultation/css/style.css');
    wp_enqueue_script('calendar', get_template_directory_uri() . '/assets/consultation/scripts/script.js', 'null', 'null', true);
});

// Предзагрузка иконок кнопок
add_filter('wp_resource_hints', 'button_preload', 10, 2);
function button_preload($urls, $relation_type)
{
    if ('preload' === $relation_type) {
        $urls[] = [
            'href'        => get_bloginfo('template_directory') . "/assets/consultation/ui/radio_chosen.svg",
            'as'          => 'image'
        ];
    }
    return $urls;
}
// Окончание предзагрузки иконок кнопок

// Подключение файла обработки массивов
require(get_template_directory() . '/assets/unis/sort_arrays.php');

global $post;

$myposts = get_posts([
    'numberposts' => -1,
    'offset'      => 1,
    'category'    => 11
]);

if ($myposts) {
    foreach ($myposts as $post) {
        setup_postdata($post);
        // Формируем массив для фильтра
        $study_form[] = get_field('study-form');
    }
}
wp_reset_postdata(); // Сбрасываем $post

get_header();

?>

<section class="application container">
    <div class="page-link col-12">
        <a class="page__title" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/ui/home.svg">Главная &nbsp &nbsp ></a>Заявка на
        консультацию
    </div>


    <div class="section__caption">
        <a href="#" class="back__box" onclick="history.back()" ;>
            <div class="back__box__img">
                <img src="<?php bloginfo('template_directory'); ?>/assets/consultation/img/back.svg">
            </div>
            <span>Назад</span>
        </a>
        <h2 class="text-center col-12">Заявка на консультацию</h2>
    </div>

    <form class="contact__data container" id="consultation">
        <div class="caption__box">
            <img src="<?php bloginfo('template_directory'); ?>/assets/consultation/ui/fio.svg">
            <span>ФИО</span>
        </div>
        <div class="fio row">
            <div class="col-md-6 col-sm-12 relative">
                <input type="text" class="input name art_first_name required" placeholder="Имя" name="art_first_name" id="art_first_name">
            </div>
            <div class="col-md-6 col-sm-12 relative">
                <input type="text" class="input name required art_last_name" id="art_last_name" placeholder="Фамилия" name="art_last_name">
            </div>
        </div>
        <div class="caption__box">
            <img src="<?php bloginfo('template_directory'); ?>/assets/consultation/ui/birthday.svg">
            <span>Дата рождения</span>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="date__birth__box relative">
                    <input type="date" name="art_birth_date" class="input calendar required art_birth_date">
                </div>
            </div>
        </div>
        <div class="caption__box">
            <img src="<?php bloginfo('template_directory'); ?>/assets/consultation/ui/map.svg">
            <span>Контактные данные</span>
        </div>
        <div class="fio row">
            <div class="col-md-6 col-sm-12 relative">
                <input type="text" class="input name art_city required" placeholder="Город" name="art_city">
            </div>
        </div>
        <div class="fio row">
            <div class="col-md-6 col-sm-12 relative">
                <input type="tel" class="input name art_phone required tel" placeholder="+7 (___) ___-__-__" name="phone">
            </div>
            <div class="col-md-6 col-sm-12 relative">
                <input type="email" class="input name art_consultation_email" placeholder="E-mail" name="email">
            </div>
        </div>
        <div class="caption__box">
            <img src="<?php bloginfo('template_directory'); ?>/assets/consultation/ui/price_up.svg">
            <span>Уровень английского</span>
        </div>
        <div class="consultation__radiobox col-md-6 col-sm-12">
            <div class="col-md-6 col-sm-12 relative">
                <input type="radio" name="english" id="beginner" value="A1 - A2" class="art_english"><label for="beginner">Начинающий (А1 - А2)</label>
            </div>
            <div class="col-md-6 col-sm-12">
                <input type="radio" name="english" id="average" value="B1 - B2"><label for="average">Средний (B1 - B2)</label>
            </div>
            <div class="col-md-6 col-sm-12">
                <input type="radio" name="english" id="advanced" value="C1 - C2"><label for="advanced">Продвинутый (C1 - C2)</label>
            </div>
        </div>
        <div class="caption__box">
            <img src="<?php bloginfo('template_directory'); ?>/assets/consultation/ui/form.svg">
            <span>Предпочтительная программа</span>
        </div>
        <div class="consultation__radiobox col-md-6 col-sm-12 relative">
            <?
            foreach (prepareArray($study_form) as $item) {
            ?>
                <div class="col-md-6 col-sm-12">
                    <input type="radio" name="programm" class="art_programm" value="<? echo $item ?>" id="<? echo $item ?>"><label for="<? echo $item ?>"><? echo $item ?></label>
                </div>
            <?
            }
            ?>
        </div>
        <div class="caption__box">
            <img src="<?php bloginfo('template_directory'); ?>/assets/consultation/ui/schedule.svg">
            <span>Предпочтительная дата начала</span>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="date__birth__box relative">
                    <input type="date" name="art_start_date" id="art_start_date" class="input calendar art_start_date">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="comment__box col-md-6 col-sm-12">
                <div class="input__comments">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/consultation/ui/comments.svg">
                    <textarea name="comments" id="comments" placeholder="Дополнительные комментарии"></textarea>
                </div>
            </div>
        </div>
        <input type="text" name="consultation_submitted" class="hidden" id="consultation_submitted" value="">
        <input type="checkbox" name="consultation_anticheck" id="consultation_anticheck" class="consultation_anticheck hidden" value="true" checked="checked">
        <button class="modal-form send-contact button" data-bs-dismiss="">
            <div class="button-icon">
                <img src="<?php bloginfo('template_directory'); ?>/assets/img/ui/send.svg">
            </div>
            <input class="button-text" id="consultation-feedback" type="submit" value="Отправить">
        </button>
    </form>
</section>

<?
get_template_part('contact_us');

get_template_part('contacts');

// Модальное окно
get_template_part('connect-window');

get_footer();

?>
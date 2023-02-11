<?php
/*
Template Name: Об университете
*/

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style-university', get_template_directory_uri() . '/assets/unis/css/style.css');
    wp_enqueue_style('style-about-university', get_template_directory_uri() . '/assets/about_university/css/style.css');
    wp_enqueue_script('swiper-about-university', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', 'null', 'null', true);
    wp_enqueue_script('slider-university-gallery', get_template_directory_uri() . '/assets/about_university/js/slider.js', array('swiper-about-university'), 'null', true);
});

// Предзагрузка иконок кнопок
add_filter('wp_resource_hints', 'button_preload', 10, 2);
function button_preload($urls, $relation_type)
{
	if('preload' === $relation_type){
		$urls[] = [
			'href'        => get_bloginfo('template_directory') . "/assets/img/ui/arr-left-hover.png",
			'as'          => 'image'
		];
		$urls[] = [
			'href'        => get_bloginfo('template_directory') . "/assets/img/ui/arr-right-hover.png",
			'as'          => 'image'
		];
		$urls[] = [
			'href'        => get_bloginfo('template_directory') . "/assets/img/ui/arr-left-active.png",
			'as'          => 'image'
		];
		$urls[] = [
			'href'        => get_bloginfo('template_directory') . "/assets/img/ui/arr-right-active.png",
			'as'          => 'image'
		];
	}
	return $urls;
}
// Окончание предзагрузки иконок кнопок

get_header();

// Подключение файла обработки массивов
require(get_template_directory() . '/assets/unis/sort_arrays.php');

if (isset($_GET['id'])) {
    $uni_id = $_GET['id'];
}

global $post;

$myposts = get_posts([
    'numberposts' => -1,
    'offset'      => 1,
    'category'    => 11
]);

if ($myposts) {
    foreach ($myposts as $post) {
        setup_postdata($post);

        if (get_the_ID() == $uni_id) {
            $uni = [
                'id' => get_the_ID(),
                'name' => get_the_title(),
                'country' => get_field('position_country'),
                'address' => get_field('position_address'),
                'study_form' =>  get_field('study-form'),
                'speciality' => get_field('speciality'),
                'popularity' => get_field('about_popularity'),
                'price' => get_field('about_price'),
                'language' => get_field('language'),
                'establish-year' => get_field('about_establish-year'),
                'study-numbers' => get_field('about_study-numbers'),
                'living-price' => get_field('about_living-price'),
                'university-info' => get_field('university-info'),
                'admission-documents' => get_field('admission-documents'),
                'galerey' => get_post_gallery_images()
            ];
        }
    }
}

wp_reset_postdata(); // Сбрасываем $post

?>

<body>

    <section class="unis container">
        <div class="page-link col-12 tmp">
            <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/ui/home.svg"><?php echo get_the_title(8); ?> &nbsp &nbsp ></a><a href="<?php the_permalink(249); ?>"><?php echo get_the_title(249); ?> &nbsp &nbsp ></a><?php echo $uni['name']; ?>
        </div>
        <h2 class="unis__name"><?php echo $uni['name']; ?></h2>
        <div class="vector"></div>
        <div class="unis__info__outer">
            <div class="unis__info__top row">
                <div class="col-lg-8 col-md-12">
                    <div class="unis__foto">
                        <div class="rating">
                            <? for ($i = 0; $i < $uni['popularity']; $i++) {
                                echo ('<img src=' . get_bloginfo("template_directory") . '/assets/unis/img/star.svg>');
                            } ?>
                        </div>
                        <img src="<? echo $uni['galerey'][0] ?>" alt="Фото университета">
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="unis__data">
                        <ul class="unis__data__list">
                            <li class="unis__data__item" id="unis__data__item1">
                                <div class="unis__data__inner">
                                    <div class="title">Расположение</div>
                                    <div class="data"><? echo ($uni['country'] . ', ' . $uni['address']); ?></div>
                                </div>
                            </li>
                            <li class="unis__data__item" id="unis__data__item2">
                                <div class="unis__data__inner">
                                    <div class="title">Язык обучения</div>
                                    <div class="data"><? echo $uni['language']; ?></div>
                                </div>
                            </li>
                            <li class="unis__data__item" id="unis__data__item3">
                                <div class="unis__data__inner">
                                    <div class="title">Год основания</div>
                                    <div class="data"><? echo $uni['establish-year']; ?></div>
                                </div>
                            </li>
                            <li class="unis__data__item" id="unis__data__item4">
                                <div class="unis__data__inner">
                                    <div class="title">Кол-во студентов</div>
                                    <div class="data"><? echo number_format($uni['study-numbers'], 0, '', ' '); ?></div>
                                </div>
                            </li>
                            <li class="unis__data__item" id="unis__data__item5">
                                <div class="unis__data__inner">
                                    <div class="title">Средняя цена за семестр</div>
                                    <div class="data"><? echo number_format($uni['price'], 0, '', ' '); ?> евро</div>
                                </div>
                            </li>
                            <li class="unis__data__item" id="unis__data__item6">
                                <div class="unis__data__inner">
                                    <div class="title">Средняя цена за проживание</div>
                                    <div class="data"><? echo number_format($uni['living-price'], 0, '', ' '); ?> евро</div>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <button type="button" class="button-whith-icon" data-bs-toggle="modal" data-bs-target="#buttonConnect">
                        <div class="button-icon">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/img/ui/btn-phone.svg">
                        </div>
                        <div class="button-text">Связаться с нами</div>
                    </button>
                </div>
            </div>
            <div class="unis__info__bottom row">
                <div class="col-lg-8 col-md-12">
                    <div class="unis__description">
                        <h3>О ВУЗе</h3>
                        <div class="unis__text">
                            <? echo $uni['university-info']; ?>
                        </div>
                    </div>
                </div>
                <div class="document__box col-lg-4 col-md-12">
                    <div class="document__box__inner">
                        <h3>Документы для поступления</h3>
                        <ul class="document__list">
                            <? foreach (removeSpacesAndConvertToArray($uni['admission-documents']) as $item) {
                                echo ('<li class="document__item">' . $item . '</li>');
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="studi__directions row">
                <h3 class="col-12 text-start">Академические программы</h3>
                <div class="accordion accordion-questions" id="directions">
                    <div class="questions-item">
                        <div class="question-item-inner">
                            <h2 class="accordion-header question-accordion-header" id="panelsStayOpen-directions">
                                <button class="accordion-button question-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panel-question-1" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                    Направления обучения
                                    <div class="button-question">
                                        <div class="button-question-inner">
                                            <div class="question-icon"></div>
                                        </div>
                                    </div>
                                </button>
                            </h2>
                            <div id="panel-question-1" class="accordion-collapse collapse question-collapse" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body question-body">
                                    <ul>
                                        <? foreach (removeSpacesAndConvertToArray($uni['study_form']) as $item) {
                                            echo ('<li>' . $item . '</li>');
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion accordion-questions" id="speciality">
                    <div class="questions-item">
                        <div class="question-item-inner">
                            <h2 class="accordion-header question-accordion-header" id="panelsStayOpen-speciality">
                                <button class="accordion-button question-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panel-question-2" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                    Специализации
                                    <div class="button-question">
                                        <div class="button-question-inner">
                                            <div class="question-icon"></div>
                                        </div>
                                    </div>
                                </button>
                            </h2>
                            <div id="panel-question-2" class="accordion-collapse collapse question-collapse" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body question-body">
                                    <ul class="row speciality__row">
                                        <? foreach (removeSpacesAndConvertToArray($uni['speciality']) as $item) {
                                            echo ('<li class="col-xl-3 col-md-6 col-sm-12">' . $item . '</li>');
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery container">
        <h3 class="col-12 text-start">Галерея</h3>
        <div class="swiper__box">
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <? foreach ($uni['galerey'] as $item) {
                        echo ('<div class="swiper-slide"><img src="' . $item . '"></div>');
                    } ?>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>

    <?php

    get_template_part('contact_us');

    get_template_part('contacts');

    // Модальное окно
    get_template_part('connect-window');

    get_footer();

    ?>
<?php
/*

*/

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style-unis', get_template_directory_uri() . '/assets/unis/css/style.css');
    wp_enqueue_script('countries', get_template_directory_uri() . '/assets/unis/js/countries.js', 'null', 'null', true);
    wp_enqueue_script('swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', 'null', 'null', true);
    wp_enqueue_script('slider-unis', get_template_directory_uri() . '/assets/unis/js/slider.js', array('swiper-bundle'), 'null', true);
});

get_header();

?>

<section class="unis container">
    <div class="page-link col-12 tmp">
        <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/ui/home.svg"><?php echo get_the_title(8); ?> &nbsp &nbsp ></a><?php wp_title('', 'true', ''); ?>
    </div>
    <h2>Университеты</h2>
    <div class="vector"></div>

    <button href="#!" class="filtres__btn" data-bs-toggle="offcanvas" type="button" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <div class="icon__circle">
            <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/filter.svg">
        </div>
        Фильтры
    </button>

    <div class="universities__container">
        <div class="universities__filtres">
            <h3>Фильтры</h3>
            <div class="accordion" id="country__panel">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-country">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#country-collapseOne" aria-expanded="true" aria-controls="country-collapseOne">
                            <div class="caption">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/flag.png">
                                Страны
                            </div>
                        </button>
                    </h2>
                    <div id="country-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <div class="accordion__body__item">
                                <input type="checkbox" name="" id="country_1" class="checkbox__item" checked="checked">
                                <label for="country_1" class="input__name">Страна 1</label>
                            </div>
                            <div class="accordion__body__item">
                                <input type="checkbox" name="" id="country_2" class="checkbox__item">
                                <label for="country_2" class="input__name">Страна 2</label>
                            </div>
                            <div class="accordion__body__item">
                                <input type="checkbox" name="" id="country_3" class="checkbox__item">
                                <label for="country_3" class="input__name">Страна 3</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="filter__division">


            </div>

            <div class="accordion" id="form__panel">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-form">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#form-collapseOne" aria-expanded="true" aria-controls="form-collapseOne">
                            <div class="caption">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/form.png">
                                Форма обучения
                            </div>
                        </button>
                    </h2>
                    <div id="form-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <div class="accordion__body__item">
                                <input type="checkbox" name="" id="form_1" class="checkbox__item" checked="checked">
                                <label for="form_1" class="input__name">Форма обучения 1</label>
                            </div>
                            <div class="accordion__body__item">
                                <input type="checkbox" name="" id="form_2" class="checkbox__item">
                                <label for="form_2" class="input__name">Форма обучения 2</label>
                            </div>
                            <div class="accordion__body__item">
                                <input type="checkbox" name="" id="form_3" class="checkbox__item">
                                <label for="form_3" class="input__name">Форма обучения 3</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="filter__division"></div>

            <div class="accordion" id="form__panel">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-direction">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#direction-collapseOne" aria-expanded="true" aria-controls="direction-collapseOne">
                            <div class="caption">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/direction.png">
                                Направление обучения
                            </div>
                        </button>
                    </h2>
                    <div id="direction-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <div class="accordion__body__item">
                                <input type="checkbox" name="" id="direction_1" class="checkbox__item" checked="checked">
                                <label for="direction_1" class="input__name">Направление обучения 1</label>
                            </div>
                            <div class="accordion__body__item">
                                <input type="checkbox" name="" id="direction_2" class="checkbox__item">
                                <label for="direction_2" class="input__name">Направление обучения 2</label>
                            </div>
                            <div class="accordion__body__item">
                                <input type="checkbox" name="" id="direction_3" class="checkbox__item">
                                <label for="direction_3" class="input__name">Направление обучения 3</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="universities__content">
            <div class="nav__box">
                <form class="search__panel" action="#" method="get">
                    <button type="submit" class="start__search"></button>
                    <input type="text" name="search__university" id="search__university" class="search__university" placeholder="Поиск">
                </form>
                <div class="sorted__box">
                    <a href="#!" class="kind__of__sort by__popularity">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/popularity.svg">
                        По популярности
                    </a>
                    <a href="#!" class="kind__of__sort by__price">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/price_up.svg">
                        По цене
                    </a>
                    <a href="#!" class="kind__of__sort by__price">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/price_down.svg">
                        По цене
                    </a>
                </div>
            </div>

            <div class="university__card">
                <!-- Слайдер -->
                <div class="slider__container">
                    <div class="swiper">
                        <div class="rating">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/star.svg">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/star.svg">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/star.svg">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/star.svg">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/star.svg">
                        </div>
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Слайды -->
                            <div class="swiper-slide">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/slider/slide_1.jpg" class="uni__foto">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/slider/slide_1.jpg" class="uni__foto">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/slider/slide_1.jpg" class="uni__foto">
                            </div>
                        </div>
                        <!-- Слайдер кнопки навигации -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
                <!-- Слайдер окончание -->

                <a href="#!" class="uni__data">
                    <div class="uni__name">Название университета</div>
                    <div class="uni__price__box">
                        <div class="uni__price__dashed__top"></div>
                        <div class="uni__price__dashed__left"></div>
                        <div class="price__box__inner">
                            <div class="rating">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/star.svg">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/star.svg">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/star.svg">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/star.svg">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/star.svg">
                            </div>
                            <div class="uni__pice__box">
                                <div class="uin__price">
                                    от 3 000 €
                                </div>
                                <div class="price__unit">
                                    за семестр
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uni__data__form uni__studi__form">
                        <div class="studi__form__item">
                            Бакалавриат
                        </div>
                        <div class="studi__form__item">
                            Магистратура
                        </div>
                    </div>
                    <div class="uni__data__form uni__studi__direction">
                        <div class="studi__form__item">
                            Архитектура
                        </div>
                        <div class="studi__form__item">
                            Архитектура
                        </div>
                        <div class="studi__form__item">
                            Архитектура
                        </div>
                        <div class="studi__form__item">
                            Архитектура
                        </div>
                        <div class="studi__form__item">
                            Архитектура
                        </div>
                        <div class="studi__form__item">
                            Архитектура
                        </div>
                        <div class="studi__form__item">
                            Архитектура
                        </div>
                        <div class="more__information">
                            Ещё 30...
                        </div>
                    </div>
                    <div class="uni__data__form uni__country">
                        <div class="country__address__1">
                            <b>Москва,</b> &nbsp Россия
                        </div>
                        <div class="division__dashed"></div>
                        <div class="country__address__2">
                            <b>Москва,</b> &nbsp Россия
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>


<!-- Боковое меню фильтров -->
<div class="offcanvas offcanvas-end" data-bs-scroll="false" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Фильтры</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
    </div>
    <div class="offcanvas__box">
        <div class="offcanvas-body">
            <div class="universities__filtres">
                <div class="accordion" id="country__panel">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-country">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#country-collapseOne" aria-expanded="true" aria-controls="country-collapseOne">
                                <div class="caption">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/flag.png">
                                    Страны
                                </div>
                            </button>
                        </h2>
                        <div id="country-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="accordion__body__item">
                                    <input type="checkbox" name="" id="country_1_1" class="checkbox__item" checked="checked">
                                    <label for="country_1_1" class="input__name">Страна 1</label>
                                </div>
                                <div class="accordion__body__item">
                                    <input type="checkbox" name="" id="country_1_2" class="checkbox__item">
                                    <label for="country_1_2" class="input__name">Страна 2</label>
                                </div>
                                <div class="accordion__body__item">
                                    <input type="checkbox" name="" id="country_1_3" class="checkbox__item">
                                    <label for="country_1_3" class="input__name">Страна 3</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter__division">
                </div>
                <div class="accordion" id="form__panel">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-form">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#form-collapseOne" aria-expanded="true" aria-controls="form-collapseOne">
                                <div class="caption">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/form.png">
                                    Форма обучения
                                </div>
                            </button>
                        </h2>
                        <div id="form-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="accordion__body__item">
                                    <input type="checkbox" name="" id="form_1_1" class="checkbox__item" checked="checked">
                                    <label for="form_1_1" class="input__name">Форма обучения 1</label>
                                </div>
                                <div class="accordion__body__item">
                                    <input type="checkbox" name="" id="form_1_2" class="checkbox__item">
                                    <label for="form_1_2" class="input__name">Форма обучения 2</label>
                                </div>
                                <div class="accordion__body__item">
                                    <input type="checkbox" name="" id="form_1_3" class="checkbox__item">
                                    <label for="form_1_3" class="input__name">Форма обучения 3</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="filter__division"></div>

                <div class="accordion" id="form__panel">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-direction">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#direction-collapseOne" aria-expanded="true" aria-controls="direction-collapseOne">
                                <div class="caption">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/direction.png">
                                    Направление обучения
                                </div>
                            </button>
                        </h2>
                        <div id="direction-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="accordion__body__item">
                                    <input type="checkbox" name="" id="direction_1_1" class="checkbox__item" checked="checked">
                                    <label for="direction_1_1" class="input__name">Направление обучения 1</label>
                                </div>
                                <div class="accordion__body__item">
                                    <input type="checkbox" name="" id="direction_1_2" class="checkbox__item">
                                    <label for="direction_1_2" class="input__name">Направление обучения 2</label>
                                </div>
                                <div class="accordion__body__item">
                                    <input type="checkbox" name="" id="direction_1_3" class="checkbox__item">
                                    <label for="direction_1_3" class="input__name">Направление обучения 3</label>
                                </div>
                            </div>
                        </div>
                        <button href="#!" class="filtres__btn" data-bs-toggle="offcanvas" type="button" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <div class="icon__circle">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/ok.svg">
                            </div>
                            Применить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Объявляем переменные -->
<?php
$countrys = [];
$country_match = false;
?>

<div class="container" style="margin-top: 100px; margin-bottom: 100px;">

    <?php

    global $post;

    $myposts = get_posts([
        'numberposts' => -1,
        'offset'      => 1,
        'category'    => 11
    ]);

    if ($myposts) {
        foreach ($myposts as $post) {
            setup_postdata($post);
    ?>
            <!-- Вывод постов, функции цикла: the_title() и т.д. -->

            <?php

            foreach ($countrys as $country) {
                if ($country === get_field('university-country')) {
                    $country_match = true;
                    break;
                }
            }
            if ($country_match === false) {
                array_push($countrys, get_field('university-country'));
            } else $country_match = false;
            ?>

    <?php
        }
    } else {
        // Постов не найдено
    }

    wp_reset_postdata(); // Сбрасываем $post
    ?>

    <?php
    foreach ($countrys as $country) {
        echo $country;
        echo '<br>';
    }
    ?>

</div>

<?php

the_field('country');

get_footer();

?>
<?php
/*
Template Name: Университеты
*/

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style-unis', get_template_directory_uri() . '/assets/unis/css/style.css');
    wp_enqueue_script('cooke', get_template_directory_uri() . '/assets/unis/js/cooke.js', 'null', 'null', true);
    wp_enqueue_script('swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', 'null', 'null', true);
    wp_enqueue_script('slider-unis', get_template_directory_uri() . '/assets/unis/js/slider.js', array('swiper-bundle'), 'null', true);
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
        if (get_field('about_activity')) {
            $countriesList[] = get_field('position_country');
            $formList[] = get_field('study-form');
            $speciality[] = get_field('speciality');

            $uni[] = [
                'id' => get_the_ID(),
                'name' => get_the_title(),
                'country' => get_field('position_country'),
                'address' => get_field('position_address'),
                'study_form' =>  get_field('study-form'),
                'speciality' => get_field('speciality'),
                'popularity' => get_field('about_popularity'),
                'price' => get_field('about_price'),
                'galerey' => get_post_gallery_images()
            ];
        }
    }
}
wp_reset_postdata(); // Сбрасываем $post




if (count($_POST)) {
    $uni_filtred = [];
    // Фильтрация по странам
    foreach ($uni as $item) {
        if (isset($_POST['country_' . $item['country']])) {
            $uni_filtred[] = $item;
        }
    }

    for ($i = 0; $i < count($uni_filtred); $i++) {
        $uni_filtred[$i]['study_form'] = removeSpacesAndConvertToArray($uni_filtred[$i]['study_form']);
        $uni_filtred[$i]['speciality'] = removeSpacesAndConvertToArray($uni_filtred[$i]['speciality']);
    }

    // Фильтрация по формам обучения
    $tmp = [];
    for ($i = 0; $i < count($uni_filtred); $i++) {
        foreach ($uni_filtred[$i]['study_form'] as $item) {
            if (isset($_POST["form_" . str_replace(' ', '_', $item)])) {
                $tmp[] = $uni_filtred[$i];
                break;
            }
        }
    }
    $uni_filtred = $tmp;
    unset($tmp);


    // Фильтрация по специальностям
    $tmp = [];
    for ($i = 0; $i < count($uni_filtred); $i++) {
        foreach ($uni_filtred[$i]['speciality'] as $item) {
            if (isset($_POST["speciality_" . str_replace(' ', '_', $item)])) {
                $tmp[] = $uni_filtred[$i];
                break;
            }
        }
    }
    $uni_filtred = $tmp;
    unset($tmp);
} elseif (!count($_POST) && isset($_COOKIE['countries'])) {
    // Фильтрация по странам из куков
    foreach ($uni as $item) {
        if (str_contains($_COOKIE['countries'], $item['country'])) {
            $uni_filtred[] = $item;
        }
    }

    for ($i = 0; $i < count($uni_filtred); $i++) {
        $uni_filtred[$i]['study_form'] = removeSpacesAndConvertToArray($uni_filtred[$i]['study_form']);
        $uni_filtred[$i]['speciality'] = removeSpacesAndConvertToArray($uni_filtred[$i]['speciality']);
    }

    // Фильтрация по формам обучения из куков
    $tmp = [];
    for ($i = 0; $i < count($uni_filtred); $i++) {
        foreach ($uni_filtred[$i]['study_form'] as $item) {
            if (str_contains($_COOKIE['study_form'], $item)) {
                $tmp[] = $uni_filtred[$i];
                break;
            }
        }
    }
    $uni_filtred = $tmp;
    unset($tmp);

    // Фильтрация по специальностям из куков
    $tmp = [];
    for ($i = 0; $i < count($uni_filtred); $i++) {
        foreach ($uni_filtred[$i]['speciality'] as $item) {
            if (str_contains($_COOKIE['speciality'], $item)) {
                $tmp[] = $uni_filtred[$i];
                break;
            }
        }
    }
    $uni_filtred = $tmp;
    unset($tmp);
} else {
    $uni_filtred = $uni;
}

// Фильтрация по имени университета
if (isset($_POST['search__university'])) {
    $tmp = [];
    for ($i = 0; $i < count($uni_filtred); $i++) {
        if (str_contains(mb_strtolower($uni_filtred[$i]['name']), htmlspecialchars(mb_strtolower($_POST['search__university'])))) {
            $tmp[] = $uni_filtred[$i];
        }
    }
    $uni_filtred = $tmp;
    unset($tmp);
}

// Сортировка
if (isset($_COOKIE['sorted_by'])) {
    if ($_COOKIE['sorted_by'] === 'popularity') {
        usort($uni_filtred, function ($a, $b) {
            return ($b['popularity'] - $a['popularity']);
        });
    }
    if ($_COOKIE['sorted_by'] === 'price_up') {
        usort($uni_filtred, function ($a, $b) {
            return ($a['price'] - $b['price']);
        });
    }
    if ($_COOKIE['sorted_by'] === 'price_down') {
        usort($uni_filtred, function ($a, $b) {
            return ($b['price'] - $a['price']);
        });
    }
}

?>



<section class="unis container">
    <div class="page-link col-12 tmp">
        <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/ui/home.svg"><?php echo get_the_title(8); ?> &nbsp &nbsp ></a><?php wp_title('', 'true', ''); ?>
    </div>
    <h2 id="myUniversitets">Университеты</h2>
    <div class="vector"></div>

    <button href="#!" class="filtres__btn" data-bs-toggle="offcanvas" type="button" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <div class="icon__circle">
            <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/filter.svg">
        </div>
        Фильтры
    </button>

    <form class="universities__container" method="post" action="#myUniversitets" id="universities__filtres">
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

                    <!-- Фильтр по странам -->
                    <div id="country-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <?php
                            deliteDuplicateAndSort($countriesList);
                            foreach ($countriesList as $country) {
                                echo '<div class="accordion__body__item">';
                                echo "<input type='checkbox' class='checkbox__item country__item' name='country_$country' id='$country'";
                                if (!isset($_COOKIE['countries']) || str_contains($_COOKIE['countries'], $country)) {
                                    echo "checked='checked'";
                                }
                                echo "><label for='$country' class='input__name'>$country</label>";
                                echo '</div>';
                            }
                            ?>
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

                            <!-- Фильтр по формам обучения -->
                            <?php

                            // joinInArray($formList);
                            // deliteDuplicateAndSort($formList);
                            foreach (prepareArray($formList) as $item) {
                                echo '<div class="accordion__body__item">';
                                echo "<input type='checkbox' class='checkbox__item study__form__item' name='form_$item' id='$item'";
                                if (!isset($_COOKIE['study_form']) || str_contains($_COOKIE['study_form'], $item)) {
                                    echo "checked='checked'";
                                }
                                echo "><label for='$item' class='input__name'>$item</label>";
                                echo '</div>';
                            }
                            ?>
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
                            <!-- Фильтр по специальностям -->
                            <?php
                            // joinInArray($speciality);
                            // deliteDuplicateAndSort($speciality);
                            foreach (prepareArray($speciality) as $item) {
                                echo '<div class="accordion__body__item">';
                                echo "<input type='checkbox' class='checkbox__item speciality__item' name='speciality_$item' id='$item'";
                                if (!isset($_COOKIE['speciality']) || str_contains($_COOKIE['speciality'], $item)) {
                                    echo "checked='checked'";
                                }
                                echo "><label for='$item' class='input__name'>$item</label>";
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="universities__content">
            <div class="nav__box">
                <div class="search__panel">
                    <button type="submit" class="start__search"></button>
                    <input type="text" name="search__university" id="search__university" class="search__university" placeholder="Поиск">
                </div>
                <div class="sorted__box">
                    <a href="#!" class="kind__of__sort by__popularity">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/popularity.svg">
                        По популярности
                    </a>
                    <a href="#!" class="kind__of__sort by__price price__up">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/price_up.svg">
                        По цене
                    </a>
                    <a href="#!" class="kind__of__sort by__price price__down">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/price_down.svg">
                        По цене
                    </a>
                </div>
            </div>


            <?php
            foreach ($uni_filtred as $item) {
                echo ('<div class="university__card">
                <!-- Слайдер -->
                <div class="slider__container">
                    <div class="swiper">
                        <div class="rating">');
                for ($i = 0; $i < $item['popularity']; $i++) {
                    echo ('<img src="' . get_bloginfo('template_directory') . '/assets/unis/img/star.svg">');
                }
                echo ('
                        </div>
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">');

                foreach ($item['galerey'] as $itemGalerey) {
                    echo ('<div class="swiper-slide">');
                    echo ('<img src="' . $itemGalerey . '" class="uni__foto">');
                    echo ('</div>');
                }

                echo ('</div>
                        <!-- Слайдер кнопки навигации -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
                <!-- Слайдер окончание -->

                <a href="' . home_url() . '/about_university?id=');
                echo ($item['id']);
                echo ('" class="uni__data">
                    <div class="uni__name">' . $item['name'] . '</div>
                    <div class="uni__price__box">
                        <div class="uni__price__dashed__top"></div>
                        <div class="uni__price__dashed__left"></div>
                        <div class="price__box__inner">
                            <div class="rating">');
                for ($i = 0; $i < $item['popularity']; $i++) {
                    echo ('<img src="' . get_bloginfo('template_directory') . '/assets/unis/img/star.svg">');
                }
                echo ('
                            </div>
                            <div class="uni__pice__box">
                                <div class="uin__price">
                                    от ' . number_format($item['price'], 0, '', ' ') . ' €
                                </div>
                                <div class="price__unit">
                                    за семестр
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uni__data__form uni__studi__form">');

                // echo('<pre>');
                // print_r($item['study_form']);
                // echo('<pre>');

                if ((count(removeSpacesAndConvertToArray($item['study_form'])) <= 4)) {
                    for ($i = 0; $i < count(removeSpacesAndConvertToArray($item['study_form'])); $i++) {
                        echo '<div class="studi__form__item">';
                        echo (cutStr(removeSpacesAndConvertToArray($item['study_form'])[$i], 17, '.'));
                        echo '</div>';
                    }
                } else {
                    for ($i = 0; $i < 3; $i++) {
                        echo '<div class="studi__form__item">';
                        echo (cutStr(removeSpacesAndConvertToArray($item['study_form'])[$i], 17, '.'));
                        echo '</div>';
                    }
                    echo '<div class="more__information">';
                    echo ('Ещё ' . count(removeSpacesAndConvertToArray($item['study_form'])) - 3 . '...');
                    echo '</div>';
                }
                echo ('
                    </div>
                    <div class="uni__data__form uni__studi__direction">');

                if ((count(removeSpacesAndConvertToArray($item['speciality'])) <= 8)) {
                    for ($i = 0; $i < count(removeSpacesAndConvertToArray($item['speciality'])); $i++) {
                        echo '<div class="studi__form__item">';
                        echo (cutStr(removeSpacesAndConvertToArray($item['speciality'])[$i], 17, '.'));
                        echo '</div>';
                    }
                } else {
                    for ($i = 0; $i < 7; $i++) {
                        echo '<div class="studi__form__item">';
                        echo (cutStr(removeSpacesAndConvertToArray($item['speciality'])[$i], 17, '.'));
                        echo '</div>';
                    }
                    echo '<div class="more__information">';
                    echo ('Ещё ' . count(removeSpacesAndConvertToArray($item['speciality'])) - 7 . '...');
                    echo '</div>';
                }

                echo ('
                    </div>
                    <div class="uni__data__form uni__country">
                        <div class="country__address__1">
                            <b>');
                echo ($item['country']);
                echo ('</b>
                        </div>
                        <div class="division__dashed"></div>
                        <div class="country__address__2">');
                echo ($item['address']);
                echo ('
                        </div>
                    </div>
                </a>
            </div>');
            } ?>
        </div>
    </form>
</section>

<?php
get_template_part('contact_us');

get_template_part('contacts');

// Модальное окно
get_template_part('connect-window');
?>

<!-- Боковое меню фильтров -->
<div class="offcanvas offcanvas-end" data-bs-scroll="false" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Фильтры</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
    </div>
    <form class="offcanvas__box" method="post">
        <div class="offcanvas-body">
            <div class="universities__filtres">
                <div class="accordion" id="country__panel">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-country">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#country-mobile" aria-expanded="true" aria-controls="country-collapseOne">
                                <div class="caption">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/flag.png">
                                    Страны
                                </div>
                            </button>
                        </h2>
                        <div id="country-mobile" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <!-- Фильтр по странам -->
                                <?php
                                deliteDuplicateAndSort($countriesList);
                                foreach ($countriesList as $country) {
                                    echo '<div class="accordion__body__item">';
                                    echo "<input type='checkbox' class='checkbox__item new__country__item' name='$country' id='mobile_filter_$country'";
                                    if (!isset($_COOKIE['countries']) || str_contains($_COOKIE['countries'], $country)) {
                                        echo "checked='checked'";
                                    }
                                    echo "><label for='mobile_filter_$country' class='input__name'>$country</label>";
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter__division">
                </div>
                <div class="accordion" id="form__panel">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-form">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#form-mobile" aria-expanded="true" aria-controls="form-collapseOne">
                                <div class="caption">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/form.png">
                                    Форма обучения
                                </div>
                            </button>
                        </h2>
                        <div id="form-mobile" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <!-- Фильтр по формам обучения -->
                                <?php
                                // joinInArray($formList);
                                // deliteDuplicateAndSort($formList);
                                foreach (prepareArray($formList) as $item) {
                                    echo '<div class="accordion__body__item">';
                                    echo "<input type='checkbox' class='checkbox__item new__study__form__item' name='$item' id='mobile_filter_$item'";
                                    if (!isset($_COOKIE['study_form']) || str_contains($_COOKIE['study_form'], $item)) {
                                        echo "checked='checked'";
                                    }
                                    echo "><label for='mobile_filter_$item' class='input__name'>$item</label>";
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="filter__division"></div>

                <div class="accordion" id="form__panel">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-direction">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#direction-mobile" aria-expanded="true" aria-controls="direction-collapseOne">
                                <div class="caption">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/direction.png">
                                    Направление обучения
                                </div>
                            </button>
                        </h2>
                        <div id="direction-mobile" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <!-- Фильтр по специальностям -->
                                <?php
                                foreach (prepareArray($speciality) as $item) {
                                    echo '<div class="accordion__body__item">';
                                    echo "<input type='checkbox' class='checkbox__item new__speciality__item' name='$item' id='mobile_filter_$item'";
                                    if (!isset($_COOKIE['speciality']) || str_contains($_COOKIE['speciality'], $item)) {
                                        echo "checked='checked'";
                                    }
                                    echo "><label for='mobile_filter_$item' class='input__name'>$item</label>";
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <button class="filtres__btn" id="filtres__mobile__btn" disabled="true" data-bs-toggle="offcanvas" type="button" data-bs-target="#universities__filtres" aria-controls="offcanvasRight">
                <div class="icon__circle">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/unis/img/ok.svg">
                </div>
                Применить
            </button>
        </div>
    </form>
</div>

<?php

get_footer();

?>
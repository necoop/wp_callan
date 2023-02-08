<?php
/*
Template Name: Об университете
*/

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style-about-university', get_template_directory_uri() . '/assets/about_university/css/style.css');
    wp_enqueue_style('style-university', get_template_directory_uri() . '/assets/unis/css/style.css');
    wp_enqueue_script('swiper-about-university', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', 'null', 'null', true);
    wp_enqueue_script('slider-about-university', get_template_directory_uri() . '/assets/about_university/js/slider.js', array('swiper-bundle'), 'null', true);
});

get_header();

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
        <h2><?php echo $uni['name']; ?></h2>
        <div class="vector"></div>
        <div class="unis__info__outer">
            <div class="unis__info__top row">
                <div class="col-lg-8 col-md-12">
                    <div class="unis__foto">
                        <div class="rating">
                            <img src="./unis/img/star.svg">
                            <img src="./unis/img/star.svg">
                            <img src="./unis/img/star.svg">
                            <img src="./unis/img/star.svg">
                            <img src="./unis/img/star.svg">
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
                                    <div class="data">США, Флорида</div>
                                </div>
                            </li>
                            <li class="unis__data__item" id="unis__data__item2">
                                <div class="unis__data__inner">
                                    <div class="title">Язык обучения</div>
                                    <div class="data">Английский</div>
                                </div>
                            </li>
                            <li class="unis__data__item" id="unis__data__item3">
                                <div class="unis__data__inner">
                                    <div class="title">Год основания</div>
                                    <div class="data">1990</div>
                                </div>
                            </li>
                            <li class="unis__data__item" id="unis__data__item4">
                                <div class="unis__data__inner">
                                    <div class="title">Кол-во студентов</div>
                                    <div class="data">10 000</div>
                                </div>
                            </li>
                            <li class="unis__data__item" id="unis__data__item5">
                                <div class="unis__data__inner">
                                    <div class="title">Средняя цена за семестр</div>
                                    <div class="data">1 000 евро</div>
                                </div>
                            </li>
                            <li class="unis__data__item" id="unis__data__item6">
                                <div class="unis__data__inner">
                                    <div class="title">Средняя цена за проживание</div>
                                    <div class="data">1 000 евро</div>
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
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae voluptatibus
                                tenetur totam adipisci eum neque vitae aliquid. Voluptatibus ipsam officiis sunt
                                sint, eius quo quidem repellendus iure amet vero? Reprehenderit sunt obcaecati
                                consequuntur molestiae error ad cum quas deleniti ipsam repellat voluptate natus
                                labore consequatur, laboriosam, veniam voluptatibus vero aut!
                            </p>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio accusamus sed
                                sequi soluta omnis vero ea accusantium corporis, quibusdam illum.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta vitae sit quis aperiam
                                eius placeat labore nam totam laboriosam? Autem quisquam animi, nisi deserunt nemo
                                consectetur, illo fugit ullam consequatur quae laudantium. Facere commodi, possimus
                                corporis ipsum enim debitis deserunt quidem exercitationem, asperiores aspernatur
                                perferendis maxime! Eos rerum sint porro aliquid. Maiores sit dolores quia eum
                                similique rem dolor deserunt eveniet facilis, veritatis doloribus ex provident in
                                vitae vel aliquid sequi perferendis ipsum? Repudiandae praesentium incidunt magni et
                                quidem, soluta alias? Inventore ducimus corporis quos, accusantium nisi magnam nulla
                                unde est quas voluptatibus voluptas corrupti dolorem blanditiis, deserunt,
                                voluptatum ab!</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, consequatur
                                voluptates repellat nihil, repellendus quasi vel aliquam impedit doloremque
                                architecto, earum est nesciunt suscipit eaque excepturi reprehenderit! Repellat,
                                molestias in?</p>
                        </div>
                    </div>
                </div>
                <div class="document__box col-lg-4 col-md-12">
                    <div class="document__box__inner">
                        <h3>Документы для поступления</h3>
                        <ul class="document__list">
                            <li class="document__item">Название документа</li>
                            <li class="document__item">Название документа</li>
                            <li class="document__item">Название документа</li>
                            <li class="document__item">Название документа</li>
                            <li class="document__item">Название документа</li>
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
                                        <li>Бакалавриат</li>
                                        <li>Аспирантура</li>
                                        <li>Магистратура</li>
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
                                        <li class="col-xl-3 col-md-6 col-sm-12">Архитектура</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Электроника</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Теплотехника</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Архитектура</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Электроника</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Теплотехника</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Архитектура</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Электроника и электротехника в
                                            сельском хозяйстве</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Теплотехника</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Архитектура</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Электроника</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Теплотехника</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Архитектура</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Электроника</li>
                                        <li class="col-xl-3 col-md-6 col-sm-12">Теплотехника</li>
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
                    <div class="swiper-slide">
                        <img src="./uni_item/img/slide_2.jpg">
                    </div>
                    <div class="swiper-slide">
                        <img src="./uni_item/img/slide_3.jpg">
                    </div>
                    <div class="swiper-slide">
                        <img src="./uni_item/img/slide_4.jpg">
                    </div>
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

    echo('<pre>');
    print_r($uni);
    echo('</pre>');


    get_footer();

    ?>
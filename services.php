<?php
/*
Template Name: Раздел Услуги
*/
?>

<section class="services">
    <div class="container-ibg">
        <div class="container">
            <h2 col-xl-12><?php echo get_the_category_by_ID(10); ?></h2>
            <h3><?php echo category_description(10); ?></h3>
            <ul class="service-list row">
                <?php
                global $post;
                $myposts = get_posts([
                    'numberposts' => -1,
                    'category'    => 10
                ]);
                if ($myposts) {
                    foreach ($myposts as $post) {
                        setup_postdata($post);
                ?>
                        <li class="service-item col-xl-4 col-md-6 col-sm-12" id="servise-item-1">
                            <div class="servise-item-inner">
                                <div class="service-item-box">
                                    <?php
                                    the_post_thumbnail(
                                        array(-1, 110), // размер изображения
                                        array('class' => 'service-img-item') // передаем класс
                                    );
                                    ?>
                                    <h3><?php the_content(); ?></h3>
                                </div>
                            </div>
                        </li>
                <?php
                    }
                }
                wp_reset_postdata(); // Сбрасываем $post
                ?>
            </ul>
        </div>
    </div>
</section>

<div class="container-ibg services-ibg">
    <img src="<?php bloginfo('template_directory'); ?>/assets/about-us/img/services/cloud-bottom.png" class="ibg-bottom">
    <img src="<?php bloginfo('template_directory'); ?>/assets/about-us/img/services/cloud-bottom.png" class="ibg-top">
</div>
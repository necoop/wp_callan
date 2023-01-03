<?php
/*
Template Name: Раздел О нас
*/
?>

<section class="about-us">
    <div class="container">
        <div class="row">
            <div class="page-link col-12">
                <a href="<?php bloginfo('url'); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/ui/home.svg">
                    <?php echo get_the_title(8); ?> &nbsp &nbsp >
                </a>
                <?php wp_title('', 'true', ''); ?>
            </div>
        </div>
        <h2><?php echo get_the_category_by_ID(9); ?></h2>
        <div class="row about-us-container">

            <?php
            global $post;

            $myposts = get_posts([
                'numberposts' => 1,
                'category'    => 9
            ]);

            if ($myposts) {
                foreach ($myposts as $post) {
                    setup_postdata($post);
            ?>
                    <!-- Вывод постов, функции цикла: the_title() и т.д. -->
                    <div class="about-us-text col-xl-6 col-sm-12">
                        <span><?php the_content(); ?></span>
                    </div>
                    <?php the_post_thumbnail(
                        array(-1, 430), // размер изображения
                        array('class' => 'about-us-img col-xl-6 col-sm-12') // передаем класс
                    );
                    ?>
            <?php
                }
            } else

                wp_reset_postdata(); // Сбрасываем $post
            ?>
        </div>
    </div>
</section>
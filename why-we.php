<?php
/*
Template Name: why-we
*/
?>

<section class="welcome container" id="about-us">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-4 col-md-6 col-sm-12">
                <?php echo category_description(6); ?>
                <h2><?php echo get_the_category_by_ID(6); ?></h2>
            </div>
        </div>
        <div class="row">

            <?php
            global $post;

            $myposts = get_posts([
                'numberposts' => -1,
                'offset'      => 1,
                'category'    => 6
            ]);

            if ($myposts) {
                foreach ($myposts as $post) {
                    setup_postdata($post);
            ?>
                    <!-- Вывод постов, функции цикла: the_title() и т.д. -->
                    <div class="col-xl-4 col-md-6 col-sm-12 text-center welcome-box">
                        <div class="welcome-inner">
                            <div class="welcome-inner-box">
                                <div class="welcome-inner-text">
                                    <?php the_post_thumbnail(
                                        array(-1, 125),
                                        array('class' => 'welcome-img')
                                    ); ?>
                                    <?php the_title(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }

            wp_reset_postdata(); // Сбрасываем $post
            ?>
           
        </div>
    </div>
</section>
<?php
/*
Template Name: Страница Услуги
*/

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('about-us-style', get_template_directory_uri() . '/assets/about-us/css/style.css');
});


get_header(); ?>

<div class="about-us">
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
    </div>
</div>

<?php get_template_part('services');

get_template_part('contact_us');

get_template_part('contacts');

get_template_part('connect-window');

get_footer(); ?>
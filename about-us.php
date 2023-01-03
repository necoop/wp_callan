<?php
/*
Template Name: Страница О нас
*/

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('about-us-style', get_template_directory_uri() . '/assets/about-us/css/style.css');
});


get_header();

get_template_part('about_us');

get_template_part('services');

get_template_part('contact_us');

get_template_part('contacts');

get_template_part('connect-window');

get_footer(); ?>
<?php
/*
Template Name: home
*/

add_action('wp_enqueue_scripts', function () {
	wp_enqueue_script('swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', 'null', 'null', true);
	wp_enqueue_script('slider-universities', get_template_directory_uri() . '/assets/js/slider-universities.js', array('swiper-bundle'), 'null', true);
	wp_enqueue_script('slider-reviews', get_template_directory_uri() . '/assets/js/slider-reviews.js', array('swiper-bundle'), 'null', true);
	wp_enqueue_script('students-foto', get_template_directory_uri() . '/assets/js/students-foto.js', array('swiper-bundle'), 'null', true);
});

get_header();

get_template_part('main');

get_template_part('why-we');

get_template_part('slider-countries');

get_template_part('reviews-students');

get_template_part('students-foto');

get_template_part('questions');

get_template_part('contact_us');

get_template_part('contacts');

// Модальное окно
get_template_part('connect-window');

get_footer(); ?>
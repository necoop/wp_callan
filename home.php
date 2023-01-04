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

// Предзагрузка иконок кнопок
add_filter('wp_resource_hints', 'button_preload', 10, 2);
function button_preload($urls, $relation_type)
{
	if('preload' === $relation_type){
		$urls[] = [
			'href'        => get_bloginfo('template_directory') . "/assets/img/ui/minus-ico.svg",
			'as'          => 'image'
		];
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

?>

<?php

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
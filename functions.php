<?php

add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
	wp_enqueue_style('reset', get_template_directory_uri() . '/assets/css/reset.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');

	wp_enqueue_script('script-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', 'null', 'null', true);
	// wp_enqueue_script('swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', 'null', 'null', true);
	// wp_enqueue_script('slider-universities', get_template_directory_uri() . '/assets/js/slider-universities.js', array('swiper-bundle'), 'null', true);
	// wp_enqueue_script('slider-reviews', get_template_directory_uri() . '/assets/js/slider-reviews.js', array('swiper-bundle'), 'null', true);
	// wp_enqueue_script('students-foto', get_template_directory_uri() . '/assets/js/students-foto.js', array('swiper-bundle'), 'null', true);
	wp_enqueue_script('tel-mask', get_template_directory_uri() . '/assets/js/tel-mask.js', 'null', 'null', true);
});

add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
add_theme_support('title-tag');


add_action('wp_enqueue_scripts', 'art_feedback_scripts');
/**
 * Подключение файлов скрипта формы обратной связи
 *
 * @see https://wpruse.ru/?p=3224
 */
function art_feedback_scripts()
{

	// Обрабтка полей формы
	wp_enqueue_script('jquery-form');

	// Подключаем файл скрипта
	wp_enqueue_script(
		'feedback',
		get_stylesheet_directory_uri() . '/assets/js/feedback.js',
		array('jquery'),
		1.0,
		true
	);

	// Задаем данные обьекта ajax
	wp_localize_script(
		'feedback',
		'feedback_object',
		array(
			'url'   => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('feedback-nonce'),
		)
	);
}



// Подключение скрипта модального окна обратной связи
add_action('wp_ajax_feedback_action', 'ajax_action_callback');
add_action('wp_ajax_nopriv_feedback_action', 'ajax_action_callback');
/**
 * Обработка скрипта формы обратной связи
 *
 * @see https://wpruse.ru/?p=3224
 */
function ajax_action_callback()
{

	// Массив ошибок
	$err_message = array();

	// Проверяем nonce. Если проверка не прошла, то блокируем отправку
	if (!wp_verify_nonce($_POST['nonce'], 'feedback-nonce')) {
		wp_die('Данные отправлены с левого адреса');
	}

	// Проверяем на спам. Если скрытое поле заполнено или снят чек, то блокируем отправку
	if (false === $_POST['art_anticheck'] || !empty($_POST['art_submitted'])) {
		wp_die('Пошел нахрен, мальчик!(c)');
	}

	// Проверяем полей имени, если пустое, то пишем сообщение в массив ошибок
	if (empty($_POST['art_name']) || !isset($_POST['art_name'])) {
		$err_message['name'] = 'Пожалуйста, введите Ваше имя';
	} else {
		$art_name = sanitize_text_field($_POST['art_name']);
	}

	// Проверяем поле телефона, если пустое, то пишем сообщение по умолчанию
	if (empty($_POST['art_tel']) || !isset($_POST['art_tel'])) {
		$err_message['tel'] = 'Пожалуйста, введите номер телефона.';
		// $art_tel = 'Сообщение с сайта';
	} else {
		$art_tel = sanitize_text_field($_POST['art_tel']);
	}

	// Проверка полей сообщения, если пустое, то пишем сообщение в массив ошибок
	if (empty($_POST['art_comments']) || !isset($_POST['art_comments'])) {
		// $err_message['comments'] = '';
	} else {
		$art_comments = sanitize_textarea_field($_POST['art_comments']);
	}

	// Проверяем массив ошибок, если не пустой, то передаем сообщение. Иначе отправляем письмо
	if ($err_message) {
		wp_send_json_error($err_message);
	} else {

		// Указываем адресата
		$email_to = 'amok2005@gmail.com';

		// Если адресат не указан, то берем данные из настроек сайта
		if (!$email_to) {
			$email_to = get_option('admin_email');
		}

		$body    = "Имя: $art_name \nТелефон: $art_tel \n\nДополнительные комментарии: $art_comments";
		$headers = 'From: ' . $art_name . ' <' . $email_to . '>' . "\r\n" . 'Reply-To: ' . $email_to;

		// Отправляем письмо
		wp_mail($email_to, $body, $headers);

		// Отправляем сообщение об успешной отправке
		$message_success = '';
		wp_send_json_success($message_success);
	}

	// На всякий случай убиваем еще раз процесс ajax
	wp_die();
}

// Подключаем файл модального окна обратной связи
add_action('wp_enqueue_scripts', 'modal_art_feedback_scripts');
/**
 * Подключение файлов скрипта формы обратной связи
 *
 * @see https://wpruse.ru/?p=3224
 */
function modal_art_feedback_scripts()
{

	// Обрабтка полей формы
	wp_enqueue_script('jquery-form');

	// Подключаем файл скрипта
	wp_enqueue_script(
		'modal_feedback',
		get_stylesheet_directory_uri() . '/assets/js/modal_feedback.js',
		array('jquery'),
		1.0,
		true
	);

	// Задаем данные обьекта ajax
	wp_localize_script(
		'modal_feedback',
		'modal_feedback_object',
		array(
			'url'   => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('modal_feedback-nonce'),
		)
	);
}



add_action('wp_ajax_modal_feedback_action', 'modal_ajax_action_callback');
add_action('wp_ajax_nopriv_modal_feedback_action', 'modal_ajax_action_callback');
/**
 * Обработка скрипта формы обратной связи
 *
 * @see https://wpruse.ru/?p=3224
 */
function modal_ajax_action_callback()
{
	// Массив ошибок
	$err_message = array();
	// Проверяем nonce. Если проверка не прошла, то блокируем отправку
	if (!wp_verify_nonce($_POST['nonce'], 'modal_feedback-nonce')) {
		wp_die('Данные отправлены с левого адреса');
	} else {
	}

	// Проверяем на спам. Если скрытое поле заполнено или снят чек, то блокируем отправку
	if (false === $_POST['modal_art_anticheck'] || !empty($_POST['modal_art_submitted'])) {
		wp_die('Пошел нахрен, мальчик!(c)');
	}

	// Проверяем поле имени, если пустое, то пишем сообщение в массив ошибок
	if (empty($_POST['modal_art_name']) || !isset($_POST['modal_art_name'])) {
		$err_message['name'] = 'Пожалуйста, введите Ваше имя';
	} else {
		$modal_art_name = sanitize_text_field($_POST['modal_art_name']);
	}

	// Проверяем поле телефона, если пустое, то пишем сообщение по умолчанию
	if (empty($_POST['modal_art_tel']) || !isset($_POST['modal_art_tel'])) {
		$err_message['tel'] = 'Пожалуйста, введите номер телефона.';
		// $art_tel = 'Сообщение с сайта';
	} else {
		$modal_art_tel = sanitize_text_field($_POST['modal_art_tel']);
	}

	// Проверка полей сообщения, если пустое, то пишем сообщение в массив ошибок
	if (empty($_POST['modal_art_comments']) || !isset($_POST['modal_art_comments'])) {
		// $err_message['comments'] = '';
	} else {
		$modal_art_comments = sanitize_textarea_field($_POST['modal_art_comments']);
	}

	// Проверяем массив ошибок, если не пустой, то передаем сообщение. Иначе отправляем письмо
	if ($err_message) {

		wp_send_json_error($err_message);
	} else {

		// Указываем адресата
		$email_to = 'amok2005@gmail.com';

		// Если адресат не указан, то берем данные из настроек сайта
		if (!$email_to) {
			$email_to = get_option('admin_email');
		}

		$body    = "Имя: $modal_art_name \nТелефон: $modal_art_tel \n\nДополнительные комментарии: $modal_art_comments";
		$headers = 'From: ' . $modal_art_name . ' <' . $email_to . '>' . "\r\n" . 'Reply-To: ' . $email_to;

		// Отправляем письмо
		wp_mail($email_to, $body, $headers);

		// Отправляем сообщение об успешной отправке
		$message_success = '';
		wp_send_json_success($message_success);
	}

	// На всякий случай убиваем еще раз процесс ajax
	wp_die();
}
// Окончание подключения скрипта модального окна обратной связи

// ШОРТКОДЫ
// Форма обратной связи
add_shortcode('contactForm', 'show_contact_form');

function show_contact_form()
{ {
		return ('<form class="col-lg-6 contact-form" id="add_feedback">
        <div class="contact-form-inner">
          <img src="' . get_bloginfo("template_directory") . '/assets/img/contact-us/pen.png" class="contact-pen">
          <h2>Связаться с нами</h2>
          <h4>Оставьте свои данные и наш специалист обязательно свяжемся с Вами в течение дня</h4>

          <div class="name-form-box contact-form-box">
            <div class="form-icon-holder art_left_name"></div>
            <input type="text" name="art_name" id="user_name art_right_name" class="contact-form-input user-name form-label required art_right_name" placeholder="Ваше имя" value="">
          </div>

          <input type="email" name="art_email" id="art_email" class="art_email" style="display: none !important;" placeholder="Ваш E-Mail" value="" />
          <input type="checkbox" name="art_anticheck" id="art_anticheck" class="art_anticheck" style="display: none !important;" value="true" checked="checked" />
          <input type="text" name="art_submitted" id="art_submitted" value="" style="display: none !important;" />

          <div class="phone-form-box contact-form-box">
            <div class="form-icon-holder art_left_tel"></div>
            <input type="tel" name="art_tel" id="user_phone art_tel" class="art_right_tel contact-form-input user-phone form-label tel required" placeholder="+7 (___) ___-__-__">
          </div>

          <div class="input-group comment-form-box">
            <img src="' . get_bloginfo("template_directory") . '/assets/img/contact-us/comment.svg" class="input-group-text">
            <textarea class="form-control contact-form-input text-area-input art_comments" id="art_comments" aria-label="С текстовым полем" placeholder="Дополнительные комментарии" name="art_comments"></textarea>
          </div>

          <button type="submit" class="send-contact button">
            <div class="button-icon">
              <img src="' . get_bloginfo("template_directory") . '/assets/img/ui/send.svg">
            </div>
            <input class="button-text button" id="submit-feedback" type="submit" value="Отправить"></input>
          </button>
        </div>
      </form>');
	}
}
// Окончание Шорткоды 

## Отключает Гутенберг (новый редактор блоков в WordPress).
## ver: 1.2
if ('disable_gutenberg') {
	remove_theme_support('core-block-patterns'); // WP 5.5

	add_filter('use_block_editor_for_post_type', '__return_false', 100);

	remove_action('wp_enqueue_scripts', 'wp_common_block_scripts_and_styles');

	add_action('admin_init', function () {
		remove_action('admin_notices', ['WP_Privacy_Policy_Content', 'notice']);
		add_action('edit_form_after_title', ['WP_Privacy_Policy_Content', 'notice']);
	});
}
## Окончание отключения Гутенберг (новый редактор блоков в WordPress).

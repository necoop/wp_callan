<?
// Подключение скрипта модального окна обратной связи
add_action('wp_ajax_feedback_action', 'ajax_action_form_send');
add_action('wp_ajax_nopriv_feedback_action', 'ajax_action_form_send');
/**
 * Обработка скрипта формы обратной связи
 *
 * @see https://wpruse.ru/?p=3224
 */
function ajax_action_form_send()
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
?>
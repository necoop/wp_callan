jQuery(document).ready(function ($) {
    var add_form = $('#consultation');

    // Сброс значений полей
    $('#consultation input, #consultation textarea').on('blur', function () {
        $('#consultation input, #consultation textarea').removeClass('error');
        $('.error-first_name, .error-last_name, .error-birth_date, .error-city, .error-phone, .error-consultation_email, .error-english, .error-programm, .error-start_date, .message-success').remove();
        $('#consultation-feedback').val('Отправить');
    });

    // Отправка значений полей
    var options = {
        url: consultation_object.url,
        data: {
            action: 'consultation_action',
            nonce: consultation_object.nonce
        },
        type: 'POST',
        dataType: 'json',
        beforeSubmit: function (xhr) {
            // При отправке формы меняем надпись на кнопке
            $('#consultation-feedback').val('Отправляем...');
        },
        success: function (request, xhr, status, error) {
            
            if (request.success === true) {
                // Если все поля заполнены, отправляем данные и меняем надпись на кнопке
                add_form.after('<div class="message-success">' + request.data + '</div>').slideDown();
                $('#consultation-feedback').val('Отправлено!');
            } else {
                // Если поля не заполнены, выводим сообщения и меняем надпись на кнопке
                $.each(request.data, function (key, val) {
                    $('.art_' + key).addClass('error');
                    $('.art_' + key).before('<span class="error-' + key + '">' + val + '</span>');
                });
                $('#consultation-feedback').val('Что-то пошло не так...');

            }
            // При успешной отправке сбрасываем значения полей
            $('#consultation')[0].reset();
        },
        error: function (request, status, error) {
            $('#consultation-feedback').val('Ошибка...');
        }
    };
    // Отправка формы
    add_form.ajaxForm(options);
});
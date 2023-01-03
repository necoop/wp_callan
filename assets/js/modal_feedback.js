jQuery(document).ready(function ($) {
    var add_form = $('#modal_add_feedback');

    // Сброс значений полей
    $('#modal_add_feedback input, #modal_add_feedback textarea').on('blur', function () {
        $('#modal_add_feedback input, #modal_add_feedback textarea, .modal_art_left_name, .modal_art_left_tel').removeClass('error');
        $('.error-tel,.error-name,.error-comments,.message-success').remove();
        $('#modal_submit-feedback').val('Отправить');
    });

    // Отправка значений полей
    var options = {
        url: modal_feedback_object.url,
        data: {
            action: 'modal_feedback_action',
            nonce: modal_feedback_object.nonce
        },
        type: 'POST',
        dataType: 'json',
        beforeSubmit: function (xhr) {
            // При отправке формы меняем надпись на кнопке
            $('#modal_submit-feedback').val('Отправляем...');
        },
        success: function (request, xhr, status, error) {

            if (request.success === true) {
                // Если все поля заполнены, отправляем данные и меняем надпись на кнопке
                add_form.after('<div class="message-success">' + request.data + '</div>').slideDown();
                $('#modal_submit-feedback').val('Отправлено!');
            } else {
                // Если поля не заполнены, выводим сообщения и меняем надпись на кнопке
                $.each(request.data, function (key, val) {
                    $('.modal_art_left_' + key).addClass('error');
                    $('.modal_art_right_' + key).addClass('error');
                    $('.modal_art_right_' + key).before('<span class="error-' + key + '">' + val + '</span>');
                });
                $('#modal_submit-feedback').val('Ошибка!');

            }
            // При успешной отправке сбрасываем значения полей
            $('#modal_add_feedback')[0].reset();
        },
        error: function (request, status, error) {
            $('#modal_submit-feedback').val('Что-то не так...');
        }
    };
    // Отправка формы
    add_form.ajaxForm(options);
});
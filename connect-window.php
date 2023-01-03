<?php
/*
Template Name: connect-window
*/
?>

<div class="modal fade" id="buttonConnect" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="contact-form modal-body" id="modal_add_feedback">
        <div class="contact-form-inner">
          <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Закрыть">
            <img src="<?php bloginfo('template_directory'); ?>/assets/img/ui/X-mark.svg">
          </button>
          <h2>Связаться с нами</h2>
          <h4>Оставьте свои данные и наш специалист обязательно свяжемся с Вами в течение дня</h4>
          <div class="name-form-box contact-form-box">
            <div class="form-icon-holder modal_art_left_name"></div>
            <input type="text" name="modal_art_name" id="modal_user_name modal_art_right_name" class="contact-form-input user-name form-label required modal_art_right_name" placeholder="Ваше имя">
          </div>

          <input type="email" name="modal_art_email" id="modal_art_email" class="modal_art_email" style="display: none !important;" placeholder="Ваш E-Mail" value="" />
          <input type="checkbox" name="modal_art_anticheck" id="modal_art_anticheck" class="modal_art_anticheck" style="display: none !important;" value="true" checked="checked" />
          <input type="text" name="modal_art_submitted" id="modal_art_submitted" value="" style="display: none !important;" />

          <div class="phone-form-box contact-form-box">
            <div class="form-icon-holder modal_art_left_tel"></div>
            <input type="tel" name="modal_art_tel" id="user_phone modal_art_tel" class="modal_art_right_tel contact-form-input user-phone form-label tel required" placeholder="+7 (___) ___-__-__">
          </div>

          <div class="input-group comment-form-box">
            <img src="<?php bloginfo('template_directory'); ?>/assets/img/contact-us/comment.svg" class="input-group-text">
            <textarea class="form-control contact-form-input text-area-input modal_art_comments" id="modal_art_comments" aria-label="С текстовым полем" placeholder="Дополнительные комментарии" name="modal_art_comments"></textarea>
          </div>

          <button type="submit" class="modal-form send-contact button" data-bs-dismiss="">
            <div class="button-icon">
              <img src="<?php bloginfo('template_directory'); ?>/assets/img/ui/send.svg">
            </div>
            <input class="button-text" id="modal_submit-feedback" type="submit" value="Отправить"></input>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
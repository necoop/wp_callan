<?php
/*
Template Name: contacts
*/
?>

<section class="contacts" id="contacts">
    <div class="contacts-ibg">
        <img src="<?php bloginfo('template_directory'); ?>/assets/img/contacts/bus.png" class="contact-bus">
        <img src="<?php bloginfo('template_directory'); ?>/assets/img/contacts/tree.png" class="contact-tree">
        <div class="container">
            <div class="justify-content-center text-center">
                <div class="col-xl-4 col-md-6 col-sm-12"></div>
                <h2>Остались вопросы?</h2>
                Свяжитесь с нами и мы ответим на все ваши вопросы
            </div>
            <div class="address-form">
                <div class="address-inner">
                    <ul class="contact-box">
                        <li class="contact-box-item" id="contact-box-item1">
                            <b>Телефоны</b>
                            <br>
                            <a href="tel:<?php the_field('phone1_href', 8); ?>"><?php the_field('phone1_number', 8); ?></a>
                            <br>
                            <a href="tel:<?php the_field('phone2_href', 8); ?>"><?php the_field('phone2_number', 8); ?></a>
                        </li>
                        <li class="contact-box-item" id="contact-box-item2">
                            <a href="<?php the_field('place_map', 8); ?>" target="_blank">
                                <b>Адрес</b>
                                <br>
                                <?php the_field('place_address_city', 8); ?> <?php the_field('place_address_street', 8); ?>
                            </a>
                        </li>
                        <li class="contact-box-item" id="contact-box-item3">
                            <b>Время работы</b>
                            <br>
                            <?php the_field('work_schedule', 8); ?>
                        </li>
                    </ul>
                </div>
                <button type="button" class="button-whith-icon" data-bs-toggle="modal" data-bs-target="#buttonConnect">
                    <div class="button-icon">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/img/ui/btn-phone.svg">
                    </div>
                    <div class="button-text">Связаться с нами</div>
                </button>
            </div>

        </div>
    </div>
</section>
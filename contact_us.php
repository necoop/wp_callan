<?php
/*
Template Name: contact-us
*/
?>

<section class="contact-us">
    <div class="contact-us-ibg">
        <div class="row container">
            <div class="contact-inner col-lg-6">
                <div class="contact-img-container">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/contact-us/anna.png" alt="Анна" class="contact-img ">
                </div>
            </div>

            <?php echo do_shortcode('[contactForm]'); ?>

        </div>
    </div>

</section>


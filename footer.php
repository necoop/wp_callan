  <footer>
    <div class="container-outer">
      <div class="footer-container">
        <div class="container">
          <div class="footer-inner">
            <div class="footer-item" id="footer-item1">
              <a href="<?php bloginfo('url'); ?>">
                <img src="<?php bloginfo('template_directory'); ?>/assets/img/footer/Callan-logo.png" alt="Callan-Education">
              </a>
            </div>
            <div class="footer-item" id="footer-item2">
              <div id="footer-item2-box">
                <ul class="footer-nav">
                  <li class="footer-nav-item"><a href="<?php bloginfo('url'); ?>"><?php echo get_the_title(8); ?></a></li>
                  <li class="footer-nav-item"><a href="<?php bloginfo('url'); ?>/about-us"><?php echo get_the_title(195); ?></a></li>
                  <li class="footer-nav-item"><a href="<?php bloginfo('url'); ?>/service"><?php echo get_the_title(239); ?></a></li>
                  <li class="footer-nav-item"><a href="<?php bloginfo('url'); ?>/universities"><?php echo get_the_title(249); ?></a></li>
                  <li class="footer-nav-item"><a href="<?php bloginfo('url'); ?>/students"><?php echo get_the_title(418); ?></a></li>
                  <li class="footer-nav-item"><a href="<?php bloginfo('url'); ?>/news_list"><?php echo get_the_title(453); ?></a></li>
                  <li class="footer-nav-item"><a href="#contacts">Контакты</a></li>
                </ul>
              </div>
            </div>
            <div class="footer-item" id="footer-item3">
              <ul class="footer-social">
                <li class="footer-social-item"><a href="<?php the_field('social_insta', 8); ?>" target="_blank">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/nav/inst.png" alt="inst">
                  </a></li>
                <li class="footer-social-item"><a href="<?php the_field('social_facebook', 8); ?>" target="_blank">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/nav/fb.png " alt="facebook">
                  </a></li>
                <li class="footer-social-item"><a href="<?php the_field('social_youtube', 8); ?>" target="_blank">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/nav/youtube.png" alt="youtube">
                  </a></li>
              </ul>
            </div>
            <div class="footer-item" id="footer-item4"></div>
            <div class="footer-item" id="footer-item5">
              <a href="https://worldwide-education.com/">
                <img src="<?php bloginfo('template_directory'); ?>/assets/img/footer/WWE-logo.png" alt="WWE">
              </a>
            </div>
            <div class="footer-item" id="footer-item6">
              <ul class="footer-contact">
                <li class="footer-contact-item" id="footer-contact-item-1">
                <a href="tel:<?php the_field('phone1_href', 8); ?>"><?php the_field('phone1_number', 8); ?></a>
                <a href="tel:<?php the_field('phone2_href', 8); ?>"><?php the_field('phone2_number', 8); ?></a>
                </li>
                <li class="footer-contact-item" id="footer-contact-item-2"><?php the_field('work_schedule', 8) ?></li>
                <li class="footer-contact-item" id="footer-contact-item-3"><a href="<?php the_field('place_map', 8); ?>" target="_blank"><?php the_field('place_address_city', 8); ?> <?php the_field('place_address_street', 8); ?></gray></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>

  </body>
</html>
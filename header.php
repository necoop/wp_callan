<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('', 'true', '' ); ?></title>



  <?php wp_head(); ?>

</head>

<body>
  <header>
    <div class="container-outer nav-container">
      <div class="wrapper-inner">
        <div class="container-xl navbar-wrapper">
          <div class="navbar-container">
            <div class="navbar-inner">
              <nav class="navbar navbar-expand-lg">
                <div class="container navbar-minimized">
                  <ul class="navbar-left navbar-collapsed">
                    <li class="navbar-left-item navbar-brand">
                      <?php the_custom_logo(); ?>
                    </li>
                    <li class="navbar-left-item navbar-insta"><a href="<?php the_field('social_insta', 8); ?>" target="_blank"></a></li>
                    <li class="navbar-left-item navbar-facebook"><a href="<?php the_field('social_facebook', 8); ?>" target="_blank"></a></li>
                    <li class="navbar-left-item navbar-youtube"><a href="<?php the_field('social_youtube', 8); ?>" target="_blank"></a></li>
                  </ul>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="navbar-wrapper">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-left navbar-left-bottom">
                        <li class="navbar-left-item"><?php the_custom_logo(); ?></li>
                        <li class="navbar-left-item"><a href="<?php the_field('social_insta', 8); ?>" target="_blank" class="navbar-insta"></a></li>
                        <li class="navbar-left-item"><a href="<?php the_field('social_facebook', 8); ?>" target="_blank" class="navbar-facebook"></a>
                        </li>
                        <li class="navbar-left-item"><a href="<?php the_field('social_youtube', 8); ?>" target="_blank" class="navbar-youtube"></a>
                        </li>
                      </ul>
                      <ul class="language language-nav-top">
                        <li><a href="#" class="language-active text-uppercase">рус</a></li>
                        <li><a href="#" class="text-uppercase">uz</a></li>
                      </ul>
                      <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" data-foo="<?php echo get_the_title(8); ?>" href="<?php bloginfo('url'); ?>"><?php echo get_the_title(8); ?></a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php bloginfo('url'); ?>/about-us" class="nav-link" data-foo="<?php echo get_the_title(195); ?>"><?php echo get_the_title(195); ?></a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php bloginfo('url'); ?>/service" class="nav-link" data-foo="<?php echo get_the_title(239); ?>"><?php echo get_the_title(239); ?></a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php bloginfo('url'); ?>/universities" class="nav-link" data-foo="<?php echo get_the_title(249); ?>"><?php echo get_the_title(249); ?></a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php bloginfo('url'); ?>/students" class="nav-link" data-foo="<?php echo get_the_title(418); ?>"><?php echo get_the_title(418); ?></a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link" data-foo="Новости">Новости</a>
                        </li>
                        <li class="nav-item">
                          <a href="#contacts" class="nav-link" data-foo="Контаты">Контакты</a>
                        </li>
                      </ul>
                      <div class="navbar-right">
                        <ul class="language">
                          <li><a href="#" class="language-active text-uppercase">рус</a></li>
                          <li><a href="#" class="text-uppercase">uz</a></li>
                        </ul>
                        <button type="button"  class="reqest__btn" data-bs-toggle="modal" data-bs-target="#buttonConnect">Оставить заявку</button>
                        <ul class="navbar-contacts">
                          <li class="navbar-contacts-item"><a href="#">
                              <img src="<?php bloginfo('template_directory'); ?>/assets/img/nav/navbar-contact-time.png" alt="часы">
                              <?php the_field('work_schedule'); ?>
                            </a></li>
                          <li class="navbar-contacts-item"><a href="<?php the_field('place_map', 8); ?>" target="_blank">
                              <img src="<?php bloginfo('template_directory'); ?>/assets/img/nav/navbar-contact-map.png" alt="место">
                              <?php the_field('place_address_city', 8); ?> <?php the_field('place_address_street', 8); ?>
                            </a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php
/*
Template Name: main
*/
?>

<div class="main-wrapper">
  <div class="main-bg">
    <main class="container maine-paige-container">
      <div class="main-text">
        <?php
        global $post;
        $myposts = get_posts([
          'numberposts' => 1,
          'category'    => 8
        ]);

        if ($myposts) {
          foreach ($myposts as $post) {
            setup_postdata($post);
        ?>
            <h1><?php the_title(); ?></h1>
            <span><?php the_content(); ?></span>
        <?php
          }
        }
        wp_reset_postdata(); // Сбрасываем $post
        ?>
        <button type="button" class="btn">Связаться с нами</button>
      </div>
      <ul class="navbar-contacts-bottom">
        <li class="navbar-contacts-item"><a href="<?php the_field('place_map'); ?>" target="_blank" class="contact-item">
            <img src="<?php bloginfo('template_directory'); ?>/assets/img/nav/navbar-contact-map.png" alt="место">
            <?php the_field('place_address_city'); ?><gray> <?php the_field('place_address_street'); ?></gray>
          </a></li>
        <li class="navbar-contacts-item contact-item">
          <img src="<?php bloginfo('template_directory'); ?>/assets/img/nav/navbar-contact-time.png" alt="часы">
          <?php the_field('work_schedule'); ?>
        </li>
      </ul>
    </main>
  </div>
</div>

<div class="ibg-1">
  <div class="ibg-1-inner">
    <img src="<?php bloginfo('template_directory'); ?>/assets/img/welcome/tree.png" alt="деревце" class="tree-left">
  </div>
</div>
<?php
/*
Template Name: questions
*/
?>

<div class="question-background-box">
  <img src="<?php bloginfo('template_directory'); ?>/assets/img/questions/questions-background.png" alt="Кубики" class="questions-background">
</div>

<section class="questions">
  <div class="container">
    <h2><?php echo get_the_category_by_ID( 5 ); ?></h2>
    <div class="accordion-box">

      <?php
      global $post;

      $myposts = get_posts([
        'numberposts' => -1,
        'offset'      => 1,
        'category'    => 5
      ]);
      if ($myposts) {
        foreach ($myposts as $post) {
          setup_postdata($post);
      ?>
          <!-- Вывод постов, функции цикла: the_title() и т.д. -->
          <div class="accordion-inner col-xl-12">
            <div class="accordion accordion-questions" id="accordionPanelsStayOpenExample">
              <div class="questions-item">
                <div class="question-item-inner">
                  <h2 class="accordion-header question-accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button question-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panel-question-<?php the_ID(); ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                      <?php the_title(); ?>
                      <div class="button-question">
                        <div class="button-question-inner">
                          <div class="question-icon"></div>
                        </div>
                      </div>
                    </button>
                  </h2>
                  <div id="panel-question-<?php the_ID(); ?>" class="accordion-collapse collapse question-collapse" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body question-body">
                      <?php the_content(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      }

      wp_reset_postdata(); // Сбрасываем $post
      ?>

    </div>
  </div>
</section>
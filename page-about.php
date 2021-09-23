<?php get_header(); ?>

<div class="page-main">
  <div class="lead-inner">
    <?php
      the_title('<h1>','</h1>');
      if(have_posts()) {
        while(have_posts()) {
          the_post();
          the_content();
        }
      }
    ?>
  </div><!-- /.lead-inner -->
</div><!-- /.page-main -->
<?php get_footer(); ?>
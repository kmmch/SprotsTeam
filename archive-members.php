<?php get_header(); ?>
<div class="page-main">
  <div class="lead-inner">
    <ul class="members">
    <?php
    if(have_posts()):
      while(have_posts()):the_post();
        get_template_part(('content-member'));
      endwhile;
    endif;
    ?>
    </ul><!-- /.members -->
  </div><!-- /.lead-inner -->
</div><!-- /.page-main -->
<?php get_footer(); ?>
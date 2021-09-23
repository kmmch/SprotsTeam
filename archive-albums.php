<?php get_header(); ?>
<div class="page-inner">
  <div class="page-main" id="pg-contribution">
    <div class="contribution">
    <?php
    if(have_posts()):
      while(have_posts()):the_post();
        get_template_part(('content-album'));
      endwhile;
    endif;
    ?>
    </div><!-- /.contribution -->
    <div class="pager">
      <div class="pagerList">
      <?php
      if(function_exists('page_navi')):
        page_navi();
      endif;
      ?>
      </div><!-- /.pagerList -->
    </div><!-- /.pager -->
  </div>
</div>
<?php get_footer(); ?>
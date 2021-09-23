<?php
  if(get_field("link_url_valid_kbn")) {
    wp_safe_redirect( get_field("link_url"), 302 );
    exit;
  } 
  get_header();
?>
<div class="page-main" id="pg-newsDetail">
  <div class="main-container newsDetail">
    <div class="main-wrapper">
<?php
if(have_posts()):
  while(have_posts()):
    the_post();
    get_template_part('content-single');
  endwhile;
endif;
?>
    </div><!-- /.main-wrapper -->
  </div><!-- /.news-contents -->
</div>
<?php get_footer(); ?>
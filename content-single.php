<div class="news">
  <time class="time"><?php the_time('Y.m.d'); ?></time>
  <h3 class='title'><?php the_title(); ?></h3>
  <div class="news-body">
    <?php the_content(); ?>
  </div>
</div>
<div class="more-news">
  <?php
  $next_post = get_next_post();
  $prev_post = get_previous_post();
  if($next_post):
  ?>
  <div class="next">
    <a class="another-link" href="<?php echo get_permalink($next_post->ID); ?>">NEXT</a>
  </div>
  <?php
  endif;
  if($prev_post):
  ?>
  <!-- <p><?php echo $prev_post->post_title; ?></p><br> -->
  <div class="prev">
    <a class="another-link" href="<?php echo get_permalink($prev_post->ID); ?>">PREV</a>
  </div>
  <?php
  endif;
  ?>
</div>
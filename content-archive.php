<div class="news-body">
  <div class="label">
    <time class="release"><?php the_time('Y.m.d'); ?></time>
    <?php if( get_the_date() >= date('Y.m.d',strtotime("-1 week")) ): ?>
      <span class="new-label-archive">NEW</span>
    <?php endif; ?>
  </div><!-- /.label -->
  <div class="link">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </div><!-- /.link -->
</div>
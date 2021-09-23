<article class="article-card">
  <a href="<?php the_permalink(); ?>" class="card-link">
    <div class="image">
      <img src="<?php the_post_thumbnail_url(); ?>" />
    </div>
    <div class="body">
      <p class="title"><?php the_title(); ?></p>
      <div class="excerpt"><?php echo get_flexible_excerpt(40); ?></div>
      <div class="buttonBox">
        <button type="button" class="seeDetail">MORE</button>
      </div>
    </div>
  </a>
</article>
<?php get_header(); ?>

<section class="section-contents" id="about">
  <div class="wrapper">
    <?php
    $about_obj = get_page_by_path('about');
    $post = $about_obj;
    setup_postdata($post);
    $about_title = get_the_title();
    ?>
    <span class="section-title-en">About</span>
    <h2 class="section-title"><?php the_title(); ?></h2>
    <p class="section-lead"><?php echo get_the_excerpt(); ?></p>
    <?php wp_reset_postdata(); ?>
    <div class="section-buttons">
      <button type="button" class="button button-ghost" onclick="javascript:location.href = '<?php echo esc_url(home_url('about')) ?>';">
        チーム紹介を見る
      </button>
    </div>
  </div><!-- /.wrapper -->
</section><!-- /#about.section-contents -->

<section class="section-contents" id="news">
  <div class="wrapper">
    <?php $term_obj = get_term_by('slug', 'news', 'category');?>
    <span class="section-title-en">News Release</span>
    <h2 class="section-title"><?php echo $term_obj->name; ?></h2>
    <ul class="news">
      <?php
      $news_posts = get_specific_posts('post', 'category', 'news', 5);
      if($news_posts->have_posts()):
        while($news_posts->have_posts()): $news_posts->the_post();
      ?>
      <li class="news-item">
        <time class="time"><?php the_time('Y.m.d'); ?></time>
        <?php if( get_the_date() >= date('Y.m.d',strtotime("-1 week")) ): ?>
          <span class="new-label">NEW</span>
        <?php endif; ?>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </li>
      <?php
        endwhile;
        wp_reset_postdata();
      else:
      ?>
      <p class="no-news">現在チームからのお知らせはありません。</p>
      <?php
      endif;
      ?>
    </ul>
    <div class="section-buttons">
      <button type="button" class="button button-ghost" onclick="javascript:location.href = '<?php echo esc_url(get_term_link($term_obj)) ?>';">
      <?php echo $term_obj->name; ?>一覧を見る
      </button>
    </div>
  </div>
</section>

<section class="section-contents" id="contact">
  <div class="wrapper">
    <span class="section-title-en">Contact</span>
    <?php
    $contact_obj = get_page_by_path('contact');
    $post = $contact_obj;
    setup_postdata($post);
    $contact_title = get_the_title();
    ?>
    <h2 class="section-title"><?php the_title(); ?></h2>
    <p class="section-lead"><?php echo get_the_excerpt(); ?></p>
    <?php wp_reset_postdata(); ?>
    <div class="section-buttons">
      <button type="button" class="button button-ghost" onclick="javascript:location.href = '<?php echo esc_url(home_url('contact')) ?>';">
        お問い合わせはこちら
      </button>
    </div>

  </div>
</section>

<?php get_footer(); ?>
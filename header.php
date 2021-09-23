<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="keywords" content="共通キーワード" />
  <meta name="description" content="<?php bloginfo('description'); ?>" />
  <title><?php wp_title('|', true, 'right'); bloginfo('title'); ?></title>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/common/favicon.ico" />
  <link href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Vollkorn:400i" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="container">
    <header id="header">
      <div class="header-inner">
        <div class="logo">
          <a class="logo-header" href="/">
            <p class="main-logo">Drunkard's</p>
            <p class="fixed-logo">Drunkard's</p>
          </a>
        </div>
        <button class="toggle-menu js-toggoleNav">
          <span class="toggle-line">メニュー</span>
        </button>
        <div class="header-nav">
          <nav class="global-nav">
            <?php
            wp_nav_menu(
              array(
                'theme_location' => 'place_global',
                'container' => false,
              )
              );
            ?>
          </nav>
          <form class="search-form" role="search" method="get" action="<?php echo esc_url(home_url()); ?>">
            <div class="search-box">
              <input type="text" class="search-input" name="s" placeholder="キーワードを入力してください" />
              <button type="submit" class="button-submit"></button>
            </div>
            <div class="search-buttons">
              <button type="button" class="close-icon js-searchIcon"></button>
              <button type="button" class="search-icon js-searchIcon"></button>
            </div>
          </form>
        </div>
      </div>
    </header>
    <?php if(is_front_page()): ?>
      <section class="section-contents" id="keyvisual">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="MAIN IMAGE" />
        <div class="wrapper">
          <h1 class="site-title"><?php echo get_the_title(); ?></h1>
          <p class="site-caption"><?php echo get_the_excerpt(); ?></p>
        </div>
      </section>
    <?php else: ?>
      <div class="wrap">
        <div id="primary" class="content-area">
          <main>
            <div class="page-contents">
              <div class="page-head">
                <?php echo get_main_image(); ?>
                <div class="wrapper">
                  <span class="page-title-en"></span><!-- /.page-title-en -->
                  <h2 class="page-title"><?php echo get_main_title(); ?></h2><!-- /.page-title -->
                </div><!-- /.wrapper -->
              </div><!-- /.page-head -->
              <div class="page-container">
                <?php
                if(function_exists('bread_crumb')):
                  bread_crumb();
                endif; 
                ?>
    <?php endif; ?>
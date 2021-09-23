<?php

function my_enqueue_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('bundle_js', get_template_directory_uri().'/assets/js/bundle.js', array());
    wp_enqueue_script('customscripts', get_template_directory_uri().'/assets/js/custom.js', array());
    wp_enqueue_style('mystyles', get_template_directory_uri().'/assets/css/styles.css', array());
    wp_enqueue_style('customstyles', get_template_directory_uri().'/assets/css/custom.css', array());
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

// ヘッダー、フッターのカスタムメニュー化
register_nav_menus(
    array(
        'place_global' => 'グローバル',
        'place_footer' => 'フッターナビ',
    )
);

// メイン画像上にテンプレートごとの文字列を表示
function get_main_title() {
    if(is_singular('post')){
        $category_obj = get_the_category();
        return $category_obj[0]->name;
    } else if(is_singular('albums')){
        return the_title();
    } else if(is_post_type_archive('members')) {
        return 'メンバー紹介';
    } else if(is_post_type_archive('albums')) {
        return 'アルバム';
    } else if(is_page()){
        return get_the_title();
    } else if(is_category() || is_tax()){
        return single_cat_title();
    } else if(is_search()) {
        return 'サイト内検索結果';
    } else if(is_404()){
        return 'ページが見つかりません';
    } else if (is_post_type_archive('members')) {
        return 'メンバー紹介';
    }
}

// 子ページを取得する
function get_child_pages($number = -1, $specified_id = null) {
    if(isset($specified_id)) {
        $parent_id = $specified_id;
    }else {
        $parent_id = get_the_ID();
    }

    $args = array(
      'posts_per_page' => $number,
      'post_type' => 'page',
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'post_parent' => $parent_id,
    );
    $child_pages = new WP_Query($args);
    return $child_pages;
}

// アイキャッチ画像を利用
add_theme_support('post-thumbnails');

// トップページのメイン画像用のサイズ設定
add_image_size('top', 1077, 622, true);

// 地域貢献活動一覧画像用のサイズ設定
add_image_size('contribution', 557, 280, true);

// トップの地域貢献活動一覧に使用している画像のサイズ設定
add_image_size('front-contribution', 255, 189, true);

// 企業情報・店舗情報一覧用のサイズ設定
add_image_size('common', 465, 252, true);

// 各ページのメイン画像用のサイズ設定
add_image_size('detail', 1100, 330, true);

// 検索一覧画像用のサイズ設定
add_image_size('search', 168, 168, true);

// 各テンプレートごとのメイン画像を表示
function get_main_image() {
    if(is_page()){
        return get_the_post_thumbnail($post->ID, 'detail');
    } else if(is_singular('albums')){
        return '<img src="' . get_the_post_thumbnail_url() . '"/>';
    } else if(is_category('news') || is_singular('post')){
        return '<img src="' . get_template_directory_uri() . '/assets/images/bg-page-news.jpg"/>';
    } else if(is_post_type_archive('members')) {
        return '<img src="' . get_template_directory_uri() . '/assets/images/members-visual.jpeg"/>';
    } else if(is_post_type_archive('albums')) {
        return '<img src="' . get_template_directory_uri() . '/assets/images/album-visual.jpg"/>';
    } else if(is_category('schedule')){
        return '<img src="' . get_template_directory_uri() . '/assets/images/game-visual.jpg"/>';
    } else if(is_category('album')){
        return '<img src="' . get_template_directory_uri() . '/assets/images/album-visual.jpg"/>';
    } else if(is_search() || is_404()) {
        return '<img src="' . get_template_directory_uri() . '/assets/images/bg-page-search.jpg"/>';
    } else {
        return '<img src="' . get_template_directory_uri() . '/assets/images/bg-page-dummy.png"/>';
    }
}

// 特定の記事を抽出する関数
function get_specific_posts($post_type, $taxonomy = null, $term = null, $number = -1) {
    if(!$term) {
        $terms_obj = get_terms('event');
        $term = wp_list_pluck($terms_obj,'slug');
    }
    
    $args = array(
        'post_type' => $post_type,
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $term,
            ),
        ),
        'posts_per_page' => $number,
    );
    $specific_posts = new WP_Query($args);
    return $specific_posts;
}

// 抜粋文の最後の文字列を変更
function cms_excerpt_more() {
    return '...';
}
add_filter('excerpt_more', 'cms_excerpt_more');

//抜粋文のデフォルトの文字数を変更
function cms_excerpt_length() {
    return 80;
}
add_filter('excerpt_mblength','cms_excerpt_length');

// 各抜粋文を適度な長さに調整する
function get_flexible_excerpt($number) {
    $value = get_the_excerpt();
    $value = wp_trim_words($value, $number, '...');
    return $value;
}

// get_the_excerpt()で取得する文字列に改行タグを挿入
function apply_excerpt_br($value){
    return nl2br($value);
}
add_filter('get_the_excerpt', 'apply_excerpt_br');

// 抜粋機能を固定ページに使えるように設定
add_post_type_support('page', 'excerpt');

// ウィジェット機能を有効化
function theme_widgets_init() {
    register_sidebar(
        array(
            'name' => 'サイドバーウィジェットエリア',
            'id' => 'primary-widget-area',
            'description' => '固定ページのサイドバー',
            'before_widget' => '<aside class="side-inner">',
            'after_widget' => '</aside>',
            'before_title' => '<h4 class="title">',
            'after_title' => '</h4>',
        )
    );
}
add_action('widgets_init','theme_widgets_init');

function change_posts_per_page($query) {
    /* 管理画面,メインクエリに干渉しないために必須 */
    if ( is_admin() || ! $query->is_main_query() ){
        return;
    }
   
    /* 日付アーカイブページの表示件数を5件にする */
    if ( $query->is_date() ) {
        $query->set( 'posts_per_page', '5' );
        return;
    }
   
}
add_action( 'pre_get_posts', 'change_posts_per_page' );
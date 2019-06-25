<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


// JS・CSSファイルを読み込む
function add_files() {
	// WordPress提供のjquery.jsを読み込まない
	wp_deregister_script('jquery');
	// jQueryの読み込み
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', "", "20160608", false );
	// サイト共通JS
	wp_enqueue_script( 'smart-script', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '20160608', true );
	// サイト共通のCSSの読み込み
	// wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', "", '20160608' );
}
add_action('wp_enqueue_scripts', 'add_files');

// アイキャッチ画像を表示させる
    // アイキャッチ画像を有効にする
add_theme_support('post-thumbnails'); 
    // アイキャッチ画像サイズを指定する
set_post_thumbnail_size(160, 120, true);

//  WP Multibyte Patch　で抜粋文の長さを指定
function twpp_change_excerpt_length( $length ) {
return 60; 
}
add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );

// filter_hook  アイキャッチ画像に一時的に指定したものを貼る
add_filter("post_thumbnail_html", "dev_thumbnail_html", 10, 5);
function dev_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr) {
 $html = "<img src='https://cele-baby.net/media/wp-content/uploads/2019/04/hana.jpg'>";
 return $html;
}

//記事のビュー数メタデータを作成・更新する関数
function setPostViews() {
    $post_id = get_the_ID();
    $custom_key = 'post_views_count';
    $view_count = get_post_meta($post_id, $custom_key, true);  //現在のビュー数を取得
    //すでにメタデータがあるかどうかで処理を分ける
    if ($view_count === '') {
        delete_post_meta($post_id, $custom_key);
        add_post_meta($post_id, $custom_key, '0');
    } else {
        $view_count++;
        update_post_meta($post_id, $custom_key, $view_count);
    }
}
//functions.phpにて定義
function getPostViews($post_id = null) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $custom_key = 'post_views_count';
    $view_count = get_post_meta($post_id, $custom_key, true);
    if ($view_count === '') {
        //まだメタデータが存在していなければ
        delete_post_meta($post_id, $custom_key);
        add_post_meta($post_id, $custom_key, '0');
        $view_count = 0;
    }
    return $view_count.' Views';  //'Views' の部分は好きな表示に変えてください。
}

// Numeric Page Navi (built into the theme by default) cbmdediaのpahi-nav.phpをコピー
function joints_page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	echo $before.'<nav class="page-navigation" aria-label="Pagination"><ul class="pagination">'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$first_page_text = __( 'First', 'jointswp' );
		echo '<li><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
	}
	// echo '<li class="pagination-previous">';
	// previous_posts_link( __('Previous', 'jointswp') );
	// echo '</li>';
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="current"> '.$i.' </li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="pagination-next">';
	next_posts_link( __('▷', 'jointswp'), 0 );
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = __( 'Last', 'jointswp' );
		echo '<li><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
	}
	echo '</ul></nav>'.$after."";
} /* End page navi */

/* the_archive_title 余計な文字を削除 */
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
	} elseif (is_tax()) {
	    $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_date()) {
	    $title = get_the_time('Y年n月');
	} elseif (is_search()) {
	    $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
	    $title = '「404」ページが見つかりません';
	} else {

	}
    return $title;
});






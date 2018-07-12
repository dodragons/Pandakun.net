<?php

function add_files() {
    // サイト共通のCSSの読み込み
    wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css', "", '20180430' );
}
add_action( 'wp_enqueue_scripts', 'add_files' );

function register_my_menu() {
	 // メニューの登録
  register_nav_menu('header-menu',__( 'ヘッダーメニュー' ));
}
add_action( 'init', 'register_my_menu' );

	 // サムネイルの登録
add_theme_support( 'post-thumbnails' ); 

 	// 抜粋のタグ調整
remove_filter('the_excerpt', 'wpautop');

	// SVGをメディアにアップできるように設定
add_filter('upload_mimes', 'set_mime_types');
function set_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
	// 抜粋の文字数設定
function custom_excerpt_length( $length ) {
     return 40;	
}	
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * jQueryをフッターに動かす
 */
add_action( 'init', function() {
  // 管理画面ではjQueryを削除できない。
  if ( is_admin() ) {
    return;
  }
  // 現在のバージョンとURIを保存。
  // CDNを使いたい方は$jquery_srcのURIを変更してもよい。
  global $wp_scripts;
  $jquery = $wp_scripts->registered['jquery-core'];
  $jquery_ver = $jquery->ver;
  $jquery_src = $jquery->src;
  // いったん削除
  wp_deregister_script( 'jquery' );
  wp_deregister_script( 'jquery-core' );
  // 登録しなおし
  wp_register_script( 'jquery', false, ['jquery-core'], $jquery_ver, true );
  wp_register_script( 'jquery-core', $jquery_src, [], $jquery_ver, true );
} );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

function mytheme_enqueue_comment_reply() {
    // on single blog post pages with comments open and threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
        // enqueue the javascript that performs in-link comment reply fanciness
        wp_enqueue_script( 'comment-reply' ); 
    }
}
// Hook into wp_enqueue_scripts
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_comment_reply' );

?>
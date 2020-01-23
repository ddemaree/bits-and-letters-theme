<?php

function bnl_theme_support() {

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'bnl-fullscreen', 1980, 9999 );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

}
add_action( 'after_setup_theme', 'bnl_theme_support' );


/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';


function bnl_enqueue_styles() {

	if ( $_SERVER['HTTP_X_PROXIEDBY_WEBPACK'] && !$_GET['static'] ) {
		wp_enqueue_script( 'bnl-mainjs-dev', '/build/main.js', array(), null, true );
	}
	else if( file_exists( get_stylesheet_directory() . '/dist/manifest.json' ) ) {
		$manifestPath = get_stylesheet_directory() . '/dist/manifest.json';
		$manifestData = json_decode( file_get_contents( $manifestPath ) );
		$assetPathBase = get_template_directory_uri() . '/dist/';
		wp_enqueue_script( 'bnl-mainjs-prod', $assetPathBase . $manifestData->{'main.js'}, array(), filemtime($manifestPath), true );
		wp_enqueue_style( 'bnl-maincss-prod', $assetPathBase . $manifestData->{'main.css'}, array(), filemtime($manifestPath) );
	}
	else {
		wp_enqueue_script( 'bnl-mainjs-prod', get_template_directory_uri() . '/dist/main.js', array(), filemtime(get_stylesheet_directory() . '/dist/main.js'), true );
		wp_enqueue_style( 'bnl-maincss-prod', get_template_directory_uri() . '/dist/main.css', array(), filemtime(get_stylesheet_directory() . '/dist/main.css') );
  }

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
	remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
  
  wp_deregister_script('jquery');
  
  if ( !current_user_can( 'update_core' ) ) {
		wp_deregister_style( 'dashicons' ); 
	}
}
add_action( 'wp_enqueue_scripts', 'bnl_enqueue_styles' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function twentytwenty_menus() {

	$locations = array(
		'primary'  => __( 'Primary Menu', 'bnl' ),
		'footer'   => __( 'Footer Menu', 'bnl' ),
		'social'   => __( 'Social Menu', 'bnl' ),
	);

	register_nav_menus( $locations );
}
add_action( 'init', 'twentytwenty_menus' );

function get_reading_time() {
	$content = get_post_field( 'post_content', $post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);

	$totalreadingtime = $readingtime . " min read";

	return $totalreadingtime;
}

function bnl_reading_time() {
	printf("<div class=\"entry-reading-time\">%1s</div>", get_reading_time());
}

function bnl_entry_meta() {
	print("<div class=\"entry-meta gray mh0 mt1 mb3\">");
	printf("<span class=\"entry-date\">%1s</span>", get_the_date());	
	print('<span class="ph2">•</span>');
	printf("<span class=\"entry-reading-time\">%1s</span>", get_reading_time());	
	print("</div>");
}
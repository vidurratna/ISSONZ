<?php

function isso_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Set content-width.
	// global $content_width;
	// if ( ! isset( $content_width ) ) {
	// 	$content_width = 580;
	// }

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	//Set post thumbnail size.
	//set_post_thumbnail_size( 1200, 9999 );

	 add_image_size( 'isso-event-home', 420, 310 );
	 add_image_size( 'isso-page-home', 1500, 310 );

	// Custom logo.
	// $logo_width  = 120;
	// $logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	// if ( get_theme_mod( 'retina_logo', false ) ) {
	// 	$logo_width  = floor( $logo_width * 2 );
	// 	$logo_height = floor( $logo_height * 2 );
	// }

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
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

	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'isso' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );


}

add_action( 'after_setup_theme', 'isso_theme_support' );

function isso_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'isso' ),
		// 'expanded' => __( 'Desktop Expanded Menu', 'isso' ),
		'mobile'   => __( 'Mobile Menu', 'isso' ),
		 'footer'   => __( 'Footer Menu', 'isso' ),
		// 'social'   => __( 'Social Menu', 'isso' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'isso_menus' );

require get_template_directory() . '/inc/classes/ISSO_Walker.php';
require get_template_directory() . '/inc/classes/ISSO_Walker_Mini.php';

function isso_register_styles() {

	if(is_home(  )){
		wp_enqueue_style( 'isso-slider', get_template_directory_uri( ) . '/dist/slider.css' );
	}

	wp_enqueue_style( 'isso-style', get_template_directory_uri( ) . '/dist/bundle.css' );
	wp_enqueue_style( 'isso-fonts','https://fonts.googleapis.com/css2?family=Montserrat&family=Quicksand:wght@400;500;600;700&display=swap' );
}

add_action( 'wp_enqueue_scripts', 'isso_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function isso_register_scripts() {

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'isso-js', get_template_directory_uri() . '/dist/bundle.js', array(), null, true );
	wp_enqueue_script( 'isso-icons', 'https://kit.fontawesome.com/aec5bcb84e.js?ver=5.4.1' );
	wp_script_add_data( 'isso-js', 'async', true );

}

add_action( 'wp_enqueue_scripts', 'isso_register_scripts' );


// if (!function_exists('dd')) {
//     function dd($data)
//     {
//         ini_set("highlight.comment", "#969896; font-style: italic");
//         ini_set("highlight.default", "#FFFFFF");
//         ini_set("highlight.html", "#D16568");
//         ini_set("highlight.keyword", "#7FA3BC; font-weight: bold");
//         ini_set("highlight.string", "#F2C47E");
//         $output = highlight_string("<?php\n\n" . var_export($data, true), true);
//         echo "<div style=\"background-color: #1C1E21; padding: 1rem\">{$output}</div>";
//         die();
//     }
// }
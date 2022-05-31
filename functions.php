<?php
/**
 * evolve_starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package evolve_starter
 */


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'evolve_starter_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function evolve_starter_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on evolve_starter, use a find and replace
		 * to change 'evolve_starter' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'evolve_starter', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'evolve_starter' ),
			'sitemap-menu'	=> esc_html__( 'Site Map', 'evolve_starter' ),
			'footer-menu-one'	=> esc_html__( 'Footer Menu One', 'evolve_starter' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'evolve_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function evolve_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'evolve_starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'evolve_starter_content_width', 0 );

/**
 * Preload Fonts
 * This helps with load performance
 */


// function preload_typekit_fonts() {
	// Uncomment below for TypeKit Preload
// 	echo '<link rel="preload" href="typekit_url_here" as="style">';

// }

// add_action( 'wp_head', 'preload_typekit_fonts', 5 );

/**
 * TypeKit Fonts Font Load
 */
// function typekit_fonts_loader() {

// 	echo '<link rel="stylesheet" href="typekit_url_here" media="print" onload="this.media=\'all\'" />';
// }

// add_action( 'wp_head', 'typekit_fonts_loader', 10 );

/**
 * Google Fonts Preload and Font Load
 */
// function google_fonts_loader() {

// 	echo '<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>';

// 	echo '<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Barlow:wght@500;600;700;800&family=Roboto+Slab&display=swap" />';

// 	echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow:wght@500;600;700;800&family=Roboto+Slab&display=swap"
//       media="print" onload="this.media=\'all\'" />';

// 	echo '<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow:wght@500;600;700;800&family=Roboto+Slab&display=swap" /></noscript>';
// }

// add_action( 'wp_head', 'google_fonts_loader', 10 );

/**
 * Enqueue scripts and styles.
 */
function evolve_starter_scripts() {
	wp_enqueue_style( 'evolve_starter-main', get_template_directory_uri(). '/assets/css/main.min.css', array(), _S_VERSION );
	wp_style_add_data( 'evolve_starter-main-rtl', 'rtl', 'replace' );

	// wp_enqueue_style( 'evolve_starter-icons', get_template_directory_uri() . '/assets/fonts/icons/styles.css', array(), _S_VERSION );

	wp_enqueue_script( 'evolve_starter-js-vendor', get_template_directory_uri() . '/assets/js/vendor.min.js', array('jquery'), _S_VERSION, true );

	// wp_enqueue_script( 'js-cookie', 'https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js', array(), '', true);

	wp_enqueue_script( 'evolve_starter-js-custom', get_template_directory_uri() . '/assets/js/custom.min.js', array('jquery'), _S_VERSION, true );

	wp_enqueue_script( 'evolve_starter-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'evolve_starter_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Walker Nav.
 */
require get_template_directory() . '/inc/walker-nav.php';

/**
 * ACF Functions
 */
require get_template_directory() . '/inc/acf-functions.php';

/**
 * Custom Blocks 
 */
require get_template_directory() . '/inc/acf-custom-blocks.php';

/**
 * MCE Functions 
 */
require get_template_directory() . '/inc/mce-functions.php';

/**
 * Custom Login
 */
require get_template_directory() . '/inc/wp-custom-login.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Theme Settings
 */
require get_template_directory() . '/inc/theme-options.php';

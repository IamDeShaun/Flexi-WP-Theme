<?php
/**
 * Flexi Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Flexi_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'flexi_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function flexi_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Flexi Theme, use a find and replace
		 * to change 'flexi-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'flexi-theme', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'flexi-theme' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'flexi-theme' ),
			)
		);

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
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'flexi_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'flexi_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function flexi_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'flexi_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'flexi_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/**
 * Enqueue scripts and styles.
 */

require_once('lib/include-plugins.php');
require_once('lib/customize.php');
//require_once('lib/metaboxes.php');
require_once('lib/enqueue-assets.php');
require_once('lib/sidebars.php');
require_once('lib/theme-support.php');


function flexi_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'flexi-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'flexi-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Primary Sidebar', 'flexi-theme' ),
			'id'            => 'primary-sidebar',
			'description'   => esc_html__( 'Add widgets herrre.', 'flexi-theme' ),
			'before_widget' => '<section id="%1$s" class="sidebar-nav widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);
}

$footer_layout = sanitize_text_field(get_theme_mod('_flexi_footer_layout', '3,3,3,3'));
$footer_layout = preg_replace('/\s+/', '', $footer_layout);
$columns = explode(',', $footer_layout);
$footer_bg = _flexi_sanitize_footer_bg(get_theme_mod('_flexi_footer_bg', 'dark'));
$widget_theme = '';
if($footer_bg == 'light') {
		$widget_theme = 'c-footer-widget--dark';
} else {
	$widget_theme = 'c-footer-widget--light';
}

foreach ($columns as $i => $columns) {
		register_sidebar( array(
			'id' => 'footer-sidebar-' . ($i + 1),
			'name' => sprintf(esc_html__( 'Footer Widgets Column %s', 'flexi-theme' ), $i + 1),
			'description'   => esc_html__( 'Footer widgets', 'flexi-theme' ),
			'before_widget' => '<section id="%1$s" class="c-footer-widget ' . $widget_theme . ' %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		));
}


add_action( 'widgets_init', 'flexi_theme_widgets_init' );

/** Actions */
function after_nav() {
	echo 'Celtics in 6';
}
function after_nav2() {
	echo 'Jayson Tatum has next!';
}

add_action('flexi-theme-action', 'after_nav');
add_action('flexi-theme-action', 'after_nav2');


/**
 *  Adding Jquery
 */
add_action('init', 'use_jquery_from_google');

function use_jquery_from_google () {
	if (is_admin()) {
		return;
	}

	global $wp_scripts;
	if (isset($wp_scripts->registered['jquery']->ver)) {
		$ver = $wp_scripts->registered['jquery']->ver;
                $ver = str_replace("-wp", "", $ver);
	} else {
		$ver = '3.5.1';
	}

	wp_deregister_script('jquery');
	wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/$ver/jquery.min.js", false, $ver);
}


function flexi_theme_scripts() {
	wp_enqueue_style( 'flexi-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'flexi-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'flexi-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'flexi-theme-navigation', get_template_directory_uri() .'/dist/assests/js/navigation.js', array('jquery'), '1.0.0', true );
	
	wp_enqueue_script('flexi-theme-scripts', get_template_directory_uri() .'/dist/assests/js/bundle.js', array('jquery'), '1.0.0', true);
	

	wp_enqueue_script('flexi-theme-scripts', get_template_directory_uri() .'/dist/assests/js/admin.js', array('jquery'), _S_VERSION, true);

	wp_enqueue_script('flexi-theme-scripts', get_template_directory_uri() .'/dist/assests/js/customize-preview.js', array('jquery'), '1.0.0', true);

	wp_enqueue_script( 'flexi-theme-navigation', get_template_directory_uri() . '/js/menu.js', array(), '1.0.0', true );

	wp_enqueue_script( 'flexi-theme-navigation', get_template_directory_uri() . '/js/search.js', array(), '1.0.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'flexi_theme_scripts' );

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
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


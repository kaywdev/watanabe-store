<?php
/**
 * Watanabestore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Watanabestore
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'watanabestore_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function watanabestore_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Watanabestore, use a find and replace
		 * to change 'watanabestore' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'watanabestore', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'watanabestore' ),
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
				'watanabestore_custom_background_args',
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
add_action( 'after_setup_theme', 'watanabestore_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function watanabestore_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'watanabestore_content_width', 640 );
}
add_action( 'after_setup_theme', 'watanabestore_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function watanabestore_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'watanabestore' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'watanabestore' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'watanabestore_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function watanabestore_scripts() {
	wp_enqueue_style( 'watanabestore-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'watanabestore-style', 'rtl', 'replace' );

	wp_enqueue_script( 'watanabestore-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'watanabestore_scripts' );

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
 * Custom Post Types & options page
 */
require get_template_directory().'/inc/register-options-page.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Remove flags from Bogo language switcher
 */

function remove_bogo_lang_flags() {
  return false;
}
add_filter( 'bogo_use_flags', 'remove_bogo_lang_flags' );

/**
 * Changed text in Bogo language switcher 
 */
function custom_bogo_language_title_name( $links ) {
  foreach ( $links as $code => $name ) {
    if ( $name['lang'] === 'en-US' ) {
      $links[$code]['title'] = 'EN';
      $links[$code]['native_name'] = 'EN';
    } elseif ( $name['lang'] === 'ja' ) {
      $links[$code]['title'] = 'JP';
      $links[$code]['native_name'] = 'JP';
    }
  }
  return $links;
}
add_filter( 'bogo_language_switcher_links', 'custom_bogo_language_title_name', 10, 2 );

/**
 * Add class to body tag
 */

function custom_class( $classes ) {
    if ( is_page(32) || is_page(56) ) {
        $classes[] = 'delivery';
    }else if(is_page(65) || is_page(70)){
		$classes[] = 'homemade';
	}else if(is_page(72)|| is_page(82)){
		$classes[] = 'about';
	}	  	  
    return $classes;
}
add_filter( 'body_class', 'custom_class' );
add_filter( 'post_class', 'custom_class' );



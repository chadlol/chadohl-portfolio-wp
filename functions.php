<?php
/**
 * Chad Ohl Portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Chad_Ohl_Portfolio
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'chadohl_portfolio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function chadohl_portfolio_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Chad Ohl Portfolio, use a find and replace
		 * to change 'chadohl-portfolio' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'chadohl-portfolio', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'chadohl-portfolio' ),
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
				'chadohl_portfolio_custom_background_args',
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
add_action( 'after_setup_theme', 'chadohl_portfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chadohl_portfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'chadohl_portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'chadohl_portfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chadohl_portfolio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'chadohl-portfolio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'chadohl-portfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'chadohl_portfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function chadohl_portfolio_scripts() {
	wp_enqueue_style( 'chadohl-portfolio-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'chadohl-portfolio-style', 'rtl', 'replace' );

	wp_enqueue_script( 'chadohl-portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'chadohl-portfolio-jquery', 'https://code.jquery.com/jquery-latest.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'chadohl-portfolio-aos', 'https://unpkg.com/aos@next/dist/aos.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'chadohl-portfolio-fslightbox', get_template_directory_uri() . '/js/fslightbox.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'chadohl-portfolio-scripts', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'chadohl_portfolio_scripts' );

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



function chadohl_portfolio_post_type_portfolio() {
	$supports = array(
	'title', // post title
	// 'editor', // post content
	// 'author', // post author
	// 'thumbnail', // featured images
	// 'excerpt', // post excerpt
	'custom-fields', // custom fields
	// 'comments', // post comments
	'revisions', // post revisions
	'post-formats', // post formats
	);
	$labels = array(
	'name' => _x('Portfolio', 'plural'),
	'singular_name' => _x('Portfolio Item', 'singular'),
	'menu_name' => _x('Portfolio', 'admin menu'),
	'name_admin_bar' => _x('Portfolio', 'admin bar'),
	'add_new' => _x('Add Portfolio Item', 'add new'),
	'add_new_item' => __('Add New Portfolio Item'),
	'new_item' => __('New Portfolio Item'),
	'edit_item' => __('Edit Portfolio'),
	'view_item' => __('View Portfolio Item'),
	'all_items' => __('All Portfolio Items'),
	'search_items' => __('Search Portfolio Items'),
	'not_found' => __('No Portfolio found.'),
	);
	$args = array(
	'supports' => $supports,
	'labels' => $labels,
	'public' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'portfolio'),
	'has_archive' => true,
	'hierarchical' => false,
	);
	register_post_type('portfolio', $args);
}
add_action('init', 'chadohl_portfolio_post_type_portfolio');

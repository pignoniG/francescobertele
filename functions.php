<?php
/**
 * francescobertele functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package francescobertele
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'francescobertele_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function francescobertele_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on francescobertele, use a find and replace
		 * to change 'francescobertele' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'francescobertele', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'francescobertele' ),
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
				'francescobertele_custom_background_args',
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
add_action( 'after_setup_theme', 'francescobertele_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function francescobertele_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'francescobertele_content_width', 640 );
}
add_action( 'after_setup_theme', 'francescobertele_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function francescobertele_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'francescobertele' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'francescobertele' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'francescobertele_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function francescobertele_scripts() {


	wp_enqueue_style( 'francescobertele-style-foundation', get_template_directory_uri() . '/css/foundation.css' );

	wp_enqueue_style( 'francescobertele-style', get_stylesheet_uri(), array(), _S_VERSION );

	/** wp_enqueue_style( 'francescobertele-style-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	*/


	wp_style_add_data( 'francescobertele-style', 'rtl', 'replace' );

	wp_enqueue_script( 'francescobertele-awesome',  'https://kit.fontawesome.com/83e66a748b.js', array(), _S_VERSION, true );


	wp_enqueue_script( 'francescobertele-vendor', get_template_directory_uri() . '/js/vendor.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'francescobertele-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_style( 'francescobertele-style-select', get_template_directory_uri() . '/css/select2.min.css' );

	wp_enqueue_script( 'francescobertele-app', get_template_directory_uri() . '/js/app.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'francescobertele-general', get_template_directory_uri() . '/js/general.js', array(), _S_VERSION, true );


	wp_enqueue_style( 'francescobertele-style-app', get_template_directory_uri() . '/css/app.css' );

wp_enqueue_script( 'francescobertele-foundation', get_template_directory_uri() . '/js/foundation.js', array(), _S_VERSION, true );


}
add_action( 'wp_enqueue_scripts', 'francescobertele_scripts' );




function home_js(){
    if ( is_front_page()  ){
    	wp_enqueue_script( 'francescobertele-page-home', get_template_directory_uri() . '/js/page-home.js', array(), '1', true );
    }
}
add_action('wp_enqueue_scripts', 'home_js');

function ask_js(){
    if ( is_page('ask') ){
    	wp_enqueue_script( 'francescobertele-page-ask', get_template_directory_uri() . '/js/page-ask.js', array(), '1', true );
    }
}
add_action('wp_enqueue_scripts', 'ask_js');


function oeuvre_js(){
   if( is_page('archive') ){


   		wp_enqueue_script( 'francescobertele-select-js', get_template_directory_uri() . '/js/select2.min.js', array(), _S_VERSION, true );


   		wp_enqueue_script( 'francescobertele-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), _S_VERSION, true );

   		wp_enqueue_script( 'francescobertele-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), _S_VERSION, true );

   		
    	wp_enqueue_script( 'francescobertele-page-oeuvre', get_template_directory_uri() . '/js/page-oeuvre.js', array(), '1', true );

    }
}
add_action('wp_enqueue_scripts', 'oeuvre_js');


function portfolio_js(){
   if( is_page('portfolio') ){


   		wp_enqueue_script( 'francescobertele-select-js', get_template_directory_uri() . '/js/select2.min.js', array(), _S_VERSION, true );
   		


   		


   		wp_enqueue_script( 'francescobertele-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), _S_VERSION, true );

   		wp_enqueue_script( 'francescobertele-imagesloaded', get_template_directory_uri() . '/js/	imagesloaded.pkgd.min.js', array(), _S_VERSION, true );

   	
    	wp_enqueue_script( 'francescobertele-page-portfolio', get_template_directory_uri() . '/js/page-portfolio.js', array(), '1', true );

    }
}
add_action('wp_enqueue_scripts', 'portfolio_js');

function onair_js(){
   if( is_page('onair') ){

   		wp_enqueue_style( 'francescobertele-style-flickity', get_template_directory_uri() . '/css/flickity.css' );

   		wp_enqueue_script( 'francescobertele-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), _S_VERSION, true );

		wp_enqueue_script( 'francescobertele-flickity', get_template_directory_uri() . '/js/flickity.pkgd.min.js', array(), _S_VERSION, true );

    	wp_enqueue_script( 'francescobertele-page-onair', get_template_directory_uri() . '/js/page-onair.js', array(), '1', true );
    }
}
add_action('wp_enqueue_scripts', 'onair_js');


function onair_s_js(){
    if( is_single() && has_category('onair') ){
    	
    	wp_enqueue_script( 'francescobertele-single-onair', get_template_directory_uri() . '/js/single-onair.js', array(), _S_VERSION, true );
    	wp_enqueue_style( 'francescobertele-style-w3', get_template_directory_uri() . '/css/w3.css' );
    

    }
}
add_action('wp_enqueue_scripts', 'onair_s_js');


function oeuvre_s_js(){
    if( is_single() && has_category('oeuvre') ){

    	wp_enqueue_script( 'francescobertele-model-viewer', 'https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js', array(), '1', true );

    	wp_enqueue_script( 'francescobertele-single-oeuvre', get_template_directory_uri() . '/js/single-oeuvre.js', array(), _S_VERSION, true );
    	wp_enqueue_style( 'francescobertele-style-w3', get_template_directory_uri() . '/css/w3.css' );
    

    }
}
add_action('wp_enqueue_scripts', 'oeuvre_s_js');



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

add_filter( 'wpm_post_post_config', '__return_null' );




show_admin_bar(false);

remove_image_size('post-thumbnail');


if ( function_exists( 'fly_add_image_size' ) ) {
    fly_add_image_size( 'hd-for-interface',2500, 2500, false );
    fly_add_image_size( 'hd-for-pdf',1000, 1000, false );
    fly_add_image_size( 'ultra-hd-for-pdf',3500, 3500, false );
    fly_add_image_size( 'thumbnail-hd-for-interface', 1000, 2000, false ); 
    fly_add_image_size( 'thumbnail-medium-for-interface', 600, 600, false ); 
    fly_add_image_size( 'thumbnail-small-for-interface', 350, 350, false ); 
}

add_filter('jpeg_quality', function($arg){return 80;});



add_filter('body_class','add_category_to_single');
  function add_category_to_single($classes) {
    if (is_single() ) {
      global $post;
      foreach((get_the_category($post->ID)) as $category) {
        // add category slug to the $classes array
        $classes[] = $category->category_nicename;
      }
    }
    // return the $classes array
    return $classes;
  }

 if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}



function mytranslate($string)
{

	$arrayString=  explode(" | ", $string );
	$retval=$arrayString[0];
	if (wpm_get_language()=="it") {
		if ($arrayString[1]) {
			$retval=$arrayString[1];
		}
	}
   
    return $retval;
}
function mytranslate_force($string,$lang)
{

	$arrayString=  explode(" | ", $string );
	$retval=$arrayString[0];
	if ($lang=="it") {
		if ($arrayString[1]) {
			$retval=$arrayString[1];
		}
		
	}
   
    return $retval;
}


@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');

// ************* Remove default Posts type since no blog *************

// Remove side menu
add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

// Remove +New post in top Admin Menu Bar
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}

// Remove Quick Draft Dashboard Widget
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}
function page_title_sc( ){
   return get_the_title();
}
add_shortcode( 'page_title', 'page_title_sc' );


function myUrlEncode($string) {
    $entities = array('.','!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");


    return str_replace($entities,"_",  strtolower($string));
}


// End remove post type

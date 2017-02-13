<?php
/**
 * start functions and definitions
 *
 * @package start
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'start_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');


function start_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on start, use a find and replace
	 * to change 'start' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'start', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'start' ),
	) );



	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'start_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // start_setup
add_action( 'after_setup_theme', 'start_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function start_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'start' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'start_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function start_scripts() {
	wp_enqueue_style( 'start-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'landingpage', get_template_directory_uri() . '/css/landing-page.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');
	//wp_enqueue_style( 'font-awesomef', 'https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic');
	wp_enqueue_style( 'font-google', 'https:////fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C200%2C300%2C300italic%2C200italic%2C400italic%2C600%2C600italic%2C700%2C700italic%2C900%2C900italic&amp;ver=4.7.2');
	wp_enqueue_style( 'font-google', 'https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&amp;subset=latin%2Clatin-ext&amp;ver=4.7.2');

	wp_enqueue_style( 'jqueryuicss', get_template_directory_uri() . '/css/jquery-ui-1.10.2.custom.min.css');
	wp_enqueue_style( 'stream', get_template_directory_uri() . '/css/stream.css');
	wp_enqueue_style( 'multiselect', get_template_directory_uri() . '/css/bootstrap-multiselect.css');
	//wp_enqueue_style( 'bootstrap-table', get_template_directory_uri() . '/css/bootstrap-table.css');



	wp_enqueue_script( 'start-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'start-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', array(), '20170209', true );   
	wp_enqueue_script( 'bootstrapmin', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20170209', true );   

	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui-1.10.2.custom.min.js', array(), '20120211', true );
	wp_enqueue_script( 'filter', get_template_directory_uri() . '/js/filter.min.js', array(), '20120211', true );
	wp_enqueue_script( 'vagas99', get_template_directory_uri() . '/js/vagas99.js', array(), '20120211', true );
	wp_enqueue_script( 'multiselectjs', get_template_directory_uri() . '/js/bootstrap-multiselect.js', array(), '20120211', true );
	//wp_enqueue_script( 'bootstrap-table', get_template_directory_uri() . '/js/bootstrap-table.js', array(), '20120221', true );
	
	wp_enqueue_script( 'sourcescript', get_template_directory_uri() . '/js/script.js', array(), '20120211', true );
    
    //send categorie images to script.js
	$categories = get_categories();
	$infoCategories = array();

 
//header("Content-type: application/json");
//echo json_encode($output);

	foreach($categories as $category) {
		if($category->term_id != 1){
		 $imageCategory = z_taxonomy_image_url($category->term_id);
	     $categoryName = $category->name;
	     array_push($infoCategories, array($categoryName, $imageCategory));
	    }

	}
	  
wp_localize_script( 'sourcescript', 'extCategories', $infoCategories );
 

$themeurl = array( 'templateUrl' => get_bloginfo('template_url') );
//after wp_enqueue_script
wp_localize_script( 'sourcescript', 'extThemeurl', $themeurl );   

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'start_scripts' );

add_action('admin_init', 'reg_tax');
function reg_tax() {
      register_taxonomy_for_object_type('category', 'page');
      add_post_type_support('page', 'category');
}



// Enqueued script with localized data.
//wp_enqueue_script( 'sourcescript' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

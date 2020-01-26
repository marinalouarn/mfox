<?php
/**
 * M-FOX functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package M-FOX
 */

if ( ! function_exists( 'm_fox_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function m_fox_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on M-FOX, use a find and replace
		 * to change 'm-fox' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'm-fox', get_template_directory() . '/languages' );

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

		add_post_type_support( 'page', 'excerpt' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'm-fox' ),
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



		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );




	}
endif;
add_action( 'after_setup_theme', 'm_fox_setup' );

function be_menu_item_classes( $classes, $item, $args ) {

	if( ( is_singular( 'post' ) || is_category() || is_tag() ) && 'Blog' == $item->title )
		$classes[] = 'current-menu-item';

		
	return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'be_menu_item_classes', 10, 3 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function m_fox_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'm-fox' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'm-fox' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'm_fox_widgets_init' );

/* RENOMAGE DES ARTICLES PAR DÉFAUT EN -> PROJETS */

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Projets';
    $submenu['edit.php'][5][0] = 'Projets';
    $submenu['edit.php'][10][0] = 'Ajouter un projet';
    $submenu['edit.php'][16][0] = 'Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Projets';
    $labels->singular_name = 'Projets';
    $labels->add_new = 'Ajouter un projet';
    $labels->add_new_item = 'Ajouter un projet';
    $labels->edit_item = 'Editer';
    $labels->new_item = 'Projets';
    $labels->view_item = 'Voir le projets';
    $labels->search_items = 'Rechercher';
    $labels->not_found = 'Non rien de rien';
    $labels->not_found_in_trash = 'La corbeille est vide de chez vide';
    $labels->all_items = 'Tout les projets';
    $labels->menu_name = 'Projets';
    $labels->name_admin_bar = 'Projets';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

/**
 * Enqueue scripts and styles.
 */
function m_fox_scripts() {
	

	$theme = wp_get_theme();
	$ver = $theme->get( 'Version' );
	$themecsspath = get_stylesheet_directory() . '/style.css';
	$style_ver = filemtime( $themecsspath );
	wp_enqueue_style( 'm-fox-style', get_stylesheet_uri(),array(),$style_ver );


	$js_directory = get_template_directory_uri() . '/js/';

	wp_register_script( 'index', $js_directory . 'index.js');
	wp_register_script( 'custom-jquery', $js_directory . 'jquery.js');

	wp_enqueue_script( 'custom-jquery','','','',true);
    wp_enqueue_script( 'index','','','',true);
	
}
add_action( 'wp_enqueue_scripts', 'm_fox_scripts' );



function smartwp_remove_wp_block_library_css(){
 wp_dequeue_style( 'wp-block-library' );
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css' );



/* CRÉATION DU TYPE DE CONTENU 'JOYEUX BORDEL' */


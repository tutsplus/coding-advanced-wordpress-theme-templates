<?php
	/* The theme functions file */

/****************************************************************************
Theme setup
****************************************************************************/
function tutsplus_theme_setup() {
	
	// title tags
	add_theme_support( 'title-tag' );
	
	// translation
	load_theme_textdomain( 'tutsplus', get_stylesheet_directory() . '/languages' );

	// post formats
	add_theme_support( 'post_formats' );

	// Post thumbnails or featured images
	add_theme_support( 'post-thumbnails', array( 'post', 'page', 'tutsplus_book' ) );

	// RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// navigation menu
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'tutsplus' )
	) );

}
add_action( 'after_setup_theme', 'tutsplus_theme_setup' );

/****************************************************************************
Register widgets
****************************************************************************/
function tutsplus_register_widgets() {
		
	// Sidebar widget area, located in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'tutsplus' ),
		'id' => 'sidebar-widget-area',
		'description' => __( 'The sidebar widget area', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// First footer widget area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'tutsplus' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Second Footer Widget Area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'tutsplus' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Third Footer Widget Area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'tutsplus' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'tutsplus_register_widgets' );

/****************************************************************************
Register custom post type
****************************************************************************/
function tutsplus_register_post_type() {
	
	// books
	$labels = array( 
		'name' => __( 'Books' ),
		'singular_name' => __( 'Books' ),
		'add_new' => __( 'New Book' ),
		'add_new_item' => __( 'Add New Book' ),
		'edit_item' => __( 'Edit Book' ),
		'new_item' => __( 'New Book' ),
		'view_item' => __( 'View Book' ),
		'search_items' => __( 'Search Books' ),
		'not_found' =>  __( 'No Books Found' ),
		'not_found_in_trash' => __( 'No Books found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => true,
		'public' => true,
		'hierarchical' => false,
		'supports' => array(
			'title', 
			'editor', 
			'thumbnail',
			'excerpt', 
			'custom-fields', 
			'page-attributes'
		),
		'taxonomies' => array( 'category' ), 
		'rewrite'   => array( 'slug' => 'book' ),

	);
	register_post_type( 'tutsplus_book', $args );
		
}
add_action( 'init', 'tutsplus_register_post_type' );


/****************************************************************************
Register custom taxonomy
****************************************************************************/
function tutsplus_register_taxonomy() {	
	
	// genres
	$labels = array(
		'name'              => __( 'Genres' ),
		'singular_name'     => __( 'Genre' ),
		'search_items'      => __( 'Search Genres' ),
		'all_items'         => __( 'All Genres' ),
		'edit_item'         => __( 'Edit Genres' ),
		'update_item'       => __( 'Update Genres' ),
		'add_new_item'      => __( 'Add New Genres' ),
		'new_item_name'     => __( 'New Genre Name' ),
		'menu_name'         => __( 'Genres' ),
	);
	
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'sort' => true,
		'args' => array( 'orderby' => 'term_order' ),
		'rewrite' => array( 'slug' => 'genre' ),
		'show_admin_column' => true
	);
	
	register_taxonomy( 'tutsplus_genre', array( 'tutsplus_book' ), $args);
		
}
add_action( 'init', 'tutsplus_register_taxonomy' );
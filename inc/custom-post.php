<?php
// Register Custom Post Type for news section -> local , national , international
function news() {
	$labels = array(
		'name'                  => _x( 'News', 'Post Type General Name', 'dtnext' ),
		'singular_name'         => _x( 'New', 'Post Type Singular Name', 'dtnext' ),
		'menu_name'             => __( 'News', 'dtnext' ),
		'name_admin_bar'        => __( 'News', 'dtnext' ),
		'archives'              => __( 'News Archives', 'dtnext' ),
		'parent_item_colon'     => __( 'News Parent:', 'dtnext' ),
		'all_items'             => __( 'All News', 'dtnext' ),
		'add_new_item'          => __( 'Add New News', 'dtnext' ),
		'add_new'               => __( 'Add News', 'dtnext' ),
		'new_item'              => __( 'New News', 'dtnext' ),
		'edit_item'             => __( 'Edit News', 'dtnext' ),
		'update_item'           => __( 'Update News', 'dtnext' ),
		'view_item'             => __( 'View News', 'dtnext' ),
		'search_items'          => __( 'Search News', 'dtnext' ),
		'not_found'             => __( 'Not in News', 'dtnext' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'dtnext' ),
		'featured_image'        => __( 'Featured Image', 'dtnext' ),
		'set_featured_image'    => __( 'Set featured image', 'dtnext' ),
		'remove_featured_image' => __( 'Remove featured image', 'dtnext' ),
		'use_featured_image'    => __( 'Use as featured image', 'dtnext' ),
		'insert_into_item'      => __( 'Insert into news', 'dtnext' ),
		'uploaded_to_this_item' => __( 'Uploaded to news', 'dtnext' ),
		'items_list'            => __( 'News list', 'dtnext' ),
		'items_list_navigation' => __( 'News list navigation', 'dtnext' ),
		'filter_items_list'     => __( 'Filter news list', 'dtnext' ),
	);
	$args = array(
		'label'                 => __( 'News', 'dtnext' ),
		'description'           => __( 'All type of news', 'dtnext' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail',  'trackbacks', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'new' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'news', $args );
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,

	);
	register_taxonomy( 'new', 'news', $args );


}
add_action( 'init', 'news', 0 );

// Register Custom Post Type for national_news
function sports_news() {

	$labels = array(
		'name'                  => _x( 'Sports News', 'Post Type General Name', 'dtnext' ),
		'singular_name'         => _x( 'Sports New', 'Post Type Singular Name', 'dtnext' ),
		'menu_name'             => __( 'Sports News', 'dtnext' ),
		'name_admin_bar'        => __( 'Sports News', 'dtnext' ),
		'archives'              => __( 'Sports News Archives', 'dtnext' ),
		'parent_item_colon'     => __( 'Sports News Parent:', 'dtnext' ),
		'all_items'             => __( 'All Sports News', 'dtnext' ),
		'add_new_item'          => __( 'Add New Sports News', 'dtnext' ),
		'add_new'               => __( 'Add Sports News', 'dtnext' ),
		'new_item'              => __( 'New Sports News', 'dtnext' ),
		'edit_item'             => __( 'Edit Sports News', 'dtnext' ),
		'update_item'           => __( 'Update Sports News', 'dtnext' ),
		'view_item'             => __( 'View Sports News', 'dtnext' ),
		'search_items'          => __( 'Search Sports News', 'dtnext' ),
		'not_found'             => __( 'Not in Sports News', 'dtnext' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'dtnext' ),
		'featured_image'        => __( 'Featured Image', 'dtnext' ),
		'set_featured_image'    => __( 'Set featured image', 'dtnext' ),
		'remove_featured_image' => __( 'Remove featured image', 'dtnext' ),
		'use_featured_image'    => __( 'Use as featured image', 'dtnext' ),
		'insert_into_item'      => __( 'Insert into Sports news', 'dtnext' ),
		'uploaded_to_this_item' => __( 'Uploaded to Sports news', 'dtnext' ),
		'items_list'            => __( 'Sports News list', 'dtnext' ),
		'items_list_navigation' => __( 'Sports News list navigation', 'dtnext' ),
		'filter_items_list'     => __( 'Filter Sports news list', 'dtnext' ),
	);
	$rewrite = array(
		'slug'                  => 'Sports',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Sports New', 'dtnext' ),
		'description'           => __( 'Sports News only India', 'dtnext' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail',  'trackbacks', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'sports_type' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'sports_news', $args );
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,

	);
	register_taxonomy( 'sports_type', 'sports_news', $args );

}
add_action( 'init', 'sports_news', 0 );

// Register Custom Post Type for international_news
function film_news() {

	$labels = array(
		'name'                  => _x( 'Film News', 'Post Type General Name', 'dtnext' ),
		'singular_name'         => _x( 'Film New', 'Post Type Singular Name', 'dtnext' ),
		'menu_name'             => __( 'Film News', 'dtnext' ),
		'name_admin_bar'        => __( 'Film News', 'dtnext' ),
		'archives'              => __( 'Film News Archives', 'dtnext' ),
		'parent_item_colon'     => __( 'Film News Parent:', 'dtnext' ),
		'all_items'             => __( 'All Film News', 'dtnext' ),
		'add_new_item'          => __( 'Add New Film News', 'dtnext' ),
		'add_new'               => __( 'Add Film News', 'dtnext' ),
		'new_item'              => __( 'New Film News', 'dtnext' ),
		'edit_item'             => __( 'Edit Film News', 'dtnext' ),
		'update_item'           => __( 'Update Film News', 'dtnext' ),
		'view_item'             => __( 'View Film News', 'dtnext' ),
		'search_items'          => __( 'Search Film News', 'dtnext' ),
		'not_found'             => __( 'Not in Film News', 'dtnext' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'dtnext' ),
		'featured_image'        => __( 'Featured Image', 'dtnext' ),
		'set_featured_image'    => __( 'Set featured image', 'dtnext' ),
		'remove_featured_image' => __( 'Remove featured image', 'dtnext' ),
		'use_featured_image'    => __( 'Use as featured image', 'dtnext' ),
		'insert_into_item'      => __( 'Insert into Film news', 'dtnext' ),
		'uploaded_to_this_item' => __( 'Uploaded to Film news', 'dtnext' ),
		'items_list'            => __( 'Film News list', 'dtnext' ),
		'items_list_navigation' => __( 'Film News list navigation', 'dtnext' ),
		'filter_items_list'     => __( 'Filter Film news list', 'dtnext' ),
	);
	$rewrite = array(
		'slug'                  => 'Film',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Film New', 'dtnext' ),
		'description'           => __( 'Film News only World Wide', 'dtnext' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail',  'trackbacks', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'film_type' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'film_news', $args );
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'film_type', 'film_news', $args );

}
add_action( 'init', 'film_news', 0 );
 ?>

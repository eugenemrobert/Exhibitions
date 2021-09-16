<?php


if ( !function_exists( 'motts_exhibition_cpt' ) ) {

  // Register Custom Post Type
  function motts_exhibition_cpt() {

    $labels = array(
      'name' => _x( 'Exhibitions', 'Post Type General Name', 'themezinho' ),
      'singular_name' => _x( 'Exhibition', 'Post Type Singular Name', 'themezinho' ),
      'menu_name' => __( 'Exhibitions', 'themezinho' ),
      'name_admin_bar' => __( 'Exhibition', 'themezinho' ),
      'archives' => __( 'Exhibition Archives', 'themezinho' ),
      'attributes' => __( 'Exhibition Attributes', 'themezinho' ),
      'parent_item_colon' => __( 'Parent Exhibition:', 'themezinho' ),
      'all_items' => __( 'All Exhibitions', 'themezinho' ),
      'add_new_item' => __( 'Add New Exhibition', 'themezinho' ),
      'add_new' => __( 'Add New', 'themezinho' ),
      'new_item' => __( 'New Exhibition', 'themezinho' ),
      'edit_item' => __( 'Edit Exhibition', 'themezinho' ),
      'update_item' => __( 'Update Exhibition', 'themezinho' ),
      'view_item' => __( 'View Exhibition', 'themezinho' ),
      'view_items' => __( 'View Exhibitions', 'themezinho' ),
      'search_items' => __( 'Search Exhibition', 'themezinho' ),
      'not_found' => __( 'Not found', 'themezinho' ),
      'not_found_in_trash' => __( 'Not found in Trash', 'themezinho' ),
      'featured_image' => __( 'Featured Image', 'themezinho' ),
      'set_featured_image' => __( 'Set featured image', 'themezinho' ),
      'remove_featured_image' => __( 'Remove featured image', 'themezinho' ),
      'use_featured_image' => __( 'Use as featured image', 'themezinho' ),
      'insert_into_item' => __( 'Insert into Exhibition', 'themezinho' ),
      'uploaded_to_this_item' => __( 'Uploaded to this Exhibition', 'themezinho' ),
      'items_list' => __( 'Exhibitions list', 'themezinho' ),
      'items_list_navigation' => __( 'Exhibitions list navigation', 'themezinho' ),
      'filter_items_list' => __( 'Filter Exhibitions list', 'themezinho' ),
    );
    $args = array(
      'label' => __( 'Exhibition', 'themezinho' ),
      'description' => __( 'Exhibition Description', 'themezinho' ),
      'labels' => $labels,
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-admin-page',
      'show_in_admin_bar' => true,
      'show_in_nav_menus' => true,
      'can_export' => true,
      'has_archive' => false,
      'exclude_from_search' => true,
      'publicly_queryable' => true,
      'capability_type' => 'page',
    );
    register_post_type( 'exhibition', $args );

  }
  add_action( 'init', 'motts_exhibition_cpt', 0 );

}

if ( !function_exists( 'motts_exhibition_tag_taxonomy' ) ) {

  // Register Custom Taxonomy
  function motts_exhibition_tag_taxonomy() {

    $labels = array(
      'name' => _x( 'Tags', 'Taxonomy General Name', 'themezinho' ),
      'singular_name' => _x( 'Tag', 'Taxonomy Singular Name', 'themezinho' ),
      'menu_name' => __( 'Tags', 'themezinho' ),
      'all_items' => __( 'All Tags', 'themezinho' ),
      'parent_item' => __( 'Parent Tag', 'themezinho' ),
      'parent_item_colon' => __( 'Parent Tag:', 'themezinho' ),
      'new_item_name' => __( 'New Tag Name', 'themezinho' ),
      'add_new_item' => __( 'Add New Tag', 'themezinho' ),
      'edit_item' => __( 'Edit Tag', 'themezinho' ),
      'update_item' => __( 'Update Tag', 'themezinho' ),
      'view_item' => __( 'View Tag', 'themezinho' ),
      'separate_items_with_commas' => __( 'Separate tags with commas', 'themezinho' ),
      'add_or_remove_items' => __( 'Add or remove tags', 'themezinho' ),
      'choose_from_most_used' => __( 'Choose from the most used', 'themezinho' ),
      'popular_items' => __( 'Popular tags', 'themezinho' ),
      'search_items' => __( 'Search Tags', 'themezinho' ),
      'not_found' => __( 'Not Found', 'themezinho' ),
      'no_terms' => __( 'No tags', 'themezinho' ),
      'items_list' => __( 'Tags list', 'themezinho' ),
      'items_list_navigation' => __( 'Tags list navigation', 'themezinho' ),
    );
    $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'show_tagcloud' => true,
    );
    register_taxonomy( 'exhibition_tag', array( 'exhibition' ), $args );

  }
  add_action( 'init', 'motts_exhibition_tag_taxonomy', 0 );

}


if ( !function_exists( 'motts_collection_cpt' ) ) {

  // Register Custom Post Type
  function motts_collection_cpt() {

    $labels = array(
      'name' => _x( 'Collections', 'Post Type General Name', 'themezinho' ),
      'singular_name' => _x( 'Collection', 'Post Type Singular Name', 'themezinho' ),
      'menu_name' => __( 'Collections', 'themezinho' ),
      'name_admin_bar' => __( 'Collection', 'themezinho' ),
      'archives' => __( 'Collection Archives', 'themezinho' ),
      'attributes' => __( 'Collection Attributes', 'themezinho' ),
      'parent_item_colon' => __( 'Parent Collection:', 'themezinho' ),
      'all_items' => __( 'All Collections', 'themezinho' ),
      'add_new_item' => __( 'Add New Collection', 'themezinho' ),
      'add_new' => __( 'Add New', 'themezinho' ),
      'new_item' => __( 'New Collection', 'themezinho' ),
      'edit_item' => __( 'Edit Collection', 'themezinho' ),
      'update_item' => __( 'Update Collection', 'themezinho' ),
      'view_item' => __( 'View Collection', 'themezinho' ),
      'view_items' => __( 'View Collections', 'themezinho' ),
      'search_items' => __( 'Search Collection', 'themezinho' ),
      'not_found' => __( 'Not found', 'themezinho' ),
      'not_found_in_trash' => __( 'Not found in Trash', 'themezinho' ),
      'featured_image' => __( 'Featured Image', 'themezinho' ),
      'set_featured_image' => __( 'Set featured image', 'themezinho' ),
      'remove_featured_image' => __( 'Remove featured image', 'themezinho' ),
      'use_featured_image' => __( 'Use as featured image', 'themezinho' ),
      'insert_into_item' => __( 'Insert into Collection', 'themezinho' ),
      'uploaded_to_this_item' => __( 'Uploaded to this Collection', 'themezinho' ),
      'items_list' => __( 'Collections list', 'themezinho' ),
      'items_list_navigation' => __( 'Collections list navigation', 'themezinho' ),
      'filter_items_list' => __( 'Filter Collections list', 'themezinho' ),
    );
    $args = array(
      'label' => __( 'Collection', 'themezinho' ),
      'description' => __( 'Collection Description', 'themezinho' ),
      'labels' => $labels,
      'supports' => array( 'title', 'editor', 'thumbnail' ),
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-admin-page',
      'show_in_admin_bar' => true,
      'show_in_nav_menus' => true,
      'can_export' => true,
      'has_archive' => false,
      'exclude_from_search' => true,
      'publicly_queryable' => true,
      'capability_type' => 'page',
    );
    register_post_type( 'collection', $args );

  }
  add_action( 'init', 'motts_collection_cpt', 0 );

}

if ( !function_exists( 'motts_collection_tag_taxonomy' ) ) {

  // Register Custom Taxonomy
  function motts_collection_tag_taxonomy() {

    $labels = array(
      'name' => _x( 'Tags', 'Taxonomy General Name', 'themezinho' ),
      'singular_name' => _x( 'Tag', 'Taxonomy Singular Name', 'themezinho' ),
      'menu_name' => __( 'Tags', 'themezinho' ),
      'all_items' => __( 'All Tags', 'themezinho' ),
      'parent_item' => __( 'Parent Tag', 'themezinho' ),
      'parent_item_colon' => __( 'Parent Tag:', 'themezinho' ),
      'new_item_name' => __( 'New Tag Name', 'themezinho' ),
      'add_new_item' => __( 'Add New Tag', 'themezinho' ),
      'edit_item' => __( 'Edit Tag', 'themezinho' ),
      'update_item' => __( 'Update Tag', 'themezinho' ),
      'view_item' => __( 'View Tag', 'themezinho' ),
      'separate_items_with_commas' => __( 'Separate tags with commas', 'themezinho' ),
      'add_or_remove_items' => __( 'Add or remove tags', 'themezinho' ),
      'choose_from_most_used' => __( 'Choose from the most used', 'themezinho' ),
      'popular_items' => __( 'Popular tags', 'themezinho' ),
      'search_items' => __( 'Search Tags', 'themezinho' ),
      'not_found' => __( 'Not Found', 'themezinho' ),
      'no_terms' => __( 'No tags', 'themezinho' ),
      'items_list' => __( 'Tags list', 'themezinho' ),
      'items_list_navigation' => __( 'Tags list navigation', 'themezinho' ),
    );
    $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'show_tagcloud' => true,
    );
    register_taxonomy( 'collection_tag', array( 'collection' ), $args );

  }
  add_action( 'init', 'motts_collection_tag_taxonomy', 0 );

}
<?php
/*
Plugin Name: Themezinho Core
Plugin URI: https://themeforest.net/user/themezinho/portfolio
Description: Wandau Theme
Author: Themezinho
Version: 1.0.0
Author URI: http://themeforest.net/user/themezinho/portfolio
*/

define( "THEMEZINHO_CORE_PATH", plugin_dir_path( __FILE__ ) );
define( "THEMEZINHO_CORE_URI", plugins_url( 'themezinho_core/' ) );


/*
 * Elementor
 */

require_once( 'inc/elementor/themezinho-elementor.php' );


function add_elementor_widget_categories( $elements_manager ) {

  $categories = [];
  $categories[ 'themezinho' ] = [
    'title' => 'Themezinho',
    'icon' => 'fas fa-adjust'
  ];

  $old_categories = $elements_manager->get_categories();
  $categories = array_merge( $categories, $old_categories );

  $set_categories = function ( $categories ) {
    $this->categories = $categories;
  };

  $set_categories->call( $elements_manager, $categories );

}

add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );


/**
 * Include ACF
 */
// 1. Customize ACF path
add_filter( 'acf/settings/path', 'themezinho_acf_settings_path' );

function themezinho_acf_settings_path( $path ) {
  $path = THEMEZINHO_CORE_PATH . '/inc/acf/';
  return $path;
}


// 2. Customize ACF dir
add_filter( 'acf/settings/dir', 'themezinho_acf_settings_dir' );

function themezinho_acf_settings_dir( $dir ) {
  $dir = THEMEZINHO_CORE_URI . '/inc/acf/';
  return $dir;
}

//Hide ACF field group menu item
add_filter( 'acf/settings/show_admin', '__return_false' );
require THEMEZINHO_CORE_PATH . '/inc/acf/acf.php';
require_once THEMEZINHO_CORE_PATH . '/inc/theme-options.php';
require_once THEMEZINHO_CORE_PATH . '/inc/cpt-taxonomy.php';


// Default Options
function quardo_after_import() {


  update_field( 'enable_preloader', 1, 'option' );
  update_field( 'enable_smooth_scroll', 0, 'option' );
  update_field( 'enable_search', 1, 'option' );
  update_field( 'enable_navbar_button', 1, 'option' );
  update_field( 'enable_newsletter', 1, 'option' );
  update_field( 'enable_search_form', 1, 'option' );
  update_field( 'archive_show_sidebar', 'yes', 'option' );


  $custom_menu = array(
    array(
      'label' => esc_attr__( 'Eng', 'quardo' ),
      'url' => '#',
    ),
    array(
      'label' => esc_attr__( 'Rus', 'quardo' ),
      'url' => '#',
    ),

  );

  update_field( 'custom_menu', $custom_menu, 'option' );

  update_field( 'pre-loader_text', wp_kses_post( "LOADING" ), 'option' );
  update_field( 'navbar_button_label', wp_kses_post( "GET A TICKET" ), 'option' );
  update_field( 'newsletter_bg', wp_kses_post( "#94ffc4" ), 'option' );
  update_field( 'newsletter_tagline', wp_kses_post( "Subscribe Newsletter" ), 'option' );
  update_field( 'newsletter_title', wp_kses_post( "Sign up to get the latest news" ), 'option' );
  update_field( 'newsletter_shortcode', wp_kses_post( "[mc4wp_form id='468']" ), 'option' );

}
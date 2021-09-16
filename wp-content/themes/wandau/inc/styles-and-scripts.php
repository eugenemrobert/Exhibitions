<?php

function wandau_add_google_fonts() {

  wp_enqueue_style( 'cinzel-google-fonts', 'https://fonts.googleapis.com/css?family=Cinzel:400,600', false );
  wp_enqueue_style( 'dm-sans-google-fonts', 'https://fonts.googleapis.com/css?family=DM+Sans:400,500,700', false );


}

add_action( 'wp_enqueue_scripts', 'wandau_add_google_fonts' );
if ( !function_exists( 'wandau_enqueue_styles_and_scripts' ) ) {
  /**
   * This function enqueues the required css and js files.
   *
   * @return void
   */
  function wandau_enqueue_styles_and_scripts() {
    /**
     * Enqueue css files.
     */
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome.min.css' );
    wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/fancybox.min.css' );
    wp_enqueue_style( 'odometer', get_template_directory_uri() . '/css/odometer.min.css' );
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'wandau-main-style', get_template_directory_uri() . '/css/style.css' );
    wp_enqueue_style( 'wandau-stylesheet', get_stylesheet_uri() );
    wp_add_inline_style( 'wandau-stylesheet', wandau_dynamic_css() );

    /**
     * Enqueue javascript files.
     */

    wp_enqueue_script( 'comments', get_template_directory_uri() . '/js/comments.js', array(), false, false );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'gsap', get_template_directory_uri() . '/js/gsap.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'locomotive-scroll', get_template_directory_uri() . '/js/locomotive-scroll.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'scroll-trigger', get_template_directory_uri() . '/js/ScrollTrigger.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'kinetic-slider', get_template_directory_uri() . '/js/kinetic-slider.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'odometer', get_template_directory_uri() . '/js/odometer.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array( 'jquery' ), false, true );

    wp_enqueue_script( 'wandau-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), false, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

    $data = array(
      'enable_preloader' => false,
      'enable_smooth_scroll' => false,
    );

    if ( wandau_get_option( 'enable_preloader' ) ) {
      $data[ 'enable_preloader' ] = true;
    }

    if ( wandau_get_option( 'enable_smooth_scroll' ) ) {
      $data[ 'enable_smooth_scroll' ] = true;
    }


    $comment_data = array(
      'name' => esc_html__( 'Name is required', 'wandau' ),
      'email' => esc_html__( 'Email is required', 'wandau' ),
      'comment' => esc_html__( 'Comment is required', 'wandau' ),

    );


    wp_localize_script( 'wandau-scripts', 'data', $data );
    wp_localize_script( 'comments', 'comment_data', $comment_data );
  }

  add_action( 'wp_enqueue_scripts', 'wandau_enqueue_styles_and_scripts', 10 );
}

if ( !function_exists( 'wandau_dynamic_css' ) ) {
  function wandau_dynamic_css() {

    $styles = '';
    if ( wandau_get_option( 'logo_height' ) ) {
      $logo_height = str_replace( ' ', '', wandau_get_option( 'logo_height' ) );
      $logo_height = str_replace( 'px', '', $logo_height );
      $styles .= "
				.navbar .logo a img{
					height: {$logo_height}px;
				}
			";
    }
    if ( wandau_get_option( 'enable_dynamic_color' ) ) {

      $site_color = ( wandau_get_option( 'theme_color' ) ) ? wandau_get_option( 'theme_color' ) : '#94ffc4';
      $dark_color = ( wandau_get_option( 'dark_color' ) ) ? wandau_get_option( 'dark_color' ) : '#080808';

      $styles .= "
				
				
				:root {
  --color-main: {$site_color}; 
  --color-dark: {$dark_color}; 
}
				
				
				
				
			";
    }

    return $styles;
  }
}


add_action( 'init', 'wandau_dynamic_css' );
add_action(
  'after_setup_theme',
  function () {
    add_theme_support( 'html5', [ 'script', 'style' ] );
  }
);
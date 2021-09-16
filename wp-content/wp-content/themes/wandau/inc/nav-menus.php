<?php

if ( !function_exists( 'wandau_register_nav_menus' ) ) {
  /**
   * Register required nav menus
   */
  function wandau_register_nav_menus() {

    register_nav_menus( array(
      'header' => esc_html__( 'Main Menu', 'wandau' ),
    ) );


  }
  add_action( 'after_setup_theme', 'wandau_register_nav_menus' );
}
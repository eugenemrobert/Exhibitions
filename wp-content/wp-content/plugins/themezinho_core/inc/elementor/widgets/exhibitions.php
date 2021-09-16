<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Exhibitions_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'exhibitions';
  }
  public function get_title() {
    return 'Exhibitions';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {

    /*****   START CONTROLS SECTION   ******/
    $this->start_controls_section( 'exhibitions', [
      'label' => esc_html__( 'Exhibitions', 'themezinho' ),
    ] );


    $this->add_control(
      'total_count',
      array(
        'label' => __( 'Total', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );


    $this->add_control(
      'display_more_button',
      array(
        'label' => __( 'Display More Button', 'themezinho' ),
        'type' => Controls_Manager::SWITCHER,
        'default' => 'no',
        'return_value' => 'yes',
      )
    );

    $this->add_control(
      'more_button_label',
      array(
        'label' => __( 'More Button Label', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );

    $this->add_control(
      'more_button_url',
      array(
        'label' => __( 'More Button URL', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );


    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/

  }
  protected function render() {
    $settings = $this->get_settings_for_display();


    $exhibitions = array(
      'post_type' => 'exhibition',
      'post_status' => 'publish',
      'posts_per_page' => $settings[ 'total_count' ],
  	  
    );


    ?>
<div class="row justify-content-center">
  <?php
  $the_query = new\ WP_Query( $exhibitions );
  if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
      $the_query->the_post();
      $thumbnail_image = get_the_post_thumbnail_url( get_the_ID() );
      $title = get_the_title();
      ?>
  <div class="col-lg-4 col-md-6">
    <div class="exhibition-box" data-scroll data-scroll-speed="0.5">
      <div class="thumb"> <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $thumbnail_image ); ?>" alt="Image" class="img"></a>
        <div class="info">
          <figure class="i"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-info.png" alt="Image"></figure>
          <span><?php echo esc_html( the_field( 'exhibition_info' ) ); ?></span> </div>
        <!-- end info --> 
      </div>
      <div class="content-box">
        <h4><a href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $title ); ?></a></h4>
        <p><?php echo esc_html( the_field( 'exhibition_date' ) ); ?> </p>
      </div>
      <!-- end content-box --> 
    </div>
    <!-- end col-6 --> 
    
  </div>
  <?php }  ?>
  <?php }   ?>
  <?php if ( $settings[ 'display_more_button' ] === 'yes' ) { ?>
  <div class="col-12 text-center"> <a href="<?php echo $settings['more_button_url'] ?>" class="custom-button"><?php echo $settings['more_button_label'] ?></a> </div>
  <?php } ?>
	
  
</div>
<?php


}
}

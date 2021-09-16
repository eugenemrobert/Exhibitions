<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Recent_News_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'recent-news';
  }
  public function get_title() {
    return 'Recent News';
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
    $this->start_controls_section( 'recent_news', [
      'label' => esc_html__( 'Recent News', 'themezinho' ),
      'tab' => Controls_Manager::TAB_CONTENT
    ] );


    $this->add_control(
      'total_count',
      array(
        'label' => __( 'Total', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );

    $this->add_control(
      'readmore_label',
      array(
        'label' => __( 'Read More Label', 'themezinho' ),
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
        'condition' => [ 'display_more_button!' => 'no' ],
      )
    );

    $this->add_control(
      'more_button_url',
      array(
        'label' => __( 'More Button URL', 'themezinho' ),
        'type' => Controls_Manager::TEXT,
        'condition' => [ 'display_more_button!' => 'no' ],
      )
    );


    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/

  }
  protected function render() {
    $settings = $this->get_settings_for_display();


    $recent_posts = array(
      'post_status' => 'publish',
      'posts_per_page' => $settings[ 'total_count' ],
      'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1

    );


    ?>
<div class="row justify-content-center">
  <?php
  $the_query = new\ WP_Query( $recent_posts );
  if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
      $the_query->the_post();

      $thumbnail_image = get_the_post_thumbnail_url();
      $title = get_the_title();
      ?>
  <div class="col-12">
    <div class="recent-news">
      <div class="content-box"> <small><?php echo date( ' jS F, Y' ); ?></small>
        <h3><?php echo wp_kses_post( $title ); ?></h3>
        <?php the_excerpt(); ?>
        <a href="<?php echo get_permalink() ?>" class="custom-link"><?php echo wp_kses( $settings['readmore_label'], array() ); ?></a> </div>
      <!-- end content-box -->
      <figure data-scroll data-scroll-speed="1">
        <?php the_post_thumbnail(); ?>
      </figure>
    </div>
    <!-- end recent-news --> 
  </div>
  <!-- end col-12 -->
  
  <?php }  ?>
  <?php }   ?>
  <?php if ( $settings[ 'display_more_button' ] === 'yes' ) { ?>
  <div class="col-12 text-center"> <a href="<?php echo $settings[ 'more_button_url' ] ; ?>" class="circle-button"><?php echo $settings[ 'more_button_label' ] ; ?></a> </div>
  <?php } ?>
  
</div>
<?php


}
}

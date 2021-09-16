<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Horizontal_Image_Scroll_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'horizontal-image-scroll';
  }
  public function get_title() {
    return 'Horizontal Image Scroll';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'horizontal_image_scroll', [
      'label' => esc_html__( 'Horizontl Image Scroll', 'themezinho' ),
    ] );


    $this->add_control(
      'image01',
      array(
        'label' => __( 'Image 01', 'themezinho' ),
        'type' => Controls_Manager::MEDIA,
      )
    );

    $this->add_control(
      'image02',
      array(
        'label' => __( 'Image 02', 'themezinho' ),
        'type' => Controls_Manager::MEDIA,
      )
    );

    $this->add_control(
      'image03',
      array(
        'label' => __( 'Image 03', 'themezinho' ),
        'type' => Controls_Manager::MEDIA,
      )
    );
    $this->add_control(
      'image04',
      array(
        'label' => __( 'Image 04', 'themezinho' ),
        'type' => Controls_Manager::MEDIA,
      )
    );


    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/


  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
<div class="horizontal-scroll">
  <div class="scroll-inner" data-scroll data-scroll-direction="horizontal" data-scroll-speed="5">
    <div class="scroll-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <figure class="image-box" data-scroll data-scroll-speed="0"> <img src="<?php echo wp_kses( $settings['image01']['url'], array() ); ?>" alt="Image"> </figure>
          </div>
          <!-- end col-3 -->
          <div class="col-md-4 offset-md-1">
            <figure class="image-box" data-scroll data-scroll-speed="0"> <img src="<?php echo wp_kses( $settings['image02']['url'], array() ); ?>" alt="Image"> </figure>
          </div>
          <!-- end col-3 -->
          <div class="col-md-2 offset-md-1">
            <figure class="image-box" data-scroll data-scroll-speed="0"> <img src="<?php echo wp_kses( $settings['image03']['url'], array() ); ?>" alt="Image"> </figure>
          </div>
          <!-- end col-3 --> 
        </div>
        <!-- end row --> 
      </div>
      <!-- end container-fluid --> 
    </div>
    <!-- end scroll-wrapper -->
    <div class="scroll-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <figure class="image-box" data-scroll data-scroll-speed="0"> <img src="<?php echo wp_kses( $settings['image04']['url'], array() ); ?>" alt="Image"> </figure>
          </div>
          <!-- end col-3 --> 
        </div>
        <!-- end row --> 
      </div>
      <!-- container-fluid --> 
    </div>
    <!-- end scroll-wrapper --> 
  </div>
  <!-- end scroll-inner --> 
</div>
<!-- end horizontal-scroll -->

<?php


}
}

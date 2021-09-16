<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Art_Slider_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'art-slider';
  }
  public function get_title() {
    return 'Art Slider';
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
    $this->start_controls_section( 'art_slider_widget', [
      'label' => esc_html__( 'Art Slider Title', 'themezinho' ),
    ] );

    $this->add_control(
      'art_slider_tagline',
      array(
        'label' => __( 'Art Slider Tagline', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );


    $this->add_control(
      'art_slider_title',
      array(
        'label' => __( 'Art Slider Title', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );


    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/

    $this->start_controls_section( 'art_slider_section', [
      'label' => esc_html__( 'Slider Item', 'themezinho' ),
      'tab' => Controls_Manager::TAB_CONTENT
    ] );

    $this->add_control( 'slider_items', [
      'type' => Controls_Manager::REPEATER,
      'seperator' => 'before',
      'deafult' => '',
      'fields' => [

        [
          'name' => 'slider_image',
          'label' => esc_html__( 'Image', 'themezinho' ),
          'type' => Controls_Manager::MEDIA,
          'default' => ''
        ],

        [
          'name' => 'slider_title',
          'label' => esc_html__( 'Art Title', 'themezinho' ),
          'type' => Controls_Manager::TEXT,
          'default' => '',
          'pleaceholder' => esc_html__( 'Enter title here', 'themezinho' )
        ],


      ],

    ] );
    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/


  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
<div class="art-slider">
  <div class="art-slider-content">
    <div class="titles">
      <h6><?php echo wp_kses( $settings['art_slider_tagline'], array() ); ?></h6>
      <h2><?php echo wp_kses( $settings['art_slider_title'], array() ); ?></h2>
    </div>
    <!-- end titles -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php
        $idd = 0;
        foreach ( $settings[ 'slider_items' ] as $item ) {
          $idd++;
          ?>
        <div class="swiper-slide"> <span>0<?php echo esc_html( $idd ); ?></span>
          <?php if ( $item[ 'slider_title' ] ) { ?>
          <h3><?php echo $item[ 'slider_title' ] ?></h3>
          <?php } ?>
        </div>
        <!-- end swiper-slide -->
        <?php } ?>
      </div>
      <!-- end swiper-wrapper --> 
    </div>
    <!-- end swiper-container --> 
  </div>
  <!-- end art-slider-content -->
  
  <div class="art-slider-images" data-scroll data-scroll-speed="1">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php foreach ( $settings[ 'slider_items' ] as $item ) { ?>
        <div class="swiper-slide"> <img src="<?php echo esc_url($item['slider_image'][ 'url' ]); ?>" alt="Image"> </div>
        <!-- end swiper-slide -->
        <?php } ?>
      </div>
      <!-- end swiper-wrapper --> 
    </div>
    <!-- end swiper-container --> 
  </div>
  <!-- end art-slider-images --> 
</div>
<!-- end art-slider -->


<?php


}
}

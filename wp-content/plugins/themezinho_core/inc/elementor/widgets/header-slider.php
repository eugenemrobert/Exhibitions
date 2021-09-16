<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Header_Slider_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'header-slider';
  }
  public function get_title() {
    return 'Header Slider';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'header_slider_section', [
      'label' => esc_html__( 'Header Slider', 'themezinho' ),
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
          'name' => 'slider_mob_image',
          'label' => esc_html__( 'Responsive Mobile Image', 'themezinho' ),
          'type' => Controls_Manager::MEDIA,
          'default' => ''
        ],
        [
          'name' => 'slider_title',
          'label' => esc_html__( 'Title', 'themezinho' ),
          'type' => Controls_Manager::TEXTAREA,
          'default' => '',
          'pleaceholder' => esc_html__( 'Enter title here', 'themezinho' )
        ],
        [
          'name' => 'slider_desc',
          'label' => esc_html__( 'Description', 'themezinho' ),
          'type' => Controls_Manager::TEXTAREA,
          'pleaceholder' => esc_html__( 'Enter description here', 'themezinho' ),
          'default' => '',

        ],

      ],
      'title_field' => '{{slider_title}}'
    ] );
    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/

    /*****   START CONTROLS SECTION   ******/
    $this->start_controls_section( 'header_slider_video_button', [
      'label' => esc_html__( 'Video Play', 'themezinho' ),
      'tab' => Controls_Manager::TAB_CONTENT
    ] );
	  
	   $this->add_control(
      'display_play_button',
      array(
        'label' => __( 'Display Play Button', 'themezinho' ),
        'type' => Controls_Manager::SWITCHER,
        'default' => 'yes',
        'return_value' => 'yes',
      )
    );
	  

    $this->add_control(
      'video_button',
      array(
        'label' => __( 'Video Button', 'themezinho' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( '', 'themezinho' ),
      )
    );
    $this->add_control(
      'video_url',
      array(
        'label' => __( 'Video URL', 'themezinho' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( '#', 'themezinho' ),
      )
    );
	  $this->add_control(
      'video_icon',
      array(
        'label' => __( 'Video Icon', 'themezinho' ),
        'type' => Controls_Manager::MEDIA,
      )
    );
	  
	   $this->add_control(
      'display_fancybox',
      array(
        'label' => __( 'Display Fancybox', 'themezinho' ),
        'type' => Controls_Manager::SWITCHER,
        'default' => 'yes',
        'return_value' => 'yes',
      )
    );


    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/

  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
<header class="slider">
  <div class="swiper-container slider-images">
    <div class="swiper-wrapper">
      <?php foreach ( $settings[ 'slider_items' ] as $item ) { ?>
      <div class="swiper-slide"  <?php if($item['slider_image'][ 'url' ]){ ?> data-background="<?php echo esc_url($item['slider_image'][ 'url' ]); ?>" <?php } ?>>
        <div class="mobile-slide" <?php if($item['slider_mob_image'][ 'url' ]){ ?>data-background="<?php echo $item[ 'slider_mob_image' ][ 'url' ] ?>"  <?php } ?>></div>
      </div>
      <?php } ?>
    </div>
    <!-- end swiper-wrapper -->
    
    <div class="container-fluid slider-nav">
      <div class="swiper-pagination"></div>
      <!-- end swiper-pagination -->
      <div class="swiper-fraction"></div>
      <!-- end swiper-fraction -->
      <div class="button-prev"><i class="far fa-chevron-down"></i></div>
      <!-- end swiper-button-prev -->
      <div class="button-next"><i class="far fa-chevron-up"></i></div>
      <!-- end swiper-button-next --> 
    </div>
    <!-- end slider-nav --> 
  </div>
  <!-- end slider-images -->
  <div class="swiper-container slider-texts">
    <svg width="580" height="400" class="svg-morph">
      <path id="svg_morph" d="m261,30.4375c0,0 114,6 151,75c37,69 37,174 6,206.5625c-31,32.5625 -138,11.4375 -196,-19.5625c-58,-31 -86,-62 -90,-134.4375c12,-136.5625 92,-126.5625 129,-127.5625z" />
    </svg>
    <div class="swiper-wrapper">
      <?php foreach ( $settings[ 'slider_items' ] as $item ) { ?>
      <div class="swiper-slide">
        <div class="container-fluid">
          <?php if ( $item[ 'slider_title' ] ) { ?>
          <h1><?php echo $item[ 'slider_title' ] ?></h1>
          <?php } ?>
          <?php if ( $item[ 'slider_desc' ] ) { ?>
          <p><?php echo $item[ 'slider_desc' ] ?></p>
          <?php } ?>
        </div>
        <!-- end container --> 
      </div>
      <!-- end swiper-slide -->
      <?php } ?>
    </div>
    <!-- end swiper-wrapper --> 
  </div>
  <!-- end slider-texts -->
	<?php if ( $settings[ 'display_play_button'] == 'yes'  ) { ?> 
  <div class="play-now"> <a href="<?php echo wp_kses( $settings['video_url'], array() ); ?>" <?php if ( $settings[ 'display_fancybox'] == 'yes'  ) { ?> data-fancybox data-width="640" data-height="360" <?php } ?>  class="play-btn">
	  <img src="<?php echo wp_kses( $settings['video_icon']['url'], array() ); ?>" alt="Image">
	  </a>
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
      <defs>
        <path id="circlePath" d="M 150, 150 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 "/>
      </defs>
      <circle cx="150" cy="100" r="75" fill="none"/>
      <g>
        <use xlink:href="#circlePath" fill="none"/>
        <text>
          <textPath xlink:href="#circlePath"><?php echo wp_kses( $settings['video_button'], array() ); ?> - <?php echo wp_kses( $settings['video_button'], array() ); ?> - <?php echo wp_kses( $settings['video_button'], array() ); ?> -</textPath>
        </text>
      </g>
    </svg>
  </div>
  <!-- end play-now --> 
	<?php } ?>
</header>
<!-- end slider -->

<?php


}
}

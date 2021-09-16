<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Image_Box_Carousel_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'image-box-carousel';
  }
  public function get_title() {
    return 'Image Box Carousel';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'image-box_carousel_section', [
      'label' => esc_html__( 'Image Box Carousel', 'themezinho' ),
      'tab' => Controls_Manager::TAB_CONTENT
    ] );

    $this->add_control( 'carousel_items', [
      'type' => Controls_Manager::REPEATER,
      'seperator' => 'before',
      'deafult' => '',
      'fields' => [

        [
          'name' => 'carousel_image',
          'label' => esc_html__( 'Image', 'themezinho' ),
          'type' => Controls_Manager::MEDIA,
          'default' => ''
        ],

        [
          'name' => 'carousel_title',
          'label' => esc_html__( 'Title', 'themezinho' ),
          'type' => Controls_Manager::TEXT,
          'default' => '',
        ],
        [
          'name' => 'carousel_link_label',
          'label' => esc_html__( 'Link Label', 'themezinho' ),
          'type' => Controls_Manager::TEXT,
          'default' => '',

        ],

        [
          'name' => 'carousel_link_url',
          'label' => esc_html__( 'Link URL', 'themezinho' ),
          'type' => Controls_Manager::TEXT,
          'default' => '',

        ],

      ],
    ] );
    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/



  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
<div class="image-box-carousel swiper-container">
  <div class="swiper-wrapper">
    <?php foreach ( $settings[ 'carousel_items' ] as $item ) { ?>
    <div class="swiper-slide">
      <?php if($item['carousel_image'][ 'url' ]){ ?>
		<figure>
      <img src="<?php echo esc_url($item['carousel_image'][ 'url' ]); ?>" alt="<?php echo $item[ 'carousel_title' ] ?>">
			</figure>
      <?php } ?>
		<div class="content-box">
      <?php if ( $item[ 'carousel_title' ] ) { ?>
      <h5><?php echo $item[ 'carousel_title' ] ?></h5>
      <?php } ?>
      <?php if ( $item[ 'carousel_link_label' ] ) { ?>
      <a href="<?php echo $item[ 'carousel_link_url' ] ?>" class="custom-link"><?php echo $item[ 'carousel_link_label' ] ?></a>
      <?php } ?>
			</div>
    </div>
    <?php } ?>
  </div>
  <!-- end swiper-wrapper --> 
</div>
<!-- end image-box-carousel -->

<?php


}
}

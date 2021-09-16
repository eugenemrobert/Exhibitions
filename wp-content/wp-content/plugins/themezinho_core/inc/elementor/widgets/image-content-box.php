<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Image_Content_Box_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'image-content-box';
  }
  public function get_title() {
    return 'Image Content Box';
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
    $this->start_controls_section( 'image_content_box', [
      'label' => esc_html__( 'Image Content Box', 'themezinho' ),
    ] );


    $this->add_control(
      'image',
      array(
        'label' => __( 'Image', 'themezinho' ),
        'type' => Controls_Manager::MEDIA,

      )
    );


    $this->add_control(
      'parallax_value',
      array(
        'label' => __( 'Parallax Value', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );

    $this->add_control(
      'title',
      array(
        'label' => __( 'Title', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );


    $this->add_control(
      'content',
      array(
        'label' => __( 'Content', 'themezinho' ),
        'type' => Controls_Manager::WYSIWYG,

      )
    );


    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/

  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
<div class="image-content-box" data-scroll data-scroll-speed="<?php echo wp_kses( $settings['parallax_value'], array() ); ?>">
  <figure> <img src="<?php echo wp_kses( $settings['image']['url'], array() ); ?>" alt="<?php echo wp_kses( $settings['title'], array() ); ?>"> </figure>
  <div class="content-box">
    <?php if ( $settings[ 'title' ] ) { ?>
    <h3><?php echo wp_kses( $settings['title'], array() ); ?></h3>
    <?php } ?>
    <?php if ( $settings[ 'content' ] ) { ?>
    <?php echo wp_kses_post( $settings['content'], array() ); ?>
    <?php } ?>
  </div>
  <!-- end content-box --> 
  
</div>
<?php


}
}

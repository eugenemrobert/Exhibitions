<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Image_Box_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'image-box';
  }
  public function get_title() {
    return 'Image Box';
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
    $this->start_controls_section( 'image_box_section', [
      'label' => esc_html__( 'Image Box', 'themezinho' ),
    ] );

    
$this->add_control(
      'parallax_value',
      array(
        'label' => __( 'Parallax Value', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );

    $this->add_control(
      'image',
      array(
        'label' => __( 'Image', 'themezinho' ),
        'type' => Controls_Manager::MEDIA,

      )
    );

    


    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/

  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
<figure class="image-box" data-scroll data-scroll-speed="<?php echo wp_kses( $settings['parallax_value'], array() ); ?>"> <img src="<?php echo wp_kses( $settings['image']['url'], array() ); ?>" alt="Image"></figure>
<?php


}
}

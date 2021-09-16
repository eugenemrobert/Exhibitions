<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Side_Image_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'side-image';
  }
  public function get_title() {
    return 'Side Image Box';
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
    $this->start_controls_section( 'side_image', [
      'label' => esc_html__( 'Side Image', 'themezinho' ),
    ] );

	   $this->add_control(
      'parallax_value',
      array(
        'label' => __( 'Parallax Value', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );

	  
    $this->add_control(
      'position',
      array(
        'label' => __( 'Position', 'themezinho' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          '' => esc_html__( 'Default', 'themezinho' ),
          'left-half' => esc_html__( 'Left Half', 'themezinho' ),
          'right-half' => esc_html__( 'Right Half', 'themezinho' )
        ],
        'default' => ''
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
<figure class="side-image <?php echo wp_kses( $settings['position'], array() ); ?>" data-scroll data-scroll-speed="<?php echo wp_kses( $settings['parallax_value'], array() ); ?>"> <img src="<?php echo wp_kses( $settings['image']['url'], array() ); ?>" alt="Image"></figure>
<?php


}
}

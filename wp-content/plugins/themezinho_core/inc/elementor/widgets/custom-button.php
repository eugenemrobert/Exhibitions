<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Custom_Button_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'custom-button';
  }
  public function get_title() {
    return 'Custom Button';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'custom_button_widget', [
      'label' => esc_html__( 'Custom Button', 'themezinho' ),
    ] );


    $this->add_control(
      'parallax_value',
      array(
        'label' => __( 'Parallax Value', 'themezinho' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( '', 'themezinho' ),
      )
    );


    $this->add_control(
      'button_label',
      array(
        'label' => __( 'Button Label', 'themezinho' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( '', 'themezinho' ),
      )
    );
	  
	  
	  $this->add_control(
      'button_url',
      array(
        'label' => __( 'Button URL', 'themezinho' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( '', 'themezinho' ),
      )
    );




    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/


  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
<a href="<?php echo wp_kses( $settings['button_url'], array() ); ?>" class="custom-button" data-scroll data-scroll-speed="<?php echo wp_kses( $settings['parallax_value'], array() ); ?>">
 <?php echo wp_kses_post( $settings['button_label'], array() ); ?>
</a>
<?php


}
}

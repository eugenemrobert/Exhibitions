<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Contact_Form7_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'contact-form7';
  }
  public function get_title() {
    return 'Contact Form 7';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'contact_form7_widget', [
      'label' => esc_html__( 'Contact Form 7 ', 'themezinho' ),
    ] );


    $this->add_control(
      'form_shorcode',
      array(
        'label' => __( 'Contact Form 7 Shortcode', 'themezinho' ),
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
<?php if ( $settings[ 'form_shorcode' ] ) { ?>
  <?php echo wp_kses( $settings['form_shorcode'], array() ); ?>
  <?php } ?>
<?php


}
}

<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Contact_Box_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'contact-box';
  }
  public function get_title() {
    return 'Contact Box';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'contact_box_widget', [
      'label' => esc_html__( 'Contact Box ', 'themezinho' ),
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
      'title',
      array(
        'label' => __( 'Title', 'themezinho' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( '', 'themezinho' ),
      )
    );

    $this->add_control(
      'contact',
      array(
        'label' => __( 'Contact', 'themezinho' ),
        'type' => Controls_Manager::WYSIWYG,
        'default' => __( '', 'themezinho' ),
      )
    );


    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/


  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>

<div class="contact-box" data-scroll data-scroll-speed="<?php echo wp_kses( $settings['parallax_value'], array() ); ?>">
				 <?php if ( $settings[ 'title' ] ) { ?>
  <h6><?php echo wp_kses( $settings['title'], array() ); ?></h6>
  <?php } ?>
  <?php if ( $settings[ 'contact' ] ) { ?>
 <?php echo wp_kses_post( $settings['contact'], array() ); ?>
  <?php } ?>
				</div>



<?php


}
}

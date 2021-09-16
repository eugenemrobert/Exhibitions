<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Counter_Box_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'counter-box';
  }
  public function get_title() {
    return 'Counter Box';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'counter_box_widget', [
      'label' => esc_html__( 'Counter Box ', 'themezinho' ),
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
      'counter',
      array(
        'label' => __( 'Counter', 'themezinho' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( '', 'themezinho' ),
      )
    );

    $this->add_control(
      'value',
      array(
        'label' => __( 'Value', 'themezinho' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( '', 'themezinho' ),
      )
    );

    $this->add_control(
      'text',
      array(
        'label' => __( 'Text', 'themezinho' ),
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
<div class="counter-box" data-scroll data-scroll-speed="<?php echo wp_kses( $settings['parallax_value'], array() ); ?>">
  <?php if ( $settings[ 'counter' ] ) { ?>
  <span class="odometer" data-count="<?php echo wp_kses( $settings['counter'], array() ); ?>" data-status="yes">0</span>
  <?php } ?>
  <?php if ( $settings[ 'value' ] ) { ?>
  <span class="value"><?php echo wp_kses( $settings['value'], array() ); ?></span>
  <?php } ?>
  <?php if ( $settings[ 'text' ] ) { ?>
  <p><?php echo wp_kses_post( $settings['text'], array() ); ?></p>
  <?php } ?>
</div>
<?php


}
}

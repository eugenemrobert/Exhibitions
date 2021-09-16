<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class CTA_Box_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'cta-box';
  }
  public function get_title() {
    return 'CTA Box';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'cta_box', [
      'label' => esc_html__( 'CTA BOX', 'themezinho' ),
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
      'tagline',
      array(
        'label' => __( 'Tagline', 'themezinho' ),
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
<div class="cta-box is-inview" data-scroll data-scroll-speed="<?php echo wp_kses( $settings['parallax_value'], array() ); ?>">
  <?php if ( $settings[ 'tagline' ] ) { ?>
  <h6><?php echo wp_kses( $settings['tagline'], array() ); ?></h6>
  <?php } ?>
  <?php if ( $settings[ 'title' ] ) { ?>
  <h2><?php echo wp_kses( $settings['title'], array() ); ?></h2>
  <?php } ?>
  <a href="<?php echo esc_url($settings['button_url']); ?>" class="custom-button"><?php echo wp_kses( $settings['button_label'], array() ); ?></a> </div>
<?php


}
}

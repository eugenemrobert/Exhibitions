<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Testimonial_Box_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'testimonial-box';
  }
  public function get_title() {
    return 'Testimonial Box';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'testimonial_box_widget', [
      'label' => esc_html__( 'Testimonial Box', 'themezinho' ),
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
      'testimonial',
      array(
        'label' => __( 'Testimonial', 'themezinho' ),
        'type' => Controls_Manager::WYSIWYG,
        'default' => __( '', 'themezinho' ),
      )
    );


    $this->add_control(
      'name',
      array(
        'label' => __( 'Name', 'themezinho' ),
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
<div class="testimonial-box" data-scroll data-scroll-speed="<?php echo wp_kses( $settings['parallax_value'], array() ); ?>">
  <div class="content-box">
    <?php if ( $settings[ 'testimonial' ] ) { ?>
    <p><?php echo wp_kses( $settings['testimonial'], array() ); ?></p>
    <?php } ?>
  </div>
  <!-- end content-box -->
  
  <?php if ( $settings[ 'name' ] ) { ?>
  <h6><?php echo wp_kses( $settings['name'], array() ); ?></h6>
  <?php } ?>
</div>
<?php


}
}

<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Text_Description_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'text-description';
  }
  public function get_title() {
    return 'Text Description Box';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'text_description_widget', [
      'label' => esc_html__( 'Text Description Box ', 'themezinho' ),
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
      'text_description',
      array(
        'label' => __( 'Text Description', 'themezinho' ),
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
<div class="text-content" data-scroll data-scroll-speed="<?php echo wp_kses( $settings['parallax_value'], array() ); ?>">
  <?php if ( $settings[ 'title' ] ) { ?>
  <h6><?php echo wp_kses( $settings['title'], array() ); ?></h6>
  <?php } ?>
  <?php if ( $settings[ 'text_description' ] ) { ?>
  <p><?php echo wp_kses( $settings['text_description'], array() ); ?></p>
  <?php } ?>
</div>
<?php


}
}

<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Note_Box_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'note-box';
  }
  public function get_title() {
    return 'Note Box';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'note_box_widget', [
      'label' => esc_html__( 'Note Box', 'themezinho' ),
    ] );


    $this->add_control(
      'title',
      array(
        'label' => __( 'Title', 'themezinho' ),
        'type' => Controls_Manager::TEXT,
        'default' => __( '', 'themezinho' ),
      )
    );


    $this->add_control(
      'content',
      array(
        'label' => __( 'Content', 'themezinho' ),
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
<div class="note-box" data-scroll data-scroll-speed="<?php echo wp_kses( $settings['parallax_value'], array() ); ?>">
  <?php if ( $settings[ 'title' ] ) { ?>
  <h2><?php echo wp_kses( $settings['title'], array() ); ?></h2>
  <?php } ?>
  <?php if ( $settings[ 'content' ] ) { ?>
  <?php echo wp_kses_post( $settings['content'], array() ); ?>
  <?php } ?>
</div>
<?php


}
}

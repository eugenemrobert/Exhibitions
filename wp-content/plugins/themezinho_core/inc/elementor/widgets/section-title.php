<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Section_Title_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'section-title';
  }
  public function get_title() {
    return 'Section Title';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'section_title', [
      'label' => esc_html__( 'Section Title', 'themezinho' ),
    ] );
    $this->add_control(
      'position',
      array(
        'label' => __( 'Position', 'themezinho' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'text-left' => esc_html__( 'Left', 'themezinho' ),
          'text-center' => esc_html__( 'Center', 'themezinho' ),
          'text-right' => esc_html__( 'Right', 'themezinho' )
        ],
        'default' => 'text-center'
      )
    );

    $this->add_control(
      'display_title_icon',
      array(
        'label' => __( 'Display Title Icon', 'themezinho' ),
        'type' => Controls_Manager::SWITCHER,
        'default' => 'yes',
        'return_value' => 'yes',
      )
    );

    $this->add_control(
      'title_icon',
      array(
        'condition' => [ 'display_title_icon!' => 'no' ],
        'label' => __( 'Title Icon', 'themezinho' ),
        'type' => Controls_Manager::MEDIA,
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
      'tagline',
      array(
        'label' => __( 'Tagline', 'themezinho' ),
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
<div class="section-title <?php echo wp_kses( $settings['position'], array() ); ?>">
  <?php if ( $settings[ 'display_title_icon'] == 'yes'  ) { ?>
  <?php if ( $settings[ 'title_icon' ]['url'] ) { ?>
  <div class="icon"><img src="<?php echo wp_kses( $settings['title_icon']['url'], array() ); ?>" alt="<?php echo wp_kses( $settings['title'], array() ); ?>"></div>
  <?php } ?>
  <?php } ?>
  <?php if ( $settings[ 'tagline' ] ) { ?>
  <h6><?php echo wp_kses( $settings['tagline'], array() ); ?></h6>
  <?php } ?>
  <h2><?php echo wp_kses( $settings['title'], array() ); ?></h2>
</div>
<?php


}
}

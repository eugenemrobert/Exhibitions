<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Accordion_Box_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'accordion-box';
  }
  public function get_title() {
    return 'Accordion Box';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'accordion_box', [
      'label' => esc_html__( 'Accordion Box', 'themezinho' ),
    ] );


    $this->add_control( 'list_items', [
      'type' => Controls_Manager::REPEATER,
      'seperator' => 'before',
      'deafult' => '',
      'fields' => [


        [
          'name' => 'list_title',
          'label' => esc_html__( 'Title', 'themezinho' ),
          'type' => Controls_Manager::TEXT,
          'default' => '',
        ],
        [
          'name' => 'list_content',
          'label' => esc_html__( 'Content', 'themezinho' ),
          'type' => Controls_Manager::TEXTAREA,
          'default' => '',

        ],

      ],
    ] );
    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/


  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
<dl class="accordion">
  <?php foreach ( $settings[ 'list_items' ] as $item ) { ?>
  <?php if ( $item[ 'list_title' ] ) { ?>
  <dt> <a href="#"><?php echo $item[ 'list_title' ] ?></a></dt>
  <?php } ?>
  <?php if ( $item[ 'list_content' ] ) { ?>
  <dd><?php echo $item[ 'list_content' ] ?></dd>
  <?php } ?>
  <?php } ?>
</dl>
<?php


}
}

<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Side_Icon_List_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'side-icon-list';
  }
  public function get_title() {
    return 'Side Icon List';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'side_icon_list', [
      'label' => esc_html__( 'Side Icon List', 'themezinho' ),
    ] );
    $this->add_control(
      'position',
      array(
        'label' => __( 'Position', 'themezinho' ),
        'type' => Controls_Manager::SELECT,
        'options' => [
          'left-side' => esc_html__( 'Left Side', 'themezinho' ),
          'right-side' => esc_html__( 'Right Side', 'themezinho' )
        ],
        'default' => 'left-side'
      )
    );

    $this->add_control( 'list_items', [
      'type' => Controls_Manager::REPEATER,
      'seperator' => 'before',
      'deafult' => '',
      'fields' => [

        [
          'name' => 'list_icon',
          'label' => esc_html__( 'Icon', 'themezinho' ),
          'type' => Controls_Manager::MEDIA,
          'default' => ''
        ],
        [
          'name' => 'list_title',
          'label' => esc_html__( 'List Title', 'themezinho' ),
          'type' => Controls_Manager::TEXT,
          'default' => '',
        ],
        [
          'name' => 'list_content',
          'label' => esc_html__( 'List Content', 'themezinho' ),
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
<div class="side-icon-list <?php echo wp_kses( $settings['position'], array() ); ?>">
  <ul>
    <?php foreach ( $settings[ 'list_items' ] as $item ) { ?>
    <li>
      <?php if($item['list_icon'][ 'url' ]){ ?>
      <figure> <img src="<?php echo esc_url($item['list_icon'][ 'url' ]); ?>" alt="<?php echo $item[ 'list_title' ] ?>"> </figure>
      <?php } ?>
      <div class="content">
        <?php if ( $item[ 'list_title' ] ) { ?>
        <h5><?php echo $item[ 'list_title' ] ?></h5>
        <?php } ?>
        <?php if ( $item[ 'list_content' ] ) { ?>
        <p><?php echo $item[ 'list_content' ] ?></p>
        <?php } ?>
      </div>
      <!-- end content --> 
    </li>
    <?php } ?>
  </ul>
</div>
<?php


}
}

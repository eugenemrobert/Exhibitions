<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Side_Arts_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'side-arts';
  }
  public function get_title() {
    return 'Side Arts';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'side_arts_section', [
      'label' => esc_html__( 'Side Arts', 'themezinho' ),
      'tab' => Controls_Manager::TAB_CONTENT
    ] );

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

    $this->add_control( 'art_items', [
      'type' => Controls_Manager::REPEATER,
      'seperator' => 'before',
      'deafult' => '',
      'fields' => [

        [
          'name' => 'image',
          'label' => esc_html__( 'Image', 'themezinho' ),
          'type' => Controls_Manager::MEDIA,
          'default' => ''
        ],


      ],
    ] );
    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/


  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
<div class="side-arts">
  <div class="titles">
    <?php if ( $settings[ 'tagline' ] ) { ?>
    <h6><?php echo wp_kses( $settings['tagline'], array() ); ?></h6>
    <?php } ?>
    <?php if ( $settings[ 'title' ] ) { ?>
    <h2><?php echo wp_kses( $settings['title'], array() ); ?></h2>
    <?php } ?>
  </div>
  <!-- end titles -->
  <ul>
    <?php foreach ( $settings[ 'art_items' ] as $item ) { ?>
    <li data-scroll data-scroll-speed="0.5">
      <?php if($item['image'][ 'url' ]){ ?>
      <figure> <img src="<?php echo esc_url($item['image'][ 'url' ]); ?>" alt="Image"> </figure>
      <?php } ?>
    </li>
    <?php } ?>
  </ul>
</div>
<?php


}
}

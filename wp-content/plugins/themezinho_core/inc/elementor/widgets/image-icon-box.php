<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Image_Icon_Box_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'image-icon-box';
  }
  public function get_title() {
    return 'Image Icon Box';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {

    /*****   START CONTROLS SECTION   ******/
    $this->start_controls_section( 'image_icon_box', [
      'label' => esc_html__( 'Image Icon Box', 'themezinho' ),
    ] );

    $this->add_control(
      'parallax_value',
      array(
        'label' => __( 'Parallax Value', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );

    $this->add_control(
      'icon',
      array(
        'label' => __( 'Icon', 'themezinho' ),
        'type' => Controls_Manager::MEDIA,

      )
    );
    $this->add_control(
      'image',
      array(
        'label' => __( 'Image', 'themezinho' ),
        'type' => Controls_Manager::MEDIA,

      )
    );

    $this->add_control(
      'number',
      array(
        'label' => __( 'Number', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );

    $this->add_control(
      'title',
      array(
        'label' => __( 'Title', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );


    $this->add_control(
      'description',
      array(
        'label' => __( 'Description', 'themezinho' ),
        'type' => Controls_Manager::WYSIWYG,

      )
    );


    $this->add_control(
      'link_label',
      array(
        'label' => __( 'Link Label', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );

    $this->add_control(
      'link_url',
      array(
        'label' => __( 'Link URL', 'themezinho' ),
        'type' => Controls_Manager::TEXT,

      )
    );


    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/

  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
<div class="image-icon-box" data-scroll data-scroll-speed="<?php echo wp_kses( $settings['parallax_value'], array() ); ?>">
  <figure class="icon"> <img src="<?php echo wp_kses( $settings['icon']['url'], array() ); ?>" alt="Image"> </figure>
  <figure class="content-image"> <img src="<?php echo wp_kses( $settings['image']['url'], array() ); ?>" alt="Image"> </figure>
  <div class="content-box"> <b><?php echo wp_kses( $settings['number'], array() ); ?></b>
    <h4><?php echo wp_kses( $settings['title'], array() ); ?></h4>
    <div class="expand">
      <p><?php echo wp_kses( $settings['description'], array() ); ?></p>
      <a href="<?php echo wp_kses( $settings['link_url'], array() ); ?>" class="custom-link"><?php echo wp_kses( $settings['link_label'], array() ); ?></a> </div>
    <!-- end expand --> 
  </div>
  <!-- end content-box --> 
</div>
<?php


}
}

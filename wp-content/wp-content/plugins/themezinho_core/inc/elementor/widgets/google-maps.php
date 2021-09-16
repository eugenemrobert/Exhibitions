<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )exit;

class Google_Maps_Widget extends Widget_Base {
  use Themezinho_Helper;
  public function get_name() {
    return 'google-maps';
  }
  public function get_title() {
    return 'Google Maps';
  }
  public function get_icon() {
    return 'fas fa-adjust';
  }
  public function get_categories() {
    return [ 'themezinho' ];
  }

  // Registering Controls
  protected function _register_controls() {
    $this->start_controls_section( 'google_Maps_widget', [
      'label' => esc_html__( 'Google Maps ', 'themezinho' ),
    ] );


    $this->add_control(
      'maps_iframe',
      array(
        'label' => __( 'Google Maps iFrame', 'themezinho' ),
        'type' => Controls_Manager::TEXT,
		  'description' => __( 'Only inside of src code not all iframe', 'themezinho' ),
        'default' => __( '', 'themezinho' ),
      )
    );



    $this->end_controls_section();
    /*****   END CONTROLS SECTION   ******/


  }
  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
<div class="google-maps">
	  <iframe <?php if ( $settings[ 'maps_iframe' ] ) { ?> src="
  <?php echo wp_kses( $settings['maps_iframe'], array() ); ?>" <?php } ?>></iframe>
	  </div>


<?php


}
}

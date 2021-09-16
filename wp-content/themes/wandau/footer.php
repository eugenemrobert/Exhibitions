<?php
$footer_bg_color = wandau_get_option( 'footer_bg_color' ) ? wandau_get_option( 'footer_bg_color' ) : '#ffffff';
$footer_bg_image = wandau_get_option( 'footer_bg_image' ) ? wandau_get_option( 'footer_bg_image' ) : '';
$newsletter_image = ( wandau_get_option( 'newsletter_image' ) ) ? wandau_get_option( 'newsletter_image' ) : get_template_directory_uri() . '/images/newsletter-image.png';


$copyright = wandau_get_option( 'footer_copyright_text' );
if ( !$copyright ) {
  $copyright = esc_html__( 'Wandau | Art & History Museum WordPress Theme', 'wandau' );
}

$creation = wandau_get_option( 'footer_creation' );
if ( !$creation ) {
  $creation = esc_html__( 'Site created by', 'wandau' );
}

$creation_link_label = wandau_get_option( 'footer_creation_link_label' );
if ( !$creation_link_label ) {
  $creation_link_label = esc_html__( 'themezinho', 'wandau' );
}

$creation_link_url = wandau_get_option( 'footer_creation_link_url' );
if ( !$creation_link_url ) {
  $creation_link_url = esc_html__( 'https://themezinho.net', 'wandau' );
}



?>
<?php if( wandau_get_option( 'enable_newsletter' ) ) { ?>
<section class="content-section no-spacing" data-background="<?php echo esc_attr( wandau_get_option( 'newsletter_bg' ) ); ?>" >
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="newsletter-box">
          <div class="form">
            <div class="titles">
              <h6><?php echo esc_html( wandau_get_option( 'newsletter_tagline' ) ); ?></h6>
              <h2><?php echo esc_html( wandau_get_option( 'newsletter_title' ) ); ?></h2>
            </div>
            <!-- end titles --> 
			  <?php echo do_shortcode( wandau_get_option( 'newsletter_shortcode' ) );?>
</div>
          <!-- end form -->
          <figure class="newsletter-image" data-scroll data-scroll-speed="0.7"><img src="<?php echo esc_url( $newsletter_image ); ?>" alt="<?php echo esc_html( wandau_get_option( 'newsletter_title' ) ); ?>"></figure>
        </div>
        <!-- end newsletter-box --> 
      </div>
      <!-- end col-12 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end content-section -->
<?php } ?>
<footer class="footer" style=" <?php if( $footer_bg_image ) { ?> background-image:url(<?php echo esc_attr( $footer_bg_image ); ?>);<?php } ?> <?php if( $footer_bg_image ) { ?>background-color:<?php echo esc_attr( $footer_bg_color ); ?>; <?php } ?>">
  <div class="container">
    <div class="row">
      <?php if( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' )  ) { ?>
      <?php if( is_active_sidebar( 'footer-widget-1' ) ) : ?>
      <div class="col-lg-4 col-md-6">
        <?php dynamic_sidebar( 'footer-widget-1' ); ?>
      </div>
      <?php endif; ?>
      <?php if( is_active_sidebar( 'footer-widget-2' ) ) : ?>
      <div class="col-lg-4 col-md-6">
        <?php dynamic_sidebar( 'footer-widget-2' ); ?>
      </div>
      <?php endif; ?>
      <?php if( is_active_sidebar( 'footer-widget-3' ) ) : ?>
      <div class="col-lg-4">
        <?php dynamic_sidebar( 'footer-widget-3' ); ?>
      </div>
      <?php endif; ?>
      <?php } ?>
    </div>
    <!-- end row --> 
  </div>
  <!-- end container -->
  <div class="footer-bottom">
    <div class="container"> <span class="copyright">&copy; <?php echo date("Y"); ?> <?php echo esc_html( $copyright ); ?></span> <span class="creation"><?php echo esc_html( $creation ); ?> <a href="<?php echo esc_html( $creation_link_url ); ?>"><?php echo esc_html( $creation_link_label ); ?></a></span> </div>
    <!-- end container --> 
  </div>
  <!-- end footer-bottom --> 
</footer>
<!-- end footer -->
<?php if ( wandau_get_option( 'enable_smooth_scroll' ) ) { ?>
</div>
</div>
<?php } ?>
<?php wp_footer(); ?>
</body></html>
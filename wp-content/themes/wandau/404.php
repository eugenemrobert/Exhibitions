<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wandau
 */

get_header();

$error_page_image = ( wandau_get_option( 'error_page_image' ) ) ? wandau_get_option( 'error_page_image' ) : get_template_directory_uri() . '/images/error-404.png';


$error_page_text = wandau_get_option( 'error_page_text' );
if ( !$error_page_text ) {
  $error_page_text = esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wandau' );
}


$enable_search_form = ( wandau_get_option( 'enable_search_form' ) ) ? wandau_get_option( 'enable_search_form' ) : true;

wandau_render_page_header( '404' );
?>
<section class="content-section error-404 not-found">
  <div class="container"> <img src="<?php echo esc_url( $error_page_image ); ?>" alt="<?php the_title_attribute(); ?>" />
    <h6><?php echo esc_html( $error_page_text ); ?></h6>
    <?php if( wandau_get_option( 'enable_search_form' ) ) { ?>
    <?php get_search_form(); ?>
    <?php } ?>
  </div>
</section>
<?php
get_footer();

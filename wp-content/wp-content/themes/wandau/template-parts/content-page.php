<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wandau
 */

?>
<?php wandau_post_thumbnail(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php
        the_content();

        wp_link_pages( array(
          'before' => '<div class="page-links"><h6>' . esc_html__( 'Pages:', 'wandau' ) . '</h6>',
          'after' => '</div>',
          'link_before' => '<span>',
          'link_after' => '</span>',
        ) );
        ?>
      </div>
    </div>
  </div>
</div>

<?php
/**
 * Template Name: Page Builder
 *
 */

get_header();
?>
<?php wandau_render_page_header( 'page' ); ?>
<?php
if ( have_posts() ):
  while ( have_posts() ):
    the_post();
the_content();
endwhile;
endif;
?>
<?php
get_footer();
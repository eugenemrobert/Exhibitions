<?php get_header(); ?>
<?php wandau_render_page_header( 'page' ); ?>
<?php
while ( have_posts() ):
  the_post();
?>
<?php the_content(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>

<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wandau
 */

?>
<div class="post-content">
    <?php
    if ( 'post' === get_post_type() ):
      ?>
    <small class="date">
    <?php the_time('F d, Y'); ?>
    </small>
	
    <?php wandau_posted_by(); ?>
    <?php the_tags( '<ul class="post-tags"><li>', '</li><li>', '</li></ul>' ); ?>
    <?php
    endif;
    ?>
    

  <?php
  the_content( sprintf(
    '%s %s',
    esc_html__( 'Continue reading', 'wandau' ),
    '<span class="screen-reader-text"> ' . get_the_title() . '</span>'
  ) );

  wp_link_pages( array(
    'before' => '<div class="page-links"><h6>' . esc_html__( 'Pages:', 'wandau' ) . '</h6>',
    'after' => '</div>',
    'link_before' => '<span>',
    'link_after' => '</span>',
  ) );
  ?>

</div>

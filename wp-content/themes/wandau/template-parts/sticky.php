<?php
ob_start();

$wrapper_class = array( 'highlight', 'wow', 'fadeInUp' );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( array( 'blog-post' ) ); ?>>
  <?php if( wandau_get_post_thumbnail_url() ) { ?>
  <figure class="post-image" data-scroll data-scroll-speed="0"> <img src="<?php echo esc_url( wandau_get_post_thumbnail_url() ); ?>" alt="<?php the_title_attribute(); ?>"> </figure>
  <?php } ?>
  <div class="post-content"> <span class="category">
    <?php foreach ( ( get_the_category() ) as $category ) { ?>
    <?php echo esc_html( $category->name ); ?>
    <?php } ?>
    </span><small class="date">
    <?php wandau_posted_date_with_tags(); ?>
    </small>
    <h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
      <?php the_title(); ?>
      </a></h3>
    <?php wandau_posted_by(); ?>
    <?php echo esc_html( $post_content ); ?> </div>
</div>

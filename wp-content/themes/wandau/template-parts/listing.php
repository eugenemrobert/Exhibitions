<div id="post-<?php the_ID(); ?>" <?php post_class( array( 'blog-post' ) ); ?>>
  <?php if( wandau_get_post_thumbnail_url() ) { ?>
  <figure class="post-image" data-scroll data-scroll-speed="0"> <img src="<?php echo esc_url( wandau_get_post_thumbnail_url() ); ?>" alt="<?php the_title_attribute(); ?>"> </figure>
  <?php } ?>
  <div class="post-content"><small class="date">
	  <?php echo get_the_date(); ?>
    </small>
    <h3 class="post-title"><a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
      </a></h3>
    <?php wandau_posted_by(); ?>
  </div>
</div>

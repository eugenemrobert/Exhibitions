<?php
/**
 * Template Name: Exhibitions
 *
 */

get_header();

wandau_render_page_header( 'page' );

$exhibitions = array(
  'post_type' => 'exhibition',
  'post_status' => 'publish',
  'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1

);

?>
<section class="content-section">
  <div class="container">
    <div class="row justify-content-center">
      <?php
      $the_query = new\ WP_Query( $exhibitions );
      if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
          $the_query->the_post();
          $thumbnail_image = get_the_post_thumbnail_url( get_the_ID() );
          $title = get_the_title();
          ?>
      <div class="col-lg-4 col-md-6">
        <div class="exhibition-box" data-scroll data-scroll-speed="0.5">
          <div class="thumb"> <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $thumbnail_image ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="img"></a>
            <div class="info">
              <figure class="i"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icon-info.png" alt="<?php echo esc_attr( $title ); ?>"></figure>
              <span><?php echo esc_html( the_field( 'exhibition_info' ) ); ?></span> </div>
            <!-- end info --> 
          </div>
          <div class="content-box">
            <h4><a href="<?php the_permalink(); ?>"><?php echo esc_html( $title ); ?></a></h4>
            <p><?php echo esc_html( the_field( 'exhibition_date' ) ); ?> </p>
          </div>
          <!-- end content-box --> 
        </div>
        <!-- end col-6 --> 
        
      </div>
      <?php }  ?>
      <?php }   ?>
      <div class="pagination-bar">
        <?php


        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var( 'paged' ) ),
          'total' => $the_query->max_num_pages
        ) );

        wp_reset_postdata();

        ?>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();

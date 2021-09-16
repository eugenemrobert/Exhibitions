<?php
/**
 * Template Name: Collections
 *
 */

get_header();

wandau_render_page_header( 'page' );

$collections = array(
  'post_type' => 'collection',
  'post_status' => 'publish',
  'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1

);

?>
<section class="content-section">
  <div class="container">
    <div class="row justify-content-center">
      <?php
      $the_query = new\ WP_Query( $collections );
      if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
          $the_query->the_post();
          $thumbnail_image = get_the_post_thumbnail_url( get_the_ID() );
          $title = get_the_title();
          ?>
      <div class="col-lg-4 col-md-6">
        <div class="collection-box" data-scroll data-scroll-speed="0">
          <figure><img src="<?php echo esc_url( $thumbnail_image ); ?>" alt="<?php echo esc_attr( $title ); ?>"></figure>
          <h4><a href="<?php the_permalink(); ?>"><?php echo esc_html( $title ); ?></a></h4>
          <p><?php echo esc_html( the_field( 'description' ) ); ?></p>
        </div>
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

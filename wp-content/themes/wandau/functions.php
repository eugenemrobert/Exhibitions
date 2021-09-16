<?php
/**
 * wandau functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wandau
 */

if ( !function_exists( 'wandau_setup' ) ):
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function wandau_setup() {
    if ( !isset( $content_width ) )$content_width = 900;
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Anchor, use a find and replace
     * to change  'wandau' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'wandau', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'wandau-post-thumb-small', 1015, 698, true );


    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );
  }
endif;
add_action( 'after_setup_theme', 'wandau_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wandau_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS[ 'content_width' ] = apply_filters( 'wandau_content_width', 640 );
}
add_action( 'after_setup_theme', 'wandau_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wandau_widgets_init() {

  register_sidebar( array(
    'name' => esc_html__( 'Aside', 'wandau' ),
    'id' => 'aside',
    'before_widget' => '<div class="widget aside">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ) );

  register_sidebar( array(
    'name' => esc_html__( 'Sidebar', 'wandau' ),
    'id' => 'sidebar-1',
    'description' => esc_html__( 'Add widgets here.', 'wandau' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ) );

  register_sidebar( array(
    'name' => esc_html__( 'Footer 1', 'wandau' ),
    'id' => 'footer-widget-1',
    'before_widget' => '<div class="widget footer-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ) );

  register_sidebar( array(
    'name' => esc_html__( 'Footer 2', 'wandau' ),
    'id' => 'footer-widget-2',
    'before_widget' => '<div class="widget footer-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ) );

  register_sidebar( array(
    'name' => esc_html__( 'Footer 3', 'wandau' ),
    'id' => 'footer-widget-3',
    'before_widget' => '<div class="widget footer-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ) );

}
add_action( 'widgets_init', 'wandau_widgets_init' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Enqueue styles and scripts.
 */
require_once get_template_directory() . '/inc/styles-and-scripts.php';

/**
 * Register nav menus
 */
require_once get_template_directory() . '/inc/nav-menus.php';

/**
 * Custom menu walker.
 */
require_once get_template_directory() . '/inc/class.custom-menu-walker.php';
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

require_once get_template_directory() . '/inc/tgm.php';

if ( !function_exists( 'wandau_get_the_post_excerpt' ) ) {
  /**
   * This function makes excerpt for the post.
   *
   * @param integer $limit of charachers
   * @return string
   */
  function wandau_get_the_post_excerpt( $string, $limit = 70, $more = '...', $break_words = false ) {
    if ( $limit == 0 ) return '';

    if ( mb_strlen( $string, 'utf8' ) > $limit ) {
      $limit -= mb_strlen( $more, 'utf8' );

      if ( !$break_words ) {
        $string = preg_replace( '/\s+\S+\s*$/su', '', mb_substr( $string, 0, $limit + 1, 'utf8' ) );
      }

      return '<p>' . mb_substr( $string, 0, $limit, 'utf8' ) . $more . '</p>';
    } else {

      return '<p>' . $string . '</p>';
    }
  }

}

if ( !function_exists( 'wandau_posted_date_with_tags' ) ) {

  function wandau_posted_date_with_tags() {

    echo sprintf( esc_html__( 'Posted %s', 'wandau' ), get_the_date( 'j F Y' ) );

    $tags = get_the_tags();
    if ( false !== $tags ) {
      foreach ( $tags as $tag ) {
        $link = get_tag_link( $tag->term_id );
        $data[] = '<a href="' . $link . '">' . $tag->name . '</a>';
      }

      echo ' | ' . implode( ', ', $data );
    }
  }
}

if ( !function_exists( 'wandau_move_comment_field_to_bottom' ) ) {
  function wandau_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields[ 'comment' ];
    unset( $fields[ 'comment' ] );
    $fields[ 'comment' ] = $comment_field;

    return $fields;
  }

  add_filter( 'comment_form_fields', 'wandau_move_comment_field_to_bottom' );
}

if ( !function_exists( 'wandau_bootstrap_comment' ) ) {
  /**
   * Custom callback for comment output
   *
   */
  function wandau_bootstrap_comment( $comment, $args, $depth ) {
    $GLOBALS[ 'comment' ] = $comment;

    $comment_link_args = array(
      'add_below' => 'comment',
      'respond_id' => 'respond',
      'reply_text' => esc_html__( 'Reply', 'wandau' ),
      'login_text' => esc_html__( 'Log in to Reply', 'wandau' ),
      'depth' => 1,
      'before' => '',
      'after' => '',
      'max_depth' => 5
    );
    ?>
<?php if ( $comment->comment_approved == '1' ): ?>
<li class="comment">
  <figure class="comment-avatar"><?php echo get_avatar( $comment ); ?></figure>
  <div class="comment-content">
    <h4>
      <?php comment_author_link() ?>
    </h4>
    <p>
      <?php comment_text() ?>
    </p>
    <small>
    <?php comment_date() ?>
    </small>
    <?php
    comment_reply_link( $comment_link_args );
    ?>
  </div>
</li>
<?php
endif;
}

}

if ( !function_exists( 'wandau_get_option' ) ) {

  function wandau_get_option( $slug ) {
    if ( function_exists( 'get_field' ) ) {
      return get_field( $slug, 'option' );
    }

    return false;
  }
}

if ( !function_exists( 'wandau_get_field' ) ) {

  function wandau_get_field( $slug, $post_id = 0 ) {
    if ( function_exists( 'get_field' ) ) {
      return get_field( $slug, $post_id );
    }

    return false;
  }
}


if ( !function_exists( 'wandau_pagination' ) ) {
  function wandau_pagination( $pages = '' ) {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars[ 'paged' ] > 1 ? $current = $wp_query->query_vars[ 'paged' ] : $current = 1;
    if ( $pages == '' ) {
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if ( !$pages ) {
        $pages = 1;
      }
    }
    $pagination = array(
      'base' => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
      'format' => '',
      'current' => max( 1, get_query_var( 'paged' ) ),
      'total' => $pages,
      'prev_text' => wp_specialchars_decode( esc_html__( 'Prev', 'wandau' ), ENT_QUOTES ),
      'next_text' => wp_specialchars_decode( esc_html__( 'Next', 'wandau' ), ENT_QUOTES ),
      'type' => 'list',
      'end_size' => 3,
      'mid_size' => 3
    );
    $return = paginate_links( $pagination );
    echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
  }
}


if ( !function_exists( 'wandau_get_post_thumbnail_url' ) ) {
  /**
   * Get Post Thumbnail URL
   */
  function wandau_get_post_thumbnail_url() {
    if ( get_the_post_thumbnail_url() ) {
      return get_the_post_thumbnail_url( get_the_ID(), 'wandau-post-thumb-small' );
    }

    return false;
  }
}

if ( !function_exists( 'wandau_get_page_title' ) ) {

  function wandau_get_page_title() {
    $title = '';

    if ( is_category() ) {
      $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
      $title = single_term_title( "", false ) . esc_html__( 'Tag', 'wandau' );
    } elseif ( is_date() ) {
      $title = get_the_time( 'F Y' );
    } elseif ( is_author() ) {
      $title = esc_html__( 'Author:', 'wandau' ) . ' ' . esc_html( get_the_author() );
    } elseif ( is_search() ) {
      $title = ( wandau_get_option( 'search_page_title' ) ) ? esc_html( wandau_get_option( 'search_page_title' ) ) : esc_html__( 'Search Result', 'wandau' );
    } elseif ( is_404() ) {
      $title = ( wandau_get_option( 'error_page_title' ) ) ? esc_html( wandau_get_option( 'error_page_title' ) ) : esc_html__( 'Page Not Found', 'wandau' );
    } elseif ( is_archive() ) {
      $title = esc_html__( 'Archive', 'wandau' );
    } elseif ( is_home() || is_front_page() ) {
      if ( is_home() && !is_front_page() ) {
        $title = esc_html( single_post_title( '', false ) );
      } else {
        $title = ( wandau_get_option( 'archive_blog_title' ) ) ? esc_html( wandau_get_option( 'archive_blog_title' ) ) : esc_html__( 'Blog', 'wandau' );
      }
    } else {
      global $post;
      if ( !empty( $post ) ) {
        if ( $post->post_type == 'post' ) {
          $title = ( wandau_get_option( 'archive_blog_title' ) ) ? esc_html( wandau_get_option( 'archive_blog_title' ) ) : esc_html__( 'Blog', 'wandau' );
        } else {
          $id = $post->ID;
          $title = esc_html( get_the_title( $id ) );
        }
      } else {
        $title = esc_html__( 'Post not found.', 'wandau' );
      }
    }

    return $title;
  }

}

if ( !function_exists( 'wandau_get_archive_description' ) ) {
  function wandau_get_archive_description() {
    $description = '';

    if ( is_home() || is_front_page() ) {
      $description = ( wandau_get_option( 'archive_blog_description' ) ) ? esc_html( wandau_get_option( 'archive_blog_description' ) ) : '';


    } elseif ( is_category() || is_tag() || is_author() || is_post_type_archive() || is_archive() ) {
      $description = get_the_archive_description();
    }

    return $description;
  }
}
if ( !function_exists( 'wandau_render_page_header' ) ) {

  function wandau_render_page_header( $type ) {

    $show_header = true;
    $header_style = '';
    $header_title = '';
    $header_description = '';


    switch ( $type ) {
      case 'page':
        $show_header = false;

        if ( wandau_get_field( 'show_page_header' ) !== 'no' ) {
          $show_header = true;

          if ( wandau_get_field( 'header_title_type' ) === 'custom' ) {
            $header_title = wandau_get_field( 'header_title' );
          } else {
            $header_title = get_the_title();
          }

          $header_bg_color = wandau_get_field( 'header_bg_color' ) ? wandau_get_field( 'header_bg_color' ) : '#fffbf7';
          $header_bg_image = wandau_get_field( 'header_bg_image' ) ? wandau_get_field( 'header_bg_image' ) : '';
          $header_style = 'background: url(' . esc_url( $header_bg_image ) . ') center ' . $header_bg_color . ';';
          $header_description = wandau_get_field( 'description' );

        }

        break;
			      case 'single':
			$header_title = get_the_title();
        $header_bg_color = wandau_get_option( 'archive_header_bg_color' ) ? wandau_get_option( 'archive_header_bg_color' ) : '#fffbf7';
        $header_bg_image = wandau_get_option( 'archive_header_bg_image' ) ? wandau_get_option( 'archive_header_bg_image' ) : '';
        $header_style = 'background: url(' . esc_url( $header_bg_image ) . ') center ' . $header_bg_color . ';';

			break;

      case 'archive':
      case 'frontpage':
        $header_description = wandau_get_archive_description();
        $header_title = wandau_get_page_title();
        $header_bg_color = wandau_get_option( 'archive_header_bg_color' ) ? wandau_get_option( 'archive_header_bg_color' ) : '#fffbf7';
        $header_bg_image = wandau_get_option( 'archive_header_bg_image' ) ? wandau_get_option( 'archive_header_bg_image' ) : '';
        $header_style = 'background: url(' . esc_url( $header_bg_image ) . ') center ' . $header_bg_color . ';';

        break;

      case 'exhibition':
        $header_title = wandau_get_page_title();
        $header_bg_color = wandau_get_option( 'header_bg_color' ) ? wandau_get_option( 'header_bg_color' ) : '#fffbf7';
        $header_bg_image = wandau_get_option( 'header_bg_image' ) ? wandau_get_option( 'header_bg_image' ) : '';
        $header_style = 'background: url(' . esc_url( $header_bg_image ) . ') center ' . $header_bg_color . ';';

        break;

      case 'collection':
        $header_title = wandau_get_page_title();
        $header_bg_color = wandau_get_option( 'header_bg_color' ) ? wandau_get_option( 'header_bg_color' ) : '#fffbf7';
        $header_bg_image = wandau_get_option( 'header_bg_image' ) ? wandau_get_option( 'header_bg_image' ) : '';
        $header_style = 'background: url(' . esc_url( $header_bg_image ) . ') center ' . $header_bg_color . ';';

        break;
      case '404':
        $header_title = wandau_get_page_title();


        $header_bg_color = wandau_get_option( 'page_404_header_bg_color' ) ? wandau_get_option( 'page_404_header_bg_color' ) : '#fffbf7';
        $header_bg_image = wandau_get_option( 'page_404_header_bg_image' ) ? wandau_get_option( 'page_404_header_bg_image' ) : '';

        $header_style = 'background: url(' . esc_url( $header_bg_image ) . ') center ' . $header_bg_color . ';';

        break;
      case 'search':
        $header_title = wandau_get_page_title();
        $header_description = sprintf( __( ' %s ', 'wandau' ), ' ' . get_search_query() . ' ' );

        $header_bg_type = wandau_get_option( 'search_header_bg_type' ) ? wandau_get_option( 'search_header_bg_type' ) : 'image';
        $header_bg_color = wandau_get_option( 'search_header_bg_color' ) ? wandau_get_option( 'search_header_bg_color' ) : '#fffbf7';
        $header_bg_image = wandau_get_option( 'search_header_bg_image' ) ? wandau_get_option( 'search_header_bg_image' ) : '';

        if ( $header_bg_image && $header_bg_type == 'image' ) {
          $header_style = 'background: url(' . esc_url( $header_bg_image ) . ') center ' . $header_bg_color . ';';
        } else {
          $header_style = 'background: ' . $header_bg_color . ';';
        }

        if ( $header_bg_type == 'video' ) {
          $header_bg_video = wandau_get_option( 'search_header_bg_video' ) ? wandau_get_option( 'search_header_bg_video' ) : '';
        }
        break;
    }

    if ( $show_header ) {


      ?>
<header class="page-header" <?php if ( $header_style !== '' ) { echo 'style="' . esc_attr( $header_style ) . '"'; } ?>>
  <div class="inner">
    <svg width="580" height="400" class="svg-morph">
      <path id="svg_morph" d="m261,30.4375c0,0 114,6 151,75c37,69 37,174 6,206.5625c-31,32.5625 -138,11.4375 -196,-19.5625c-58,-31 -86,-62 -90,-134.4375c12,-136.5625 92,-126.5625 129,-127.5625z" />
    </svg>
    <h1><?php echo esc_html( $header_title ); ?></h1>
    <?php if( $header_description ) { ?>
    <p><?php echo esc_html( $header_description ); ?></p>
    <?php } ?>
  </div>
  <!-- end inner --> 
</header>
<!-- end navbar -->

<?php
}
}
}


if ( !function_exists( 'wandau_post_tags' ) ) {

  function wandau_post_tags() {

    $tags = get_the_tags();
    if ( false !== $tags ) {
      ?>
<ul class="post-categories">
  <?php
  foreach ( $tags as $tag ) {
    $link = get_tag_link( $tag->term_id );
    ?>
  <li><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
  <?php
  }
  ?>
</ul>
<?php
}
}
}


if ( !function_exists( 'wp_body_open' ) ) {
  function wp_body_open() {
    do_action( 'wp_body_open' );
  }
}

function wandau_import_files() {
  return array(
    array(
      'import_file_name' => esc_html__( 'Wandau Demo Import', 'wandau' ),
      'import_file_url' => 'http://wandau.themezinho.net/import/demo-data.xml',
      'import_widget_file_url' => 'http://wandau.themezinho.net/import/widgets.wie',
      'import_notice' => esc_html__( 'After you import this demo, you will have to setup the theme option separately.', 'wandau' ),
      'preview_url' => 'https://wandau.themezinho.net',
    ),
  );

}
add_filter( 'pt-ocdi/import_files', 'wandau_import_files' );


add_action( 'vc_before_init', 'wandau_wpbakery_roles' );

function wandau_wpbakery_roles() {
  $vc_list = array( 'page', 'post', 'exhibition', 'collection' );
  vc_set_default_editor_post_types( $vc_list );
  vc_editor_set_post_types( $vc_list );
}


function wandau_after_import_setup() {
  // Assign menus to their locations.
  $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
  set_theme_mod( 'nav_menu_locations', array(
    'header' => $main_menu->term_id,
  ) );


  // Assign front page and posts page (blog page).
  $front_page_id = get_page_by_title( 'Home' );
  $blog_page_id = get_page_by_title( 'News' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID );

  if ( function_exists( 'wandau_after_import' ) ) {
    wandau_after_import();
  }
}


add_action( 'pt-ocdi/after_import', 'wandau_after_import_setup' );
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
add_action( 'pt-ocdi/disable_pt_branding', '__return_true' );

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
$custom_menu = wandau_get_option( 'custom_menu' );
$retina_logo = ( wandau_get_option( 'retina_logo' ) ) ? wandau_get_option( 'retina_logo' ) : '';
$logo = ( wandau_get_option( 'logo' ) ) ? wandau_get_option( 'logo' ) : get_template_directory_uri() . '/images/logo@2x.png';
$aside_logo = ( wandau_get_option( 'aside_logo' ) ) ? wandau_get_option( 'aside_logo' ) : get_template_directory_uri() . '/images/logo-light.png';

?>
<?php
if ( wandau_get_option( 'enable_preloader' ) ):
  $preloader_icon = ( wandau_get_option( 'preloader_icon' ) ) ? wandau_get_option( 'preloader_icon' ) : get_template_directory_uri() . '/images/preloader.png';
$preloader_text = ( wandau_get_option( 'pre-loader_text' ) !== '' ) ? wandau_get_option( 'pre-loader_text' ) : '';
?>
<div class="preloader" id="preloader">
  <svg viewBox="0 0 1920 1080" preserveAspectRatio="none" version="1.1">
    <path d="M0,0 C305.333333,0 625.333333,0 960,0 C1294.66667,0 1614.66667,0 1920,0 L1920,1080 C1614.66667,1080 1294.66667,1080 960,1080 C625.333333,1080 305.333333,1080 0,1080 L0,0 Z"></path>
  </svg>
  <div class="inner">
    <canvas class="progress-bar" id="progress-bar" width="200" height="200"></canvas>
    <figure><img src="<?php echo esc_url( $preloader_icon ); ?>" alt="<?php bloginfo( 'name' ); ?>"></figure>
    <small><?php echo esc_html( $preloader_text ); ?></small> </div>
  <!-- end inner --> 
</div>
<!-- end preloder -->
<div class="page-transition">
  <svg viewBox="0 0 1920 1080" preserveAspectRatio="none" version="1.1">
    <path d="M0,0 C305.333333,0 625.333333,0 960,0 C1294.66667,0 1614.66667,0 1920,0 L1920,1080 C1614.66667,980 1294.66667,930 960,930 C625.333333,930 305.333333,980 0,1080 L0,0 Z"></path>
  </svg>
</div>
<!-- end page-transition -->
<?php endif; ?>
<?php if ( wandau_get_option( 'enable_smooth_scroll' ) ) { ?>
<div class="smooth-scroll">
<div class="section-wrapper" data-scroll-section>
<?php } ?>
<div class="search-box">
  <div class="container">
    <div class="form">
      <h3>SEARCH EVENT</h3>
      <form action="<?php echo esc_url(home_url('/')); ?>">
        <input type="search" placeholder="<?php echo esc_attr__( 'What are you looking for ?', 'wandau' );?>" value="<?php echo get_search_query() ?>" name="s" id="s">
        <input type="submit" value="<?php echo esc_attr__( 'SEARCH', 'wandau' );?>">
      </form>
    </div>
    <!-- end form -->
  </div>
</div>
<!-- end search-box -->
<aside class="side-widget">
  <svg viewBox="0 0 600 1080" preserveAspectRatio="none" version="1.1">
    <path d="M540,1080H0V0h540c0,179.85,0,359.7,0,539.54C540,719.7,540,899.85,540,1080z"></path>
  </svg>
  <figure class="logo"> <img src="<?php echo esc_url( $aside_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"> </figure>
  <!-- end logo -->
  <div class="inner">
    <?php if( is_active_sidebar( 'aside' ) ) : ?>
    <?php dynamic_sidebar( 'aside' ); ?>
    <?php endif; ?>
  </div>
  <!-- end inner -->
  <div class="display-mobile">
    <?php
    if ( wandau_get_option( 'custom_menu' ) ):
      ?>
    <div class="custom-menu">
      <ul>
        <?php foreach ( $custom_menu as $menu ) { ?>
        <li> <a href="<?php echo esc_url( $menu['url'] ); ?>"><?php echo esc_html( $menu['label'] ); ?></a> </li>
        <?php } ?>
      </ul>
    </div>
    <!-- end custom-menu -->
    <?php endif; ?>
    <div class="site-menu">
      <?php
      if ( has_nav_menu( 'header' ) ) {
        wp_nav_menu( array(
          'theme_location' => 'header',
          'container' => false,
          'walker' => new WP_wandau_Navwalker(),
        ) );
      }
      ?>
    </div>
    <!-- end site-menu --> 
  </div>
  <!-- end display-mobile --> 
</aside>
<!-- end side-widget -->

<nav class="navbar">
  <div class="logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo esc_url( $logo ); ?>" <?php if( $retina_logo != '' ) : ?> srcset="<?php echo esc_url( $retina_logo ); ?>" <?php endif; ?> alt="<?php bloginfo( 'name' ); ?>"></a></div>
  <?php
  if ( wandau_get_option( 'custom_menu' ) ):
    ?>
  <div class="custom-menu">
    <ul>
      <?php foreach ( $custom_menu as $menu ) { ?>
      <li> <a href="<?php echo esc_url( $menu['url'] ); ?>"><?php echo esc_html( $menu['label'] ); ?></a> </li>
      <?php } ?>
    </ul>
  </div>
  <?php endif; ?>
  <div class="site-menu">
    <?php
    if ( has_nav_menu( 'header' ) ) {
      wp_nav_menu( array(
        'theme_location' => 'header',
        'menu_class' => 'nav-menu',
        'container' => false,
        'walker' => new WP_wandau_Navwalker(),
      ) );
    }
    ?>
  </div>
  <?php if( wandau_get_option( 'enable_search' ) ) { ?>
  <div class="search-button"> <i class="far fa-search"></i> </div>
  <!-- end search-button -->
  <?php } ?>
	

	
	<?php if ( has_nav_menu( 'header' ) || is_active_sidebar( 'aside' ) ) { ?>
  <div class="hamburger-menu">
    <svg class="hamburger" width="30" height="30" viewBox="0 0 30 30">
      <path class="line line-top" d="M0,9h30"/>
      <path class="line line-center" d="M0,15h30"/>
      <path class="line line-bottom" d="M0,21h30"/>
    </svg>
  </div>
  <!-- end hamburger-menu -->
<?php } ?>
  <?php if( wandau_get_option( 'enable_navbar_button' ) ) { ?>
  <div class="navbar-button"> <a href="<?php echo esc_url( wandau_get_option( 'navbar_button_url' ) ); ?>"><?php echo esc_html( wandau_get_option( 'navbar_button_label' ) ); ?></a> </div>
  <!-- end navbar-button -->
  <?php } ?>
</nav>

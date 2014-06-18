<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title><?php
  //Print the <title> tag based on what is being viewed.
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'Helios' ), max( $paged, $page ) );

  ?></title>

<!-- <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>'/apple-touch-icon.png'"> -->

<!-- Favicons -->
<!-- <link href="favicon.ico" type="image/x-icon" rel="icon" /> -->
<!-- <link href="favicon.ico" type="image/x-icon" rel="shortcut icon" /> -->

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header class="site-header" role="banner">
    <h1 class="site-title">
      <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    </h1>
    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

    <nav role="navigation" class="site-navigation">
      <h1 class="screen-reader-text"><?php _e( 'Menu', 'Helios' ); ?></h1>
      <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'Helios' ); ?>"><?php _e( 'Skip to content', 'Helios' ); ?></a></div>

      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav><?php // .site-navigation ?>

  </header><?php // .site-header ?>

  <div class="site-main">
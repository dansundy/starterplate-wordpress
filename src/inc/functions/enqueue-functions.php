<?php
/**
 * Enqueue scripts and styles
 */ 
if ( ! function_exists( 'helios_scripts' ) ) :

  function helios_scripts() {
    $theme = wp_get_theme();

    wp_enqueue_style( 'main-style', get_stylesheet_uri(), array( 'fonts-com' ), $theme->get( 'Version' ) );
    // wp_enqueue_style( 'old-ie', get_template_directory_uri() . '/css/oldie.css', array( 'style' ), null );
    // wp_style_add_data( 'old-ie', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/lib/main.dev.js', array( 'jquery' ), null, false );
  }

endif;

add_action( 'wp_enqueue_scripts', 'helios_scripts' );

/**
 * Add IE conditional HTML5 shim to header.
 */
function add_ie_html5_shim () {
  echo '<!--[if lt IE 9]>';
  echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
  echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');

?>
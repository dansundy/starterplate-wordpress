<?php if ( have_posts() ): while( have_posts() ) : the_post(); endwhile; endif; ?>

<!-- Twitter Card data --> 
<meta name="twitter:card" content="summary"> 
<meta name="twitter:site" content="@twitterhandle"> 
<meta name="twitter:title" content="<?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?>"> 
<meta name="twitter:description" content="<?php bloginfo('description'); ?>"> 
<meta name="twitter:creator" content="@twitterhandle">
<meta name="twitter:image" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/og-logo-400x400.jpg'">

<!-- Open Graph data --> 
<?php
if ( is_single() ) : ?>

<?php
  $featured_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'featured-small' );
  $thumb = ! empty( $featured_thumbnail ) ? $featured_thumbnail[0] : get_stylesheet_directory_uri() . '/assets/img/og-logo-400x400.jpg';
?>

<meta property="og:url" content="<?php the_permalink() ?>"/>
<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); bloginfo( 'name' );?>" />
<meta property="og:description" content="<?php echo strip_tags( get_the_excerpt() ); ?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php echo $thumb; ?>" />

<?php else : ?>

<meta property="og:url" content="<?php the_permalink() ?>"/>
<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); bloginfo( 'name' );?>" />
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
<meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
<meta property="og:type" content="website" />
<meta property="og:image" content="<?php echo get_stylesheet_directory_uri() . '/assets/img/og-logo-400x400.jpg'; ?>" />

<?php endif; ?>

<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="400" />
<meta property="og:image:height" content="400" />
<?php
/**
 * The default content template.
 * Gets called when a more specific content template isn't.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'wpstarter' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

    <?php if ( 'post' == get_post_type() ) : ?>
      <div class="entry-meta">
        <?php //helios_posted_on(); ?>
      </div><!-- .entry-meta -->
    <?php endif; ?>
  </header><!-- .entry-header -->

  <?php if ( is_search() ) : // Only display Excerpts for Search ?>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
  <?php else : ?>
    <div class="entry-content">
      <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wpstarter' ) ); ?>
      <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpstarter' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
  <?php endif; ?>

  <footer class="entry-meta">

    <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
    
      <span class="sep"> | </span>
      <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'wpstarter' ), __( '1 Comment', 'wpstarter' ), __( '% Comments', 'wpstarter' ) ); ?></span>
    
    <?php endif; ?>

    <?php edit_post_link( __( 'Edit', 'wpstarter' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
  </footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
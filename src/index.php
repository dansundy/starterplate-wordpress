<?php
/**
 * The main template file.
 */

get_header(); ?>

  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'content/content', get_post_format() ); ?>

    <?php endwhile; ?>

  <?php else : ?>

    <?php get_template_part( 'content/no-results' ); ?>

  <?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
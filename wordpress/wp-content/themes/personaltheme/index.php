<?php get_header(); ?>

<div class="wrapper">
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <h3><?php the_title(); ?></h3>
      <small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_date('g:i a'); ?>,in <?php the_category(); ?></small>
      <?php the_excerpt(); ?>
      <?php //the_post_thumbnail(); ?>
      <?php //the_excerpt(); ?>
    <?php endwhile; ?>
  <?php else: ?>
      <?php _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); ?>
  <?php endif; ?>
</div>
<?php get_footer(); ?>

<?php get_header(); ?>

  <main role="main" class="container">
    <div class="row">
      <div class="col-md-8 blog-main">

        <?php if(have_posts()): ?>
          <?php while(have_posts()): the_post(); ?>
            <?php get_template_part('content',get_post_format()); ?>
          <?php endwhile; ?>
        <?php else: ?>
          <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>

        <nav class="blog-pagination">
          <a class="btn btn-outline-primary" href="#">Older</a>
          <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
        </nav>

      </div><!-- /.blog-main -->

<?php get_footer(); ?>

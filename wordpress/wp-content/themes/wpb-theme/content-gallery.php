<div class="blog-post post-gallery">
  <h2 class="blog-post-title">
    <?php if(is_single()): ?>
        <?php the_title(); ?>
    <?php else: ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
      </a>
    <?php endif; ?>
  </h2>
  <?php the_content(); ?>
  <div class="clearfix"></div>
</div>

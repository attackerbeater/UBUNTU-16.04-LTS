<div class="blog-post">
  <h2 class="blog-post-title">
    <?php if(is_single()): ?>
        <?php the_title(); ?>
    <?php else: ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
      </a>
    <?php endif; ?>
  </h2>
  <p class="blog-post-meta"><?php the_time('F j, Y g:i a'); ?> by <a href="#"><?php the_author(); ?></a></p>
  <?php if(is_single()): ?>
    <?php the_content(); ?>
    <div class="featured-thumbnail">
      <?php if(has_post_thumbnail()): ?>
        <div class="post-thumb">
          <?php the_post_thumbnail(); ?>
        </div>
      <?php endif; ?>
    </div>
  <?php else: ?>
    <?php the_excerpt(); ?>
  <?php endif; ?>

  <?php if(is_single()): ?>
    <?php comments_template(); ?>
  <?php endif; ?>
</div><!-- /.blog-post -->

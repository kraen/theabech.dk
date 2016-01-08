<?php get_header(); ?>
<div class="row">
  <div class="span8">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
      <p><em><?php the_time('l \d. j. F Y'); ?></em></p>
    	<?php the_content(); ?>
    <?php endwhile; else: ?>
    	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
  </div>
  <div class="span4">
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>

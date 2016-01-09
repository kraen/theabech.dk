<?php get_header(); ?>
<div class="container">
  <div class="row">
    <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class("blog-post"); ?>>
      <div class="col-lg-8 col-lg-offset-2">
        <header class="entry-header">
          <h1 class="entry-title text-center text-uppercase"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->

        <?php if (has_post_thumbnail()) : ?>
        <div class="featured-thumb">
            <?php the_post_thumbnail('large', array( 'class' => 'img-responsive' )); ?>
        </div>
        <?php endif; ?>
        <div class="entry-summary">
          <?php the_content(); ?>
        </div><!-- .entry-summary -->
      </div>

      <div class="clearfix"></div>
      <div class="divider-page"></div>
    </div>


  	<?php endwhile; else: ?>
  		<p><?php _e('Sorry, this page does not exist.'); ?></p>
  	<?php endif; ?>

  </div>
</div>
<?php get_footer(); ?>

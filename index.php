<?php get_header(); ?>
<div class="container">
  <div class="row">
  <?php if ( have_posts() ) : ?>

    <?php /* Start the Loop */ $count = 0; $row_count=0 ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class("blog-post"); ?>>
          <div class="col-lg-8 col-lg-offset-2">

            <header class="entry-header">
              <h1 class="entry-title text-center text-uppercase"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

              <div class="entry-meta text-center">
                <ul class="list-inline">
                  <li><small>Skrevet <?php the_time('l \d. j. F Y'); ?></small></li>
                </ul>
              </div><!-- .entry-meta -->
            </header><!-- .entry-header -->

            <?php if (has_post_thumbnail()) : ?>
              <div class="featured-thumb">
                <a href="<?php the_permalink(); ?>">
                  <?php
                  the_post_thumbnail('featured-thumb', array( 'class' => 'img-responsive' ));
                  ?>
                </a>
              </div>
            <?php endif; ?>

            <div class="entry-summary">
              <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
          </div>

        <div class="clearfix"></div>
        <div class="divider"></div>
        </div>
  <?php endwhile; ?>
  <nav>
    <ul class="pager">
      <li class="previous"><?php next_posts_link( 'Older posts' ); ?></li>
      <li class="next"><?php previous_posts_link( 'Newer posts' ); ?></li>
    </ul>
  </nav>
  <?php else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>


  <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>

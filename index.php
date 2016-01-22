<?php get_header(); ?>
<?php
if ( have_posts() ) :
  $lastposts = get_posts('numberposts=5'); ?>

<div class="blog-header">
  <div id="carousel-top-header" class="carousel slide" data-ride="carousel" data-wrap="false">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-top-header" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-top-header" data-slide-to="1"></li>
      <li data-target="#carousel-top-header" data-slide-to="2"></li>
      <li data-target="#carousel-top-header" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <?php foreach($lastposts as $post) :
        setup_postdata($post); ?>
      <div class="item<?php if ( $post->ID == $wp_query->post->ID ) { echo ' active'; } ?>">
        <img src="http://widewallpaper.info/wp-content/uploads/2015/11/Nature-HD-Wallpaper-1080p.jpg" alt="second">
        <div class="carousel-caption">
          <ul class="post-categories">
            <li><?php the_category( ', ' ); ?></li>
          </ul>
          <h2 class="entry-title"><?php the_title(); ?></h2>
          <div class="read-more"><a href="<?php the_permalink(); ?>">Read more</a></div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-top-header" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-top-header" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<?php endif; ?>
<div class="container">
  <div class="row">
  <?php
    rewind_posts();
    if ( have_posts() ) : ?>

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
                  the_post_thumbnail('large', array( 'class' => 'img-responsive' ));
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
  <nav class="text-center">
    <?php
    if (function_exists("wp_bs_pagination"))
  {
       //wp_bs_pagination($the_query->max_num_pages);
       wp_bs_pagination();
}
    ?>
  </nav>
  <?php else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>


  <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>

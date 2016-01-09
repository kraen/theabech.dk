<?php get_header(); ?>
<div class="container">
<?php if ( have_posts() ) : ?>

  <?php /* Start the Loop */ $count = 0; $row_count=0 ?>
  <?php while ( have_posts() ) : the_post();
    if ($count == 0 ) {echo "<div class='row-".$row_count." row'>";}
  ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class("home archive col-md-4"); ?>>
    <div class="article-wrapper">
        <?php if (has_post_thumbnail()) : ?>
      	<div class="featured-thumb col-md-12 col-xs-12">
      	<a href="<?php the_permalink(); ?>">
      	<?php
      		the_post_thumbnail('homepage-banner');
      	?>
      	</a>
      	</div>
      	<?php endif; ?>
        <div class="article-rest col-md-12">
      	<header class="entry-header">
      		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

      		<div class="entry-meta">

      		</div><!-- .entry-meta -->
      	</header><!-- .entry-header -->

      	<div class="entry-summary">
      		<?php the_excerpt(); ?>
      	</div><!-- .entry-summary -->
      	</div>
    </div>
  </article>


      <?php
        if ($count == 2 )
          {
            echo "</div>";
            $count=0;
            $row_count++;
          }
        else {
          $count++;
        } endwhile; ?>

      <?php else: ?>
    	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>


<?php endif; ?>

</div>
<?php get_footer(); ?>

<?php

add_theme_support( 'post-thumbnails' );

function wpbootstrap_scripts()
{

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'basic-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	// Bootstrap pagination function

	function wp_bs_pagination($pages = '', $range = 4) {

		$showitems = ($range * 2) + 1;

		global $paged;

		if(empty($paged)) $paged = 1;

		if($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;

			if(!$pages)	{
				$pages = 1;
			}
		}

		if(1 != $pages)	{

			echo '<div class="text-center">';
			echo '<nav><ul class="pagination"><li class="disabled hidden-xs"><span><span aria-hidden="true">Page '.$paged.' of '.$pages.'</span></span></li>';

			if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."' aria-label='First'><span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span><span class='hidden-xs'> First</span></a></li>";

			if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."' aria-label='Previous'><span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span><span class='hidden-xs'> Previous</span></a></li>";



			for ($i=1; $i <= $pages; $i++)

			{

				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))

				{

					echo ($paged == $i)? "<li class=\"active\"><span>".$i." <span class=\"sr-only\">(current)</span></span>

					</li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";

				}

			}



			if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\"  aria-label='Next'><span class='hidden-xs'>Next </span><span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span></a></li>";

			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."' aria-label='Last'><span class='hidden-xs'>Last </span><span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span></a></li>";

			echo "</ul></nav>";
			echo "</div>";
		}

	}

	function featured_slider() {
		if ( is_home() || is_front_page() ) {

		$c = 0;
		$class = '';
		$count = 4;
		$slidecat = 'featured';

		$query = new WP_Query( array( 'category_name' => $slidecat, 'posts_per_page' => $count ) );

		echo "<div class=\"blog-header\">";

		// echo "<div id=\"carousel-top-header\" class=\"carousel slide\" data-ride=\"carousel\">";
		// echo "<ol class=\"carousel-indicators\">";
		// echo "<li data-target=\"#carousel-top-header\" data-slide-to=\"0\" class=\"active\"></li>";
		// echo "<li data-target=\"#carousel-top-header\" data-slide-to=\"1\"></li>";
		// echo "<li data-target=\"#carousel-top-header\" data-slide-to=\"2\"></li>";
		// echo "<li data-target=\"#carousel-top-header\" data-slide-to=\"3\"></li>";
		// echo "</ol>";

		echo "<div class=\"carousel-inner\" role=\"listbox\">";

		if ( $query->have_posts() ) :
			while ($query->have_posts()) : $query->the_post();
					$c++;

					if ( $c == 1 ){ $class = ' active';}
					else{ $class='';}

		      echo "<div class=\"item $class\">";
					if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) ) :
						echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'img-responsive' ));
					endif;
	        	echo "<div class=\"carousel-caption\">";
						echo "<ul class=\"post-categories\">";
		          echo "<li>" . get_the_category_list(', ') . "</li>";
		        echo "</ul>";
	          echo "<h2 class=\"entry-title\">" . get_the_title() . "</h2>";
		          echo "<div class=\"read-more\"><a href=\"" . get_the_permalink() . "\">Read more</a></div>";
		        echo "</div>";
		      echo "</div>";

		    echo "</div>";

				endwhile; wp_reset_query();
				endif;

		    echo "<a class=\"left carousel-control\" href=\"#carousel-top-header\" role=\"button\" data-slide=\"prev\">";
		      echo "<span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span>";
		      echo "<span class=\"sr-only\">Previous</span>";
		    echo "</a>";
		    echo "<a class=\"right carousel-control\" href=\"#carousel-top-header\" role=\"button\" data-slide=\"next\">";
		      echo "<span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span>";
		      echo "<span class=\"sr-only\">Next</span>";
		    echo "</a>";
			echo "</div>";
		  echo "</div>";
		echo "</div>";

	}
	}

?>

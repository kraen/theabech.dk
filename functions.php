<?php

add_theme_support( 'post-thumbnails' );
add_image_size('homepage-banner',750,450,true);

function wpbootstrap_scripts()
{
	wp_enqueue_style( 'basic-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');

}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

?>

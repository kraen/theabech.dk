<?php

add_theme_support( 'post-thumbnails' );
add_image_size('featured-thumb',750,550,true);

function wpbootstrap_scripts()
{

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_script( 'animateHeader', get_template_directory_uri() . '/js/animateHeader.js', array(), '', true );
	wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array(), '', true );
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

?>

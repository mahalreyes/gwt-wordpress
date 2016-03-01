<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 */
function gwt_wp_scripts() {
	/** css **/
	wp_enqueue_style( 'gwt_wp-foundation', get_template_directory_uri() . '/css/foundation.css', array(), '20130729' );
	wp_enqueue_style( 'gwt_wp-style', get_stylesheet_uri(), array(), '20130729' );
	wp_enqueue_style( 'gwt_rsslides', get_template_directory_uri() . '/css/responsiveslides.css', array(), '20160218' );

	/** js **/
	wp_enqueue_script( 'gwt_wp-modernizr', get_template_directory_uri() . '/js/vendor/custom.modernizr.js', array(), '20130729', false );
	wp_enqueue_script( 'gwt_wp-foundation', get_template_directory_uri() . '/js/foundation.min.js', array(), '20130729', true );
	wp_enqueue_script( 'gwt_wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'gwt_wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'gwt_wp-functions-js', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20150703', true );
	wp_enqueue_script( 'gwt_wp-rsslides-js', get_template_directory_uri() . '/js/responsiveslides.min.js', array('jquery'), '20160218', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'gwt_wp-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'gwt_wp_scripts' );
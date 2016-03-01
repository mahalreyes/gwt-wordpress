<?php
/**
 * gwt_wp functions and definitions
 *
 * @package gwt_wp
 */

/**
 * Template Initialize
 */
require get_template_directory() . '/inc/function-initialize.php';

/**
 * Register widgetized area and update sidebar with default widgets
 */
require get_template_directory() . '/inc/function-widget.php';

/**
 * Breadcrumbs
 */
require get_template_directory() . '/inc/function-breadcrumbs.php';

/**
 * Govph Excerpt
 */
require get_template_directory() . '/inc/function-excerpt.php';

/**
 * Enqueue scripts and styles
 */
require get_template_directory() . '/inc/function-enqueue_scripts.php';

/**
 * Default sidebar contents
 */
require get_template_directory() . '/inc/function-sidebar.php';

/**
 * Disable comment functions
 */
require get_template_directory() . '/inc/disable-comments.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Theme Options Page.
 */
require get_template_directory() . '/inc/options.php';

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Plugin Name: Envato FlexSlider
 * Plugin URI:
 * Description: A simple plugin that integrates FlexSlider (http://flex.madebymufffin.com/) with WordPress using custom post types!
 * Author: Joe Casabona
 * Version: 0.5
 * Author URI: http://www.casabona.org
 */
require get_template_directory() . '/inc/vendors/envato-flex-slider/envato-flex-slider.php';

// make clickable content
apply_filters('the_content','make_clickable');

// post thumbnails
add_theme_support('post-thumbnails');
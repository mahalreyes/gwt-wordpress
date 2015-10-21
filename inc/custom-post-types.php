<?php

// Mega Menu
add_action('init', 'gwt_megamenu');
function gwt_megamenu() {
  register_post_type('gwt_megamenu', array(
    'label' => 'Mega Menus',
    'description' => '',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => true,
    'rewrite' => array('slug' => 'gwt-megamenu', 'with_front' => true),
    'query_var' => true,
    'menu_position' => '3',
    'supports' => array('title','editor','trackbacks','custom-fields','thumbnail', 'page-attributes'),
    'labels' => array(
      'name' => 'Mega menu',
      'singular_name' => 'Menu',
      'menu_name' => 'Mega menu',
      'add_new' => 'Add Menu',
      'add_new_item' => 'Add New Menu',
      'edit' => 'Edit',
      'edit_item' => 'Edit Menu',
      'new_item' => 'New Menu',
      'view' => 'View Menu',
      'view_item' => 'View Menu',
      'search_items' => 'Search Menus',
      'not_found' => 'No Menus Found',
      'not_found_in_trash' => 'No Menus Found in Trash',
      'parent' => 'Parent Menu',
    )
  ));
}
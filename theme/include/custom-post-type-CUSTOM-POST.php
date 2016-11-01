<?php

// TODO: Search this file for 'CUSTOM_POST' and 'CUSTOM-POST' and set the names.

function add_custom_post_type_for_CUSTOM_POST() {

  // https://codex.wordpress.org/Function_Reference/register_post_type
  register_post_type(
    'CUSTOM-POST',
    array(
      'label'                 => 'CUSTOM_POST',
      'labels'                => array(
        'name'                  => 'CUSTOM_POSTs',
        'singular_name'         => 'CUSTOM_POST',
        'menu_name'             => 'CUSTOM_POSTs',
        'name_admin_bar'        => 'CUSTOM_POST',
        'archives'              => 'CUSTOM_POST Archives',
        'parent_item_colon'     => 'Parent CUSTOM_POST:',
        'all_items'             => 'All CUSTOM_POSTs',
        'add_new_item'          => 'Add New CUSTOM_POST',
        'add_new'               => 'Add New CUSTOM_POST',
        'new_item'              => 'New CUSTOM_POST',
        'edit_item'             => 'Edit CUSTOM_POST',
        'update_item'           => 'Update CUSTOM_POST',
        'view_item'             => 'View CUSTOM_POST',
        'search_items'          => 'Search CUSTOM_POST',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into CUSTOM_POST',
        'uploaded_to_this_item' => 'Uploaded to this CUSTOM_POST',
        'items_list'            => 'CUSTOM_POST list',
        'items_list_navigation' => 'CUSTOM_POSTs list navigation',
        'filter_items_list'     => 'Filter CUSTOM_POSTs list',
      ),
      'supports'              => array('title'),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 21, // https://developer.wordpress.org/reference/functions/add_menu_page/#menu-structure
      'menu_icon'             => 'dashicons-carrot', // https://developer.wordpress.org/resource/dashicons/
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
      'rewrite'               => array('slug' => 'CUSTOM-POST')
    )
  );

}
add_action('init', 'add_custom_post_type_for_CUSTOM_POST', 0);

?>

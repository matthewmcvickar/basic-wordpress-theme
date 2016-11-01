<?php

// Store ACF data in local JSON files.
function set_acf_json_save_point($path) {
  $path = get_stylesheet_directory() . '/admin/acf';
  return $path;
}
add_filter('acf/settings/save_json', 'set_acf_json_save_point');

// Load ACF data from parent theme as well as current child theme.
function set_acf_json_load_point($paths) {
  unset($paths[0]);
  $paths[] = get_template_directory() . '/admin/acf';
  $paths[] = get_stylesheet_directory() . '/admin/acf';
  return $paths;
}
add_filter('acf/settings/load_json', 'set_acf_json_load_point');

// Hide ACF from admin sidebar on production to prevent field groups going
// out of sync with the development version.
function hide_acf_from_admin_sidebar() {
  if (is_production()) {
    remove_menu_page('edit.php?post_type=acf-field-group');
  }
}
add_action('admin_menu', 'hide_acf_from_admin_sidebar', 999);

// Load admin CSS and JavaScript.
function enqueue_admin_scripts_and_styles() {
  wp_enqueue_script('theme-admin-js', get_bloginfo('template_directory') . '/admin/admin.js');
  wp_enqueue_style('theme-admin', get_bloginfo('template_directory') . '/admin/admin.css');
}
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts_and_styles');

// Images link to nothing by default.
update_option('image_default_link_type', 'none');

// Remove admin dashboard items.
function remove_dashboard_widgets() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

// Remove admin toolbar navigation menu items.
function remove_admin_toolbar_items() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
  $wp_admin_bar->remove_menu('new-media');
  $wp_admin_bar->remove_menu('new-post');
}
add_action('wp_before_admin_bar_render', 'remove_admin_toolbar_items');

// Remove admin sidebar navigation menu items.
function remove_admin_sidebar_items() {
  remove_menu_page('edit.php'); // Posts
  remove_menu_page('edit-comments.php'); // Comments
}
add_action('admin_menu', 'remove_admin_sidebar_items', 999);

// Remove columns from pages list.
function remove_columns_from_pages_list($columns) {
  unset($columns['date']);
  unset($columns['author']);
  unset($columns['comments']);
  return $columns;
}
function customize_columns() {
  add_filter('manage_pages_columns' , 'remove_columns_from_pages_list');
}
add_action('admin_init' , 'customize_columns');

// Remove support for comments, authors, the excerpt, revisions, and dates from pages.
function deactivate_post_type_support() {
  remove_post_type_support('page', 'comments');
  remove_post_type_support('page', 'author');
  remove_post_type_support('page', 'excerpt');
  remove_post_type_support('page', 'revisions');
  remove_post_type_support('page', 'date');
}
add_action('admin_init', 'deactivate_post_type_support');

// Add new, basic TinyMCE toolbars for using in WYSIWYG editor boxes.
function add_custom_tinymce_toolbar($toolbars) {
  $toolbars['Bold, Italic, Link, Unlink, Paste Text'] = array();
  $toolbars['Bold, Italic, Link, Unlink, Paste Text'][1] = array(
    'bold',
    'italic',
    'link',
    'unlink',
    'pastetext'
  );

  return $toolbars;
}
add_filter('acf/fields/wysiwyg/toolbars' , 'add_custom_tinymce_toolbar');

// Turn on 'Paste as Text' by default.
function turn_on_tinymce_paste_as_text_by_default($mceInit, $editor_id){
  $mceInit['paste_as_text'] = true;
  return $mceInit;
}
add_filter('tiny_mce_before_init', 'turn_on_tinymce_paste_as_text_by_default', 1, 2);

// Move Yoast metabox to bottom of post edit screen.
function move_yoast_seo_metabox_to_bottom_of_screen() {
  return 'low';
}
add_filter('wpseo_metabox_prio', 'move_yoast_seo_metabox_to_bottom_of_screen');

// Shortcode: [note]A note to people editing this page in WP Admin.[/note]
// This is a way to leave notes in the admin editor without it getting printed
// on the frontend.
function admin_note_shortcode() {
  return null;
}
add_shortcode('note', 'admin_note_shortcode');

?>

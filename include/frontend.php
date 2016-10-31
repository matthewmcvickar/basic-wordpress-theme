<?php

// Add <title> tag support.
function add_title_tag_support() {
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'add_title_tag_support');

// Remove emojicons.
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Navigation menus.
add_theme_support('menus');

function register_navigation_menus() {
  register_nav_menus(array(
    'header' => 'Header',
    'footer' => 'Footer',
  ));
}
add_action('init', 'register_navigation_menus');

// Remove extra feed links.
remove_action('wp_head', 'feed_links_extra');
remove_action('wp_head', 'wlwmanifest_link');

// Add page slug as nav IDs.
function add_page_slug_as_nav_item_ID( $id, $item ) {
  return 'nav-' . sanitize_title($item->title);
}
add_filter('nav_menu_item_id', 'add_page_slug_as_nav_item_ID', 10, 2);

// Add page slug as body class, and include the page parent.
function add_page_and_parent_slugs_to_body_classes($classes, $class='') {
  global $post;

  if ($post):
    $post_id = $post->ID;

    if (is_page($post_id)):
      $page = get_page($post_id);

      if ($page->post_parent > 0) {
        $parent = get_page($page->post_parent);
        $classes[] = 'page-' . $parent->post_name;
      }

      $classes[] = 'page-' . $page->post_name;
    endif;
  endif;

  return $classes;
}
add_filter('body_class','add_page_and_parent_slugs_to_body_classes');

// Show an SVG.
function get_svg($name, $classes = null) {
  $output = '<span class="icon icon-' . $name . ' ' . $classes . '">';

  // Use output buffering to include the file into the existing variable.
  ob_start();
  get_template_part('img/' . $name . '.svg');
  $output .= ob_get_contents();
  ob_end_clean();

  $output .= '</span>';

  return $output;
}

?>

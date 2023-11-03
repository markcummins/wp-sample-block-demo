<?php defined('ABSPATH') or die('Plugin file cannot be accessed directly.');

/*
Plugin Name: Demo
Description: Demo
Version: 2.0
Text Domain: demo
Author: Mark
*/

define('DEMO_DIR', plugin_dir_path(__FILE__));
define('DEMO_URL', plugin_dir_url(__FILE__));

function get_demo_template_dir()
{
  return DEMO_DIR;
}

function get_demo_template_url()
{
  return DEMO_URL;
}

function cp_init()
{
  $custom_post_labels = array(
    'name'                 => __('Keynotes',         'demo'),
    'singular_name'        => __('Keynote',          'demo'),
    'add_new'              => __('Add Keynote',      'demo'),
    'add_new_item'         => __('Add New Keynote',  'demo'),
    'edit_item'            => __('Edit Keynote',     'demo'),
    'new_item'             => __('New Keynote',      'demo'),
    'view_item'            => __('View Keynote',     'demo'),
    'search_items'         => __('Search Keynote',   'demo'),
    'not_found'            => __('No Keynote found', 'demo'),
    'not_found_in_trash'   => __('No Keynotes found in Trash', 'demo'),
    '_builtin'             =>  false,
    'parent_item_colon'    => '',
    'menu_name'            => 'Keynotes'
  );

  $custom_post_args = array(
    'labels'              => $custom_post_labels,
    'public'              => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'query_var'           => true,
    'rewrite'             => array(
      'slug' => 'keynotes',
      'with_front' => false
    ),
    'has_archive'         => true,
    'hierarchical'        => false,
    'show_in_rest'        => true,
    'menu_icon'           => 'dashicons-megaphone',
    'supports'            => array('title', 'editor', 'thumbnail', 'comments'),
    'taxonomies'          => array()
  );

  register_post_type('cp_keynotes', $custom_post_args);
}
add_action('init', 'cp_init');

/**
 * Registers the Block
 *
 * @return void
 */
function register_block_cp_keynotes_widget_header()
{
  wp_register_script(
    'cp-keynotes-header',
    plugins_url('block.js', __FILE__),
    array('wp-blocks', 'wp-element', 'wp-editor'),
  );

  register_block_type('cp-keynotes/header', array(
    'api_version' => 3,
    'editor_script' => 'cp-keynotes-header',
    'style' => 'cp-keynotes-header-style',
    'render_callback' => 'render_callback_cp_keynotes_header'
  ));
}
add_action('init', 'register_block_cp_keynotes_widget_header');

function set_block_category($categories, $post)
{
  array_unshift($categories, array(
    'slug'  => 'cp-keynotes',
    'title' => 'Resources - Keynotes'
  ));

  return $categories;
}
add_filter('block_categories_all', 'set_block_category', 10, 2);

/**
 * Renders the Block
 *
 * @param array $block_attributes
 * @param string $content
 * @return void
 */
function render_callback_cp_keynotes_header($block_attributes, $content)
{
  var_dump(have_posts());
  var_dump(have_posts());
  var_dump(have_posts());
}

function rewrite_flush()
{
  flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'rewrite_flush');

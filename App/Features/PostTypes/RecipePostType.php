<?php 

namespace App\Features\PostTypes;

class RecipePostType
{
  public static $slug = 'recipe';
  /**
   * Enregistrement du type de contenu recipe
   *
   * @return void
   */
  public static function register()
  {
    // info sur la fonction https://developer.wordpress.org/reference/functions/register_post_type/
    register_post_type(
      self::$slug, // Le slug du type de contenu 
      array(
        'labels' => array( // On récupere toutes les clés en allant sur la fonction "get_post_type_label()"
          'name' => __('Recette'),
          'singular_name' => __('Recette'),
          'add_new' => array(_x('Add New', 'post'), _x('Add New', 'page')),
          'add_new_item' => array(__('Add New Post'), __('Add New Page')),
          'edit_item' => array(__('Edit Post'), __('Edit Page')),
          'new_item' => array(__('New Post'), __('New Page')),
          'view_item' => array(__('View Post'), __('View Page')),
          'view_items' => array(__('View Posts'), __('View Pages')),
          'search_items' => array(__('Search Posts'), __('Search Pages')),
          'not_found' => array(__('No posts found.'), __('No pages found.')),
          'not_found_in_trash' => array(__('No posts found in Trash.'), __('No pages found in Trash.')),
          'parent_item_colon' => array(null, __('Parent Page:')),
          'all_items' => array(__('All Posts'), __('All Pages')),
          'archives' => array(__('Post Archives'), __('Page Archives')),
          'attributes' => array(__('Post Attributes'), __('Page Attributes')),
          'insert_into_item' => array(__('Insert into post'), __('Insert into page')),
          'uploaded_to_this_item' => array(__('Uploaded to this post'), __('Uploaded to this page')),
          'featured_image' => array(_x('Featured Image', 'post'), _x('Featured Image', 'page')),
          'set_featured_image' => array(_x('Set featured image', 'post'), _x('Set featured image', 'page')),
          'remove_featured_image' => array(_x('Remove featured image', 'post'), _x('Remove featured image', 'page')),
          'use_featured_image' => array(_x('Use as featured image', 'post'), _x('Use as featured image', 'page')),
          'filter_items_list' => array(__('Filter posts list'), __('Filter pages list')),
          'items_list_navigation' => array(__('Posts list navigation'), __('Pages list navigation')),
          'items_list' => array(__('Posts list'), __('Pages list')),
          'item_published' => array(__('Post published.'), __('Page published.')),
          'item_published_privately' => array(__('Post published privately.'), __('Page published privately.')),
          'item_reverted_to_draft' => array(__('Post reverted to draft.'), __('Page reverted to draft.')),
          'item_scheduled' => array(__('Post scheduled.'), __('Page scheduled.')),
          'item_updated' => array(__('Post updated.'), __('Page updated.')),

        ),
        'description' => '',
        'public' => true,
        'hierarchical' => false,
        'exclude_from_search' => null,
        'publicly_queryable' => null,
        'show_ui' => null,
        'show_in_menu' => null,
        'show_in_nav_menus' => null,
        'show_in_admin_bar' => null,
        'menu_position' => null,
        'menu_icon' => null,
        'capability_type' => 'post',
        'capabilities' => array(),
        'map_meta_cap' => null,
        'supports' => array(),
        'register_meta_box_cb' => null,
        'taxonomies' => array(),
        'has_archive' => false,
        'rewrite' => true,
        'query_var' => true,
        'can_export' => true,
        'delete_with_user' => null,
        'show_in_rest' => false,
        'rest_base' => false,
        'rest_controller_class' => false,
        '_builtin' => false,
        '_edit_link' => 'post.php?post=%d',
      )
    );

  }
}
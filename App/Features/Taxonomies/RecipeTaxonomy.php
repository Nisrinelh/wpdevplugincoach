<?php

namespace App\Features\Taxonomies;

use App\Features\PostTypes\RecipePostType;


class RecipeTaxonomy
{
  public static $slug = 'recipe_taxonomy';
  /**
   * Enregistrement de la Taxonomie
   * https://developer.wordpress.org/plugins/taxonomies/working-with-custom-taxonomies/
   * @return void
   */
  public static function register()
  {

    $labels = [// les labels pour la taxonomie
      'name' => __('Type de recettes'),
      'singular_name' => __('Type de recette'),
      'search_items' => __('Search Type de recettes'),
      'all_items' => __('All Type de recettes'),
      'parent_item' => __('Parent Type de recette'),
      'parent_item_colon' => __('Parent Type de recette:'),
      'edit_item' => __('Edit Type de recette'),
      'update_item' => __('Update Type de recette'),
      'add_new_item' => __('Add New Type de recette'),
      'new_item_name' => __('New Type de recette Name'),
      'menu_name' => __('Type de recette'),
    ];
    $args = [
      'hierarchical' => true, // make it hierarchical (like categories)
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => ['slug' => 'recette'],
    ];
    // ajout de la taxonomie pour le type de contenu recipe
    register_taxonomy(self::$slug, [RecipePostType::$slug], $args);

  }
}
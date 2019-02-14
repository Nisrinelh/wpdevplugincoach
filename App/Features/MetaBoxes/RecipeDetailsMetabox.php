<?php

namespace App\Features\MetaBoxes;

use App\Features\PostTypes\RecipePostType;

class RecipeDetailsMetabox
{

  public static $slug = 'recipe_details_metabox';

  /**
   * Ajout d'une méta box au type de contenu qui sont passer dans le tableau $screens
   * https://developer.wordpress.org/plugins/metadata/custom-meta-boxes/
   *
   * @return void
   */
  public static function add_meta_box()
  {
    $screens = [RecipePostType::$slug];
    foreach ($screens as $screen) {
      add_meta_box(
        self::$slug,           // Unique ID
        __("Détails de la cette"),  // Box title
        [self::class, 'render'],  // Content callback, must be of type callable
        $screen                   // Post type
      );
    }
  }

  /**
   * Fonction pour rendre le code html dans la metabox
   *
   * @return void
   */
  public static function render()
  {
    view('metaboxes/recipe-detail');
  }

  /**
   * sauvegarde des donners de la métabox
   *
   * @param [type] $post_id reçu par le do_action
   * @return void
   */
  public static function save($post_id)
  {
    // On verifie que $_POST ne soit pas vite pour effectuer l'action uniquement à la sauvegarde du post Type
    if (count($_POST) != 0) {
      $time_preparation = $_POST['rat_time_preparation'];
      // https://developer.wordpress.org/reference/functions/update_post_meta/
      update_post_meta($post_id, 'rat_time_preparation', $time_preparation);
    }
  }
}
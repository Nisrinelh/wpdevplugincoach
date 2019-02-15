<?php
use App\Features\PostTypes\PostTypeRegister;
use App\Features\PostTypes\RecipePostType;
use App\Features\Taxonomies\RecipeTaxonomy;
use App\Features\MetaBoxes\RecipeDetailsMetabox;

return [
/**
 * Ajout des hooks action
 */
  'actions' => [
    // Ajout d'un listener à l'event "init". le listener est la méthode "register" de la class RecipePostType.
    ['init', [PostTypeRegister::class, 'register']],
    //Ajout d'un listener à l'event "init" pour enregistrer une taxonomy
    ['init', [RecipeTaxonomy::class, 'register']],
    // Ajout d'une Metabox pour le postType recipe
    ['add_meta_boxes_recipe', [RecipeDetailsMetabox::class, 'add_meta_box']],
    // Ajout d'une action de sauvegarde lors de la sauvegarde d'un post type recipe
    ['save_post_' . RecipePostType::$slug, [RecipeDetailsMetabox::class, 'save']],
    // Ajout d'une action pour supprimé toutes les metas d'un post lorsque ce post est supprimé
    ['delete_post', 'delete_post_metas'],
  ],



  /**
   * Ajout des hooks filtre
   */
  'filters' => []
];

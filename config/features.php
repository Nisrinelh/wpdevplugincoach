<?php
use App\Features\PostTypes\RecipePostType;
use App\Features\Taxonomies\RecipeTaxonomy;
use App\Features\MetaBoxes\RecipeDetailsMetabox;
use App\Features\Widgets\Widget;
use App\Features\Sections\Section;
use App\Features\Pages\Page;

/**
 * Ce fichier renvoi un tableau avec tout les features (éléments propre à wordpress). Ce tableau est constituer de tableau qui contienne les paramêtres qui seront passé à une fonction 'add_action'.
 */

return [
  ['init', [RecipePostType::class, 'register']],
  ['add_meta_boxes_' . RecipePostType::$slug, [RecipeDetailsMetabox::class, 'add_meta_box']],
  ['save_post_' . RecipePostType::$slug, [RecipeDetailsMetabox::class, 'save']],
  ['init', [RecipeTaxonomy::class, 'register']],
  ['widgets_init', [Widget::class, 'init']],
  ['admin_init', [Section::class, 'init']],
  ['admin_menu', [Page::class, 'init']]
];

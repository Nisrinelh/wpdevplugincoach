<?php

// Ajout du fichier env.php pour les constantes global
require_once('env.php');
// Ajout du fichier helpers.php pour disposé des fonctions helper
require_once('helpers.php');
// Ajout d'un listener à l'event "init". le listener est la méthode "register" de la class RecipePostType.
add_action('init', [RecipePostType::class, 'register']);
// Ajout d'un listener à l'event "init" pour enregistrer une taxonomy
add_action('init', [RecipeTaxonomy::class, 'register']);
// Ajout d'une Metabox pour le postType recipe
add_action('add_meta_boxes_recipe', [RecipeDetailsMetabox::class, 'add_meta_box']);
// Ajout d'une action de sauvegarde lors de la sauvegarde d'un post type recipe
add_action('save_post_' . RecipePostType::$slug, [RecipeDetailsMetabox::class, 'save']);
// Ajout d'une action pour supprimé toutes les metas d'un post lorsque ce post est supprimé
add_action('delete_post', 'delete_post_metas');
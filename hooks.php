<?php
/**
 * Ce fichier regroupe tout les hooks. Action et Filter
 */
use App\Features\PostTypes\RecipePostType;
use App\Features\Taxonomies\RecipeTaxonomy;
use App\Features\MetaBoxes\RecipeDetailsMetabox;
use App\Features\Widgets\Widget;
use App\Features\Sections\Section;
use App\Features\Pages\Page;
use App\Setup;
use App\Http\Controllers\MailController;
use App\Database\Database;
use App\Features\Roles\Role;

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
// Ajout d'une action pour enregistrer les widgets
add_action('widgets_init', [Widget::class, 'init']);
// Ajout d'une section dans la page reading (lecture) pour choisir le nombre de recette à afficher sur la home page
add_action('admin_init', [Section::class, 'init']);
// Ajout d'un lien dans le menu qui mène vers une page personnalisé
add_action('admin_menu', [Page::class, 'init']);
// Ajout d'un action pour envoi de mail depuis l'admin
add_action('admin_action_send-mail', [MailController::class, 'send']);
// Ajout d'un action pour suppression d'un mail depuis l'admin
add_action('admin_action_mail-delete', [MailController::class, 'delete']);
// Ajout d'une action pour éditer une mail
add_action('admin_action_mail-update', [MailController::class, 'update']);
// On ajoute une session afin de pouvoir utiliser la variable $_SESSION;
add_action('admin_init', [Setup::class, 'start_session']);
// On ajoute la méthode qui va s'executer lors de l'activation du plugin
// Cette fonction ne s'active que lors de l'activation du plugin https://developer.wordpress.org/reference/functions/register_activation_hook/
register_activation_hook(__DIR__ . '/ratatouille.php', [Database::class, 'init']);
// Nous ajoutons des roles à l'activation du plugin.
register_activation_hook(__DIR__ . '/ratatouille.php', [Role::class, 'init']);
// Ajout d'une css pour l'admin
add_action('admin_enqueue_scripts', [Setup::class, 'enqueue_scripts']);

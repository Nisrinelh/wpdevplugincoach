<?php

namespace App\Features\Roles;

class Role
{
  /**
   * Fonction d'initialisation des romes
   *
   * @return void
   */
  public static function init()
  {
    // Déclaration des permissions pour le manager de mail
    $manager_capabilities = [
      "read_email" => true,
      "show_email" => true,
      "create_email" => true,
      "edit_email" => true,
      "delete_email" => true,
    ];

    // Déclaration des permissions pour l'assistant mail
    $assistant_capabilities = [
      "read_email" => true,
      "show_email" => true,
    ];
    // Fonction wordpress qui ajout un role s'il n'existe pas.
    //https://developer.wordpress.org/reference/functions/add_role/
    add_role(
      "email-manager", // slug du role
      __('Manager des e-mail'), // nom affiché
      // un tableau avec les permissions attaché au roles (capabilities)
      $manager_capabilities
    );
    add_role(
      "email-assistant",
      __('Assistant e-mail'),
      $assistant_capabilities
    );

    // après avoir ajouter deux rôles, nous ajouter ses mêmes permission au roles admin pour s'assurer qu'il ait accès à tout
    // Rappel si vous voulez faire un reset de tout les roles pour revenir à la configuration de base, utiliser wp-cli
    // wp role reset --all | n'oubliez pas également d'utiliser wp role pour checker les roles 
    // https://developer.wordpress.org/cli/commands/role/
    $role_admin = get_role('administrator');

    foreach ($manager_capabilities as $cap => $grant) {
      $role_admin->add_cap($cap, $grant);
    }

    // nous allons aussi ajouter les capacités d'assistant au role editor afin de pouvoir facilement créer un compte editor et faire des tests avec
    $role_admin = get_role('editor');

    foreach ($assistant_capabilities as $cap => $grant) {
      $role_admin->add_cap($cap, $grant);
    }
  }
}

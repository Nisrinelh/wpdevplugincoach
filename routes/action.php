<?php

use App\Http\Controllers\MailController;

/**
 * Ce fichier renvoi un tableau trier sur les actions utiliser pour l'admin, le front et le front en mode connecter
 */
return [
  // Tableau des actions poster dans l'admin
  'admin_action' => [
    ['send-mail', [MailController::class, 'send']],
    ['mail-delete', [MailController::class, 'delete']],
    ['mail-update', [MailController::class, 'update']]
  ],
  // Tableau des actions post sur le front en étant connecté
  'admin_post' => [],
  // Tableau des actions post sur le front sans être connecté
  'admin_post_nopriv' => [],
  // Tableau des actions ajax en étant connecté
  'wp_ajax' => [],
  // Tableau des action ajax sans être connecté
  'wp_ajax_nopriv' => []
];

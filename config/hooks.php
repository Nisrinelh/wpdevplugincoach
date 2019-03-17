<?php

use App\Setup;

/**
 * Dans ce fichier nous mettons tout les hooks (action et filter) qui pourrait-être utiliser dans l'application
 */

return [
  /**
   * Ajout des hooks action
   */
  'actions' => [
    ['admin_init', [Setup::class, 'start_session']],
    ['admin_enqueue_scripts', [Setup::class, 'enqueue_scripts']],
    ['phpmailer_init', [Setup::class, 'mailtrap']]
  ],



  /**
   * Ajout des hooks filtre
   */
  'filters' => []
];

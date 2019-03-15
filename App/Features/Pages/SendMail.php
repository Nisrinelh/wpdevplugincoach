<?php

namespace App\Features\Pages;

use App\Http\Models\Mail;




class SendMail
{
  /**
   * Initialisation de la page.
   *
   * @return void
   */
  public static function init()
  {
    //https: //developer.wordpress.org/reference/functions/add_menu_page/  
    add_menu_page(
      __('Formulaire pour contacter les clients'), // Le titre qui s'affichera sur la page
      __('Mail Client'), // le texte dans le menu
      'edit_private_pages', // la capacité qu'il faut posséder en tant qu'utilisateur pour avoir accès à cette page (les roles et capacité seront vue plus tard)
      'mail-client', // Le slug du menu
      [self::class, 'render'], // La méthode qui va afficher la page
      'dashicons-email-alt', // L'icon dans le menu
      26 // la position dans le menu (à comparer avec la valeur deposition des autres liens menu que l'on retrouve dans la doc).
    );
  }

  /**
   * Fonction qui redirige vers la bonne méthode
   *
   * @return void
   */
  public static function render()
  {
    /**
     * on fait un refactoring afin que la méthode render renvoi vers la bonne méthode en fonction de l'action
     */
    // on défini une valeur par défaut pour $action qui est index et qui correspondra à la méthode à utiliser
    $action = isset($_GET["action"]) ? $_GET["action"] : "index";
    call_user_func([self::class, $action]);
  }

  /**
   * Affiche la page principal
   *
   * @return void
   */
  public static function index()
  {
    // on va chercher toute les entrés de la table dont le model mail s'occupe et on inverse l'ordre afin d'avoir le plus récent en premier.
    $mails = array_reverse(Mail::all());
    $old = [];
    if (isset($_SESSION['old']) && isset($_SESSION['notice']['error'])) { // correction pour afficher valeur que quand error
      $old = $_SESSION['old'];
      unset($_SESSION['old']);
    }
    view('pages/send-mail', compact('old', 'mails'));
  }

  /**
   * Affiche une entré en particulier
   *
   * @return void
   */
  public static function show()
  {
    $id = $_GET['id'];
    $mail = Mail::find($id);

    view('pages/show-mail', compact('mail'));
  }
}

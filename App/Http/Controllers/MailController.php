<?php 

namespace App\Http\Controllers;

use App\Http\Requests\Request;

class MailController
{
  /**
   * Envoi d'un email
   *
   * @return void
   */
  public static function send()
  {
    // on vérifie la sécurité pour voir si le formulaire est bien authentique
    if (!wp_verify_nonce($_POST['_wpnonce'], 'send-mail')) {
      return;
    };
    Request::validation([
      'name' => 'required',
      'email' => 'email',
      'firstname' => 'required',
      'message' => 'required'
    ]);

    // Nous récupérons les données envoyé par le formulaire qui se retrouve dans la variable $_POST
    $email = sanitize_email($_POST['email']);
    $name = sanitize_text_field($_POST['name']);
    $firstname = sanitize_text_field($_POST['firstname']);
    $message = sanitize_textarea_field($_POST['message']);

    // Nous allons également sauvegarder en base de donnée les mails que nous allons envoyer.

    global $wpdb;
    // Nous utilisons une fonction pour insérer dans la db. https://developer.wordpress.org/reference/classes/wpdb/insert/
    $wpdb->insert(
      $wpdb->prefix . 'rat_mail', // premier argument est le nom de la table. c'est la deuxième fois que l'on écrit ce nom. Il serait bon de faire un refactoring et d'utiliser une constance à la place. Nous le ferons plus tard.
      [ // Deuxième paramêtre est un tableau dont la clé est le nom de la colonne dans la table et la valeur est la valeur à mettre dans la colonne
        'userid' => get_current_user_id(),
        'lastname' => $name,
        'firstname' => $firstname,
        'email' => $email,
        'content' => $message,
        'created_at' => current_time('mysql')
      ]
    );

    // la fonction wordpress pour envoyer des mails https://developer.wordpress.org/reference/functions/wp_mail/
    if (wp_mail($email, 'Pour ' . $name . ' ' . $firstname, $message)) {
      $_SESSION['notice'] = [
        'status' => 'success',
        'message' => 'votre e-mail a bien été envoyé'
      ];
    } else {
      $_SESSION['notice'] = [
        'status' => 'error',
        'message' => 'Une erreur est survenu, veuillez réessayer plus tard'
      ];
    }
    // la fonction wp_safe_redirect redirige vers une url. La fonction wp_get_referer renvoi vers la page d'ou la requête a été envoyé.
    wp_safe_redirect(wp_get_referer());
  }
}

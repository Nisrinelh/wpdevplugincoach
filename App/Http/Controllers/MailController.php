<?php 

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Http\Models\Mail;

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
    // Refactoring pour apprendre et utiliser les models. Seul les models peuvent intéragir avec la base de donnée.
    // on instancie la class Mail et on rempli les valeurs dans les propriétés.
    $mail = new Mail();

    $mail->userid = get_current_user_id();
    $mail->lastname = $name;
    $mail->firstname = $firstname;
    $mail->email = $email;
    $mail->content = $message;
    // Sauvegarde du mail dans la base de donnée
    $mail->save();


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

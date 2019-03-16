<?php

namespace App\Http\Models;

use App\Database\Migrations\CreateMailTable;


class Mail
{

  // les propriétés de l'objet model. Les propriété de l'objet qui sont représentative de la structure de la table dans la base de donnée.

  public $id;

  public $userid;

  public $lastname;

  public $firstname;

  public $email;

  public $content;

  public $created_at;

  protected static $table = 'wp_rat_mail';

  /**
   * Fonction qui est appelé lors de l'instance d'un objet.
   */
  public function __construct()
  {
    // on rempli déjà la date de création
    $this->created_at = current_time('mysql');
  }

  /**
   * fonction qui prend en charge la sauvegarde du mail dans la base de donnée.
   *
   * @return void
   */
  public function save()
  {
    global $wpdb;
    // nous utilisons à nous la méthode insert de l'objet $wpdb;
    return $wpdb->insert(
      $wpdb->prefix . 'rat_mail', // le nom de la table
      //Nous appelons une fonction php pure qui transforme toutes les propriétés de notre objet en tableau pour simplifier l'écriture
      get_object_vars($this)

    );
  }

  /**
   * Fonction qui va chercher toutes les entrées de la table
   *
   * @return array
   */
  public static function all()
  {
    global $wpdb;
    $table = self::$table;
    $query = "SELECT * FROM $table";
    return $wpdb->get_results($query);
  }

  /**
   * fonction qui va cherche l'entré de la table qui à l'id correspondant
   *
   * @param [type] $id
   * @return object
   */
  public static function find($id)
  {
    global $wpdb;
    $table = self::$table;
    $query = "SELECT * FROM $table WHERE id = $id";
    // nous ajoutons ces lignes afin de ne pas renvoyé un simple objet mais bien un objet Mail
    $objet = $wpdb->get_row($query);
    $mail = new Mail();
    foreach ($objet as $key => $value) {
      $mail->$key = $value;
    }

    return $mail;
  }

  /**
   * fonction qui va mettre à jour l'entré dans la base de donnée
   *
   * @return boolean
   */
  public function update()
  {
    global $wpdb;
    return $wpdb->update(
      self::$table,
      get_object_vars($this),
      ['id' => $this->id]
    );
  }

  public static function delete($id)
  {
    global $wpdb;
    return $wpdb->delete(
      self::$table,
      [
        'id' => $id
      ]
    );
  }
}

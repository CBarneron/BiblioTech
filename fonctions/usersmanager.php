<?php
class UsersManager
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }
//Ajouter un users dans la BDD
  public function add(Users $obj)
  {
    $pre = $this->db->prepare('SELECT email FROM users WHERE email = :email');

    $pre->execute(array(
      'email' => $obj->getEmail()
    ));
    $resultat = $pre->fetch();

    if(!$resultat)
    {
      $req = $this->db->prepare('INSERT INTO users(pseudo, email, password) VALUES (:pseudo, :email, :password)');

      $req->execute(array(
        'pseudo' => $obj->getPseudo(),
        'email' => $obj->getEmail(),
        'password' => $obj->getPassword()
      ));
      return true;
    }
    else
    {
      return false;
    }
  }
//Retirer un users de la BDD
  public function delete(Users $obj)
  {
//A faire
  }
  //Connection
  public function connect(Users $obj)
  {
    $req = $this->db->prepare('SELECT pseudo FROM users WHERE email = :email AND password = :password');

    $req->execute(array(
      'email' => $obj->getEmail(),
      'password' => $obj->getPassword()
    ));
    $resultat = $req->fetch();
    if($resultat)
    {
      session_start();
      $_SESSION['pseudo'] = $resultat[0];
      $_SESSION['connect'] = true;
      echo $resultat[0];
      return true;
    }
    else
    {
      return false;
    }
  }
}
?>

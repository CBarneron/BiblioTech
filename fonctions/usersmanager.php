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
    $req = $this->db->prepare('SELECT pseudo,avatar,admin FROM users WHERE email = :email AND password = :password');

    $req->execute(array(
      'email' => $obj->getEmail(),
      'password' => $obj->getPassword()
    ));
    $resultat = $req->fetch();
    if($resultat)
    {
      $_SESSION['pseudo'] = $resultat["pseudo"];
      $_SESSION['avatar'] = $resultat["avatar"];
      $_SESSION['admin'] = $resultat["admin"];
      $_SESSION['connect'] = true;
      return true;
    }
    else
    {
      return false;
    }
  }

}
?>

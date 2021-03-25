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
    $req = $this->db->prepare('SELECT email FROM users WHERE email = :email');

    $req->execute(array(
      'email' => $obj->getEmail()
    ));
    $resultat = $req->fetch();

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
    $req = $this->db->prepare('SELECT idusers,pseudo,avatar,admin FROM users WHERE email = :email AND password = :password');

    $req->execute(array(
      'email' => $obj->getEmail(),
      'password' => $obj->getPassword()
    ));
    $resultat = $req->fetch();
    if($resultat)
    {
      $_SESSION['idusers'] = $resultat["idusers"];
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
//Permet d'ajouter un avatar à l'utilisateur
  public function Addavatar()
  {
      $dir_avatar = "ressources/images/avatar/"; // Dossier d'arrivée
      if($_FILES['avatar']['size'] <= 2097152)  // Si le fichier fait moins de 2Mo
      {
        $path_avatar = $dir_avatar . $_SESSION['pseudo'] . '.' . "png"; // Chemin total avec fichier (DOSSIER/ID.TYPE)
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $path_avatar)) // Move du dossier temp au chemin au dessus
        {
          echo "La miniature a été téléchargée avec succès\n"; // Succès
        }
        else
        {
          echo "Erreur de téléchargement :\n"; // Erreur quelquonque
          print_r($_FILES); // On print tout
        }
      }
      else
      {
        echo "Fichier supérieur à 2MO :\n"; // Erreur quelquonque
        print_r($_FILES); // On print tout
      }
      $req =$this->db->prepare('UPDATE users SET avatar = :avatar WHERE idusers =:idusers;');
      $req->execute(array(
        'avatar' => $_SESSION['avatar'],
        'idusers' => $_SESSION['idusers']
      ));
      $resultat = $req->fetch();
      var_dump($req);
      var_dump($resultat);
      echo "avatar à été changer dans la bdd";
  }
}
?>

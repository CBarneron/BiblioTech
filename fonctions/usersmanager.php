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
      public function delete()
      {
        $req1 = $this->db->prepare('SELECT avatar FROM users WHERE idusers = :idusers');
        $req1->execute(array('idusers' => $_SESSION['idusers']));
        $resultat1 = $req1->fetch();
        var_dump($resultat1);
        if ($resultat1['avatar'] != "default") //On verifie si l'utiliser avait modifier son avatar
        {
          $lien = "ressources/images/avatar/" . $_SESSION['pseudo'] . '.' . "png"; //On supprime l'image
          unlink($lien);
        }

        $req2 = $this->db->prepare('DELETE FROM users WHERE idusers = :idusers'); //On supprime le compte de l'utilisateur de la BDD
        $req2->execute(array(
          'idusers' => $_SESSION['idusers']
        ));

        header('Location: fonctions/deco.php'); //On le déconnecte
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
      if($_FILES['avatar']['size'] <= 2097152)  // Si le fichier fait moins de 2Mo
      {
        $path_avatar = "ressources/images/avatar/" . $_SESSION['pseudo'] . '.' . "png"; // Chemin total avec fichier (DOSSIER/ID.TYPE)
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $path_avatar)) // Move du dossier temp au chemin au dessus
        {
          echo "Votre avatar a été téléchargée avec succès\n"; // Succès
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
      $req = $this->db->prepare('UPDATE users SET avatar = :avatar WHERE idusers = :idusers');
      $req->execute(array(
        'avatar' => $_SESSION['pseudo'],
        'idusers' => $_SESSION['idusers']
      ));
      $resultat = $req->fetch();
  }
  // Fonctions pour changer le pseudo de l'utilisateur
  public function Changerpseudo($obj)
  {
      // On verifie que le pseudo est pas déja pris
      $req1 = $this->db->prepare('SELECT pseudo FROM users WHERE pseudo = :pseudo');
      $req1->execute(array('pseudo' => $obj->getPseudo()));
      $resultat1 = $req1->fetch();
      if(!$resultat1) //On s'occupe de modifier le nom de l'image pour l'avatar
      {
        $path_avatar = "ressources/images/avatar/" . $_SESSION['pseudo'] . '.' . "png";
        if (file_exists($path_avatar))
        {
          $_SESSION['pseudo'] = $obj->getPseudo(); //On change le pseudo dans le cache du site
          if(rename($path_avatar, "ressources/images/avatar/" . $_SESSION['pseudo'] . '.' . "png")) //On rename l'avatar dans le dossier
          {
            $req2 = $this->db->prepare('UPDATE users SET pseudo = :pseudo , avatar = :pseudo WHERE idusers = :idusers');
            $req2->execute(array(
              'pseudo' => $obj->getPseudo(),
              'idusers' => $_SESSION['idusers']
            ));
            $resultat2 = $req2->fetch();
            var_dump($req2);
            var_dump($resultat2);
            if ($resultat2)
            {
              echo "Pseudo changer avec succès !"; //Fin
            }
          }
        }
      }
      else
      {
        echo "<p style=color:red>Pseudo déja utiliser</p>";
      }
    }

//Retirer un users de la BDD
    public function Changerpassword(Users $obj)
    {
      $req = $this->db->prepare('UPDATE users SET password = :password WHERE idusers = :idusers');
      $req->execute(array(
        'password' => $obj->getPassword(),
        'idusers' => $_SESSION['idusers']
      ));
      echo "Mot de passe changer avec succès";
    }
}
?>

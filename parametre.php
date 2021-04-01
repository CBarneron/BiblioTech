<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech-Acceuil</title>
    <link rel="icon" href="ressources/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/parametre.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <script src="js/navbar.js"></script>
    <script src="js/parametre.js"></script>
  </head>
  <body>
    <?php
      session_start();
      require 'fonctions/users.php';
      require 'fonctions/usersmanager.php';
      require 'fonctions/BDD.php';
    ?>
    <div class="navbar" id="navbar">
      <a href="index.php" class="select">BiblioTech<span class="dot">.</span>™</a>
      <a href="livre.php" class="select">Livres</a>
      <a href="#musiques" class="select">Musiques</a>
      <a href="#jeux" class="select">Jeux</a>
      <div class="topBTN">
        <?php
          if(!$_SESSION['connect']) { echo "<a href=\"connexion.php\"><button type=\"button\" name=\"connect\" class=\"connectBTN\">Se connecter</button></a>
                                            <a href=\"inscription.php\"><button type=\"button\" name=\"connect\" class=\"inscrireBTN\">S'inscrire</button></a>";}
          elseif($_SESSION['connect']) { echo "<a href=\"profil.php\"><button type=\"button\" name=\"connect\" class=\"profilBTN\">Profil</button></a>
                                               <a href=\"fonctions/deco.php\" class=\"door\"><img src=\"ressources/images/door.png\" alt=\"déco\" width=\"20px\" onMouseOver=\"this.src='ressources/images/door2.png'\" onmouseout=\"this.src='ressources/images/door.png'\"/></a>"; }
        ?>
      </div>
      <a href="connexion.php"><img src="ressources/images/6.png" class="icon2" alt="profile"></a>
      <a href="javascript:void(0);" class="icon1" onclick="Smartphone()"><i class="fa fa-bars"></i></a>
    </div>
    <br>
    <form method="post" enctype="multipart/form-data">
      <label for="avatar">Changer image de profil :</label>
      <input type="file" name="avatar">
      <input type="submit" name="submit_image" value="Télécharger"><br>
    </form>
    <br><hr><br>
    <form method="post">
      <label for="newpseudo">Changer de pseudo :</label>
      <input type="text" name="newpseudo">
      <input type="submit" name="submit_pseudo" value="Changer"><br>
    </form>
    <br><hr><br>
    <form method="post">
      <label for="newpseudo">Modier votre mot de passe :</label>
      <input type="password" name="mdp1"><br>
      <label for="newpseudo">Vérification du mot de passe :</label>
      <input type="password" name="mdp2">
      <input type="submit" name="submit_password" value="Modifier">
    </form>
    <br><hr><br>
    <div>
      <label for="newpseudo">Supprimer mon profil</label>
      <input type="submit" name="submit_delete" value="Supprimer" onclick="confirmer()"><br>
    </div>
    <div class="fullpage">
      <form method="post" class="confirmation">
        <p>Etes-vous sûr de vouloir supprimer votre profil?</p>
        <input type="submit" name="oui" value="Oui">
        <input type="submit" name="non" value="Non">
      </form>
    </div>
    <?php if(isset($_POST['submit_image'])){$avatarManager = new UsersManager($bdd);$avatarManager ->Addavatar();} ?>
    <?php if(isset($_POST['submit_pseudo'])){$pseudo = new Users($_POST['newpseudo'],"empty","empty");$pseudoManager = new UsersManager($bdd);$pseudoManager->Changerpseudo($pseudo);} ?>
    <?php if(isset($_POST['submit_password']))
          {
            if ($_POST['mdp1'] == $_POST['mdp2'])
            {
              $mdp = new Users("empty","empty",sha1($_POST["mdp1"]));
              $mdpManager = new UsersManager($bdd);
              $mdpManager ->Changerpassword($mdp);
            }
          }
    ?>
    <?php
      if(isset($_POST['oui']))
      {
        $deleteManager = new UsersManager($bdd);
        $deleteManager ->delete();
      }
      elseif(isset($_POST['non']))
      {
        echo "Vous avez bien raison !";
      }
    ?>
    <?php include 'footer.php' ?>

  </body>
</html>

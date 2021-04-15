<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech-Inscription</title>
    <link rel="icon" href="ressources/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/inscription.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <script src="js/navbar.js"></script>
  </head>
  <body>
    <?php
      session_start();
      if($_SESSION['connect']) { header('Location: profil.php');} else {$_SESSION['connect']=false;}
    ?>
    <div class="navbar" id="navbar">
      <a href="index.php" class="select">BiblioTech<span class="dot">.</span>™</a>
      <a href="livre.php" class="select">Livres</a>
      <a href="#films" class="select">Films</a>
      <a href="#jeux" class="select">Jeux</a>
      <div class="topBTN">
        <?php
          if(!$_SESSION['connect']) { echo "<a href=\"connexion.php\"><button type=\"button\" name=\"connect\" class=\"connectBTN\">Se connecter</button></a>
                                            <a href=\"inscription.php\"><button type=\"button\" name=\"connect\" class=\"inscrireBTN\">En cours...</button></a>";}
          elseif($_SESSION['connect']) { echo "<a href=\"profil.php\"><button type=\"button\" name=\"connect\" class=\"profilBTN\">Profil</button></a>
                                              <a href=\"fonctions/deco.php\" class=\"door\"><img src=\"ressources/images/door.png\" alt=\"déco\" width=\"20px\" onMouseOver=\"this.src='ressources/images/door2.png'\" onmouseout=\"this.src='ressources/images/door.png'\"/></a>"; }
        ?>
      </div>
      <a href="connexion.php"><img src="ressources/images/6.png" class="icon2" alt="profile"></a>
      <a href="javascript:void(0);" class="icon1" onclick="Smartphone()"><i class="fa fa-bars"></i></a>
    </div>

    <form action="#" method="post" class="inscription">
      <h2>Devenez membre de BiblioTech !</h2>
      <p>On a besoin de trois infos c'est tout.</p>
      <label for="pseudo">Nom d'utilisateur</label><br>
      <input type="text" name="pseudo" placeholder="Ton futur pseudo" required><br>
      <label for="email">Email</label><br>
      <input type="email" name="email" placeholder="Ton indentifant" required><br>
      <label for="mdp">Mot de passe</label><br>
      <input type="password" name="mdp" placeholder="Ton mot de passe" required>
      <label for="mdp2">Verification du mot de passe</label><br>
      <input type="password" name="mdp2" placeholder="Autant être sûr !" required>
      <input type="submit" name="formBTN" class="formBTN" value="Créer mon compte">
      <a href="connexion.php" class="connect"><p>J'ai déjà un compte BiblioTech.</p></a>
    </form>

    <?php
      require 'fonctions/users.php';
      require 'fonctions/usersmanager.php';
      require 'fonctions/BDD.php';
      if(isset($_POST["formBTN"]))
      {
        $user = new Users($_POST["pseudo"], $_POST["email"], sha1($_POST["mdp"]));
        $manager = new UsersManager($bdd);
        if ($_POST["mdp"] == $_POST["mdp2"])
        {
          if($manager->add($user) == true)
          header('Location: connexion.php');
          else
          {
            echo "<p style=color:red>Ce mail à déja été utiliser</p>";
          }
        }
        else
        {
          echo "<p style=color:red>Les mots de passe ne correspondent pas</p>";
        }
      }
    ?>
    <?php include 'footer.php' ?>

  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech-Profile</title>
    <link rel="icon" href="ressources/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/profil.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <script src="js/navbar.js"></script>
  </head>
  <body>
    <?php
      session_start();
      if(!$_SESSION['connect']) { header('Location: connexion.php');}
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


    <div class="resume">
        <img src="ressources/images/avatar/<?php echo $_SESSION['avatar']; ?>.png" class="resume_userpic" alt="profil_picture_default">
        <figcaption><?php echo $_SESSION['pseudo']; ?></figcaption>
        <span class="un">Nombre Avis</span><span class="deux">Nombre Notes</span>
        <a href="parametre."><img src="ressources/images/parametre.png" class="resume_parametre" alt="parametre"></a>
    </div>

    <div class="menu">
      <ul class="choix">
        <a href="#"><li>Profil</li></a>
        <li class="barre">|</li>
        <a href="#"><li>Collection</li></a>
        <li class="barre">|</li>
        <a href="#"><li>Avis</li></a>
        <li class="barre">|</li>
        <a href="#"><li>Listes</li></a>
        <li class="barre">|</li>
        <a href="#"><li>Amis</li></a>
      </ul>
    </div>
    <div class="menu_smartphone">
      <ul class="choix_smartphone">
        <a href="#"><img src="ressources/images/1.png" class="choix_img" alt="about"></a>
        <li class="barre_smartphone">|</li>
        <a href="#"><img src="ressources/images/7.png" class="choix_img" alt="about"></a>
        <li class="barre_smartphone">|</li>
        <a href="#"><img src="ressources/images/8.png" class="choix_img" alt="about"></a>
        <li class="barre_smartphone">|</li>
        <a href="#"><img src="ressources/images/4.png" class="choix_img" alt="about"></a>
        <li class="barre_smartphone">|</li>
        <a href="#"><img src="ressources/images/2.png" class="choix_img" alt="about"></a>
      </ul>
    </div>

    <br><br><br>
    <p>Bonjour <?php echo $_SESSION['pseudo']; ?></p>

    <?php include 'footer.php' ?>

  </body>
</html>

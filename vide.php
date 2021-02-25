<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech-Vide</title>
    <link rel="icon" href="ressources/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/vide.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <script src="js/vide.js"></script>
  </head>
  <body>

    <div class="navbar" id="navbar">
      <a href="index.html" class="select">BiblioTech<span class="dot">.</span>™</a>
      <a href="#vous-y-êtes-déjà!" class="select">Livres</a>
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
      <a href="#profile"><img src="ressources/images/6.png" class="icon2" alt="profile"></a>
      <a href="javascript:void(0);" class="icon1" onclick="Smartphone()"><i class="fa fa-bars"></i></a>
    </div>

  </body>
</html>

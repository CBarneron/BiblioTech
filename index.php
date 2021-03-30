<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech-Accueil</title>
    <link rel="icon" href="ressources/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">
    <script src="js/navbar.js"></script>
  </head>
  <body>
    <?php
      session_start();
      require 'fonctions/recherche.php';
      require 'fonctions/recherchemanager.php';
      require 'fonctions/BDD.php';
    ?>
    <div class="navbar" id="navbar">
      <a href="#vous-y-êtes-déjà!" class="select active">BiblioTech<span class="dot">.</span>™</a>
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

    <form action="search.php" method="POST" class="search">
      <input type="text" name="titre" placeholder="Recherchez une oeuvre..." id="searchBox" autocomplete="off" class="search-input" oninput=search(this.value)>
      <input type="submit" name="searchBTN" class="search-button" value="">
    </form>


    <hr>
    <div class="section bg-light">
      <div class="container">
        <div class="row">
          <h1 class="title">- Les Livres récents -</h1>
          <div class="carousel-inner py-5">
                <?php //php sur les livres récents
                $actulivre = new Recherche("empty", "livre", "empty");
                $actulivremanager = new RechercheManager($bdd);
                $actulivremanager->news($actulivre)
                ?>

          </div>
        </div>
      </div>
    </div>
    <hr>
    <p class="annonce">- Les Films récents -</p>
    <?php //php sur les livres récents
      $actulivre = new Recherche("empty", "film", "empty");
      $actulivremanager = new RechercheManager($bdd);
      $actulivremanager->news($actulivre)
    ?>
    <hr>
    <p class="annonce">- Les Jeux récents -</p>
    <?php //php sur les livres récents
      $actulivre = new Recherche("empty", "Jeux", "empty");
      $actulivremanager = new RechercheManager($bdd);
      $actulivremanager->news($actulivre)
    ?>

    <?php include 'footer.php' ?>

  </body>
</html>

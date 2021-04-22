<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech-Inscription</title>
    <link rel="icon" href="ressources/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/livre.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">
    <script src="js/navbar.js"></script>
  </head>
  <body>
    <?php
      session_start();
    ?>
    <div class="navbar" id="navbar">
      <a href="index.php" class="select">BiblioTech<span class="dot">.</span>™</a>
      <a href="#vous-y-êtes-déjà!" class="select active">Livres</a>
      <a href="#films" class="select">Films</a>
      <a href="#jeux" class="select">Jeux</a>
      <div class="topBTN">
        <?php
          if(!$_SESSION['connect']) { ?>
            <a href="connexion.php"><button type="button" name="connect" class="connectBTN">Se connecter</button></a>
            <a href="inscription.php"><button type="button" name="connect" class="inscrireBTN">S'inscrire</button></a>
          <?php }
          elseif($_SESSION['connect']) { ?>
            <a href="profil.php"><button type="button" name="connect" class="profilBTN">Profil</button></a>
            <a href="fonctions/deco.php" class="door"><img src="ressources/images/door.png" alt="déco" width="20px" onMouseOver="this.src='ressources/images/door2.png'" onmouseout="this.src='ressources/images/door.png'"/></a>
          <?php } ?>
      </div>
      <a href="connexion.php"><img src="ressources/images/6.png" class="icon2" alt="profile"></a>
      <a href="javascript:void(0);" class="icon1" onclick="Smartphone()"><i class="fa fa-bars"></i></a>
    </div>

    <form action="search.php" method="POST" class="search">
      <input type="text" name="titre" placeholder="Recherchez une oeuvre..." id="searchBox" autocomplete="off" class="search-input" oninput=search(this.value)>
      <input type="submit" name="searchBTN" class="search-button" value="">
    </form>

    <div class="bandeau">

    </div>

    <form class="#" action="" method="post">
      *<label for="titre">Titre de l'oeuvre</label>
      <input type="text" name="titre" value="Titre de l'oeuvre">
      <br>
      <label for="titre">Synopsis de l'oeuvre</label>
      <input type="text" name="synopsis" value="Synopsis de l'oeuvre">
      <br>
      <label for="titre">Synopsis de l'oeuvre</label>
      <input type="text" name="synopsis" value="Synopsis de l'oeuvre">
      <br>
      <label for="categorie">Categorie de l'oeuvre</label>
      <select name="categorie">
        <option value="" selected>--Veuillez choisir une catégorie--</option>
        <option value="livre">Livre</option>
        <option value="film">Film</option>
        <option value="serie">Serie</option>
        <option value="jeux">Jeux</option>
        <option value="musique">Musique</option>
      </select>
      <br>
      <input type="file" name="avatar">
      <br>
      <input type="submit" name="" value="">

    </form>

    <?php include 'footer.php' ?>

  </body>
</html>

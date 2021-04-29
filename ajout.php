<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech-Avis</title>
    <link rel="icon" href="ressources/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/profil.css" rel="stylesheet">
    <link href="css/avis.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/ajout.css" rel="stylesheet">
    <script src="js/navbar.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
  </head>
  <body>
    <?php
      require 'fonctions/recherche.php';
      require 'fonctions/recherchemanager.php';
      require 'fonctions/item.php';
      require 'fonctions/itemmanager.php';
      require 'fonctions/BDD.php';
      session_start();
      if($_SESSION['admin'] == 0){
        header('Location: profil.php');
        exit();
      }
      elseif($_SESSION['admin'] == 1){
        $recherche= new recherche("empty","empty","empty","empty","empty","empty");
        $recherche_manager = new RechercheManager($bdd);


      }?>

      <div class="navbar" id="navbar">
        <a href="index.php" class="select">BiblioTech<span class="dot">.</span>™</a>
        <!-- <a href="livre.php" class="select">Livres</a>
        <a href="#films" class="select">Films</a>
        <a href="#jeux" class="select">Jeux</a> -->
        <div class="topBTN">
          <?php
            if(!$_SESSION['connect']) { ?>
              <a href="connexion.php"><button type="button" name="connect" class="connectBTN">Se connecter</button></a>
              <a href="inscription.php"><button type="button" name="connect" class="inscrireBTN">S'inscrire</button></a>
            <?php }
            elseif($_SESSION['connect']) { ?>
              <a href="profil.php" class="active"><button type="button" name="connect" class="profilBTN">Profil</button></a>
              <a href="fonctions/deco.php" class="door"><img src="ressources/images/door.png" alt="déco" width="20px" onMouseOver="this.src='ressources/images/door2.png'" onmouseout="this.src='ressources/images/door.png'"/></a>
            <?php } ?>
        </div>
        <a href="fonctions/deco.php"><img src="ressources/images/door.png" class="icon2" alt="profile"></a>
        <a href="javascript:void(0);" class="icon1" onclick="Smartphone()"><i class="fa fa-bars"></i></a>
      </div>
      <div style="height:15px;"></div>




      <!-- formulaire ajout item -->
    <div class="global">
      <h2>Ajouter</h2>
      <div class="formulaire">
      <form class="#" action="" method="post">
          <label for="titre">Titre de l'oeuvre</label>
        <input type="text" name="titre" placeholder="Titre de l'oeuvre">
        <br>
          <label for="auteur">auteur de l'oeuvre</label>
        <input type="text" name="auteur" placeholder="auteru de l'oeuvre">
        <br>
          <label for="date">date de l'oeuvre</label>
        <input type="date" name="date" >
        <br>
          <label for="synopsis">Synopsis de l'oeuvre</label>
        <input type="text" name="synopsis" placeholder="Synopsis de l'oeuvre">
        <br>
          <label for="categorie">choisir une categroie</label>
        <select name="categorie">
          <option value="" selected>--Veuillez choisir une catégorie--</option>
          <option value="livre">Livre</option>
          <option value="film">Film</option>
          <option value="serie">Serie</option>
          <option value="jeux">Jeux</option>
          <option value="musique">Musique</option>
        </select>
        <br>
        <input type="file" for="affiche" name="affiche"  class="inputfile">
        <br>
        <input type="submit" class="additem"name="additem" id="additem" value="Ajouter">

      </form>
        <?php
        $recherche->setTitre($_POST["titre"]);
        $recherche->setDate($_POST["date"]);
        $recherche->setSynopsis($_POST["synopsis"]);
        $recherche->setCategorie($_POST["categorie"]);
        $recherche->setAffiche($_POST["affiche"]);
        $recherche->setAuteur($_POST["auteur"]);
        $recherche_manager->additem($recherche)
         ?>



      </div>
      </div>


  </body>

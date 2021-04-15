<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech-Inscription</title>
    <link rel="icon" href="ressources/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/item.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">
    <script src="js/navbar.js"></script>
    <script src="js/item.js"></script>
  </head>
  <body>
    <?php
      session_start();
      require 'fonctions/recherche.php';
      require 'fonctions/recherchemanager.php';
      require 'fonctions/item.php';
      require 'fonctions/itemmanager.php';
      require 'fonctions/BDD.php';
      $item = new Item($_GET['iditem'],$_SESSION['idusers']);
      $item_manager = new ItemManager($bdd);
    ?>
    <div class="navbar" id="navbar">
      <a href="index.php" class="select">BiblioTech<span class="dot">.</span>™</a>
      <a href="#vous-y-êtes-déjà!" class="select active">Livres</a>
      <a href="#films" class="select">Films</a>
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

    <?php //Php qui affiche les infos de l'item
      $recherche = new Recherche("empty", "empty", $_GET['iditem']);
      $recherche_manager = new RechercheManager($bdd);
      $recherche_manager->Affichageitem($recherche);
    ?>

    <form action="search.php" method="POST" class="search">
      <input type="text" name="titre" placeholder="Recherchez une oeuvre..." id="searchBox" autocomplete="off" class="search-input" oninput=search(this.value)>
      <input type="submit" name="searchBTN" class="search-button" value="">
    </form>

    <div class="bandeau">
      <?php echo $recherche->getTitre() . "<img src=\"".$recherche->getAffiche()."\" alt=\"Affiche du livre: ".$recherche->getTitre()."\" width=\"150px\">"; ?>
      <img src="ressources/images/note/8.png" alt="note que vous avez donnez">
      <?php
        if($_SESSION['connect']) { ?>
          <form class="#" method="post">

        <input type="submit" name="addliste" value="+" class="addliste" id="addliste">
      </form>
    <?php } ?>
    </div>
    <?php
    if(isset($_POST["addliste"]))
    {
      if($item_manager->addListe($item))
      {
        ?>
        <script type="text/javascript">listeBTNOK();</script>
        <?php
      }
      else
      {
        ?>
        <script type="text/javascript">listeBTNKO();</script>
        <?php
      }
    }
    ?>
    <div class="lorem">
      <p><?php echo $recherche->getSynopsis();?></p>
    </div>

    <?php //Check du bouton bouton liste à l'instantiation de la page
      if($item_manager->checkListe($item)) { ?>
        <script type="text/javascript">listeBTNOK();</script>
      <?php }
      else { ?>
        <script type="text/javascript">listeBTNKO();</script>
      <?php } ?>

    <?php include 'footer.php' ?>

  </body>
</html>

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
    <link href="css/fontawesome.css"rel="stylesheet">
    <script src="js/navbar.js"></script>
    <script src="js/item.js"></script>
    <script src="js/rating.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
  </head>
  <?php
    session_start();
    require 'fonctions/recherche.php';
    require 'fonctions/recherchemanager.php';
    require 'fonctions/item.php';
    require 'fonctions/itemmanager.php';
    require 'fonctions/BDD.php';
    $item = new Item($_GET['iditem'],$_SESSION['idusers']);
    $item_manager = new ItemManager($bdd);
    $note = $item_manager->giveNotes($item);
  ?>
  <body id="test" onmouseover="giveNote(<?php echo $note; ?>)">
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

    <?php //Php qui permettra d'afficher les infos de l'item
      $recherche = new Recherche("empty", "empty", $_GET['iditem']);
      $recherche_manager = new RechercheManager($bdd);
      $recherche_manager->Affichageitem($recherche);
    ?>

    <form action="search.php" method="POST" class="search">
      <input type="text" name="titre" placeholder="Recherchez une oeuvre..." id="searchBox" autocomplete="off" class="search-input" oninput=search(this.value)>
      <input type="submit" name="searchBTN" class="search-button" value="">
    </form>
    <!-- Script qui affiche la note déja donner si existante -->
    <script type="text/javascript"> giveNote(); </script>

    <div class="bandeau" onmouseover="rate()">
      <?php echo $recherche->getTitre() . "<img src=\"".$recherche->getAffiche()."\" alt=\"Affiche du livre: ".$recherche->getTitre()."\" width=\"150px\">"; ?>
      <?php if($_SESSION['connect']) { //Affiche liste + note + avis si connecter ?>
        <form  class='rating-widget' id="myForm">
          <div class='rating-stars text-center' id="divrate">
            <ul id='stars'>
              <li class='star' id="etoile1" data-value='1' onclick="SubForm()"><i class='fa fa-star fa-fw'></i></li>
              <li class='star' id="etoile2" data-value='2' onclick="SubForm()"><i class='fa fa-star fa-fw'></i></li>
              <li class='star' id="etoile3" data-value='3' onclick="SubForm()"><i class='fa fa-star fa-fw'></i></li>
              <li class='star' id="etoile4" data-value='4' onclick="SubForm()"><i class='fa fa-star fa-fw'></i></li>
              <li class='star' id="etoile5" data-value='5' onclick="SubForm()"><i class='fa fa-star fa-fw'></i></li>
              <li class='star' id="etoile6" data-value='6' onclick="SubForm()"><i class='fa fa-star fa-fw'></i></li>
              <li class='star' id="etoile7" data-value='7' onclick="SubForm()"><i class='fa fa-star fa-fw'></i></li>
              <li class='star' id="etoile8" data-value='8' onclick="SubForm()"><i class='fa fa-star fa-fw'></i></li>
              <li class='star' id="etoile9" data-value='9' onclick="SubForm()"><i class='fa fa-star fa-fw'></i></li>
              <li class='star' id="etoile10" data-value='10' onclick="SubForm()"><i class='fa fa-star fa-fw'></i></li>
            </ul>
          </div>
          <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
              echo $_COOKIE['note'];
              $item->setNote($_COOKIE['note']);
              $item_manager->addNote($item);
            } ?>
          </form>
          <script type="text/javascript">
            function SubForm(){
              $.ajax({
                type: 'post',
                data: $('#myForm').serialize(),
                success: function(){ location.reload(); }
              });
            }
          </script>


          <!-- forms avis -->
          <div class="avis">
                <form class="avis-text"  method="post">
                  <input type="text" name="titreavis" placeholder="donnez un titre a votre avis" >
                  <textarea name="textavis" placeholder="Soumettre votre avis" ></textarea>
                  <button class="btnavis"type="submit" name="addAvis">
                    <i class="fa fa-paper-plane fa-2x"></i>
                  </button>

                  </form>
                <?php
                if(isset($_POST["addAvis"])){
                  $item->setTitreAvis($_POST["titreavis"]);
                  $item->setContenuAvis($_POST["textavis"]);
                  $item_manager->addAvis($item);
                }
                 ?>
              </div>

          <!-- Btn add liste -->
          <form method="post">
            <button type="submit" name="addliste"  class="addliste" id="addliste">
              <i class="far fa-bookmark"></i>
            </button>
          </form>
      <?php } ?>
    </div>
    <?php
    if(isset($_POST["addliste"]))
    {
      if($item_manager->addListe($item)) { ?>
        <script type="text/javascript">listeBTNOK();</script>
      <?php }
      else{ ?>
        <script type="text/javascript">listeBTNKO();</script>
      <?php } } ?>

    <div class="lorem">
      <br><br><br><br><br><br><br>
      <p><?php echo $recherche->getSynopsis();?></p>
    </div>

    <?php //Check du bouton bouton liste à l'instantiation de la page
      if($item_manager->checkListe($item)) { ?>
        <script type="text/javascript">listeBTNOK();</script>
      <?php }
      else { ?>
        <script type="text/javascript">listeBTNKO();</script>
      <?php } ?>

      <!-- affichage avis -->
      <!-- affichage avis -->
      <div class="card">
        <h1>Avis</h1>

        <?php $item_manager->afficherAvis($item)  ?>
      </div>


    <?php include 'footer.php' ?>


  </body>
</html>

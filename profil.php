<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech-Profil</title>
    <link rel="icon" href="ressources/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/profil.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/collection.css" rel="stylesheet">
    <script src="js/navbar.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
  </head>
  <body>
    <?php
      require 'fonctions/users.php';
      require 'fonctions/usersmanager.php';
      require 'fonctions/recherche.php';
      require 'fonctions/recherchemanager.php';
      require 'fonctions/item.php';
      require 'fonctions/itemmanager.php';
      require 'fonctions/BDD.php';
      session_start();
      if(!$_SESSION['connect']) { header('Location: connexion.php');}
      $req = $bdd->prepare('SELECT avatar FROM users WHERE pseudo = :pseudo');
      $req->execute(array('pseudo' => $_SESSION['pseudo']));
      $resultat = $req->fetch();
      if($resultat){$_SESSION['avatar'] = $resultat["avatar"];}

      $user = new Users($_SESSION['pseudo'],"empty","empty",$_SESSION['idusers']);
      $usermanager = new UsersManager($bdd);
      $profil = new Item("empty",$user->getIdUsers());
      $profilmanager = new ItemManager($bdd);

      unset($_COOKIE['note']);
    ?>
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

    <div class="resume">
      <div class="avatar" style="background-image: url('ressources/images/avatar/<?php echo $_SESSION['avatar']; ?>.png');"></div>
      <figcaption><?php echo $user->getPseudo(); ?></figcaption>
      <?php if ($_SESSION['admin']==1) {?>  <a href="ajout.php"><img src="ressources/images/4.png" class="admin" alt="administration"></a><?php ;}?>
      <a href="parametre.php"><img src="ressources/images/parametre.png" class="parametre" alt="parametre"></a>
      <span class="un"><?php echo $profilmanager->nbNotes($profil); ?> Notes</span>
      <span class="deux"><?php echo $profilmanager->nbAvis($profil); ?> Avis</span>
    </div>

    <div class="menu">
      <ul class="choix">
        <a href="#" class="active"><li>Profil</li></a>
        <li class="barre">|</li>
        <a href="collection.php"><li>Collection</li></a>
        <li class="barre">|</li>
        <a href="avis.php"><li>Avis</li></a>
        <li class="barre">|</li>
        <a href="liste.php"><li>Liste</li></a>
        <li class="barre">|</li>
        <a href="amis.php"><li>Amis</li></a>
      </ul>
    </div>
    <div class="menu_smartphone">
      <ul class="choix_smartphone">
        <a href="#"><img src="ressources/images/6.png" class="choix_img" alt="about"></a>
        <li class="barre_smartphone">|</li>
        <a href="collection.php"><img src="ressources/images/7.png" class="choix_img" alt="about"></a>
        <li class="barre_smartphone">|</li>
        <a href="avis.php"><img src="ressources/images/8.png" class="choix_img" alt="about"></a>
        <li class="barre_smartphone">|</li>
        <a href="liste.php"><img src="ressources/images/5.png" class="choix_img" alt="about"></a>
        <li class="barre_smartphone">|</li>
        <a href="amis.php"><img src="ressources/images/2.png" class="choix_img" alt="about"></a>
      </ul>
    </div>
    <br>
    <!-- Information sur le profil -->
    <section class="about">
      <div class="gauche bio">
        <h1>Biographie de <?php echo $user->getPseudo(); ?></h1>
        <p><?php echo $usermanager->Bio($user); ?></p>
      </div>
      <div class="gauche">
        <h1>Livre, Film et Jeux préferés</h1>
        <p>Livre : <?php echo $usermanager->LivreFAV($user); ?></p>
        <p>Film : <?php echo $usermanager->FilmFAV($user); ?></p>
        <p>Jeux : <?php echo $usermanager->JeuxFAV($user); ?></p>
      </div>
      <div class="gauche">
        <h1>Contacts</h1>
        <p><?php echo $usermanager->Contact($user); ?></p>
      </div>
      <div class="gauche">
        <h1>Artistes favoris</h1>
        <p><?php echo $usermanager->Artiste($user); ?></a></p>
      </div>

      <h1 class="carou">10 dernières notes</h1>
      <div class="carousel">
      <?php
        $collection = new Recherche("empty", "empty", "empty");
        $collection->setUserId($user->getIdUsers());
        $collectionmanager = new RechercheManager($bdd);
        $collectionmanager->last($collection);
      ?>
      </div>
    </section>

    <?php include 'footer.php' ?>

  </body>
</html>

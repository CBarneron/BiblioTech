<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech-Avis</title>
    <link rel="icon" href="ressources/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/profil.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
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
      if(!$_SESSION['connect']) { header('Location: connexion.php');}

      $req = $bdd->prepare('SELECT avatar FROM users WHERE pseudo = :pseudo');
      $req->execute(array('pseudo' => $_SESSION['pseudo']));
      $resultat = $req->fetch();
      if($resultat){$_SESSION['avatar'] = $resultat["avatar"];}
      $profil = new Item("empty",$_SESSION['idusers']);
      $profilmanager = new ItemManager($bdd);
      
    ?>
    <div class="navbar" id="navbar">
      <a href="index.php" class="select">BiblioTech<span class="dot">.</span>™</a>
      <a href="livre.php" class="select">Livres</a>
      <a href="#films" class="select">Films</a>
      <a href="#jeux" class="select">Jeux</a>
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
      <a href="connexion.php"><img src="ressources/images/6.png" class="icon2" alt="profile"></a>
      <a href="javascript:void(0);" class="icon1" onclick="Smartphone()"><i class="fa fa-bars"></i></a>
    </div>

    <div style="height:15px;"></div>

    <div class="resume">
      <div class="avatar" style="background-image: url('ressources/images/avatar/<?php echo $_SESSION['avatar']; ?>.png');"></div>
      <figcaption><?php echo $_SESSION['pseudo']; ?></figcaption>
      <?php if ($_SESSION['admin']==1) {?>  <a href="admin.php"><img src="ressources/images/4.png" class="admin" alt="administration"></a><?php ;}?>
      <a href="parametre.php"><img src="ressources/images/parametre.png" class="parametre" alt="parametre"></a>
      <span class="un"><?php echo $profilmanager->nbNotes($profil); ?> Notes</span>
      <span class="deux"><?php echo $profilmanager->nbAvis($profil); ?> Avis</span>
    </div>

    <div class="menu">
      <ul class="choix">
        <a href="profil.php"><li>Profil</li></a>
        <li class="barre">|</li>
        <a href="collection.php"><li>Collection</li></a>
        <li class="barre">|</li>
        <a href="#" class="active"><li>Avis</li></a>
        <li class="barre">|</li>
        <a href="liste.php"><li>Liste</li></a>
        <li class="barre">|</li>
        <a href="amis.php"><li>Amis</li></a>
      </ul>
    </div>
    <div class="menu_smartphone">
      <ul class="choix_smartphone">
        <a href="profil.php"><img src="ressources/images/1.png" class="choix_img" alt="about"></a>
        <li class="barre_smartphone">|</li>
        <a href="collection.php"><img src="ressources/images/7.png" class="choix_img" alt="about"></a>
        <li class="barre_smartphone">|</li>
        <a href="#"><img src="ressources/images/13.png" class="choix_img" alt="about"></a>
        <li class="barre_smartphone">|</li>
        <a href="liste.php"><img src="ressources/images/5.png" class="choix_img" alt="about"></a>
        <li class="barre_smartphone">|</li>
        <a href="amis.php"><img src="ressources/images/2.png" class="choix_img" alt="about"></a>
      </ul>
    </div>

    <br><br><br>
    <p>On ne vous pas encore demander votre avis? Si?</p>

    <?php include 'footer.php' ?>

  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech-Parametre</title>
    <link rel="icon" href="ressources/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/parametre.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <script src="js/navbar.js"></script>
    <script src="js/parametre.js"></script>
  </head>
  <body>
    <?php
      session_start();
      require 'fonctions/users.php';
      require 'fonctions/usersmanager.php';
      require 'fonctions/BDD.php';
      $users = new Users($_SESSION["pseudo"], "empty", "empty", $_SESSION["idusers"]);
      $users_manager = new UsersManager($bdd);
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
            <a href="profil.php"><button type="button" name="connect" class="profilBTN">Profil</button></a>
            <a href="fonctions/deco.php" class="door"><img src="ressources/images/door.png" alt="déco" width="20px" onMouseOver="this.src='ressources/images/door2.png'" onmouseout="this.src='ressources/images/door.png'"/></a>
          <?php } ?>
      </div>
      <a href="connexion.php"><img src="ressources/images/6.png" class="icon2" alt="profile"></a>
      <a href="javascript:void(0);" class="icon1" onclick="Smartphone()"><i class="fa fa-bars"></i></a>
    </div>
    <a href="profil.php"><img src="ressources/images/back.png" class="back" alt="Revenir sur profil"></a>
    <br><br>
    <div class="global">
      <h2>Le principal</h2>
      <!-- <div class="avatar" style="background-image: url('ressources/images/avatar/<?php// echo $_SESSION['avatar']; ?>.png');"></div> -->
      <form method="post" enctype="multipart/form-data" class="formImage">
        <label>Changer mon image</label>
        <br><br>
        <input type="file" name="avatar" id="avatar" class="inputfile" />
        <label for="avatar" class="choose">Choisir un fichier</label>
        <br><br>
        <input type="submit" name="submit_image" value="Valider"><br>
      </form>
      <form method="post" class="formPseudo">
        <label for="newpseudo">Pseudo</label>
        <br>
        <input type="text" name="newpseudo" value="<?php echo $users->getPseudo(); ?>">
        <input type="submit" name="submit_pseudo" value="Changer"><br>
      </form>
      <br>
      <form method="post" class="formMdp">
        <label for="mdp1">Modifier votre mot de passe :</label>
        <br>
        <input type="password" name="mdp1" placeholder="Nouveau mot de passe">
        <input type="password" name="mdp2" placeholder="Histoire d'être sûr !">
        <input type="submit" name="submit_password" value="Modifier">
      </form>
      <br><hr>
      <h2>A propos de vous</h2>
      <form method="post" class="form_apropos">
        <!-- Biographie -->
        <label for="bio">Biographie</label>
        <br>
        <textarea name="bio"><?php echo $users_manager->Bio($users); ?></textarea>
        <br><br>
        <!-- Contact -->
        <label for="contact">Contact</label>
        <br>
        <input type="text" name="contact" value="<?php echo $users_manager->Contact($users); ?>">
        <br><br>
        <!-- Artistes Favoris -->
        <label for="artiste">Artistes Favoris</label>
        <br>
        <input type="text" name="artiste" value="<?php echo $users_manager->Artiste($users); ?>">
        <br><br>
        <!-- Favoris -->
        <div class="favoris">
          <div class="favoris-child">
            <label for="livre">Livre Favoris</label><br>
            <input type="text" name="livre" value="<?php echo $users_manager->LivreFAV($users); ?>">
          </div>
          <div class="favoris-child">
            <label for="film" class="film">Film Favoris</label><br>
            <input type="text" name="film" value="<?php echo $users_manager->FilmFAV($users); ?>">
          </div>
          <div class="favoris-child">
            <label for="jeux">Jeux Favoris</label><br>
            <input type="text" name="jeux" value="<?php echo $users_manager->JeuxFAV($users); ?>">
          </div>
        </div>
        <br><br>
        <input type="submit" name="submit_apropos" onclick="refresh()" value="Changer"><!-- Submit toutes les modifications a propos -->
      </form>
      <br><hr><br>
      <div class="delete">
        <label for="submit_delete">Supprimer mon profil</label><br><br>
        <input type="submit" name="submit_delete" value="Supprimer" onclick="confirmer()"><br>
      </div>
      <div class="fullpage">
        <form method="post" class="confirmation">
          <p>Etes-vous sûr de vouloir supprimer votre profil?</p>
          <input type="submit" name="oui" value="Oui">
          <input type="submit" name="non" value="Non">
        </form>
      </div>
      <?php if(isset($_POST['submit_apropos']))
      {
        $users->setBio($_POST['bio']);
        $users->setArtiste($_POST['artiste']);
        $users->setLivreFAV($_POST['livre']);
        $users->setFilmFAV($_POST['film']);
        $users->setJeuxFAV($_POST['jeux']);
        $users->setContact($_POST['contact']);
        $users_manager->Changeapropos($users);
      }
      ?>
      <?php if(isset($_POST['submit_image'])){$users_manager->ChangeAvatar();} ?>
      <?php if(isset($_POST['submit_pseudo'])){$users->setPseudo($_POST['newpseudo']);$users_manager->Changerpseudo($users);} ?>
      <?php if(isset($_POST['submit_password']))
            {
              if (!empty($_POST['mdp1'])||!empty($_POST['mdp2']))
              {
                if ($_POST['mdp1'] == $_POST['mdp2'])
                {
                  $users->setPassword(sha1($_POST["mdp1"]));
                  $users_manager->Changepassword($mdp);
                }
              }
            }
      ?>
      <?php
        if(isset($_POST['oui'])) { $users_manager->delete(); }
        elseif(isset($_POST['non'])) { echo "Vous avez bien raison !"; }
      ?>
    </div>
    <?php include 'footer.php' ?>
  </body>
</html>

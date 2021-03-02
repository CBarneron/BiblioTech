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

    <form action="#recherche" class="search">
      <input type="search" value="" placeholder="Recherchez une oeuvre..." class="search-input">
      <input type="submit" class="search-button" value="">
    </form>

    <div class="bandeau">

    </div>
    <div class="lorem">
      <p>
      test

        Mauris congue vitae risus condimentum gravida. Pellentesque dignissim aliquet nulla ut tincidunt. Aliquam pulvinar ac odio nec semper. Proin cursus hendrerit lacus eget molestie. Ut finibus convallis orci vitae dapibus. Fusce facilisis accumsan ultricies. Sed facilisis lacinia diam, ut tincidunt ligula. In sed lorem at lectus porttitor consectetur iaculis id nunc. Praesent eu viverra quam. Nunc sollicitudin, est eu congue rutrum, est eros consequat ipsum, quis eleifend nunc nisi quis mauris. Curabitur vitae erat fermentum, semper nunc non, sodales diam. In hac habitasse platea dictumst. Morbi orci purus, dignissim eu condimentum et, posuere vel risus. Donec luctus pharetra tempor. Ut eget bibendum odio.

        Mauris cursus vitae magna ut cursus. Sed tincidunt erat purus, a pretium nisl blandit vel. Donec consequat dui sit amet lobortis ultricies. Nulla et ligula sollicitudin, molestie diam eget, bibendum nunc. Proin tristique quam ornare pulvinar dignissim. Ut a aliquam nisi. Cras leo mauris, lacinia sit amet placerat a, maximus at enim. Vestibulum sollicitudin at nunc eget porta.

        Cras consequat orci quis suscipit semper. Suspendisse accumsan fposuere urna. Integer eget euismod nisl. Etiam nisl erat, porttitor sit amet pharetra et, accumsan quis tortor. Nullam ut tellus a nisl molestie accumsan. Integer malesuada pulvinar magna sed porta. Duis lobortis purus turpis, viverra pretium est dapibus sed. Quisque placerat posuere felis ut scelerisque. Vivamus purus arcu, viverra in turpis vitae, lacinia lacinia erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam id luctus justo. Vivamus non finibus quam. Duis at luctus eros. Praesent pretium ex vel nibh facilisis porta. Suspendisse iaculis mauris dolor, ac lacinia lacus pulvinar sodales. Duis mollis neque sed ligula elementum viverra.
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eleifend porttitor eros sed blandit. Aenean libero felis, commodo non faucibus euismod, porta vel purus. Ut facilisis, neque eu ornare porttitor, nisl nunc finibus magna, et eleifend nulla nibh id augue. Nunc vehicula sed lectus in posuere. Etiam eu faucibus elit. Proin venenatis tristique sapien quis commodo. Duis tempor eleifend massa, vitae venenatis sapien consequat a. Nunc posuere condimentum lorem eget rhoncus. Nulla risus ligula, viverra in mattis sit amet, volutpat ac ante.

        Mauris congue vfitae risus condimentum gravida. Pellentesque dignissim aliquet nulla ut tincidunt. Aliquam pulvinar ac odio nec semper. Proin cursus hendrerit lacus eget molestie. Ut finibus convallis orci vitae dapibus. Fusce facilisis accumsan ultricies. Sed facilisis lacinia diam, ut tincidunt ligula. In sed lorem at lectus porttitor consectetur iaculis id nunc. Praesent eu viverra quam. Nunc sollicitudin, est eu congue rutrum, est eros consequat ipsum, quis eleifend nunc nisi quis mauris. Curabitur vitae erat fermentum, semper nunc non, sodales diam. In hac habitasse platea dictumst. Morbi orci purus, dignissim eu condimentum et, posuere vel risus. Donec luctus pharetra tempor. Ut eget bibendum odio.

        Mauris cursus vitae magna ut cursus. Sed tincidunt erat purus, a pretium nisl blandit vel. Donec consequat dui sit amet lobortis ultricies. Nulla et ligula sollicitudin, molestie diam eget, bibendum nunc. Proin tristique quam ornare pulvinar dignissim. Ut a aliquam nisi. Cras leo mauris, lacinia sit amet placerat a, maximus at enim. Vestibulum sollicitudin at nunc eget porta.

        Cras consequat orci quis suscipit semper. Suspendisse accumsan posuere urna. Integer eget euismod nisl. Etiam nisl erat, porttitor sit amet pharetra et, accumsan quis tortor. Nullam ut tellus a nisl molestie accumsan. Integer malesuada pulvinar magna sed porta. Duis lobortis purus turpis, viverra pretium est dapibus sed. Quisque placerat posuere felis ut scelerisque. Vivamus purus arcu, viverra in turpis vitae, lacinia lacinia erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam id luctus justo. Vivamus non finibus quam. Duis at luctus eros. Praesent pretium ex vel nibh facilisis porta. Suspendisse iaculis mauris dolor, ac lacinia lacus pulvinar sodales. Duis mollis neque sed ligula elementum viverra.
      </p>
    </div>

    <?php include 'footer.php' ?>

  </body>
</html>

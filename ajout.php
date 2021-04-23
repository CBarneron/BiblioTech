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
      if($_SESSION['admin'] = 0){ ?>
            <script>alert("vous n'avez pas les droits admin")</script>
          <?php }
                  else(){





                  }?>




      ?>

  </body>

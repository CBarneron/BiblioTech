<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioTech-Connexion</title>
    <link rel="icon" href="ressources/images/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/connexion.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <script src="js/navbar.js"></script>
  </head>
  <body>
    <?php
      session_start();
      if($_SESSION['connect']) { header('Location: profil.php');} else {$_SESSION['connect']=false;}
    ?>
    <div class="navbar" id="navbar">
      <a href="index.php" class="select">BiblioTech<span class="dot">.</span>™</a>
      <a href="livre.php" class="select">Livres</a>
      <a href="#films" class="select">Films</a>
      <a href="#jeux" class="select">Jeux</a>
      <div class="topBTN">
        <a href="#vous-y-êtes-déjà!"><button type="button" name="connect" class="connectBTN active">En cours...</button></a>
        <a href="inscription.php"><button type="button" name="connect" class="inscrireBTN">S'inscrire</button></a>
      </div>
      <a href="#vous-y-êtes-déjà"><img src="ressources/images/6.png" class="icon2" alt="profile"></a>
      <a href="javascript:void(0);" class="icon1" onclick="Smartphone()"><i class="fa fa-bars"></i></a>
    </div>

    <form action="#" method="post" class="connexion">
      <h2>Se connecter à BiblioTech !</h2>
      <p class="connexion_annonce">Plus qu'une étape et c'est bon pour nous.</p>
      <label for="email">Email</label><br>
      <input type="email" name="email" placeholder="Ton indentifant"><br>
      <label for="mdp">Mot de passe</label><br>
      <input type="password" name="mdp" placeholder="Ton mot de passe">
      <input type="submit" name="formBTN" class="formBTN" value="Connexion">
      <a href="inscription.php" class="inscrire"><p>Je n'ai pas de compte BiblioTech.</p></a>
    </form>

    <?php
      require 'fonctions/users.php';
      require 'fonctions/usersmanager.php';
      require 'fonctions/BDD.php';

      if(isset($_POST["formBTN"]))
      {
        $password = sha1($_POST["mdp"]);
        $user = new Users("empty", $_POST["email"], $password, "empty");
        $manager = new UsersManager($bdd);


        if($manager->connect($user) == true)
        {
          header('Location: profil.php');
        }
        else
        {
          echo "<p style=color:red>Information incorrect : veuillez vérifier le mail ou le mot de passe !</p>";
        }
      }
    ?>

    <div style="height:50px;">

    </div>

    <?php include 'footer.php' ?>

  </body>
</html>

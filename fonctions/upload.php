<?php
if(isset($_POST['submit_upload']))
{
  $dir_avatar = "ressources/images/avatar/"; // Dossier d'arrivée
  if($_FILES['avatar']['size'] <= 2097152)  // Si le fichier fait moins de 2Mo
  {
    $path_avatar = $dir_avatar . $_SESSION['pseudo'] . '.' . "png"; // Chemin total avec fichier (DOSSIER/ID.TYPE)
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $path_avatar)) // Move du dossier temp au chemin au dessus
    {
      echo "La miniature a été téléchargée avec succès\n"; // Succès
    }
    else
    {
      echo "Erreur de téléchargement :\n"; // Erreur quelquonque
      print_r($_FILES); // On print tout
    }
    else{
      echo "FIchier supérieur à 2MO :\n"; // Erreur quelquonque
      print_r($_FILES); // On print tout
    }
  }
}
  ?>

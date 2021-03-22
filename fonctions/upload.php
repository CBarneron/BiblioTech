<?php
$target_dir = "../ressources/images/avatar/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "C'est une image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "Ce n'est pas une image!";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "L'image existe déja.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Désoler, votre images est trop lourde.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
{
  echo "Ici, nous n'acceptons que les .jpg, .png et .jpeg!";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Désoler, nous ne pouvons telecharger votre images... :(";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "L'image ". htmlspecialchars(basename( $_FILES["fileToUpload"]["name"])). " à été telecharger.";
  } else {
    echo "Désoler le telechargement à été interrompu.";
  }
}
?>

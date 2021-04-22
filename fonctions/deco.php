<?php
session_start();
unset($_SESSION['pseudo']);
unset($_SESSION['avatar']);
unset($_COOKIE['note']);
$_SESSION['connect'] = false;

header('Location: ../connexion.php');
?>

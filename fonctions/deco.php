<?php
session_start();
unset($_SESSION['pseudo']);
unset($_SESSION['avatar']);
$_SESSION['connect'] = false;

header('Location: ../index.php');
?>

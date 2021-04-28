<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=BiblioTech', 'bibliotech' , 'joxTbcW');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bibliotech', 'bibliotech' , 'joxTbcW');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>

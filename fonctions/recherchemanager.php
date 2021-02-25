<?php
class RechercheManager
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }
  //Rechercher une list d'item selon leurs catégorie
  public function news(Recherche $obj)
  {
    $pre = $this->db->prepare('SELECT titre,affiche FROM item WHERE categorie = :categorie ORDER BY dateitem ASC');

    $pre->execute(array(
      'categorie' => $obj->getCategorie()
    ));

    $resultat = $pre->fetchAll();
    //echo $resultat[0]."|".$resultat[1]." | test c'est pas le vraie résultat la";
    //Ajout des affiche et des titres dans des tableau

    //echo "Le tableau à une longeur de ".count($resultat)."<br/><br/>";
    //var_dump($resultat);

    $i = 0;
    foreach ($resultat as $row) {
      echo "<h3 class=\"news\">".$row["titre"]."</h3>";
      $i++;
    }
    echo "<br/><br/>";
    foreach ($resultat as $row) {
      echo "<img class=\"newsaffiche\" src=\"".$row["affiche"]."\" alt=\"Affiche du livre: ".$row["titre"]."\" width=\"150px\">";
      $i++;
    }
  }
}
?>

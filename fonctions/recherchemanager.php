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
    $pre = $this->db->prepare('SELECT titre,affiche FROM item WHERE categorie = :categorie ORDER BY dateitem DESC');

    $pre->execute(array(
      'categorie' => $obj->getCategorie()
    ));

    $resultat = $pre->fetchAll();
    //Ajout des affiche et des titres dans des tableau
    $i = 0;
    foreach ($resultat as $row) {
      echo "<figure>
              <img src=\"".$row["affiche"]."\" alt=\"Affiche du livre: ".$row["titre"]."\" width=\"150px\">
              <figcaption>".$row["titre"]."</figcaption>
            </figure>";
      $i++;
      if($i>10)
      {
        break;
      }
    }
  }
}
?>

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
    $pre = $this->db->prepare('SELECT iditem,titre,affiche FROM item WHERE categorie = :categorie ORDER BY dateitem DESC');

    $pre->execute(array(
      'categorie' => $obj->getCategorie()
    ));

    $resultat = $pre->fetchAll();
    //Ajout des affiche et des titres dans des tableau
    $i = 0;
    foreach ($resultat as $row) {
      echo "<a href=\"item.php?iditem=".$row["iditem"]."\">
              <figure>
                <img src=\"".$row["affiche"]."\" alt=\"Affiche du livre: ".$row["titre"]."\" width=\"150px\">
                <figcaption>".$row["titre"]."</figcaption>
              </figure>
            </a>";
      $i++;
      if($i>10)
      {
        break;
      }
    }
  }
  //Redirection vers la page de l'item voulu
  public function item(Recherche $obj)
  {
    $pre = $this->db->prepare('SELECT titre,auteur,affiche,synopsis FROM item WHERE iditem = :iditem');

    $pre->execute(array(
      'iditem' => $obj->getIditem()
    ));

    $resultat = $pre->fetchAll();
    $i = 0;

    foreach ($resultat as $row)
    {
      $obj->setTitre($row["titre"]);
      $obj->setAuteur($row["auteur"]);
      $obj->setAffiche($row["affiche"]);
      $obj->setSynopsis($row["synopsis"]);
      $i++;
    }
  }
}
?>

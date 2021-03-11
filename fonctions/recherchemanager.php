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
      echo "
      <div class=\"carousel-item\">
        <a href=\"item.php?iditem=".$row["iditem"]."\">
          <img src=\"".$row["affiche"]."\" alt=\"Affiche du livre: ".$row["titre"]."\" width=\"150px\">
        </a>
      </div>";
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


  //Recherche
  public function viewData()
  {
    $pre = $this->db->prepare('SELECT titre FROM item ORDER BY titre DESC');
    $pre->execute();
    $resultat = $pre->fetchAll(PDO::FETCH_ASSOC);
    return $resultat;
  }

  public function searchData($titre)
  {
    $pre = $this->db->prepare('SELECT titre FROM item WHERE titre like :titre ORDER BY titre DESC');
    $pre->execute(['titre' => "%" . $titre . "%"]);
    $resultat = $pre->fetchAll(PDO::FETCH_ASSOC);
    return $resultat;
  }

  //Rechercher une list d'item selon leurs catégorie
  public function search(Recherche $obj)
  {
    $pre = $this->db->prepare('SELECT iditem,titre,affiche FROM item WHERE titre like :titre ORDER BY titre DESC');
    $pre->execute(['titre' => "%" . $obj->getSearch() . "%"]);
    $resultat = $pre->fetchAll();
    //Ajout des affiche et des titres dans des tableau
    $y = count($resultat);
    if($y == 0)
    {
      echo "Aucun de nos article ne correspondent à votre recherche... Réessayer !";
    }
    else if($y >> 0)
    {
      $i = 0;
      foreach ($resultat as $row)
      {
        echo "<a href=\"item.php?iditem=".$row["iditem"]."\">
                <figure>
                  <img src=\"".$row["affiche"]."\" alt=\"Affiche du livre: ".$row["titre"]."\" width=\"150px\">
                  <figcaption>".$row["titre"]."</figcaption>
                </figure>
              </a>";
          $i++;
          if($i>$resultat)
          {
            break;
          }
      }
    }
  }
}
?>

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
    /*$titre = [];
    $affiche = [];*/
    echo "Le tableau à une longeur de ".count($resultat)."<br/><br/>";
    var_dump($resultat);
    /*for($i=0; $i<count($resultat);$i++)
    {
      echo $resultat[$i]."<br/>";
    }*/
    $i = 0;
    foreach ($resultat as $row) {
      echo $row["titre"]."<br/>".$row["affiche"]."<br/>";
      $i++;
    }
  }
}
?>

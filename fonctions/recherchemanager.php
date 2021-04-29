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
    foreach ($resultat as $row)
    {
      echo "<a href=\"item.php?iditem=".$row["iditem"]."\">
              <img src=\"".$row["affiche"]."\" alt=\"Affiche du livre: ".$row["titre"]."\" class=\"carousel-item\">
            </a>";
      $i++;
      if($i>15)
      {
        break;
      }
    }
  }
  //Redirection vers la page de l'item voulu
  public function Affichageitem(Recherche $obj)
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
  //Permet d'afficher la liste de souhaits de l'utilisateur
  public function afficherListe(Recherche $obj)
  {
    $pre = $this->db->prepare(' SELECT i.iditem,i.titre,i.affiche FROM item i
                                INNER JOIN liste l on i.iditem = l.iditem
                                WHERE i.categorie = :categorie AND l.idusers = :idusers
                                ORDER BY i.dateitem DESC
                              ');
    $pre->execute(array(
      'categorie' => $obj->getCategorie(),
      'idusers' => $obj->getUserId()
    ));
    $resultat = $pre->fetchAll();
    //Ajout des affiche et des titres dans des tableau
    foreach ($resultat as $row)
    {
      echo "<a href=\"item.php?iditem=".$row["iditem"]."\"><img src=\"".$row["affiche"]."\" alt=\"Affiche du livre: ".$row["titre"]."\" class=\"carousel-item\"></a>";
    }
  }

  //Permet d'afficher la liste des item noté par l'utilisateur
  public function afficherCollection(Recherche $obj)
  {
    $pre = $this->db->prepare(' SELECT i.iditem,i.titre,i.affiche,n.note FROM item i
                                INNER JOIN note n on i.iditem = n.iditem
                                WHERE i.categorie = :categorie AND n.idusers = :idusers
                                ORDER BY n.note DESC
                              ');
    $pre->execute(array(
      'categorie' => $obj->getCategorie(),
      'idusers' => $obj->getUserId()
    ));
    $resultat = $pre->fetchAll();
    //Ajout des affiche et des titres dans des tableau
    foreach ($resultat as $row)
    {
      echo "<div class=\"item\"><a href=\"item.php?iditem=".$row["iditem"]."\"><img src=\"".$row["affiche"]."\"/><p class=\"note\">".$row["note"]."</p></a></div>";
    }
  }
  //Affiche les 4 dernieres note de l'utilisateur dans profil
  public function last(Recherche $obj)
  {
    $pre = $this->db->prepare(' SELECT i.iditem,i.titre,i.affiche,n.note FROM item i
                                INNER JOIN note n on i.iditem = n.iditem
                                WHERE n.idusers = :idusers
                                ORDER BY n.note DESC
                              ');
    $pre->execute(array(
      'idusers' => $obj->getUserId()
    ));
    $resultat = $pre->fetchAll();
    //Ajout des affiche et des titres dans des tableau
    $i = 0;
    foreach ($resultat as $row)
    {
      echo "<div class=\"item\"><a href=\"item.php?iditem=".$row["iditem"]."\"><img src=\"".$row["affiche"]."\"/><p class=\"note\">".$row["note"]."</p></a></div>";
      $i++;
      if($i>=10)
      {
        break;
      }
    }
  }
  public function additem(recherche $obj){

    $pre = $this->db->prepare('SELECT titre,auteur
                                From item
                                WHERE auteur = :auteur and titre= :titre
                                ');
    $pre -> execute(array(

      'auteur'=> $obj->getAuteur(),
      'titre'=> $obj->getTitre()
    ));
    $resultat = $pre->fetch();


    if ($resultat['auteur']== $obj->getAuteur() && $resultat['titre']== $obj->getTitre()) {

    }
    elseif (!$resultat['auteur']== $obj->getAuteur() || !$resultat['titre']== $obj->getTitre())
     {



      $pre2= $this->db->prepare('INSERT INTO item(titre,categorie,auteur,dateitem,synopsis,affiche)
                              VALUES(:titre,:categorie,:auteur,:dateitem,:synopsis,:affiche)
                            ');
      $pre2->execute(array(

        'titre'=>$obj->getTitre(),
        'categorie'=>$obj->getCategorie(),
        'auteur'=>$obj->getAuteur(),
        'dateitem'=>$obj->getDate(),
        'synopsis'=>$obj->getSynopsis(),
        'affiche'=>$obj->getAffiche()
      ));

    }
  }

}
?>

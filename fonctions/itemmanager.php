<?php
class ItemManager
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  //Ajouter une note
  public function addNote(Item $obj)
  {
    $req = $this->db->prepare('SELECT idnote FROM note WHERE idusers = :idusers and iditem = :iditem');

    $req->execute(array(
      'idusers' =>$obj->getIdUser(),
      'iditem'=>$obj->getIdItem()
    ));
    $resultat= $req->fetch();

    if ($resultat)
    {
      $req2 = $this->db->prepare('UPDATE note SET note = :note WHERE idusers = :idusers and iditem = :iditem');
      $req2->execute(array(
        'note' =>$obj->getNote(),
        'idusers' =>$obj->getIdUser(),
        'iditem' =>$obj->getIdItem()
      ));
    }
    else if (!$resultat)
    {
      $req3 = $this->db->prepare('INSERT INTO note(note,iditem,idusers)VALUES(:note,:iditem,:idusers)');
      $req3->execute(array(
        'note' =>$obj->getNote(),
        'iditem' =>$obj->getIdItem(),
        'idusers' =>$obj->getIdUser()
      ));
    }
    unset($_COOKIE['note']);
  }
  //Donne la moyenen des notes d'un item
    public function MoyNotes(Item $obj)
    {
      $pre = $this->db->prepare('SELECT AVG(note) as Moyenne FROM note WHERE iditem = :iditem');
      $pre->execute(array( 'iditem' => $obj->getIdItem() ));
      $resultat = $pre->fetch();
      if ($resultat['Moyenne'] >= 0 && $resultat['Moyenne'] <=10)
      {
        $moyenne = substr($resultat['Moyenne'], 0, 3);  // Reduit la moyenn{e au dixieme
        return $moyenne;
      }
      else
      {
        echo "Non Noté";
      }
    }
  //Verifie si l'item est déja dans la liste de l'utilisateur
  public function checkListe(Item $obj)
  {
    $pre = $this->db->prepare('SELECT iditem FROM liste WHERE iditem = :iditem and idusers = :idiusers');
    $pre->execute(array(
      'iditem' =>$obj->getIdItem(),
      'idiusers'=>$obj->getIdUser()
    ));
    $resultat= $pre->fetch();
    if($resultat["iditem"] == $obj->getIdItem())//On vérifie si l'item existe dans la liste
    {
      return true; //On return true car l'item est dans la liste
    }
    else
    {
      return false; //On return false car l'item n'est pas dans la liste
    }
  }

  //Ajoute un item à la liste de l'utilisateur
  public function addListe(Item $obj)
  {
    $pre = $this->db->prepare('SELECT iditem, idliste FROM liste WHERE iditem = :iditem and idusers = :idiusers');
    $pre->execute(array(
      'iditem' =>$obj->getIdItem(),
      'idiusers'=>$obj->getIdUser()
    ));
    $resultat= $pre->fetch();
    if($resultat["iditem"] == $obj->getIdItem())//On vérifie si l'item existe dans la liste
    {
      $pre2 = $this->db->prepare('DELETE FROM liste WHERE idliste = :idliste'); //On supprime le compte de l'utilisateur de la BDD
      $pre2->execute(array(
        'idliste' => $resultat["idliste"]
      ));
      return false; //On return false car l'item est déja dans la liste
    }
    else
    {
      $pre3 = $this->db->prepare('INSERT INTO liste(iditem, idusers) VALUES (:iditem, :idiusers)');
      $pre3->execute(array(
        'iditem' =>$obj->getIdItem(),
        'idiusers' =>$obj->getIdUser()
      ));
      $resultat3 = $pre3->fetchAll();
      return true; //On returne true car on vient d'ajouter l'item dans la liste
    }
  }

  //Compte le nombre de notes de l'utilisateur
  public function nbNotes(Item $obj)
  {
    $pre = $this->db->prepare('SELECT count(idnote) as NbNotes FROM note WHERE idusers = :idusers');

    $pre->execute(array(
      'idusers' => $obj->getIdUser()
    ));
    $resultat = $pre->fetch();
    return $resultat['NbNotes'];
  }

//Donne la note grace à l'itemId pour initialiser les étoiles
  public function giveNotes(Item $obj)
  {
    $pre = $this->db->prepare('SELECT note FROM note WHERE iditem = :iditem AND idusers = :idusers');
    $pre->execute(array(
      'iditem' => $obj->getIdItem(),
      'idusers' => $obj->getIdUser()
    ));
    $resultat = $pre->fetch();
    return $resultat['note'];
  }

  //Donner le nombre d'avis de l'utilisateur
  public function nbAvis(Item $obj)
  {
    $pre = $this->db->prepare('SELECT count(idavis) as NbAvis FROM avis WHERE idusers = :idusers');

    $pre->execute(array(
      'idusers' => $obj->getIdUser()
    ));
    $resultat = $pre->fetch();
    return $resultat['NbAvis'];
  }
  //Donner le nombre d'avis de l'utilisateur
  public function nbAvisALL(Item $obj)
  {
    $pre = $this->db->prepare('SELECT count(idavis) as NbAvis FROM avis WHERE iditem = :iditem');

    $pre->execute(array(
      'iditem' => $obj->getIdItem()
    ));
    $resultat = $pre->fetch();
    return $resultat['NbAvis'];
  }

  // Ajouter un avis
  public function addAvis(Item $obj)
    {
      $req = $this->db->prepare('SELECT idnote FROM note WHERE idusers = :idusers and iditem = :iditem');
      $req->execute(array(
        'idusers' =>$obj->getIdUser(),
        'iditem'=>$obj->getIdItem()
      ));
      $resultat= $req->fetch();
      $obj->setIdNote($resultat["idnote"]);
      if ($resultat)
      {
        $req2 = $this->db->prepare('INSERT INTO avis(titreavis,contenuavis,iditem,idusers,idnote)VALUES(:titreavis,:contenuavis,:iditem,:idusers,:idnote)');
        $req2->execute(array(
          'titreavis' =>$obj->getTitreAvis(),
          'contenuavis' =>$obj->getContenuAvis(),
          'idusers' =>$obj->getIdUser(),
          'iditem' =>$obj->getIdItem(),
          'idnote' =>$obj->getIdNote()
        ));
      }
      else
      {
        echo "Veuillez noter cet article avant de poster une critique";
      }
    }
    //affichage de l'avis pour la page de l'item
    public function afficherAvis(Item $obj)
    {
        $req = $this->db->prepare('SELECT a.titreavis,a.contenuavis,u.avatar,u.pseudo, n.note
                                   FROM avis a
                                   INNER jOIN note n on n.idnote = a.idnote
                                   INNER JOIN users u ON u.idusers = n.idusers
                                   WHERE  a.iditem = :iditem
                                  ');
        $req->execute(array( 'iditem'=>$obj->getIdItem()));
        $resultat = $req->fetchAll();
        foreach ($resultat as $row) {
          echo "
          <div class=\"card\">
            <div class=\"card-titre\">
              <p>".$row["titreavis"]."<p/>
            </div>
            <div class=\"card-text\">
              <p>".$row["contenuavis"]. "</p>
            </div>
            <div class=\"card-footer \">
              <img class=\"avatar\" src=\"ressources/images/avatar/".$row["avatar"].".png\" alt=\"avatar\">
              <p>".$row["pseudo"]."</p>
              <p class=\"note\">".$row["note"]."/10</p>
            </div>
            <hr>
          </div>";
        }
    }
    //affichage de la liste des avis dans le profil de l'utilisateur
    public function afficherAvisProfil(Item $obj){
      $req = $this->db->prepare('SELECT a.titreavis,a.contenuavis,i.affiche,i.titre,n.note,i.iditem
                                 FROM avis a
                                 INNER jOIN note n on n.idnote = a.idnote
                                 INNER jOIN item i on i.iditem = a.iditem
                                 WHERE  a.idusers = :idusers
                                 ORDER BY a.idavis DESC
                                ');
      $req->execute(array('idusers'=>$obj->getIdUser()));
      $resultat = $req->fetchAll();
      foreach ($resultat as $row){
        echo "
        <div class=\"card\">
          <a href=\"item.php?iditem=".$row["iditem"]."\"><img src=\"".$row["affiche"]."\" alt=\"Affiche du livre: ".$row["titre"]."\"></a>
          <h1>".$row["titreavis"]."</h1><h1 class=\"note\">".$row["note"]."/10</h1>
          <p>".$row["contenuavis"]."</p>
          <hr>
        </div>";
    }
  }
}
?>

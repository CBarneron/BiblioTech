<?php
class ItemManager
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }
  //Ajouter une note
  public function addNote(item $obj)
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
      echo "note modifier";
    }
    else if (!$resultat)
    {
      $req3 = $this->db->prepare('INSERT INTO note(note,iditem,idusers)VALUES(:note,:iditem,:idusers)');
      $req3->execute(array(
        'note' =>$obj->getNote(),
        'iditem' =>$obj->getIdItem(),
        'idusers' =>$obj->getIdUser()
      ));
      echo "note add";
    }
    else
    {
      //nothing
    }
    unset($_COOKIE['note']);
  }

  //Verifie si l'item est déja dans la liste de l'utilisateur
  public function checkListe(item $obj)
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
        'idliste' =>$resultat["idliste"]
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
    $pre = $this->db->prepare('SELECT count(idnote) as NbNotes FROM note WHERE idusers = :idusers;');

    $pre->execute(array(
      'idusers' => $obj->getIdUser()
    ));
    $resultat = $pre->fetch();
    return $resultat;
  }
}
?>

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
    $pre = $this->db->prepare('SELECT Idnote FROM note WHERE Idusers = :Idusers and Iditem =:Iditem');

    $pre->execute(array(
      'Idusers' =>$obj->getIdUser(),
      'Iditem'=>$obj->getIdUser()
    ));
    $resultat= $req->fetch();

    if ($resultat==0)
    {
      $req = $this->db->prepare('INSERT INTO note(note,iditem,idusers)VALUES(:note,:Iditem,:Idusers)');
      $req = execute(array(
        'note' =>$obj->getNote(),
        'iditem' =>$obj->getIdItem(),
        'idusers' =>$obj->getIdUser()
      ));
    }
    else if ($resultat == 1)
    {
      $req =$this->db->prepare('UPDATE note SET note = :note WHERE idusers =:Idusers and iditem = :Iditem;');
      $req = execute(array(
        'iditem' =>$obj->getIdItem(),
        'idusers' =>$obj->getIdUser()
      ));
    }
    $obj->setNote($resultat);
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
  public function addListe(item $obj)
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
}
?>

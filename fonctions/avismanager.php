<?php
class AvisManager
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }
//Ajouter une note
  Public function add(Avis $obj)
  {
    $pre = $this->db->prepare('SELECT Idnote FROM note WHERE Idusers = :Idusers and Iditem =:Iditem');

    $pre->execute(array(
      'Idusers' =>$obj->getIdUser() ,
      'Iditem'=>$obj->getIdUser()
    ));
    $resultat= $req->fetch();

    if ($resultat==0)
{
      $req = $this->db->prepare('INSERT INTO note(note,iditem,idusers)VALUES(:note,:Iditem,:Idusers)')
      $req = execute(array(
        'note' =>$obj->getNote(),
        'iditem' =>$obj->getIdItem(),
        'idusers' =>$obj->getIdUser(),
      ));
}
else if ($resultat==1)
{
  $req =$this->db->prepare('UPDATE note SET note = :note WHERE idusers =:Idusers and iditem = :Iditem;');
  $req = execute(array(
    'iditem' =>$obj->getIdItem(),
    'idusers' =>$obj->getIdUser(),
  ));
}
$obj->setNote($resultat);
}
}
?>

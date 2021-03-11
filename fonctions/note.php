<?php
class Note
{
  private $iduser;
  private $iditem;
  private $note;

  public function __construct($iduser, $iditem, $note)
  {
    $this->iduser = $iduser;
    $this->iditem = $iditem;
    $this->note = $note;
  }
//Setteur
  public function setIduser($iduser)
  {
    $this->iduser = $iduser;
  }
  public function setIditem($iditem)
  {
    $this->iditem = $iditem;
  }
  public function setNote($note)
  {
    $this->note = $note;
  }
//Getteur
  public function getIduser()
  {
    return $this->iditem;
  }
  public function getIditem()
  {
    return $this->iduser;
  }
  public function getNote()
  {
    return $this->note;
  }
}
?>

<?php
class Item
{
  //Instantiation des variables
  private $iditem;
  private $idusers;

  private $idavis;
  private $titreavis;
  private $contenuavis;

  private $idnote;
  private $note;
  //Constructeur
  public function __construct($iditem,$idusers)
  {
    $this->iditem = $iditem;
    $this->idusers =$idusers;
  }
  //Setteurs
  public function setIdItem($iditem){$this->iditem = $iditem ;}
  public function setIdUser($idusers){$this->idusers =$idusers;}

  public function setIdAvis($idavis){$this->idavis =$idavis;}
  public function setTitreAvis($titreavis){$this->titreavis =$titreavis;}
  public function setContenuAvis($contenuavis){$this->contenuavis =$contenuavis;}

  public function setIdNote($idnote){$this->idnote =$idnote;}
  public function setNote($note){$this->note =$note;}

  //Getteur
  public function getIdItem(){return $this->iditem;}
  public function getIdUser(){return $this->idusers;}

  public function getIdAvis(){return $this->idavis;}
  public function getTitreAvis(){return $this->titreavis;}
  public function getContenuAvis(){return $this->contenuavis;}

  public function getIdNote(){return $this->idnote;}
  public function getNote(){return $this->note;}
}
?>

<?php
class Avis
{
  //recup de
  private $Idpubli;
  private $Iditem;

  private $Idusers;

  private $Idavis
  private $titreAvis;
  private $contenuAvis

  private $Idnote;
  private $Note;
//constructeur
  public function __construct($Note,$Iditem,$Iduser)
  { $this->note = $Note
    $this->iditem = $Iditem;
    $this->idusers =$Idusers;

  }
  //set
  public function setIdItem($Iditem)
  {
    $this->iditem = $Iditem ;


  }
  public function setIdUser($Iduser)
  {
    $this->idusers =$Idusers;

  }
  public function setNote($Note){
    $this->note =$Note;
  }


  //Getteur
  public function getIdItem()
  {
      return $this->iditem;
  }
  public function getIdUser()
  {
      return $this->iduser;
  }
  Public function getNote()
{
    return $this->note;
}
  //ItemInfos

  //method



?>

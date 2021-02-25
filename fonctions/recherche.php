<?php
class Recherche
{
  private $search;
  private $categorie;
  private $date;

  private $titre;
  private $affiche;

  public function __construct($search, $categorie, $date)
  {
    $this->search = $search;
    $this->categorie = $categorie;
    $this->date = $date;
  }
//Setteur
  public function setSearch($search)
  {
    $this->search = $search;
  }
  public function setCategorie($categorie)
  {
    $this->categorie = $categorie;
  }
  public function setDate($date)
  {
    $this->date = $date;
  }
//Getteur
  public function getSearch()
  {
    return $this->search;
  }
  public function getCategorie()
  {
    return $this->categorie;
  }
  public function getDate()
  {
    return $this->date;
  }
//Methodes
  public function Actus($titre, $affiche)
  {
    //
  }
}
?>

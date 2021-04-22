<?php
class Users
{
  private $pseudo;
  private $email;
  private $password;
  private $idusers;

  private $bio;
  private $artiste;
  private $contact;
  private $livreFAV;
  private $filmFAV;
  private $jeuxFAV;


  public function __construct($pseudo, $email, $password, $idusers)
  {
    $this->pseudo = $pseudo;
    $this->email = $email;
    $this->password = $password;
    $this->idusers = $idusers;
  }
//Setteur
  public function setPseudo($pseudo)
  {
    $this->pseudo = $pseudo;
  }
  public function setEmail($mail)
  {
    $this->email = $mail;
  }
  public function setPassword($mdp)
  {
    $this->password = $mdp;
  }
  public function setIdUsers($idusers)
  {
    $this->idusers = $idusers;
  }
  public function setBio($bio)
  {
    $this->bio = $bio;
  }
  public function setArtiste($artiste)
  {
    $this->artiste = $artiste;
  }
  public function setContact($contact)
  {
    $this->contact = $contact;
  }
  public function setLivreFAV($livreFAV)
  {
    $this->livreFAV = $livreFAV;
  }
  public function setFilmFAV($filmFAV)
  {
    $this->filmFAV = $filmFAV;
  }
  public function setJeuxFAV($jeuxFAV)
  {
    $this->jeuxFAV = $jeuxFAV;
  }
//Getteur
  public function getPseudo()
  {
    return $this->pseudo;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function getIdUsers()
  {
    return $this->idusers;
  }
  public function getBio()
  {
    return $this->bio;
  }
  public function getArtiste()
  {
    return $this->artiste;
  }
  public function getContact()
  {
    return $this->contact;
  }
  public function getLivreFAV()
  {
    return $this->livreFAV;
  }
  public function getFilmFAV()
  {
    return $this->filmFAV;
  }
  public function getJeuxFAV()
  {
    return $this->jeuxFAV;
  }
}
?>

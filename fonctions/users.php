<?php
class Users
{
  private $pseudo;
  private $email;
  private $password;
  private $idusers;


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
}
?>

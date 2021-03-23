<?php
class Users
{
  private $pseudo;
  private $email;
  private $password;


  public function __construct($pseudo, $email, $password)
  {
    $this->pseudo = $pseudo;
    $this->email = $email;
    $this->password = $password;

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
}
?>

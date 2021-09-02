<?php

class User{
  private $name;
  private $surname;
  private $creditCard;
  private $userLvl = 'base';

  public function __construct($_name,$_surname){
    $this->name = $_name;
    $this->surname = $_surname;
  }

  // sezione per la carta di credito
  public function setCreditCard($_creditCard){
    $this->creditCard = $_creditCard;
  }

  public function getCreditCard(){
    return $this->creditCard;
  }

  // sezione per il livello dell'utente
  public function setLvl($level){
    if($level == 'base' || $level == 'prime'){
      $this->userLvl = $level;
    }
    else{
      throw new Exception('Errore: livello utente impostato non corretto');
    }
  }

  public function getLvl(){
    return $this->userLvl;
  }
}
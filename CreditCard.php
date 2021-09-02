<?php

class CreditCard{
  private $number;
  private $cvv;
  private $expireDate;

  public function __construct($_number, $_cvv, $_expireMonth, $_expireYear){
    $this->number = $_number;
    $this->cvv = $_cvv;

    if(($_expireYear > date("Y")) || ($_expireYear = date("Y") && $_expireMonth > date("m"))){
      $this->expireDate = $_expireMonth . '/' . $_expireYear;
    } else {
      throw new Exception('Errore: non è possibile inserire la carta perché è scaduta');
    }
  }

  public function getCreditCard(){
    return [
      'number' => $this->number,
      'cvv' => $this->cvv,
      'expireDate' => $this->expireDate
    ];
  }
}
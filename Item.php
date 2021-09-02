<?php

include_once 'Shipment.php';

class Item{

  use Shipment;

  protected $name;
  protected $price;
  protected $genre;
  protected $quantity;

  public function __construct($_name, $_genre){
    $this->name = $_name;
    $this->genre = $_genre;
  }

  public function setPrice($_price){
    $this->price = $_price;
  }

  public function getPrice($_price){
    return $this->price;
  }

  public function setQuantity($_quantity){
    if(is_numeric($_quantity) && $_quantity > 0){
      $this->quantity = $_quantity;
    }
    elseif(!is_numeric($_quantity)){
      throw new Exception('Errore: il dato inserito non è un numero');
    }
    else{
      throw new Exception('Errore: non è possibile inserire una quantità minore di 0');
    }
  }

  public function getQuantity(){
    return $this->quantity;
  }
}
<?php

include_once 'Shipment.php';

class Item{

  use Shipment;

  protected $name;
  protected $price;
  protected $genre;

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
}
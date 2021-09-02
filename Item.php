<?php

class Item{

  protected $name;
  protected $price;

  public function __construct($_name, $_price){
    $this->name = $_name;
    $this->price = $_price;
  }


}
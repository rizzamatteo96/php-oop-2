<?php

trait Shipment{
  public $days;
  public $taxes;

  public function setShipment($fastShip){
    if($fastShip){
      $days = 1;
      $taxes = 10;
    } 
    else{
      $days = 10;
      $taxes = 5;
    }
  }
}
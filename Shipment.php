<?php

trait Shipment{
  private $days;

  public function setFastShipment($fastShip){
    if($fastShip === true || $fastShip === false){
      if($fastShip){
        $this->days = 1;
      } 
      else{
        $this->days = 10;
      }
    } else {
      throw new Exception('Errore inserimento spedizione veloce!');
    }
  }

  public function getShipment(){
    return $this->days;
  }
}
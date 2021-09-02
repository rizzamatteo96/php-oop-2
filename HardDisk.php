<?php

include_once 'Item.php';

class HardDisk extends Item{

  protected $capacity;
  protected $class;

  public function __construct($_name, $_genre, $_capacity, $_class){
    parent::__construct($_name, $_genre);
    $this->capacity = $_capacity;
    $this->class = $_class;
  }

}
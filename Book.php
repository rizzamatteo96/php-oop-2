<?php

include_once 'Item.php';

class Book extends Item{

  protected $cover;
  protected $pages;

  public function __construct($_name, $_genre, $_cover, $_pages){
    parent::__construct($_name, $_genre);
    $this->cover = $_cover;
    $this->pages = $_pages;
  }

}
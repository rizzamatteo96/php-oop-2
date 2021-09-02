<?php

class Cart{
  public $article;
  public $total;

  public function setArticle($_articleName,$_articlePrice,$_userLvl){
    $this->article[] = [
      'articolo' => $_articleName,
      'prezzo' => $_articlePrice
    ];

    $this->total += $_articlePrice;
    // se l'utente è prime applico 20% di sconto
    if($_userLvl == 'prime'){
      $this->total *= 0.8;
    }
  }
}
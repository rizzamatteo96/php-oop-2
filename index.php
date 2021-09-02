<?php

/**
 * Oggi pomeriggio provate ad immaginare quali sono le classi necessarie per creare uno shop online; 
 * ad esempio, ci saranno sicuramente dei prodotti da acquistare e degli utenti che fanno shopping. 
 * Strutturare le classi gestendo l'ereditarietà dove necessario; ad esempio ci potrebbero essere degli utenti 
 * premium che hanno diritto a degli sconti esclusivi, oppure diverse tipologie di prodotti.
 * 
 * Provate a far interagire tra di loro gli oggetti: ad esempio, l'utente dello shop inserisce una carta di credito... $c = new CreditCard(..); $user->insertCreditCard($c);
 * 
 * BONUS: Gestite eventuali eccezioni che si possono verificare (es: carta di credito scaduta).
 */

include_once 'HardDisk.php';
include_once 'Book.php';
include_once 'User.php';
include_once 'CreditCard.php';

// prova inserimento di un HDD
$ssd = new HardDisk('SSD','Elettronica','500gb',10);
$ssd->setPrice(100);
try{
  $ssd->setQuantity(10);
} catch(Exception $e){
//  var_dump(get_class_methods($e));
  var_dump($e->getMessage());
}
var_dump($ssd);

// prova inserimento di un libro
$it = new Book('IT','Libro','Rigida',350);
$it->setPrice(10);
try{
  $it->setFastShipment(true);
} catch(Exception $e){
  var_dump($e->getMessage());
}
var_dump('Giorni spedizione: ' . $it->getShipment());
var_dump($it);


// prova inserimento utente
$teo = new User('Matteo','Rizza');
try{
  $teo->setLvl('prime');
} catch(Exception $e){
  var_dump($e->getMessage());
}
var_dump($teo);


//prova inserimento carta di credito
try{
  $cc = new CreditCard('1234123412341234',123,'09','2022');
  var_dump($cc->getCreditCard());
  
  // assegnare carta a utente
  $teo->setCreditCard($cc->getCreditCard());
  var_dump($teo);

} catch(Exception $e){
  var_dump($e->getMessage());
}


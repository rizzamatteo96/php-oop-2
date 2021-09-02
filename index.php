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

 include_once 'Item.php';

 $xBox = new Item('xBox',500);
 var_dump($xBox);
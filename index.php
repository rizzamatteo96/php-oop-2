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
include_once 'Cart.php';

// prova inserimento di un HDD
$ssd = new HardDisk('SSD','Elettronica','500gb',10);
$ssd->setPrice(100);
try{
  $ssd->setQuantity(10);
} catch(Exception $e){
//  var_dump(get_class_methods($e));
  var_dump($e->getMessage());
}
// var_dump($ssd);

// prova inserimento di un libro
$it = new Book('IT','Libro','Rigida',350);
$it->setPrice(10);
try{
  $it->setFastShipment(true);
} catch(Exception $e){
  var_dump($e->getMessage());
}
// var_dump('Giorni spedizione: ' . $it->getShipment());
// var_dump($it);

//prova inserimento utente base
$pippo = new User('Pippo','Rossi');

// prova inserimento utente prime
$teo = new User('Matteo','Rizza');
try{
  $teo->setLvl('prime');
} catch(Exception $e){
  var_dump($e->getMessage());
}


//prova inserimento carta di credito
try{
  $cc = new CreditCard('1234123412341234',123,'09','2022');
  
  // assegnare carta a utente
  $teo->setCreditCard($cc->getCreditCard());
} catch(Exception $e){
  var_dump($e->getMessage());
}

// Settaggio del carrello di Pippo
$pippo->userCart = new Cart();
$pippo->userCart->setArticle($ssd->name,$ssd->getPrice(),$pippo->getLvl());
$pippo->userCart->setArticle($it->name,$it->getPrice(),$pippo->getLvl());

// Settaggio del carrello di teo
$teo->userCart = new Cart();
$teo->userCart->setArticle($ssd->name,$ssd->getPrice(),$teo->getLvl());
$teo->userCart->setArticle($it->name,$it->getPrice(),$teo->getLvl());

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <h1>Boolmazon</h1>

  <!-- sezione degli articoli presenti in negozio -->
  <section>
    <h2>Articoli presenti nel negozio</h2>
    
    <!-- libro di IT -->
    <p>
      <h3>Articolo numero 1: </h3>
      <div>genere: <?php echo $it->genre;?></div>
      <div>nome articolo: <?php echo $it->name; ?> </div>
      <div>
        Il prezzo è di <?php echo $it->getPrice() . ' €'; ?>
      </div>
    </p>
    <hr>
  
    <!-- HDD ssd -->
    <p>
      <h3>Articolo numero 2: </h3>
      <div>genere: <?php echo $ssd->genre;?></div>
      <div>nome articolo: <?php echo $ssd->name; ?> </div>
      <div>
        Il prezzo è di <?php echo $ssd->getPrice() . ' €'; ?>
      </div>
    </p>
    <hr>
  </section>

  <!-- sezione utenti registrati -->
  <section>
    <h2>Utenti registrati</h2>

    <!-- utente Pippo -->
    <p>
      <h3><?php echo $pippo->name . ' ' . $pippo->surname; ?></h3>
      <div>Livello utente: <?php echo $pippo->getLvl(); ?></div>
      <div>
        <?php 
          if($pippo->getLvl() == 'prime'){
            echo 'Ha diritto ad uno sconto del 20%';
          }
        ?>
      </div>
    </p>

    <!-- utente Matteo -->
    <p>
      <h3><?php echo $teo->name . ' ' . $teo->surname; ?></h3>
      <div>Livello utente: <?php echo $teo->getLvl(); ?></div>
      <div>
        <?php 
          if($teo->getLvl() == 'prime'){
            echo 'Ha diritto ad uno sconto del 20%';
          }
        ?>
      </div>
    </p>

    <hr>
  </section>

  <!-- sezione carrelli utenti -->
  <section>
    <h2>Carrelli utenti</h2>

    <!-- carrello di pippo -->
    <p>
      <h3>Carrello di <?php echo $pippo->name; ?></h3>
      <ul>
        <?php foreach($pippo->userCart->article as $article){ ?>
          <li> <?php echo $article['articolo'] . ' = ' . $article['prezzo'] . ' €' ?></li>
        <?php } ?>
      </ul>
      <div>Totale nel carrello = <?php echo $pippo->userCart->total . ' €'; ?></div>
    </p>

    <!-- carrello di matteo -->
    <p>
      <h3>Carrello di <?php echo $teo->name; ?></h3>
      <ul>
        <?php foreach($teo->userCart->article as $article){ ?>
          <li> <?php echo $article['articolo'] . ' = ' . $article['prezzo'] . ' €' ?></li>
        <?php } ?>
      </ul>
      <div>Totale nel carrello = <?php echo $teo->userCart->total . ' €'; ?></div>
    </p>
  </section>

</body>
</html>
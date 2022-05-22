<?php
require_once("Pokemon.php");
require_once("Walka.php");
$poke1 = new Water('Squirtle',50, 5);
$poke2 = new Fire('Charizard',100, 10);
$poke1->createimage();
$poke2->createimage();
$walka = new Walka($poke1, $poke2);
?>

<link rel ="stylesheet" href="styles.css">
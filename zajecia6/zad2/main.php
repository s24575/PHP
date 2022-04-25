<?php

// Koszyk (sesja, pliki).
// - stwórz plik csv, w którego każdej linijce będzie jeden produkt (nazwa, ilość, cena)
// - zbuduj stronę www, która wyświetli produkty z pliku. Przy każdym z nich będzie
// przycisk (lub link) “do koszyka”
// - zawartość koszyka powinna być zapamiętywana w sesji (z opcją wyczyszczenia
// całego koszyka, lub usunięcia jednego produktu)
// - obsługę koszyka niech zapewniają funkcje, zapisane w oddzielnym pliku (np.
// funkcje.php; dodaj(), usun(), wyczysc() )

require 'functions.php';

session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION["cart"] = array();
}
//var_dump($_SESSION);

$file = 'csv.txt';
$lines = file($file);

$products = array();
foreach($lines as $line){
    $line = str_replace(array("\n", "\r"), '', $line);
    $arr = explode(',', $line);
    $products[$arr[0]] = array($arr[1], $arr[2]);
}
/*
foreach($products as $key => $val){
    echo $key . ' ';
    foreach($val as $specs){
        echo $specs . ' ';
    }
    echo '<br>';
}
*/

if(!empty($_POST)){
    //var_dump($_POST);
    if(isset($_POST['item'])){
        addToShoppingCart($_POST['item'], $products[$_POST['item']][0]);
    } elseif (isset($_POST['remove'])) {
        removeFromShoppingCart($_POST['remove']);
    } elseif (isset($_POST['empty'])) {
        emptyShoppingCart();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <title>
        Sklep
    </title>
</head>
<body>
    <main>
        <form action="main.php" method="post">
            <?php
            echo " <input type='submit' name='empty' value='Empty the cart'/><br>";
            echo 'Cart:<br>';
            $isEmpty = true;
            foreach($_SESSION["cart"] as $key => $val){
                if($val > 0){
                    echo $key . ' ' , $val;
                    echo " <button type='submit' name='remove' value=$key>remove</button><br>";
                    $isEmpty = false;
                }
            }
            if($isEmpty) echo ' empty<br>';
            echo '<br>';
            foreach($products as $key => $val){
                //echo $key . ' <input type="submit" name="' . $key . '" value="order"/><br>';
                echo $key . " <button type='submit' name='item' value=$key>order</button><br>";
            }
            ?>
        </form>
    </main>
</body>
</html>
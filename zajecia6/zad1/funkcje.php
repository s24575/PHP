<?php

require 'dane.php';

/*
foreach($food as $key => $i){
    echo $key . ' => ' . $i . '<br>';
}
*/

function oblicz($rodzaj, $ilosc, $dodatki){
    global $food, $extra;
    $price = $food[$rodzaj] * $ilosc;
    foreach($dodatki as $i){
        $price += $extra[$i];
    }
    return $price;
}

?>
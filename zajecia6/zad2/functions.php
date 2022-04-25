<?php

function addToShoppingCart($name, $amount){
    if($amount > 0){
        if(isset($_SESSION['cart'][$name])){
            $_SESSION['cart'][$name]++;
        } else {
            $_SESSION['cart'][$name] = 1;
        }
        header("Refresh:0");
        //echo "Buying $name<br>";
    } else {
        //echo "No $name left";
    }
}

function removeFromShoppingCart($name){
    $_SESSION['cart'][$name]--;
    header("Refresh:0");
}

function emptyShoppingCart(){
    unset($_SESSION['cart']);
    $_SESSION["cart"] = array();
}

?>
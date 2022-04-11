<?php
// Przerób zadanie z poprzednich zajęć, kalkulator, tak aby:
// - każde działanie (dodawanie, odejmowanie itp) było umieszczone w oddzielnej
// funkcji
// - wszystkie funkcje były umieszczone w innym pliku niż główny skrypt
// - główny skrypt zawierał tylko switcha, a w nim wywołanie odpowiedniej funkcji
// (trzeba użyć include/require by korzystać z funkcji z innego pliku)

require '6_1_functions.php';

if(isset($_GET["a"]) && isset($_GET["b"]) && isset($_GET["dzialanie"]))
{
    switch($_GET["dzialanie"]){
        case "dodawanie":
            dodawanie($_GET["a"], $_GET["b"]);
            break;
        case "odejmowanie":
            odejmowanie($_GET["a"], $_GET["b"]);
            break;
        case "mnozenie":
            mnozenie($_GET["a"], $_GET["b"]);
            break;
        case "dzielenie":
            if($_GET["b"] == 0) echo "Dzielenie przez 0<br>";
            else dzielenie($_GET["a"], $_GET["b"]);
            break;
    }
} else {
    echo "Pass ?funkcja&a=x&b=y after address <br>";
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <title>Calculator</title>
</head>
</html>
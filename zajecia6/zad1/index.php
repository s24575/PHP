<?php
// Strona do zamawiania jedzenia online (POST)
// - główny plik kodu: index.php
// - oddzielny plik z funkcjami: funkcje.php
// - oddzielny plik z danymi: dane.php
// - w pliku z danymi stwórz tablicę z cennikiem (oddzielnie rodzaje jedzenia, oddzielnie
// dodatki)
// - w pliku z funkcjami zdefiniuj funkcję oblicz($rodzaj, $ilosc, $dodatki), która policzy
// cenę zależnie od wybranego rodzaju jedzenia, ilości sztuk oraz tablicy dodatków
// - w głównym pliku stwórz formularz dla użytkownika (rodzaj jedzenia - wybór z listy
// według cennika; dodatki - checkboxy według cennika; ilość - miejsce na wpisanie
// liczby; uwagi - miejsce na wpisanie tekstu)
// - w tym samym pliku stwórz obsługę formularza. Jeśli został wypełniony poprawnie,
// wywołaj funkcję “oblicz” i wyświetl jej wynik

require 'funkcje.php';

//$more = array("frytki", "napój");
//echo oblicz("burger", 3, $more);

if(!empty($_POST)){
    var_dump($_POST); echo '<br>';
    if(empty($_POST['amount'])){
        $_POST['amount'] = 0;
    }
    if(empty($_POST['extra'])){
        $_POST['extra'] = array();
    }
    echo oblicz($_POST['food'], $_POST['amount'], $_POST['extra']);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <title>
        Jedzenie Online
    </title>
</head>
<body>
    <main>
        <form action="index.php" method="post">
            <div>
                <label for="food">Choose food</label>
                <select name="food" id="food">
                    <?php
                    foreach($food as $key => $i){
                        echo "<option value=" . $key . '>' . $key . ' = ' . $i . 'PLN' . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <label for="name">Write amount</label>
                <input type="text" name="amount" value="0"/>
            </div>

            <div>
                <?php
                foreach($extra as $key => $i){
                echo '<input type="checkbox" id="' . $key . '" name="extra[]" value=' . $key . '>';
                echo '<label for="' . $key . '">' . $key . ' - ' . $i . '</label><br>';
                }
                ?>
            </div>

            <button type="submit">Order</button>
        </form>
    </main>
</body>
</html>
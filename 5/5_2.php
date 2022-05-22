<?php
// Moja pierwsza stronka w PHP. Budujemy stronę z użyciem $_GET.
// - W pliku PHP tworzymy dwuwymiarową tablicę podstron
// - Każda podstrona jest tablicą asocjacyjną: posiada nazwę, link i treść
// (wpisujemy przykładowe treści, chociażby):
// $tablica[0] = [‘nazwa’=>’O nas’, ‘link’=>’onas’, ‘tresc’=>’Witaj na stronie’];
// - W tym samym pliku tworzymy wyświetlenie menu strony (lista linków z
// odpowiednimi nazwami - oczywiście na podstawie stworzonej tablicy)
// - Oprócz tego wyświetlamy nazwę i treść aktualnie wybranej podstrony (na
// podstawie adresu z $_GET (np: index.php?link=onas )

$arr = array(
    0 => ['nazwa'=>'Strona główna', 'link'=>'', 'tresc'=>'Strona Główna'],
    1 => ['nazwa'=>'O nas', 'link'=>'onas', 'tresc'=>'Witaj na stronie'],
    2 => ['nazwa'=>'test', 'link'=>'test', 'tresc'=>'test'],
    3 => ['nazwa'=>'Podstrona', 'link'=>'podstrona', 'tresc'=>'Podstrona']
);

$current_array = 0;

if(!empty($_GET["link"])){
    foreach ($arr as $key => $value){
        if($key != 0){
            if($value["link"] == $_GET["link"]){
                $current_array = $key;
            }
        }
    }
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title>
        <?php
        echo $arr[$current_array]['nazwa'];
        ?>
    </title>
</head>
<body>
    <main>
        <?php
        echo $arr[$current_array]['tresc'] . '<br>';
        if($current_array == 0){
            foreach ($arr as $key => $value){
                if($key != 0){
                    echo '<a href="http://localhost/phpweb/6_3.php?link=' . $arr[$key]['link'] . '">' . $arr[$key]['nazwa'] . '</a>' . '<br>';
                }
            }
        } else {
            echo '<a href="http://localhost/phpweb/6_3.php">' . $arr[0]['nazwa'] . '</a>' . '<br>';
        }
        ?>
    </main>
</body>
</html>
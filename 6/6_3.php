<?php
// Mój pierwszy CMS.
// - Przerób zadanie z poprzednich zajęć - prostą stronę www z wykorzystaniem
// $_GET, aby dane (tytuły i treści podstron), pobierała do tablicy z pliku csv.
// - Zbuduj drugą stronę, która pozwoli na edytowanie tytułów i treści podstron,
// zawartych w tym samym pliku

$arr = array();

$file = "cms.txt";
$line = file($file);

foreach($line as &$string){
    $string = str_replace("\n", "", $string);
    $string = str_replace("\r", "", $string);
}

for($i = 0; $i < sizeof($line); ){
    $arr[$i / 3] = array('nazwa' => $line[$i], 'link'=> $line[$i + 1], 'tresc'=> $line[$i + 2]);
    $i += 4;
}

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
                    echo '<a href="http://localhost/phpweb/6_3.php?link=' . $arr[$key]['link'] . '">' . $arr[$key]['nazwa'] . '</a><br>';
                }
            }
            echo '<a href="http://localhost/phpweb/6_3_edit.php">Edit website</a><br>';
        } else {
            echo '<a href="http://localhost/phpweb/6_3.php">' . $arr[0]['nazwa'] . '</a>' . '<br>';
        }
        ?>
    </main>
</body>
</html>
<?php

$file = "cms.txt";
$line = file($file);

foreach($line as &$string){
    $string = str_replace("\n", "", $string);
    $string = str_replace("\r", "", $string);
}

if(!empty($_POST["website"])){
    $file_changed = file($file);
    if(!empty($_POST["title"])){
        $file_changed[($_POST["website"] - 1) * 3] = $_POST["title"] . "\r\n";
    }
    if(!empty($_POST["link"])){
        if($_POST["link"] == "empty"){
            $file_changed[($_POST["website"] - 1) * 3 + 1] = "\r\n";
        } else{
            $file_changed[($_POST["website"] - 1) * 3 + 1] = $_POST["link"] . "\r\n";
        }
    }
    if(!empty($_POST["text"])){
        $file_changed[($_POST["website"] - 1) * 3 + 2] = $_POST["text"] . "\r\n";
    }
    file_put_contents($file, $file_changed);
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title>Editor</title>
</head>
<body>
    <main>
        <form action="6_3_edit.php" method="post">
            <div>
                <label for="website">Choose website:</label>
                <select name="website" id="website">
                    <option value="">Choose website</option>
                    <?php
                    for($i = 0; $i < sizeof($line); ){
                        echo "<option value=" . ($i / 4) + 1 . '>' . $line[$i] . "</option>";
                        $i += 4;
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="name">Edit title:</label>
                <input type="text" name="title" placeholder="Enter a string:" />
            </div>
            <div>
                <label for="name">Edit link:</label>
                <input type="text" name="link" placeholder="Enter a string:" />
            </div>
            <div>
                <label for="name">Edit text:</label>
                <input type="text" name="text" placeholder="Enter a string:" />
            </div>

            <button type="submit">Replace</button>
        </form>
        <br><a href="http://localhost/phpweb/6_3.php">Go back</a><br>
    </main>
</body>
</html>
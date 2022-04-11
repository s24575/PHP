<?php
// Formularz zapisujący dane do pliku.
// - ma posiadać pole tekstowe i przycisk zapisu
// - stwórz plik tekstowy, do którego będą zapisywane dane
// - skrypt, przyjmujący dane z formularza, ma zapisać tekst do pliku, dopisując go na
// końcu

$filename = 'test_text_file.txt';
if(!empty($_POST["name"]))
{
    $content = file_get_contents($filename);
    $content .= $_POST["name"];
    file_put_contents($filename, $content);
}

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title>Text file</title>
</head>
<body>
    <main>
        <form action="6_2.php" method="post">
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" required="required" placeholder="Enter a string:" />
            </div>

            <button type="submit">Zapisz</button>
        </form>
    </main>
</body>
</html>
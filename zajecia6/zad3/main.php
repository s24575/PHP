<?php
session_start();
if(empty($_SESSION['game'])){
    $_SESSION['game'] = array(
        'board' => array(1, 2, 3, 4, 5, 6, 7, 8, 9),
        'player' => 'X',
        'gameOver' => false
    );
}

if(!empty($_POST)){
    if(!empty($_POST['position'])){
        $_POST['position']--;
        if($_SESSION['game']['board'][$_POST['position']] != 'X' && $_SESSION['game']['board'][$_POST['position']] != 'O'){
            $_SESSION['game']['board'][$_POST['position']] = $_SESSION['game']['player'];
            if ($_SESSION['game']['board'][0] == $_SESSION['game']['board'][1] && $_SESSION['game']['board'][1] == $_SESSION['game']['board'][2] ||
                $_SESSION['game']['board'][3] == $_SESSION['game']['board'][4] && $_SESSION['game']['board'][4] == $_SESSION['game']['board'][5] ||
                $_SESSION['game']['board'][6] == $_SESSION['game']['board'][7] && $_SESSION['game']['board'][7] == $_SESSION['game']['board'][8] ||
            	$_SESSION['game']['board'][0] == $_SESSION['game']['board'][3] && $_SESSION['game']['board'][3] == $_SESSION['game']['board'][6] ||
            	$_SESSION['game']['board'][1] == $_SESSION['game']['board'][4] && $_SESSION['game']['board'][4] == $_SESSION['game']['board'][7] ||
            	$_SESSION['game']['board'][2] == $_SESSION['game']['board'][5] && $_SESSION['game']['board'][5] == $_SESSION['game']['board'][8] ||
            	$_SESSION['game']['board'][0] == $_SESSION['game']['board'][4] && $_SESSION['game']['board'][4] == $_SESSION['game']['board'][8] ||
            	$_SESSION['game']['board'][2] == $_SESSION['game']['board'][4] && $_SESSION['game']['board'][4] == $_SESSION['game']['board'][6])
            {
                $_SESSION['game']['gameOver'] = true;
            } else {
                if($_SESSION['game']['player'] == 'X') $_SESSION['game']['player'] = 'O';
                else $_SESSION['game']['player'] = 'X';
            }
        }
    }
    else if(isset($_POST['reset'])){
        session_destroy();
    }
    header("Refresh:0");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <title>
        Tic Tac Toe
    </title>
</head>
<body>
    <main>
        <?php
        echo $_SESSION['game']['board'][0] . '|' . $_SESSION['game']['board'][1] . '|' . $_SESSION['game']['board'][2] . '<br>';
        echo '_____' . '<br>';
        echo $_SESSION['game']['board'][3] . '|' . $_SESSION['game']['board'][4] . '|' . $_SESSION['game']['board'][5] . '<br>';
        echo '_____' . '<br>';
        echo $_SESSION['game']['board'][6] . '|' . $_SESSION['game']['board'][7] . '|' . $_SESSION['game']['board'][8] . '<br>';
        ?>
        <?php if($_SESSION['game']['gameOver'] == false) { ?>
        <form action="main.php" method="post">
            <label for="position">Choose position</label>
            <input type="number" name="position" size="1">
            <input type="submit" value="Choose">
        </form>
        <?php } else { echo "Player " . $_SESSION['game']['player'] . " wins<br>"; } ?>
        <form action="main.php" method="post">
            <button type="submit" name="reset">Reset</button>
        </form>
    </main>
</body>
</html>
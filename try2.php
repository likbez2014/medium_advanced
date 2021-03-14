<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
    <h1>Гра медіум</h1>
    <h2>перевір свої екстрасенсорні здібності</h2>
    </header>
    <main class="main">
        <form action="try3.php" method="POST">
            <div class="nav">
                <?php
                    $komp               = $_POST["komp"];
                    $myStartRange       = $_POST["choice"];
                    $myEndRange         = $myStartRange + 9;
                    $numbers            = $_POST["numbers"];
                    $win                = json_decode($_POST["win"]);
                    $kompStartRange;
                    $kompEndRange;
                    /*echo($komp);*/
                    /*echo("<p> Мій вибір " .$myStartRange. "..." .$myEndRange. "</p>");*/
                    
                    for($i = $numbers - 9; $i>0; $i -= 10) {
                        if($komp >= $i) {
                            $kompStartRange  = $i;
                            break;
                        }
                    }
                    $kompEndRange = $kompStartRange + 9;
                    if($myStartRange == $kompStartRange) {
                        echo("
                            <p>Да ти чарівник</p>
                        ");
                        $win [0] = 1;
                        $win [1]++;
                    } else {
                        echo("
                            <p>Нажаль</p>
                        ");
                        $win [0] = 0;
                    }
                    echo ("
                        <p>Загадане число знаходиться в діапазоні " . $kompStartRange . "..." . $kompEndRange . "</p>
                    ");
                ?>
                <p>Вибери число з наведеного діапазону</p>
            </div>
            <div class="game">
                <select name="choice">
                    <?php
                        for($i = $kompStartRange; $i <= $kompEndRange; $i ++) {
                            echo("
                                <option value='". $i ."'>". $i ." </option>
                            ");
                        }
                    ?>
                </select>
                    <input type="hidden" name="komp" value="<?php echo($komp);?>">
                    <input type="hidden" name="win" value="<?php echo(json_encode ($win));?>">
                    <input type="hidden" name="kompStartRange" value="<?php echo($kompStartRange);?>">
                    <input type="submit" value="Я впевнений, сьогодні мій день">
            </div>
        </form>
    </main>
</body>

</html>
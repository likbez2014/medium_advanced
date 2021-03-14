<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        <form action="<?php
            $komp               = $_POST["komp"];
            $win                = json_decode($_POST["win"]);
            $win[2]             = $_POST["choice"];
            $kompStartRange     = $_POST["kompStartRange"];
            if($komp == $win[2]) {
                echo("index.php");
            } else {
                echo("try4.php");
            }
        ?>" method="POST">
            <div class="nav">
                <?php
                    /*echo($komp);*/
                    /*echo("<p> Мій вибір " .$win[2]. "</p>");*/
                    if($win[0] == 1 && $komp == $win[2]) {
                        echo("<h2>ВАНГА ВАМ БИ ЗАЗДРИЛА</h2>");
                        echo("<p>Ви вгадали і число та діапазон з першого разу</p>");
                        $win [5]++;
                    } else if ($komp == $win[2]) {
                        echo("<p>Ви вгадали число з першого разу</p>");
                        echo("<h2>Так тримати</h2>");
                        $win [5]++;
                    } else if ($win[0] == 1) {
                        echo("<p>Ви вгадали діапазон, але число поки таємниця</p>");
                    } else {
                        echo("<p>Ви помилились, але не все втрачено</p>");
                        echo("<p>Може вдача посміхнеться, діапазон в двічі менший</p>");
                    }
                    ?>
            </div>
            <?php
                echo("<input type='hidden' name='win' value='" .json_encode ($win). "'>");
                if($komp == $win[2]) {
                    echo("<input type='submit' value='Зіграйте ще раз'>");
                } else {
                    if($komp >= $kompStartRange + 5) {
                        $kompStartRange += 5;
                    }
                    echo("
                        <div class='game'>
                        <select name='choice'>
                    ");
                    for($i = $kompStartRange; $i <= $kompStartRange + 4; $i++) {
                        if ($i == $win[2]) {
                            echo("
                                <option disabled value='". $i ."'>". $i ."</option>
                            ");
                        } else {
                            echo("
                                <option value='". $i ."'>". $i ."</option>
                            ");
                        }
                    }
                    echo("
                        </select>
                        <input type='hidden' name='komp' value='" . $komp . "'>
                        <input type='hidden' name='kompStartRange' value='" . $kompStartRange ."'>
                        <input type='submit' value='Я знаю це число'>
                        </div>
                    ");
                }
            ?>
        </form>
    </main>
</body>
</html>
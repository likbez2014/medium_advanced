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
        <form action="
            <?php
                $komp               = $_POST["komp"];
                $win                = json_decode($_POST["win"]);
                $win[4]             = $_POST["choice"];
                $kompStartRange     = $_POST["kompStartRange"];
                if($komp == $win[4]) {
                    echo("index.php");
                    $win [5]++;
                } else {
                    echo("result.php");
                }
            ?>
        " method = "POST">
        <div class="nav">
            <input type="hidden" name="win" value="<?php echo(json_encode ($win));?>">
            <?php
                /*echo($komp);*/
                /*echo("<p> Мій вибір " .$win[4]. "</p>");*/
                if($komp == $win[4]) {
                    echo("<h2>Число вгадано, ти молодець</h2>");
                    echo("<input type='submit' value='Зіграйте ще раз'>");
                } else {
                    if ($komp > $win[4]) {
                        echo("<p> Загадане число більше " .$win[4]. "</p>");
                    } else {
                        echo("<p> Загадане число менше " .$win[4]. "</p>");
                    }
                    echo("
                        </div>
                        <div class='game'>
                        <select name='choice'>
                    ");
                    for($i = $kompStartRange; $i <= $kompStartRange + 4; $i ++) {
                        if ($i == $win[2] || $i == $win[3] || $i == $win[4]) {
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
                        <input type='hidden' name='komp' value='" .$komp. "'>
                        <input type='submit' value='Остання спроба'>
                        </div>
                    ");
                }
            ?>
        </form>
    </main>
</body>
</html>
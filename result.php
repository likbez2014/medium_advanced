<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <form action="index.php" method="POST">
    <?php
        $komp       = $_POST["komp"]; 
        $win        = json_decode($_POST["win"]);
        $choice     = $_POST["choice"];
        // echo(json_encode($win));
        echo($win[0]);
        echo($win[1]);
        echo($win[2]);
        echo($win[3]);
        echo($win[4]);
        echo($win[5]);
        if($choice == $komp) {
            echo("<h3>Нарешті, Ви перемогли!</h3>");
            $win[5]++;
        } else {
            echo("<h3>Ти не медіум &#128514;</h3>");
        }
        /*echo("<input type='submit' value='Зіграйте ще раз'>");
        echo("<p> Вгаданий діапазон " .$win[0]. " </p>" );
        echo("<p> Кількість вгаданих всіх діапазонів " .$win[1]. " </p>" );
        echo("<p> Кількість вгаданих чисел з першої спроби " .$win[2]. " </p>" );
        echo("<p> Кількість вгаданих чисел з другої спроби " .$win[3]. " </p>" );
        echo("<p> Кількість вгаданих чисел з третьої спроби " .$win[4]. " </p>" );
        echo("<p> Кількість вгаданих чисел " .$win[5]. " </p>" );*/
    ?>
    </form>
</body>
</html>
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
        <form action="try2.php" method="POST">
        <div class="nav">
            <p>Вгадай число</p>
            <p>Вибери діапазон в якому загадане число</p>
        </div>
            <div class="game">
                <select name="choice"> <!-- variable "choice", our choice of number-->
                    <?php
                        /**
                         * Гра екстрасенс
                         * Компютер загадує число а ми його відгадуємо
                         * Зробив Бажин
                         **/
                        
                        if (isset ($_POST["win"])) {
                            $win = json_decode($_POST["win"]);
                        } else {
                        $win = [0,0,0,0,0,0];//[діапазон, всі діапазони, вибір1, вибір2, вибір3, відгадані числа]
                        }
                        $numbers = 100;/* the number of numbers in the list */
                        $komp = rand(1,$numbers);
                        for($i = 1; $i <= $numbers; $i += 10) {
                            $s = $i + 9;
                            echo("<option value='". $i ."'>". $i ." .. ". $s ."</option>");
                        }
                    ?>
                </select>
                <input type="hidden" name="win" value="<?php echo(json_encode($win));?>">
                <input type="hidden" name="komp" value="<?php echo($komp);?>"><!--data transmission on the number of the generator-->
                <input type="hidden" name="numbers" value="<?php echo($numbers);?>"><!--data transmission on the number jf numbers in the list -->
                <p>
                    <input type="submit" value="Мені пощастить">
                </p>
            </div>
        
        </form>
    </main>
</body>
</html>
<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб1</title>
</head>
<body>
    <h3>Пахомова Евгения, КИУКИ-19-1, Вариант №0 </h3>
<form action="1.php" method="get">
    <p><strong> Информация о книгах издательства: </strong>
            <select name="publisher">
                <?php
                    $sql = "SELECT DISTINCT publisher FROM $db.LITERATURE";
                    $sql = $dbh->query($sql);
                    foreach ($sql as $cell) {
                        echo "<option> $cell[0] </option>";
                    }
                ?>
            </select>
        <button>ОК</button>
    </p>
</form>
<form action="2.php" method="get">
<p><strong>Информация о книгах, журналах, газетах, опубликованных за указанный период:</strong>
        <select name="year_min">
            <?php
                $sql = "SELECT DISTINCT year FROM $db.LITERATURE";
                $sql = $dbh->query($sql);
                foreach ($sql as $cell) {
                    if($cell[0] == 0)
                        continue;
                    else
                        echo "<option> $cell[0] </option>";
                }
                $sql = "Select distinct year(date) from $db.LITERATURE";
                $sql = $dbh->query($sql);
                foreach ($sql as $cell) {
                    if($cell[0] == 0)
                        continue;
                    else
                        echo "<option> $cell[0] </option>";
                }
            ?>
        </select>
        <select name="year_max">
            <?php
                $sql = "SELECT DISTINCT year FROM $db.LITERATURE";
                $sql = $dbh->query($sql);
                foreach ($sql as $cell) {
                    if($cell[0] == 0)
                        continue;
                    else
                        echo "<option> $cell[0] </option>";
                }
                $sql = "Select distinct year(date) from $db.LITERATURE";
                $sql = $dbh->query($sql);
                foreach ($sql as $cell) {
                    if($cell[0] == 0)
                        continue;
                    else
                        echo "<option> $cell[0] </option>";
                }
                ?>
        </select>
    <button>ОК</button>
</p>
</form>
<form action="3.php" method="get">
<p><strong> Вывести информацию о книгах автора: </strong>
        <select name="author">
            <?php
                $sql = "SELECT DISTINCT name FROM $db.authors";
                $sql = $dbh->query($sql);
                foreach ($sql as $cell) {
                    echo "<option> $cell[0] </option>";
                }
            ?>
        </select>
    <button>ОК</button>
</p>
</form>
</body>
</html>
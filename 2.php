<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $year_min = $_GET['year_min'];
    $date_max = $_GET['year_max'];
    $sqlSelect = $dbh->prepare(
        "SELECT * FROM $db.LITERATURE 
        JOIN $db.BOOK_AUTHORS 
        on $db.LITERATURE.ID_BOOK = $db.BOOK_AUTHORS.FID_BOOK
        JOIN $db.AUTHORS 
        on $db.BOOK_AUTHORS.FID_AUTHORS = $db.AUTHORS.ID_AUTHORS
        where $db.LITERATURE.year >= :year_min and $db.LITERATURE.year <= :year_max");
    $sqlSelect->execute(array('year_min' => $year_min, 'year_max' => $date_max));
    echo "Информация: <ol>";
    while($cell=$sqlSelect->fetch(PDO::FETCH_BOTH)){
        echo "<li>Книга: $cell[1], автор: $cell[13], издательство: $cell[7], <b>год выпуска: $cell[5]</b>, ISBN $cell[3] </li>";
    }
    $sqlSelect = $dbh->prepare(
        "SELECT * FROM $db.LITERATURE 
        JOIN $db.BOOK_AUTHORS 
        on $db.LITERATURE.ID_BOOK = $db.BOOK_AUTHORS.FID_BOOK
        JOIN $db.AUTHORS 
        on $db.BOOK_AUTHORS.FID_AUTHORS = $db.AUTHORS.ID_AUTHORS
        where year($db.LITERATURE.date) >= :year_min and year($db.LITERATURE.date) <= :year_max");
    $sqlSelect->execute(array('year_min' => $year_min, 'year_max' => $date_max));
    echo "</ol>";
    while($cell=$sqlSelect->fetch(PDO::FETCH_BOTH)){
        if($cell[8] == "Journal")
            echo "<li> Журнал: $cell[1], автор: $cell[13], издательство: $cell[7], <b>дата выпуска: $cell[4]</b>, ISBN $cell[3] </li>";
        else 
            echo "<li> Газета: $cell[1], автор: $cell[13], издательство: $cell[7], <b>дата выпуска: $cell[4]</b>, ISBN $cell[3] </li>";
    }
    echo "</ol>";
?>
</body>
</html>
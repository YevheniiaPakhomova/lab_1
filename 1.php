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
    $publisher = $_GET['publisher'];
    $literate = "Book";
    $sqlSelect = $dbh->prepare(
        "SELECT * FROM $db.LITERATURE 
        JOIN $db.BOOK_AUTHORS 
        on $db.LITERATURE.ID_BOOK = $db.BOOK_AUTHORS.FID_BOOK
        JOIN $db.AUTHORS 
        on $db.BOOK_AUTHORS.FID_AUTHORS = $db.AUTHORS.ID_AUTHORS
        where $db.LITERATURE.LITERATE = :literate and $db.LITERATURE.publisher = :publisher");
    $sqlSelect->execute(array('literate' => $literate, 'publisher' => $publisher));
    echo "Информация: <ol>";
    while($cell=$sqlSelect->fetch(PDO::FETCH_BOTH)){
        echo "<li>Книга: $cell[1], автор: $cell[13], издательство: $publisher, год выпуска: $cell[5], ISBN $cell[3] </li>";
    }
    echo "</ol>";
?>
</body>
</html>
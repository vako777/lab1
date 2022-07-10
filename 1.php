<?php
include "connect.php";
?>
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
if (isset($_REQUEST["dateValue"])) {
    try{
    $date = $_REQUEST["dateValue"];
    $statement = $dbh->prepare(
        "SELECT cost from $db.rent
        where $db.rent.date_end = :date"
    );
    $statement->execute(array('date'=>$date));
    $sum = 0; 
    while($cell=$statement->fetch(PDO::FETCH_BOTH)){
        $sum += $cell[0];
    }
    $res = "Доход с проката " . $sum;
    echo $res;
    }catch(PDOException $e){
        echo "Ошибка " . $e->getMessage();

    }
}  
?>
</body>
</html>
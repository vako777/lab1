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
if (isset($_REQUEST["dateFree"])) {
    try{
    $date = $_REQUEST["dateFree"];
    $statement = $dbh->prepare(
        "SELECT * from $db.rent
        join $db.cars
        on $db.rent.fid_car = $db.cars.id_cars
        where :date NOT BETWEEN $db.rent.date_start AND $db.rent.date_end"
    );
    $statement->execute(array('date'=>$date));
    $sum = 0; 
    $res = "Свободные автомобили на дату: $date <ol>";
    while($cell=$statement->fetch(PDO::FETCH_BOTH)){
        $res .= "<li>Автомобиль: $cell[7]</li>";
    }
    
    echo $res;

    }catch(PDOException $e){
        echo "Ошибка " . $e->getMessage();

    }
}  
?> 
</body>
</html>
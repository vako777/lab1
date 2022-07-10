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
if (isset($_REQUEST["car_rent"])
    && isset($_REQUEST["date_start"])
    && isset($_REQUEST["date_end"])
    && isset($_REQUEST["time_start"])
    && isset($_REQUEST["time_end"])) {
    try{
        $car_rent = $_REQUEST["car_rent"];
        $date_start = $_REQUEST["date_start"];
        $date_end = $_REQUEST["date_end"];
        $time_start = $_REQUEST["time_start"];
        $time_end = $_REQUEST["time_end"];
        $cost = rand(1, 150);
        $stm = $dbh->prepare("SELECT $db.Cars.id_cars from $db.Cars 
        where $db.Cars.name = :car_rent");
        $stm->execute(array('car_rent'=>$car_rent));
        $stm=$stm->fetch(PDO::FETCH_BOTH);
        $fid_car = $stm[0];
        $statement = $dbh->prepare("INSERT INTO $db.rent 
        (fid_car, date_start, time_start, date_end, time_end, cost) 
        values (:fid_car, :date_start, :time_start, :date_end, :time_end, :cost)");
        $statement->execute(array('fid_car'=>$fid_car, 'date_start'=>$date_start, 'time_start'=>$time_start, 'date_end'=>$date_end, 'time_end'=>$time_end, 'cost'=>$cost));
        echo "Данные добавлены";
    }catch(PDOException $e){
        echo "Ошибка " . $e->getMessage();

    }
}  
?> 
</body>
</html>
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
if (isset($_REQUEST["vendors"])) {
    try{
    $vendor = $_REQUEST["vendors"];
    $statement = $dbh->prepare(
        "SELECT * from $db.cars
        JOIN $db.vendors 
        on $db.cars.FID_VENDORS = $db.vendors.ID_VENDORS
        where $db.vendors.name = :vendor"
    );
    $statement->execute(array('vendor'=>$vendor));
    $res = "Автомобили указанного производителя: $vendor <ol>";
    while($cell=$statement->fetch(PDO::FETCH_BOTH)){
        $res .= "<li>$cell[1]</li>";
    }
    $res .= "</ol>";
    echo $res;
    }catch(PDOException $e){
        echo "Ошибка " . $e->getMessage();

    }
}  
?>
</body>
</html>
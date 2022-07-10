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
if (isset($_REQUEST["car"])&& isset($_REQUEST["race"])) {
    try{
    $car = $_REQUEST["car"];
    $race = $_REQUEST["race"];
    $statement = $dbh->prepare(
        "UPDATE $db.cars SET race =:race
        where $db.cars.name = :car"
    );
    $statement->execute(array('race'=>$race, 'car'=>$car));
    echo "Данные были обновлены";
    }catch(PDOException $e){
        echo "Ошибка " . $e->getMessage();

    }
}  
?>
</body>
</html>
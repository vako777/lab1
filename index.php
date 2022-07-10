<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab1</title>
</head>

<body>
<h3>Ковалик Іван Васильович, КІУКІ-19-2, Варіант 6</h3>
<form action="1.php" method="get">
    <p><strong> Полученный доход с проката по состоянию на выбранную дату: </strong>
        <select name="dateValue" id="dateValue" >
            <?php
            $sql = "SELECT distinct date_end from $db.rent";
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
    <p><strong>Автомобили выбранного производителя: </strong>
        <select name="vendors" id="vendors">
            <?php
            $sql = "SELECT DISTINCT name from $db.vendors";
            $sql = $dbh->query($sql);
            foreach ($sql as $cell) {
                echo "<option> $cell[0] </option>";
            }
            ?>
        </select>
        <button>ОК</button>
    </p>

</form>
<form action="3.php" method="get">
    <p><strong> Свободные автомобили </strong>
        <select  name="dateFree" id="dateFree">
            <?php
            $sql = "SELECT distinct date_start from $db.rent";
            $sql = $dbh->query($sql);
            foreach ($sql as $cell) {
                echo "<option> $cell[0] </option>";
            }
            ?>
        </select>
        <button>ОК</button>
    </p>
</form>
<form action="update.php" method="get">
<p><b>Изменить данные о пробеге для выбранного автомобиля</b>
<select  name="car" id="car">
        <?php
            $sql = "SELECT distinct name from $db.cars";
            $sql = $dbh->query($sql);
            foreach ($sql as $cell) {
                echo "<option> $cell[0] </option>";
            }
        ?>
        </select>
        <input type="text" value="1234" name="race"></input>
        <button>ОК</button></p> 
        
</form> 
<form action="add.php" method="get">  
<p><b>Добавить новые данные об аренде</b>   
<select  name="car_rent" id="car_rent">
        <?php
            $sql = "SELECT distinct name from $db.cars";
            $sql = $dbh->query($sql);
            foreach ($sql as $cell) {
                echo "<option> $cell[0] </option>";
            }
        ?>
        </select>
        <input type="text" value="2022-06-09" name="date_start"></input>
        <input type="text" value="2022-06-09" name="date_end"></input>
        <input type="text" value="12:00" name="time_start"></input> 
        <input type="text" value="20:00" name="time_end"></input> 
        <button>ОК</button>
       </p>
</form>
</body>

</html>
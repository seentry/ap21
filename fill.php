<?php

require_once "autoloader.php";

$connection = new Connection;
$conn = $connection->getConn();

for ($i=0; $i<50;$i++){

    $days = rand(1, 30);
    $month = rand(1, 12);
    $year = rand(1900, 2020);

    $id=rand(0,300);
    $company="pacostars";
    $investment=rand(1,1000);
    $date = "$year-$month-$days";
    $active=rand(0,1);
    
    $query = "INSERT INTO `investment`(id, company, investment, date, active)
    VALUES ('$id','$company','$investment','$date','$active')"; 

    if (mysqli_query($conn, $query)) {
        header("location: index.php");
    }
}
?>
<?php

    echo "it works";
    $email = $_POST["dEmail"];
    echo $email . " ";
    $phone = $_POST["dPhone"];
    $city = $_POST["dcity"];
    $car = $_POST["dCar"];
    $tier = $_POST["dTier"];
    echo $email . " "  . $phone . " " . $city . " " . $car . " " . $tier;

    require_once 'dbh.inc.php';


    function createApplication($conn, $email, $phone, $city, $car, $tier){
        $sql = "INSERT INTO applications (email, phone, city, car, tier) VALUES($email, $phone, $city, $car, $tier);"; 

    }

?>
<?php

if (isset($_POST["submit"])){
    // echo "it works";
    $email = $_POST["dEmail"];
    $phone = $_POST["dPhone"];
    $city = $_POST["dCity"];
    $car = $_POST["dCar"];
    $tier = $_POST["dTier"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($email,$phone,$city,$car,$tier) !== false){
        header("location: ../home.php#!/driverSignup?error=emptyinput");
        exit(); //stop the script
    }
    if(invalidEmail($email) !== false){
        header("location: ../home.php#!/driverSignup?error=invalidemail");
        exit(); //stop the script
    }

    createApplication($conn, $email, $phone, $city, $car, $tier);
}
else{
    header("location: ../home.php#!/driverSignup");
    exit();
}

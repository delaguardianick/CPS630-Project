<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql to create car table
    $sql = "CREATE TABLE rCars(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        model VARCHAR(30) NOT NULL,
        color VARCHAR(30) NOT NULL,
        driver VARCHAR(30) NOT NULL,
        tierCode VARCHAR(50),
        availabilityCode BOOL,
        reg_date TIMESTAMP
    )";
    
    if (mysqli_query($conn, $sql)) {
        echo "carTable created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
    // echo("<br>");
    // sql to create trips table
    // rideDate format: YYYY-MM-DD HH:MI:SS
    $sql = "CREATE TABLE rTrips(
        tripId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        userId VARCHAR(30),
        carId VARCHAR(30) NOT NULL,
        origin VARCHAR(30) NOT NULL,
        dest VARCHAR(30) NOT NULL,
        distance INT(6) NOT NULL,
        tier VARCHAR(30) NOT NULL,
        price INT(6),
        rideDate DATETIME, 
        dateOfTransaction TIMESTAMP
    )";
    
    if (mysqli_query($conn, $sql)) {
        echo "Trips table created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
    $sql = "CREATE TABLE itemOrders(
        orderId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        userId VARCHAR(30),
        carId VARCHAR(30) NOT NULL,
        origin VARCHAR(30) NOT NULL,
        dest VARCHAR(30) NOT NULL,
        distance INT(6) NOT NULL,
        tier VARCHAR(30) NOT NULL,
        price INT(6),
        rideDate DATETIME, 
        dateOfTransaction TIMESTAMP
    )";
    
    if (mysqli_query($conn, $sql)) {
        echo "Trips table created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
?>
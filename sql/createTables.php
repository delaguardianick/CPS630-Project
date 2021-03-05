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
    
    // trips
    // $sql = "CREATE TABLE rTrips(
    //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     model VARCHAR(30) NOT NULL,
    //     model VARCHAR(30) NOT NULL,
    //     tierCode VARCHAR(50),
    //     availabilityCode BOOL,
    //     reg_date TIMESTAMP
    // )";
    
    // if (mysqli_query($conn, $sql)) {
    //     echo "carTable created successfully";
    // } else {
    //     echo "Error creating table: " . mysqli_error($conn);
    // }

     // sql to create ITEMS table
     $sql = "CREATE TABLE items(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        item VARCHAR(30) NOT NULL,
        store_name VARCHAR(30) NOT NULL,
        address VARCHAR(150) NOT NULL,
        price DECIMAL(20,2),
        reg_date TIMESTAMP
    )";
    
    if (mysqli_query($conn, $sql)) {
        echo "items created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
?>
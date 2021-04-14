<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
    $json = $_POST['rating'];

    $rating = json_decode($json, true);

    // $itemId = $data["itemInfo"]["itemId"];
    // $origin = $data["itemInfo"]["pickup"];
    // $dest = $data["destination"];
    // $item = $data["itemInfo"]["item"];
    // // $driver = $data["carInfo"]["driver"];
    // $storename = $data["storename"];
    // echo "here is store name";
    // echo $storename;
    // $price = $data["itemInfo"]["price"];


    //echo "USER ID IS " . $userId, $itemId, $storename, $origin, $dest, $distance, $item, $price;
    //$itemId, $storename, $origin, $dest, $distance, $item, $price;


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

    $sql = "INSERT INTO ratings (Stars) VALUES ($rating)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
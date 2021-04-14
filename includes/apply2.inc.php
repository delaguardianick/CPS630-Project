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

// echo "it works";
$email = $_POST["dEmail"];
// echo $email . " ";
$phone = $_POST["dPhone"];
$city = $_POST["dCity"];
$car = $_POST["dCar"];
$tier = $_POST["dTier"];
echo $email . " "  . $phone . " " . $city . " " . $car . " " . $tier;

$sql = "INSERT INTO applications (email, phone, city, car, tier) VALUES ('".$email."','".$phone."', '".$city."', '".$car."', '".$tier."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<?php


    require_once 'dbh.inc.php';


    $sql = "INSERT INTO applications (email, phone, city, car, tier) VALUES($email, $phone, $city, $car, $tier)"; 

    

?>

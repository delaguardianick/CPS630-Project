<?php 
require('dbGetTable.php');
if (isset($_POST['delete'])){
$userid = $_POST['userUid'];
$sql = "DELETE FROM users WHERE userUid = '$userid';";
if ($conn->query($sql) === true){

}
}
?>
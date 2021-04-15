<?php
// including the database connection file
//include_once("config.php");
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

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$usersName = mysqli_real_escape_string($mysqli, $_POST['usersName']);
	$usersEmail = mysqli_real_escape_string($mysqli, $_POST['usersEmail']);
	$usersUid = mysqli_real_escape_string($mysqli, $_POST['usersUid']);	
	$usersPwd = mysqli_real_escape_string($mysqli, $_POST['usersPwd']);	
	// checking empty fields
	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET usersName='$usersName',usersEmail='$usersEmail',usersUid='$usersUid', usersPwd='$usersPwd' WHERE id=$id");
		//redirectig to the display page. In our case, it is index.php
		header("location: ../home.php#!/dbMaintain");
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$usersName = $res['usersName'];
	$usersEmail = $res['usersEmail'];
	$usersUid = $res['usersUid'];
	$usersPwd = $res['usersPwd'];
}
?>
<html>
<head>	
        <title>Ride To Destination - Service A</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/dbMaintain.js"></script>
</head>

<body>
	<a href="location: ../home.php#!/dbMaintain">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="#!edit">
		<table>
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $usersName;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="age" value="<?php echo $usersEmail;?>"></td>
			</tr>
			<tr> 
				<td>User ID</td>
				<td><input type="text" name="email" value="<?php echo $usersUid;?>"></td>
			</tr>
			<tr> 
				<td>User Password</td>
				<td><input type="text" name="email" value="<?php echo $usersPwd;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
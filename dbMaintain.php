<html>
    <head>
        <title>Ride To Destination - Service A</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/dbMaintain.js"></script>
    </head>
    <body>
    <?php 
    $address = $_GET['q'];

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
    // $sql = "SELECT * FROM `rcars` WHERE `storeCode` = $store";
    $sql = 'SELECT * FROM `users`';
    // ERROR IS HERE ^^^^^^^^^^^^^^^^^^
    $result = $conn->query($sql) or die($conn->error);
    ?>
    <h2>user table</h2>
    <?php 
    if ($result->num_rows > 0) {
        echo'
        
        <table class="center"; cellpadding="4"; cellspacing:"100"; text-align:"center" id="car-table";>
            <tr>
                <th></th>
                <th>UserID</th>
                <th>Username</th>
                <th>Email</th>
                <th>UID</th>
                <th>password</th>
                <th>Action</th>
            </tr>';

        // output data of each row
        $inc = 1; 
        while($row = $result->fetch_assoc()) {
            echo'<tr>
            <td scope="row">
            <div class="radio">
                <label><input type="radio" id="r' . strval($inc) . '" name="rowSelect" value="' . strval($inc) . '"></label>
            </div></td>
                <td>' . $row['id'] . '</td>
                <td>' . $row['usersName'] . '</td>
                <td>' . $row['usersEmail'] . '</td>
                <td>' . $row['usersUid'] . '</td>
                <td>' . $row['usersPwd'] . '</td>
                <td><a href="edit.php?id='.$row['id'].'">Edit</a> | <a href="delete.php?id='.$row['id'].'"onClick="return confirm("Are you sure you want to delete?")">Delete</a></td>
                </tr>';
            $inc += 1;
        } 
        echo ' </tbody>
                </table>';
                
    }else {
        echo "0 results";
    }
    ?>
    <h2>Items table</h2>
    <?php
    $sql = 'SELECT * FROM `items`';
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
        echo'
        
        <table class="center"; cellpadding="4"; cellspacing:"100"; text-align:"center" id="car-table";>
            <tr>
                <th></th>
                <th>Item ID</th>
                <th>Item</th>
                <th>Store</th>
                <th>Price</th>
                <th>Action</th>
                
            </tr>';

        // output data of each row
        $inc = 1; 
        while($row = $result->fetch_assoc()) {
            echo'<tr>
            <td scope="row">
            <div class="radio">
                <label><input type="radio" id="r' . strval($inc) . '" name="rowSelect" value="' . strval($inc) . '"></label>
            </div></td>
                <td>' . $row['id'] . '</td>
                <td>' . $row['item'] . '</td>
                <td>' . $row['store_name'] . '</td>
                <td>' . $row['price'] . '</td>
                <td><a href="#!edit?id='.$row['id'].'">Edit</a> | <a href="#!delete?id='.$row['id'].'"onClick="return confirm("Are you sure you want to delete?")">Delete</a></td>
            </tr>';
            $inc += 1;
        } 
        echo ' </tbody>
                </table>';
                
    }else {
        echo "0 results";
    }
    ?>
    <h2>Cars table</h2>
    <?php
    $sql = 'SELECT * FROM `items`';
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
        echo'
        
        <table class="center"; cellpadding="4"; cellspacing:"100"; text-align:"center" id="car-table";>
            <tr>
                <th scope="col"></th>
                <th scope="col">Car ID</th>
                <th scope="col">Model</th>
                <th scope="col">Color</th>
                <th scope="col">Service Tier</th>
                <th scope="col">Driver</th>
                <th>Action</th>
                
            </tr>';

        // output data of each row
        $inc = 1; 
        while($row = $result->fetch_assoc()) {
            echo'<tr>
            <td scope="row">
            <div class="radio">
                <label><input type="radio" id="r' . strval($inc) . '" name="rowSelect" value="' . strval($inc) . '"></label>
            </div></td>
                <td>' . $row['id'] . '</td>
                <td>' . $row['model'] . '</td>
                <td>' . $row['color'] . '</td>
                <td>' . $row['tierCode'] . '</td>
                <td>' . $row['driver'] . '</td>
                <td><a href="#!edit?id='.$row['id'].'">Edit</a> | <a href="#!delete?id='.$row['id'].'"onClick="return confirm("Are you sure you want to delete?")">Delete</a></td>
            </tr>';
            $inc += 1;
        } 
        echo ' </tbody>
                </table>';
                
    }else {
        echo "0 results";
    }
    ?>
    <h2>Trips table</h2>
    <?php
    $sql = 'SELECT * FROM `items`';
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
        echo'
        
        <table class="center"; cellpadding="4"; cellspacing:"100"; text-align:"center" id="car-table";>
            <tr>
                <th scope="col"></th>
                <th scope="col">User ID</th>
                <th scope="col">Car ID</th>
                <th scope="col">Origin</th>
                <th scope="col">Destination</th>
                <th scope="col">Distance</th>
                <th scope="col">tier</th>
                <th scope="col">Price</th>
                <th>Action</th>
                
            </tr>';

        // output data of each row
        $inc = 1; 
        while($row = $result->fetch_assoc()) {
            echo'<tr>
            <td scope="row">
            <div class="radio">
                <label><input type="radio" id="r' . strval($inc) . '" name="rowSelect" value="' . strval($inc) . '"></label>
            </div></td>
                <td>' . $row['userID'] . '</td>
                <td>' . $row['carID'] . '</td>
                <td>' . $row['origin'] . '</td>
                <td>' . $row['dest'] . '</td>
                <td>' . $row['distance'] . '</td>
                <td>' . $row['tier'] . '</td>
                <td>' . $row['price'] . '</td>
                <td><a href="#!edit?id='.$row['id'].'">Edit</a> | <a href="#!delete?id='.$row['id'].'"onClick="return confirm("Are you sure you want to delete?")">Delete</a></td>
            </tr>';
            $inc += 1;
        } 
        echo ' </tbody>
                </table>';
                
    }else {
        echo "0 results";
    }
    ?>
    <h2>Orders table</h2>
    <?php
    $sql = 'SELECT * FROM `items`';
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
        echo'
        
        <table class="center"; cellpadding="4"; cellspacing:"100"; text-align:"center" id="car-table";>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Item ID</th>
                <th scope="col">Store Name</th>
                <th scope="col">Store Address</th>
                <th scope="col">Destination</th>
                <th scope="col">Item</th>
                <th scope="col">Price</th>
                <th>Action</th>
                
            </tr>';

        // output data of each row
        $inc = 1; 
        while($row = $result->fetch_assoc()) {
            echo'<tr>
            <td scope="row">
            <div class="radio">
                <label><input type="radio" id="r' . strval($inc) . '" name="rowSelect" value="' . strval($inc) . '"></label>
            </div></td>
                <td>' . $row['userId'] . '</td>
                <td>' . $row['ItemId'] . '</td>
                <td>' . $row['store_name'] . '</td>
                <td>' . $row['store_address'] . '</td>
                <td>' . $row['dest'] . '</td>
                <td>' . $row['item'] . '</td>
                <td><a href="#!edit?id='.$row['id'].'">Edit</a> | <a href="#!delete?id='.$row['id'].'"onClick="return confirm("Are you sure you want to delete?")">Delete</a></td>
            </tr>';
            $inc += 1;
        } 
        echo ' </tbody>
                </table>';
                
    }else {
        echo "0 results";
    }
    mysqli_close($conn);
    // <button class="show-price" onclick="infoForPayment()">log price</button>
?>
    </body>
</html>
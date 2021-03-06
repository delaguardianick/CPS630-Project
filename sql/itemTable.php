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
    $sql = 'SELECT * FROM `items` WHERE `address` = "' . $address . '"';
    // ERROR IS HERE ^^^^^^^^^^^^^^^^^^
    $result = $conn->query($sql) or die($conn->error);

    if ($result->num_rows > 0) {
        echo'
        
        <table class="center"; cellpadding="4"; cellspacing:"100"; text-align:"center";>
            <tr>
                <th></th>
                <th>Item ID</th>
                <th>Item</th>
                <th>Store</th>
                <th>Price</th>
            </tr>';

        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo'<tr>
            <td>
            <div class="radio">
                <input type="checkbox" id="tier" name="optradio" value ="'.$row['price'].'" onclick="setPrice()">
            </div></td>
                <td>' . $row['id'] . '</td>
                <td>' . $row['item'] . '</td>
                <td>' . $row['store_name'] . '</td>
                <td id="item-price1">' . $row['price'] . '</td>
            </tr>';
        } 
        echo '</table>
        <button class="checkout">Proceed to Checkout</button>';
    }else {
        echo "0 results";
    }
    mysqli_close($conn);
?>
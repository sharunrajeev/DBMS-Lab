<?php

use function PHPSTORM_META\type;

$mysqli = new mysqli("localhost", "sharun", "sharun2001", "lab");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    } else {
        echo 'Connection successful<br>';
    }

    if(isset($_POST['getbydate'])) {
        $date = $_POST['date'];
        echo '<table>';
        $query = "SELECT customer.Cust_Name,items.Item_ID FROM customer,items,sales WHERE sales.Bill_Date='$date' AND customer.Cust_ID=sales.Customer_ID AND items.Item_ID=sales.Item_ID";
        $result = $mysqli->query($query);
        if ($result->num_rows > 0) {
            echo "<tr><th>Customer Name</th><th>Item ID</th><tr>";
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo "<td>" . $row['Cust_Name'] . "</td>";
                echo "<td>" . $row['Item_ID'] . "</td>";
                echo '</tr>';
        }
        } else {
            echo "No data available";
        }
        echo '<table>';
        echo '<br>';
        echo '<a href="home.php">Go Back</a>';
    }

    if(isset($_POST['totalbill'])) {
        echo "<h3>Total Bill</h3>";
        echo '<table>';
        $c_name = $_POST['name'];
        echo '<h3>Customer : '.$c_name.'</h3>';
        $query = "SELECT sales.Quantity_Sold,items.Item_price FROM items,sales,customer WHERE customer.Cust_Name='$c_name' AND customer.Cust_ID=sales.Customer_ID AND items.Item_ID=sales.Item_ID";
        $result = $mysqli->query($query);
        if ($result->num_rows > 0) {
            echo "<tr><th>Quantity Sold</th><th>Item price</th><th>Final amount</th><tr>";
            while ($row = $result->fetch_assoc()) {
                $quantity = floatval($row['Quantity_Sold']);
                $item = floatval($row['Item_price']);
                echo '<tr>';
                echo "<td>" . $quantity . "</td>";
                echo "<td>" . $item . "</td>";
                $finalamount = $quantity * $item;
                echo "<td>" . $finalamount . "</td>";
                echo '</tr>';
        }
        } else {
            echo "No data available";
        }
        echo '<table>';
        echo '<br>';
        echo '<a href="home.php">Go Back</a>';
    }

    if(isset($_POST['getdaliydata'])) {
        $date = $_POST['date'];
        echo '<table>';
        $query = "SELECT customer.Cust_Name,items.Item_ID FROM customer,items,sales WHERE sales.Bill_Date='2021-11-12' AND customer.Cust_ID=sales.Customer_ID AND items.Item_ID=sales.Item_ID";
        $result = $mysqli->query($query);
        if ($result->num_rows > 0) {
            echo "<tr><th>Customer Name</th><th>Item ID</th><tr>";
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo "<td>" . $row['Cust_Name'] . "</td>";
                echo "<td>" . $row['Item_ID'] . "</td>";
                echo '</tr>';
        }
        } else {
            echo "No data available";
        }
        echo '<table>';
        echo '<br>';
        echo '<a href="home.php">Go Back</a>';
    }
    $mysqli->close();
?>
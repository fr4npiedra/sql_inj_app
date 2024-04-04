<?php
        $servername = "127.0.0.1"; 
        $username = "useradmin"; 
        $password = "Password1"; 
        $database = "app_db";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM inventory";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Inventory Data</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Item ID</th><th>Item Name</th><th>Quantity</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['item_id'] . "</td>";
            echo "<td>" . $row['item_name'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No inventory data found.";
    }

mysqli_close($conn);
?>

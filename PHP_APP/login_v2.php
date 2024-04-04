<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="usernameForm" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="passwordForm" name="password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <?php
        
        $servername = "127.0.0.1";
        $username = "useradmin"; 
        $password = "Password1"; 
        $database = "app_db";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST['login'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $username = mysqli_real_escape_string($conn, $username);
            $password = mysqli_real_escape_string($conn, $password);

            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                header("Location: index.php");
                exit();
            } else {
                echo "<h3>Login failed. Please check your credentials.</h3>";
            }
        }

        mysqli_close($conn);
    ?>
</body>
</html>

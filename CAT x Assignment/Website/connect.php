<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if (!empty($username)) {
    if (!empty($password)) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = ""; // Provide your actual database password here
        $dbname = "usercredentials";
        
        // Create connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        // Check connection
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO authorizedusers (username, password) VALUES ('$username', '$password')";
            if ($conn->query($sql)) {
                // Redirect to welcome.php
                header("Location: index2.php");
                exit(); // Stop further execution
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    } else {
        echo "Password should not be empty";
    }
} else {
    //echo "Username should not be empty";
}
?>

<!DOCTYPE html>
<html>
<body>

<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'usercredentials');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}



$sql = "SELECT ID, username, email, img FROM authorizedusers";
$result = $db->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        print "<br> id: ". $row["ID"]. "<br> - Name: ". $row["username"]. "<br> - Email: " . $row["email"] . "<br>";
      print "<img src=\"".$row["img"]."\">";
     
    }
} else {
    print "0 results";
}



$db->close();   
        ?> 



</body>
</html>
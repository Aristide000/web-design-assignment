<!DOCTYPE html>
<html>
<!--IRAGUHA Aristide 222008128 24th/04/2024 BIT GROUP A-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" title="style1" media="screen,tv,projection,handled,print" />
    <title>css based project</title>
    
</head>
<body>
<header>
    <nav>
    <div class="logo">
            <p>Parking Ticket Payment Website</p>
        </div>
        <ul>
        <li><a href="index.php" <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>>Home</a></li>
            <li><a href="user.php" <?php if (basename($_SERVER['PHP_SELF']) == 'user.php') echo 'class="active"'; ?>>Users Info</a></li>
            <li><a href="ticket.php" <?php if (basename($_SERVER['PHP_SELF']) == 'ticket.php') echo 'class="active"'; ?>>Ticket Info</a></li>
            <li><a href="payment.php" <?php if (basename($_SERVER['PHP_SELF']) == 'payment.php') echo 'class="active"'; ?>>Payment Info</a></li>
            <li><a href="aboutus.php" <?php if (basename($_SERVER['PHP_SELF']) == 'aboutus.php') echo 'class="active"'; ?>>About us</a></li>
            <li class="dropdown">
                <a href="#">Settings</a>
                <div class="dropdown-contents">
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                    <a href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</header>
<center>
<section>
    <h2>Clients Information</h2>
    <div class="container">
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Telephone</th>
                <th>Address</th>
                <th>VehicleID</th>
                <th>LicensePlate</th>
                <th>Model</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to database
            $conn = mysqli_connect("localhost", "root", "", "parkingticketsystemdatabase");
            
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            // Fetch data from database
            $sql = "SELECT * FROM userinfo";
            $result = mysqli_query($conn, $sql);
            
            // Display data
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["UserID"] . "</td>";
                    echo "<td>" . $row["Firstname"] . "</td>";
                    echo "<td>" . $row["Lastname"] . "</td>";
                    echo "<td>" . $row["Telephone"] . "</td>";
                    echo "<td>" . $row["Address"] . "</td>";
                    echo "<td>" . $row["VehicleID"] . "</td>";
                    echo "<td>" . $row["LicensePlate"] . "</td>";
                    echo "<td>" . $row["Model"] . "</td>";
                    echo "<td><button onclick='updateUser(" . $row["UserID"] . ")'>Update</button> <button onclick='deleteUser(" . $row["UserID"] . ")'>Delete</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No data available</td></tr>";
            }
            
            // Close connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
        </div>

<section><p>All the information about information about our clients can be found inside the database above...</p>
	<p>To insert or edit your data, use the action column or <a href="contact.php">Contact us</a></p></section>
</center>
<footer>
<p>&copy;copyright2024 <a href="faqs.php">FAQs</a> | <a href="terms.php">Terms of service</a> | <a href="terms.php">Privacy policy</a> | <a href="contact.php">Contact us</a></p>
</footer>
</section>
</body>
</html>

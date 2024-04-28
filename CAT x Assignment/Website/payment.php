<!DOCTYPE html>
<html>
<!--IRAGUHA Aristide 222008128 24th/04/2024 BIT GROUP A-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" title="style1" media="screen,tv,projection, handled, print" />
	<title>css based project</title>
	
</head>
<body><!DOCTYPE html>
<html>
<!--today we are on 19th/03/2024 BIT GROUP A-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" title="style1" media="screen,tv,projection, handled, print" />
	<title>css based project</title>
	
</head>
<body><!DOCTYPE html>
	<html>
	<!--today we are on 19th/03/2024 BIT GROUP A-->
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
				<li><a href="index.php">Home</a></li>
				<li><a href="user.php">Users Info</a></li>
				<li><a href="ticket.php">Ticket Info</a></li>
				<li><a href="payment.php">Payment Info</a></li>
				<li><a href="aboutus.php">About us</a></li>
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
		<h2>Paycheck Information</h2>
		<div class="container">
		<table>
			<thead>
				<tr>
				    <th>PaymentID</th>
				    <th>UserID</th>
					<th>PaymentMethod</th>
					<th>AmountPaid</th>
					<th>PaymentDate&Time</th>
					<th>Transaction ID</th>
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
				$sql = "SELECT * FROM paymentinfo";
				$result = mysqli_query($conn, $sql);
				
				// Display data
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row["PaymentID"] . "</td>";
						echo "<td>" . $row["UserID"] . "</td>";
						echo "<td>" . $row["PaymentMethod"] . "</td>";
						echo "<td>" . $row["AmountPaid"] . "</td>";
						echo "<td>" . $row["PaymentDate&Time"] . "</td>";
						echo "<td>" . $row["TransactionID"] . "</td>";
						echo "<td><button onclick='updateUser(" . $row["PaymentID"] . ")'>Update</button> <button onclick='deleteUser(" . $row["PaymentID"] . ")'>Delete</button></td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='4'>No data available</td></tr>";
				}
				
				// Close connection
				mysqli_close($conn);
				?>
			</tbody>
		</table>
			</div>
	
	<section><p>All the information about payments made by our clients can be found inside the database above...</p>
	<p>To insert or edit your data, use the action column or <a href="contact.php">Contact us</a></p></section>
	</center>
	<footer>
	<p>&copy;copyright2024 <a href="faqs.php">FAQs</a> | <a href="terms.php">Terms of service</a> | <a href="terms.php">Privacy policy</a> | <a href="contact.php">Contact us</a></p>
	</footer>
	</section>
	</body>
	</html>
	


<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="formstyle.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="connect.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>

  <?php
  // Step 1: Connect to the Database
  $conn = mysqli_connect("localhost", "root", "", "usercredentials");

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Step 2: Create Operation (Inserting a new record)
  if(isset($_POST['reg_user'])) {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password_1'];

      $sql = "INSERT INTO authorizedusers (username, email, password) VALUES ('$username', '$email', '$password')";

      if (mysqli_query($conn, $sql)) {
          echo "Registration successful";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
  }

  mysqli_close($conn);
  ?>
</body>
</html>

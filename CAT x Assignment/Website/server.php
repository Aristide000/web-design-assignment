<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'usercredentials');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM authorizedusers WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = password_hash($password_1, PASSWORD_DEFAULT); // Hash the password

    $query = "INSERT INTO authorizedusers (username, email, password) 
              VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index2.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $query = "SELECT * FROM authorizedusers WHERE username='$username'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
      $user = mysqli_fetch_assoc($result);
      if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index2.php');
      } else {
        array_push($errors, "Wrong password");
      }
    } else {
      array_push($errors, "Username not found");
    }
  }
}

// UPDATE USER
if (isset($_POST['update_user'])) {
  $id = $_POST['id'];
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);

  // Update user data
  $query = "UPDATE authorizedusers SET username='$username', email='$email' WHERE id=$id";
  mysqli_query($db, $query);
  $_SESSION['success'] = "User information updated successfully";
  header('location: index2.php');
}

// DELETE USER
if (isset($_GET['delete_user'])) {
  $id = $_GET['delete_user'];
  // Delete user data
  $query = "DELETE FROM authorizedusers WHERE id=$id";
  mysqli_query($db, $query);
  $_SESSION['success'] = "User deleted successfully";
  header('location: index2.php');
}

// READ USER
function getUsers() {
  global $db;
  $query = "SELECT * FROM authorizedusers";
  $result = mysqli_query($db, $query);
  return $result;
}
?>

<?php
session_start();

// initializing variables
$username = "";
$shop = "";
$reg = "";
$email = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
 $role = mysqli_real_escape_string($db, $_POST['role']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $shop = mysqli_real_escape_string($db, $_POST['shop']);
  $reg = mysqli_real_escape_string($db, $_POST['reg']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phnumber = mysqli_real_escape_string($db, $_POST['phnumber']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($role)) { array_push($errors, "Role is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($shop)) { array_push($errors, "Shop name is required"); }
  if (empty($reg)) { array_push($errors, "Registration Number is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;

  	$query = "INSERT INTO users (role, username, shop, reg,  email, phnumber, password) 
  			  VALUES('$role','$username', '$shop', '$reg', '$email', '$phnumber', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = "yo";
    $_SESSION['role'] = 'role...';
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// ...

// ... 

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
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['role'] = $username;
      
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>

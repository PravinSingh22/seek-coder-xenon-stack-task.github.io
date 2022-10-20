<?php 
		include "connect.php";

// Starting the session, necessary 
// for using session variables 
session_start(); 

// Declaring and hoisting the variables 
$username = ""; 
$email = ""; 
$errors = array(); 
$_SESSION['success'] = ""; 

$db = mysqli_connect('localhost', 'root', '', 'digitalclue'); 

// Registration code 
if (isset($_POST['reg_user'])) { 

	// Receiving the values entered and storing 
	// in the variables 
	// Data sanitization is done to prevent 
	// SQL injections 
	$username = mysqli_real_escape_string($db, $_POST['username']); 
	$email = mysqli_real_escape_string($db, $_POST['email']); 
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']); 
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']); 
	$mobile = mysqli_real_escape_string($db, $_POST['mobile']); 
	
	// Ensuring that the user has not left any input field blank 
	// error messages will be displayed for every blank input 
	if (empty($username)) { array_push($errors, "Username is required"); } 
	if (empty($email)) { array_push($errors, "Email is required"); } 
	if (empty($password_1)) { array_push($errors, "Password is required"); } 
	if (empty($mobile)) { array_push($errors, "mobile.no is required"); } 
	

	
	
	
	if ($password_1 != $password_2) { 
		array_push($errors, "The two passwords do not match"); 
		// Checking if the passwords match 
	} 

	// If the form is error free, then register the user 
	if (count($errors) == 0) { 
		
		// Password encryption to increase data security 
		$password = md5($password_1); 
		
		// Inserting data into table 
		$query = "INSERT INTO users (username,password,email,mobile) 
				VALUES('$username', '$password','$email', $mobile)"; 
		
		mysqli_query($db, $query); 

		// Storing username of the logged in user, 
		// in the session variable 
		$_SESSION['username'] = $username; 
		
		// Welcome message 
		$_SESSION['success'] = "You have logged in"; 
		
		// Page on which the user will be 
		// redirected after logging in 
		header('location:homepage.php'); 
	} 
} 

// User login 
if (isset($_POST['btn1'])) { 
	
	// Data sanitization to prevent SQL injection 
	$username = mysqli_real_escape_string($db, $_POST['username']); 
	$mobile = mysqli_real_escape_string($db, $_POST['mobile']); 
	$email = mysqli_real_escape_string($db, $_POST['email']); 
	$text = mysqli_real_escape_string($db, $_POST['message']); 

	// Error message if the input field is left blank 
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	} 
	if (empty($mobile)) { 
		array_push($errors, "mobile is required"); 
	} 
	if (empty($email)) { 
		array_push($errors, "email is required"); 
	} 
	if (empty($text)) { 
		array_push($errors, "message is required"); 
	} 

	// Checking for the errors 
	if (count($errors) == 0) { 
		
		// Password matching 
		$email = md5($email); 
		$mobile = md5($mobile); 
		
		$query = "SELECT * FROM users WHERE username='$username' AND mobile='$mobile'
		AND email='$email'"; 
		$results = mysqli_query($db, $query); 
	$sql="insert into chat(username,mobile,email_id,message)
	values('".$username."','".$mobile."','".$email."',".$text.")";
		$results1 = mysqli_query($db, $sql); 
		
		// $results = 1 means that one user with the 
		// entered username exists 
		if (mysqli_num_rows($results1) == 1) { 
			
			// Storing username in session variable 
			$_SESSION['username'] = $username; 
			
			// Welcome message 
			$_SESSION['$text'] = "You have sent message!"; 
			
			// Page on which the user is sent 
			// to after logging in 
			header('location: chat_section.php'); 
		} 
		else { 
			
			// If the username and password doesn't match 
			array_push($errors, "Username or mobile or email  incorrect"); 
		} 
	} 
} 

?> 

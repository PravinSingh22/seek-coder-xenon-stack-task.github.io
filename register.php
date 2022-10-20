<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password= $email= $mobile = $confirm_password = "";
$username_err = $password_err= $email_err= $mobile_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT * FROM Customer WHERE name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }

	if(empty(trim($_POST["email"]))){
		$email_err = "Please enter email address.";     
    } else{
        $email = trim($_POST["email"]);
        } 

	if(empty(trim($_POST["mobile"]))){
        $mobile_err = "Please enter mobile no.";     
	}else if(strlen(trim($_POST["mobile"]))==10)
			$mobile = trim($_POST["mobile"]);
		else
           $mobile_err = "mobile no. length don't match";
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($email_err) && empty($mobile_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO Customer (Name, Password, Email_Id, Phone_no) VALUES (?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password,$param_email, $param_mobile);
            
            // Set parameters
            $param_username = $username;
			$param_email = $email;
			$param_mobile = $mobile;
            $param_password =$password; // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
						session_start();
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;
                // Redirect to login page
                header("location: seekcoding.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XENON</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id='register' class='input-group-register'>
 					 
				<div class=" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
					<input type="text" class="input-field" name="username"  placeholder="Full Name"value=""required>
					<span><?php echo $username_err; ?></span>
				</div>
				<div class="<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					<input type="password" name="password" class="input-field"  value=""placeholder="Password">
					<span><?php echo $password_err; ?></span>
				</div>
				<div class="<?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
					<input type="password" name="confirm_password" class="input-field" value="" placeholder="Confirm Password">
					<span><?php echo $confirm_password_err; ?></span>
				</div>
				<div class="<?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
					<input type="email" class="input-field" name="email" value="" placeholder="Email Id" required>
					<span ><?php echo $email_err; ?></span> 
				</div>
								
				<div class="<?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
					<input type="mobile" name="mobile" class="input-field"value="" placeholder="Mobile Number">
					<span ><?php echo $mobile_err; ?></span>  
				</div>
				<div>
					<button type='submit'class='submit-btn' onclick="register.php">Register</button>
				</div>
			</form>

</body>
</html>

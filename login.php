<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: seekcoding.php");
    exit;
}
require_once "config.php";
$username = $password = "";
$username_err = $password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT Cust_id, name, password FROM customer WHERE name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password==$hashed_password){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            header("location: seekcoding.php");
                        } else{
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
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
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id='login' class='input-group-login'>
								<div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
									<input type="text" name="username" class="input-field" placeholder='username' required value="<?php echo $username; ?>">
									<span><?php echo $username_err; ?></span>
								</div>    
								<div class="<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
									<input type="password" name="password" class="input-field" placeholder='Enter Password' required>
									<span><?php echo $password_err; ?></span>
								</div>
								<div>
									<button type='submit'class='submit-btn'onclick="login.php">Log in</button>
								</div>
							</form>
     
</body>
</html>

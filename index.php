<?php
// Initialize the session
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    header("location: index.php");
    exit;
}
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: seekcoding.php");
    exit;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XENON</title>
    <link rel="stylesheet" href="style.css">
</head>
<body><div class="full-page">
    <div class="navbar">
        <div>
            <a href='website.html'>Seek Coding</a>
        </div>
        <nav>
            <ul id='MenuItems'>
                <li><a href='#'>Home</a></li>
                <li><a href='#'>About Us</a></li>
                <li><a href='#'>Services</a></li>
                <li><a href='#'>Contact</a></li>
                <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button></li>
            </ul>
        </nav>
    </div>
    <div id='login-form'class='login-page'>
        <div class="form-box">
            <div class='button-box'>
                <div id='btn'></div>
                <button type='button'onclick='login()'class='toggle-btn'>Log In</button>
                <button type='button'onclick='register()'class='toggle-btn'>Register</button>
            </div>

		<?php include "login.php";?>
		<?php include "register.php";?>

        </div>
    </div>
</div>
    <script>
    var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
	<script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event) 
        {
            if (event.target == modal) 
            {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>

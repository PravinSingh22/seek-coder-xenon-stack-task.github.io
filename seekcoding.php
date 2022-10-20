<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: seekcoding.php");
    exit;
}
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    header("location: index.php");
    exit;
}?>
<?php include('cserver.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XENON</title>
    <link rel="stylesheet" href="style.css">
	<style>
	.form-box
	{
		text-color:white;
	}
	</style>
</head>
<body>
<div class="full-page">
    <div class="navbar">
        <div>
            <a href='website.html'>Seek Coding</a>
        </div>
        <nav>
            <ul id='MenuItems'>
                <li><a href='#'>Home</a></li>
                <li><a href='#'>About Us</a></li>
                <li><a href='#'>Services</a></li>
                <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Contact</button></li>
                <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;"><a onclick='return check()' href='logout.php'>logout</a></button></li>
            </ul>
        </nav>
    </div>
    <div id='login-form'class='login-page'>
        <div class="form-box">
            <div class='button-box'>
                <div id='btn'></div>
                <button type='button'onclick='login()'class='toggle-btn'>Contact</button>
            </div>

<?php
			$con=mysqli_connect("localhost","root","","seekcoding");
			if(!$con)
				die("cannot connect to server");
			else
			{
				$user=$_SESSION["username"];
				$query="select * from customer where name like'$user'";
				//$query="select * from student order by username";
				//$query="select * from student where email like '%@gmail.com'";
				$rows=mysqli_query($con,$query);
				
				if(mysqli_num_rows($rows)>0)
				{
					 echo "<form method='post'>";
				   while($row=mysqli_fetch_array($rows))
					{
						echo "	<div>
									<div>  
										<input type='text' name='t1' class='input-field' placeholder='Your Name' value='$row[1]' required>
									</div>
									<div>
										<input type='text' name='t2' class='input-field' placeholder='Phone No' value='$row[4]' required>
									</div>
								</div>
								<div >
									<input type='email' name='t3' class='input-field' placeholder='Email address' value='$row[3]' required>
								</div> 
								<div >
									<textarea name='t4' class='input-field'></textarea>
								</div> 
								<div >
									<button type='submit' name='t5' class='submit-btn'>Submit</button>
								</div> ";
					}
						echo "</form>";
				}
			}
			?>				

						</div> 
					</div> 

<?php
    if(isset($_POST["t5"]))
		{
			$name=$_POST["t1"];
			$phone=$_POST["t2"];
			$emailid=$_POST["t3"];
			$message=$_POST["t4"];
			$con=mysqli_connect("localhost","root","","seekcoding");
			if(!$con)
				die("cannot connect to server");

			else
				{
					$query="insert into chat(Chat_C_Name,customer_message) values ('".$name."','".$message."')";
					//$query="select * from chat order by id";
					
					$rows=mysqli_query($con,$query);
					
								if($rows==1)
								{
									echo"<script>alert('you send message!')</script>";
									echo"<script>location.href='seekcoding.php'</script>";
								}
				}
		}
?>
        </div>
    </div>
	</body>
</html>
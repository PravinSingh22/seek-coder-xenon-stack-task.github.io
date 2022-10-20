<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    header("location: digicluewebsite.php");
    exit;
}
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location:index.php");
    exit;
}
?>
<html>
	<head>
		<title>the digital clue website</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--bootstrap files-->	
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="css/jquery.min.js"></script>
		<script src="css/bootstrap.min.js"></script>
	<!--bootstrap files end-->
	<!--self import-->
		<link rel="stylesheet" href="css/commonpage.css">
		<link rel="stylesheet" href="css/homepage.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/w3.css">
	<!--self import end-->
	<!-- Start WOWSlider.com HEAD section -->
		<link rel="stylesheet" type="text/css" href="slider/engine1/style.css"/>
		<script type="text/javascript" src="slider/engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						</button>
						<a class="navbar-brand" href="#">digital marketing</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li class="active"><a href="digicluewebsite.php">Home</a></li>
							<li><a href="services.php">services</a></li>
							<li><a href="chatsection.php">chat</a></li>
							<li><a href="yourcart.php">Your cart</a></li>
							<li><a href="contact.php">contact</a></li>
							<li><a href="setting.php">setting</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<button type="button" class="btn btn-info btn-lg login1" data-toggle="modal" data-target="#myModal"><li><a onclick='return check()' href='logout.php'>logout</a></li></button> 
						</ul>
					</div>
				</div>
			</nav>
			<div class="row">
				<div class="col-md-12">
					<a name="home"></a>
					<div id="wowslider-container1">
						<div class="ws_images">
							<ul>
								<li><img src="slider/data1/images/digi1.jpg" alt="a" title="a" id="wows1" width="100%" height="500px"/></li>
								<li><img src="slider/data1/images/digi2.jpg" alt="b" title="b" id="wows1" width="100%" height="500px"/></li>
								<li><img src="slider/data1/images/digi3.jpg" alt="c" title="c" id="wows1" width="100%" height="500px"/></li>
								<li><img src="slider/data1/images/digi4.jpg" alt="d" title="d" id="wows1" width="100%" height="500px"/></li>
								<li><img src="slider/data1/images/digi5.jpg" alt="e" title="e" id="wows1" width="100%" height="500px" /></li>
								<li><img src="slider/data1/images/digi6.jpg" alt="f" title="f" id="wows1" width="100%" height="500px" /></li>
								<li><img src="slider/data1/images/digi7.jpg" alt="g" title="g" id="wows1" width="100%" height="500px" /></li>
							</ul>
						</div>
					</div>	
					<script type="text/javascript" src="slider/engine1/wowslider.js"></script>
					<script type="text/javascript" src="slider/engine1/script.js"></script>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<center>
						<a name="aboutus"><h2>About us</h2></a>
					</center>
						<div class="col-md-8 paraleft">
							<p>digiclue website Agency is a dynamic, versatile and 
								that doesn’t rely on smoke and mirrors to attract new clients. Instead, 
								Thrive trusts its own search engine optimization (SEO) and marketing skills
								to drive new customers to our website.</p>
						</div>
						<div class="col-md-4">
							<img src="image/digi9.jpg" class="abspright">
						</div>
						<div class="col-md-12 aboutsecondpart">
							<div class="col-md-4">
								<img src="image/digi.jpg" class="abspleft" >
							</div>
							<div class="col-md-8 pararight">
								<p>We’re not a static company. We don’t limit ourselves to specific industries.
									Thrive has the experience and professionals to build a custom website and use
									multiple digital marketing services to assist any size company .
								</p>
							</div>
						</div>
				</div>
			</div>	
			<div class="row" id="gallary">
				<div class="col-md-12 gallerypart">
					<center>
						<a name="gallary"><h2>Gallery</h2></a>
					</center>
					<div class="eimg">
						<div class="col-md-3 col-xs-6" >
							<img src="image/digi1.jpg"  style="cursor:pointer" onclick="onClick(this)" class="w3-hover-opacity" >
						</div>
						<div class="col-md-3 col-xs-6">
							<img src="image/digi2.jpg" style="cursor:pointer " onclick="onClick(this)" class="w3-hover-opacity"  >
						</div>
						<div class="col-md-3 col-xs-6" >
							<img src="image/digi3.jpg"  style="cursor:pointer" onclick="onClick(this)" class="w3-hover-opacity" >
						</div>
						<div class="col-md-3 col-xs-6">
							<img src="image/digi4.jpg"  style="cursor:pointer" onclick="onClick(this)" class="w3-hover-opacity" >
						</div>
						<div class="col-md-3 col-xs-6">
							<img src="image/digi5.jpg"  style="cursor:pointer" onclick="onClick(this)" class="w3-hover-opacity" >
						</div>
						<div class="col-md-3 col-xs-6">
							<img src="image/digi6.jpg"  style="cursor:pointer" onclick="onClick(this)" class="w3-hover-opacity" >
						</div>
						<div class="col-md-3 col-xs-6">
							<img src="image/digi7.jpg"  style="cursor:pointer" onclick="onClick(this)" class="w3-hover-opacity" >
						</div>
						<div class="col-md-3 col-xs-6">
							<img src="image/digi8.jpg"  style="cursor:pointer" onclick="onClick(this)" class="w3-hover-opacity" >
						</div>
					</div>
				</div>
			</div>
			<div class="row" id="contact_us">
				<div class="col-md-12 contactpart">
					<center>
						<a name="contactus"><h2>contact us</h2></a>
					</center>
					<a href="contact.php"><div class="col-md-5">
						<form>
							<table class="table table-striped">
								<tbody>
									<tr>
										<td scope="col" class="modalwindowk" style="padding-top:3.5%;">name</td>
										<td scope="col"> 
											<input type="textbox" placeholder="enter your name">
										</td>
									</tr>
									<tr>
										<td scope="row" class="modalwindowk" style="padding-top:3.5%;">mobile</td>
										<td><input type="mobile" placeholder="enter your mobile no" ></td>
									</tr>
									<tr>
										<td scope="row" class="modalwindowk" style="padding-top:3.5%;">email id</td>
										<td><input type="email" placeholder="enter your email" ></td>
									</tr>
									<tr>
										<td scope="row" class="modalwindowk" style="padding-top:6%;">message</td>
										<td><textarea placeholder="enter your message" style="padding-top:5%;"></textarea></td>
									</tr>
									<tr>
										<td scope="row" class="modalwindowk"></td>
										<td>
											<input type="submit" class="btn btn-success csk" value="submit" >
										</td>
									</tr>	
								</tbody>
							</table>
						</form>
					</div></a>
					<div class="col-md-7 footaddress">
						<div class="col-md-12">
							<div class="col-md-6">
								<i class="fa fa-home"></i>Block B, Industrial Area, Sector 62, Noida, Uttar Pradesh 201309
							</div>
							<div class="col-md-6">
								<i class="fa fa-mobile-phone"></i> 9803472389<br>
								<i class="fa fa-envelope-o"></i> nitinbhala21@gmail.com<br>
							</div>
						</div>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.36500060282!2d77.
						36004307866094!3d28.618820784608406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x
						390ce543ee6d3553%3A0xe524eda3c8e2cb86!2sCentre%20For%20Development%20Of%20Advanced%20Comp
						uting%2C%20Block%20B%2C%20Industrial%20Area%2C%20Sector%2062%2C%20Noida%2C%20Uttar%20Prad
						esh%20201309!5e0!3m2!1sen!2sin!4v1621087433072!5m2!1sen!2sin" width="600" height="350"
						style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
			</div>
			<div class="row foot-bground">
				<div class="col-md-12">
					<div class="col-md-4">
						<h3>about us</h3>
						<p>
							this website is just for testing the
							skills of web designing How to develop
							a website using different coding languages
							like HTML,CSS,JAVASCRIPT,PHP MYSQL DATABASE 
							and Upload/download  files using link to 
							server  
							<a href="#">read more...</a>
						</p>
			
					</div>
					<div class="col-md-2">
						<h3>usefull links</h3>
						<p>
							<i class="fa fa-angle-right"></i> <a href="#home">home</a><br>
							<i class="fa fa-angle-right"></i> <a href="#aboutus">about us</a><br>
							<i class="fa fa-angle-right"></i> <a href="#gallary">gallary</a><br>
							<i class="fa fa-angle-right"></i> <a href="#contactus">contact us</a><br>
						</p>
					</div>
					<div class="col-md-2">
						<h3>category</h3>
						<p>
							<i class="fa fa-angle-right"></i> download<br>
							<i class="fa fa-angle-right"></i> upload<br>
							<i class="fa fa-angle-right"></i> chat<br>
							<i class="fa fa-angle-right"></i> settings<br>
						</p>
					</div>
					<div class="col-md-4">
						<h3>developer Address</h3>
						<p>
							<i class="fa fa-map-marker" style="font-size:36px"></i>&nbsp;&nbsp;Block B, Industrial Area, Sector 62, Noida, Uttar Pradesh 201309<br>
							<i class="fa fa-mobile-phone" style="font-size:36px"></i>&nbsp;&nbsp;mobile No.9821342523<br>
							<i class="fa fa-envelope-o" style="font-size:24px"></i>&nbsp;&nbsp;abcd@gmail.com<br>
						</p>
					</div>
					<div class="col-md-12">
						<hr>
						<div class="col-md-4 footcpr">
								copyright digiclue members
						</div>
						<div class="col-md-4">
						</div>
						<div class="col-md-4">
							&nbsp;&nbsp;<i class="fa fa-facebook-official" style="font-size:36px"></i>
							&nbsp;&nbsp;<i class="fa fa-twitter" style="font-size:36px"></i>
							&nbsp;&nbsp;<i class="fa fa-linkedin" style="font-size:36px"></i>
							&nbsp;&nbsp;<i class="fa fa-youtube-play" style="font-size:36px"></i>
							&nbsp;&nbsp;<i class="fa fa-instagram" style="font-size:36px"></i>
						</div>
					</div>
				</div>	
			</div>
		</div>


	<div id="modal01" class="w3-modal" onclick="this.style.display='none'">
		<span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
		<div class="w3-modal-content w3-animate-zoom">
			<img id="img01" class="modalwindow">
		</div>
	</div>



	<script>
		function onClick(element) {
		  document.getElementById("img01").src = element.src;
		  document.getElementById("modal01").style.display = "block";
		}
	</script>
	</body>
</html>
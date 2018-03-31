<!DOCTYPE html>
<?php
include "connectEvents.php";

if(isset($_POST['id'])){
		$id= $_POST['id'];
}
echo $id;

$disp = mysqli_query($conn, "select id,title,image,about,para1,para2,datetime,location from events where id='$id'");

//predifined fetch constants
define('MYSQL_BOTH',MYSQLI_BOTH);
define('MYSQL_NUM',MYSQLI_NUM);
define('MYSQL_ASSOC',MYSQLI_ASSOC);?>

<html lang="en">


<head>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>


<body>

	<!-- Header -->
	<header>

		<!-- Nav -->
		<nav id="nav" class="navbar">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="index.html">
							<img class="logo" src="img/SunriseLogo.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="index.html#home">Home</a></li>
					<li><a href="index.html#about">Events</a></li>
					<li><a href="index.html#portfolio">Gallery</a></li>
					<li><a href="index.html#service">Clinics</a></li>
					<li><a href="index.html#pricing">Jobs</a></li>
					<li><a href="index.html#team">Team</a></li>
					<li class="has-dropdown"><a>Blog</a>
						<ul class="dropdown">
							<li><a href="#">blog post</a></li>
						</ul>
					</li>
					<li><a href="index.html#contact">Contact</a></li>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<!-- header wrapper -->
		<div class="header-wrapper sm-padding bg-grey">
			<div class="container">
				<?php
				//take not of the { bracket start here. later must end
				while($result = mysqli_fetch_array($disp, MYSQL_ASSOC)){
				 ?>
				<h2>
					<?php
					echo $result['title'];
					 ?>
				</h2>
			</div>
		</div>
		<!-- /header wrapper -->

	</header>

	<!-- /Header -->

	<!-- Blog -->
	<div id="blog" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Main -->
				<main id="main" class="col-md-9">
					<div class="blog">
						<div class="blog-img">
							<!-- <img class="img-responsive" src="./img/TechAwImage.jpg" alt=""> -->
							<?php
							echo'<img class="img-responsive" src="data:image/jpeg;base64,'.base64_encode($result['image']).'" alt="" style="width:900px;height:auto" >';
							?>

						</div>
						<div class="blog-content">
							<br><br>
							<h3>About Workshop:</h3>
								 <p>
									 <?php
				 					echo $result['about'];
				 					 ?>
								 </p>

								 <br>
									<p>
										<?php
									 echo $result['para1'];
										?>
									</p>
								<br>
									<p>
										<?php
									 echo $result['para2'];
										?>
									</p>
						</div>
				</main>
				<!-- /Main -->

				<!-- Aside -->
				<aside id="aside" class="col-md-3">

					<!-- Submit button -->
					<form action="eventsform.html">
						<input type="submit" class="reg-btn" value="REGISTER NOW!">
</form>
					<br><br><br>
					<!-- /Submit button -->

					<!-- date and time -->
					<div class="widget">
						<h3 class="title">DATE AND TIME</h3>
							<p>
								<?php
							 echo $result['datetime'];
								?>
							</p>
					</div>
					<!-- /date and time -->

					<!-- Location -->
					<div class="widget">
						<h3 class="title">LOCATION</h3>
				<!--		<p>The Salvation Army (Block B, Level 2)<br>
							356 Tanglin Road<br>
							Singapore</p> -->

							<p>
								<?php
							 echo $result['location'];
						 }
								?>
							</p>
					</div>
					<!-- /Location -->
				</aside>
				<!-- /Aside -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Blog -->



	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>



</body>



</html>

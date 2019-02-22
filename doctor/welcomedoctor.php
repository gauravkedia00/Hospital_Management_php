<!doctype html>
<html>
	<head>
		<title>National Health Care</title>
		<link rel="icon" href="../favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="js/min.css">
		<script src=""></script>
		<style>
			.carousel-inner > .item > img,
			.carousel-inner > .item > a > img {
			width: 70%;
			margin: auto;
			}
		</style>
		<link href="../header.footer.css" rel="stylesheet">
		<link href="../css/tablestyle.css" rel="stylesheet">
	</head>
	<body>
		<?php	
			include_once("../header.html");
		?>	
		<section class="content">
			<nav class="nav1">
				<ul>
					<li><a href="mydetails.php">My Details</a></li>
					<li><a href="myappointment.php">My Appointment</a></li>
					<li><a href="viewcustomers.php">View Customers</a></li>
					<li><a href="adddescription.php">Add Description</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<center><h1>Welcome !!</h1></center>
			</article>
		</section>
		<?php	
			include("../footer.html");
		?>
	</body>
</html>
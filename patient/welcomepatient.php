<?php	
	session_start();
	if(isset($_SESSION["uid"]))
	{
?>
<!doctype html>
<html>
	<head>
	<head>
		<title>National Health Care</title>
		<link rel="icon" href="../favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			.carousel-inner > .item > img,
			.carousel-inner > .item > a > img {
			width: 70%;
			margin: auto;
			}
		</style>
		<link href="../header.footer.css" rel="stylesheet">
		<link href="patient.css" rel="stylesheet">
		<link href="../css/tablestyle.css" rel="stylesheet">
	</head>
	<body class="body">
		<a id="top"></a>
		<?php
			include("../header.html");
		?>
		<section class="content">
			<nav class="nav1">
				<ul>
					<li><a href="mydetails.php">My Details</a></li>
					<li><a href="newbook.php">New Booking</a></li>
					<li><a href="viewbookings.php">View Bookings</a></li>
					<li><a href="cancelbooking.php">Cancel Booking</a></li>
					<li><a href="searchdoctor.php">Search Doctor</a></li>
					<li><a href="feedback.php"> Feedback</a></li>
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

<?php
	}
	else	
		header("Location:  ../plogin.html");
?>
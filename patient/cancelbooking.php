<?php	
	session_start();
	if(isset($_SESSION["uid"]))
	{
?>
<!doctype html>
<html>
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
			#cancel{
				border:0;
				border-radius:0;
				width:6%;
				height:25px;
				background:red;
				color:white;
				box-shadow:2px 2px 2px black;
			}
			#cancel:hover{
				-webkit-transform:scale(1.1);
				-moz-transform:scale(1.1);
				-o-transform:scale(1.1);
				transform:scale(1.1);
			}
			#cancel:active{
				background:white;color:black;
			}
			@media screen and (min-width:100px) and (max-width:500px)
			{
				#cancel{
					width:30%;
				}
			}
			@media screen and (min-width:501px) and (max-width:1000px)
			{
				#cancel{
					width:10%;
				}
			}
		</style>
		<link href="../header.footer.css" rel="stylesheet">
		<link rel="stylesheet" href="patient.css" />
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
					<li><a href="viewbookings.php" >View Bookings</a></li>
					<li class="active"><a href="cancelbooking.php">Cancel Booking</a></li>
					<li><a href="searchdoctor.php" >Search Doctor</a></li>
					<li><a href="feedback.php">Feedback</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<form action="cancelbooking.php" method="post">
					<h1>Cancel Booking</h1>
					<label>Booking ID</label> : <input type="number" placeholder="Enter Correct ID" name="bookid" required/><br><br>
					<input type="submit" value="Cancel" name="cancel" style="" id="cancel">
				</form>
				<?php
					include("../conn.php");
					$uid=$_SESSION["uid"];
					if(isset($_POST['cancel']))
					{
						$apid=$_POST['bookid'];
						$sql=$conn->query("select * from patientbook where apid='$apid' and uid='$uid'");
						if(($sql->num_rows)>0)
						{
							echo "<script>confirm('Do you really want to cancel ?');</script>";
							$result=$conn->query("delete from patientbook where uid='$uid' and apid='$apid'");
							echo "<h4 style='color:green;'>$apid Appointment Canceled.</h4>";
						}
						else
							echo "<script>alert('No such Appointment ID or Already been canceled!');</script>";
					}
				?>
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
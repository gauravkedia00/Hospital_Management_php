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
		</style>
		<link rel="stylesheet" href="patient.css" />
		<link href="../header.footer.css" rel="stylesheet">
		<link href="../css/tablestyle.css" rel="stylesheet">
		<link href="patient.css" rel="stylesheet">
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
					<li class="active"><a href="viewbookings.php" >View Bookings</a></li>
					<li><a href="cancelbooking.php">Cancel Booking</a></li>
					<li><a href="searchdoctor.php" >Search Doctor</a></li>
					<li><a href="feedback.php">Feedback</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<h1>Booking History</h1>
				<?php
					$uid=$_SESSION["uid"];
					include("../conn.php");
					if($result=$conn->query("SELECT * FROM patient p , patientbook pb , doctor d where p.uid='$uid' and pb.uid='$uid' and p.uid=pb.uid and pb.docid=d.docid"))
					{
						if(($rowcount=$result->num_rows)==0)
						{
							echo "<script>alert('No Bookings yet...!')</script>";
							echo "<i>you haven't made any appointment...</i>";
						}
						else
						{
							echo "<center><table><tr><th>Appointment ID</th><th>User ID</th><th>Doctor Name</th><th>Disease</th><th>Date</th><th>Time</th></tr>";
							while($row=$result->fetch_assoc())
							{
								echo "<tr><td>" .  $row['apid']. "</td><td>" . $row['uid']."</td><td>" . $row['doctorname']."</td><td>". $row['disease']."</td><td>". $row['ap_date']."</td><td>". $row['ap_time']."</td></tr>";
							}
							echo "</table></center>";
						}
					}
					else
						echo "<h2>You dont have booked yet.</h2>";
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
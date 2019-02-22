<?php
	session_start();
	if(isset($_SESSION["docid"]))
	{
?>
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
			include("../header.html");
		?>
		<section class="content">
			<nav class="nav1">
				<ul>
					<li><a href="mydetails.php">My Details</a></li>
					<li class="active"><a href="myappointment.php">My Appointment</a></li>
					<li><a href="viewcustomers.php">View Customers</a></li>
					<li><a href="adddescription.php">Add Description</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<h1>My Appointments</h1>
				<?php
					include("../conn.php");
					$docid=$_SESSION["docid"];
					// This will view all the appointments which the doctor has
					if($result=$conn->query("SELECT * FROM patientbook pb , doctor d where d.docid=pb.docid and d.docid='$docid' and pb.docid='$docid'"))
					{
						if(($rowcount=$result->num_rows)==0)
						{
							echo "<h4 style='color:red;'>No Appointments...</h4>";
						}
						else
						{
							echo "<center><table><tr><th>User ID</th><th>Appointment ID</th><th>Doctor Name</th><th>Disease</th><th>Date</th><th>Time</th></tr>";
							while($row=$result->fetch_assoc())
							{
								echo "<tr><td>" .  $row['uid'] . "</td><td>" . $row['apid']. "</td><td>" . $row['doctorname']."</td><td>" . $row['disease']."</td><td>". $row['ap_date']."</td><td>".$row['ap_time']."</td></tr>";
							}
							echo "</table></center>";
						}
					}
					$conn->close();
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
		header("Location:  ../dlogin.html");
?>
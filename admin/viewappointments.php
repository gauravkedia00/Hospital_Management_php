<?php	
	session_start();
	if(isset($_SESSION["adminid"]))
	{
?>
<!doctype html>
<html>
	<head>
		<title>National Health Care</title>
		<link rel="icon" href="../favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../header.footer.css" rel="stylesheet">
		<link href="../css/tablestyle.css" rel="stylesheet">
	</head>
	<body>
		<a id="top"></a>
		<?php
			require("../header.html");
		?>
		<div class="admincontent">
			<nav id="nav">
				<ul>
					<li><a href="adddoctor.php">Add<big>/</big>Delete Doctor</a></li>
					<li><a href="viewdoctor.php">View Doctor</a></li>
					<li><a href="viewcustomers.php">View Customers</a></li>
					<li class="active"><a href="viewappointments.php">View Appointments</a></li>
					<li><a href="viewfeedback.php">View Feedback</a></li>
					<li><a href="organdonor.php">Organ Donor</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<h1> Appointments !!</h1>
				<?php
					include("../conn.php");
					// To display all appointments
					if($result=$conn->query("SELECT * FROM patientbook pb , patient p , doctor d where pb.uid=p.uid and pb.docid=d.docid"))
					{
						if(($rowcount=$result->num_rows)==0)
						{
							echo "<script>alert('No result found!')</script>";
						}
						echo "<center><table><tr><th>User ID</th><th>Appointment ID</th><th>Patient Name</th><th>Doctor Name</th><th>Date</th><th>Time</th></tr>";
						while($row=$result->fetch_assoc())
						{
							echo "<tr><td>" .  $row['uid']. "</td><td>" . $row['apid']. "</td><td>" . $row['username']. "</td><td>" . $row['doctorname']."</td><td>". $row['ap_date'] ."</td><td>". $row['ap_time'] ."</td></tr>";
						}
						echo "</table></center>";
					}
					//close the connection with the database
					$conn->close();
				?>
			</article>
		</div>
		<?php
			require("../footer.html");
		?>
	</body>
</html>
<?php
	}
	else
		header("Location : ../alogin.html");
?>
<!--
<li><a href="searchdonor.php"> Search Organ</a></li>
		<link href="admin.css" rel="stylesheet">
-->
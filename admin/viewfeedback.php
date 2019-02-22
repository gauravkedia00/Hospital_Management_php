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
					<li><a href="viewappointments.php">View Appointments</a></li>
					<li class="active"><a href="viewfeedback.php">View Feedback</a></li>
					<li><a href="organdonor.php">Organ Donor</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<h1>View Feedback !!</h1>
				<?php
					require("../conn.php");
					//Displays patients feedback about doctors
					if($result=$conn->query("select * from feedback f, doctor d where f.docid=d.docid"))
					{
						if($result->num_rows>0)
						{
							echo "<center><table><caption style='color:lightgray;'>Feedback from patients to doctors</caption><tr><th>UID</th><th>Apt. ID</th><th>DocID</th><th>Doctor Name</th><th>Feedback</th><th>Date</th></tr>";
							while($row=$result->fetch_array())
							{
								echo "<tr><td>" . $row['uid']."</td><td>". $row['apid']."</td><td>". $row['docid']. "</td><td>" . $row['doctorname']."</td><td>" . $row['feedback']."</td><td>" . $row['date']."</td></tr>";
							}
							echo "</table></center>";
						}
						else
							echo "<mark style='background-color:black;color:white;'>no feedbacks....</mark>";
							
					}
					if($result=$conn->query("select * from sitefeedback s, patient p where s.uid=p.uid"))
					{
						//displays users feedback about the portal
						if($result->num_rows>0)
						{
							echo "<br><br><h4>Customer Feedback</h4><center><table><caption style='color:lightgray;'>Feedback from patients to our Online Appointment System</caption><tr><th>User ID</th><th>User Name</th><th>Feedback</th><th>Date</th></tr>";
							while($row=$result->fetch_array())
							{
								echo "<tr><td>" . $row['uid']."</td><td>". $row['username']."</td><td>". $row['feedback']."</td><td>". $row['date']. "</td></tr>";
							}
							echo "</table></center>";
						}
						else
							echo "<mark style='background-color:black;color:white;'>No feedbacks....</mark>";
					}
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
		header("Location: ../alogin.html");
?>
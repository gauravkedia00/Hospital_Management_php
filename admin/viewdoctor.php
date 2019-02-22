<?php	
	session_start();
	if(isset($_SESSION["adminid"]))
	{
?><!doctype html>
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
					<li class="active"><a href="viewdoctor.php">View Doctor</a></li>
					<li><a href="viewcustomers.php">View Customers</a></li>
					<li><a href="viewappointments.php">View Appointments</a></li>
					<li><a href="viewfeedback.php">View Feedback</a></li>
					<li><a href="organdonor.php">Organ Donor</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<h1> Doctor  Details !!</h1>
				<?php
					include("../conn.php");
					//to display all doctors
					if($result=$conn->query("SELECT * FROM doctor"))
					{
						if(($rowcount=$result->num_rows)==0)
						{
							echo "<script>alert('No result found!')</script>";
						}
						echo "<center><table><tr><th>Doctor ID</th><th>Name</th><th>Gender</th><th>Address</th><th>Mobile</th><th>Category</th></tr>";
						while($row=$result->fetch_assoc())
						{
							echo "<tr><td>" .  $row['docid']. "</td><td>" . $row['doctorname']."</td><td>" . $row['gender']."</td><td>". $row['address']."</td><td>". $row['contactno']."</td><td>". $row['category']."</td></tr>";
						}
						echo "</table></center>";
					}
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
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
					<li class="active"><a href="viewcustomers.php">View Customers</a></li>
					<li><a href="viewappointments.php">View Appointments</a></li>
					<li><a href="viewfeedback.php">View Feedback</a></li>
					<li><a href="organdonor.php">Organ Donor</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<h1>Customer Details !!</h1>
				<form action="viewcustomers.php" method="post">
					Customer ID:- <input type="text" name="uid" required>
					<input type="submit" value="Search" name="search">
				</form>
				<?php
					include("../conn.php");
					//if there is no search
					if(!isset($_POST['search']))
					{
						if($result=$conn->query("SELECT * FROM patient"))
						{
							if(($rowcount=$result->num_rows)==0)
							{
								echo "<script>alert('No result found!')</script>";
							}
							echo "<br><br><br><center><table><tr><th>ID</th><th>Name</th><th>Gender</th><th>Address</th><th>Mobile No.</th><th>Email</th><th>Age</th></tr>";
							while($row=$result->fetch_assoc())
							{
								echo "<tr><td>" .  $row['uid']. "</td><td>" . $row['username']. "</td><td>" . $row['gender']."</td><td>". $row['address'] ."</td><td>". $row['contactno'] ."</td><td id=email>" .$row['email'] ."</td><td>".$row['age']."</td></tr>";
							}
							echo "</table></center>";
						}
					}
					//search for particular patient based on its id
					if(isset($_POST['search']))
					{
						$uid=$_POST['uid'];
						if($result=$conn->query("SELECT * FROM doctortreat where uid ='$uid'"))
						{
							if(($rowcount=$result->num_rows)==0)
							{
								echo "<script>alert('No result found!')</script>";
							}
							echo "<br><br><br><center><h1>Patient's Treatment History</h1><table border=1 cellspacing=0 cellpadding=0><tr><th>User Id</th><th>Disease</th><th>Treatment</th><th>Doctor Note</th><th>Date & Time</th></tr>";
							while($row=$result->fetch_assoc())
							{
								echo "<tr><td>" .  $row['uid']. "</td><td>" . $row['treatmentfor']. "</td><td>" . $row['treatment']."</td><td>". $row['doctornote'] ."</td><td>". $row['tdatetime'] ."</td></tr>";
							}
							echo "</table></center>";
						}
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
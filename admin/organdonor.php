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
					<li><a href="viewdoctor.php">View Doctor</a></li>
					<li><a href="viewcustomers.php">View Customers</a></li>
					<li><a href="viewappointments.php">View Appointments</a></li>
					<li><a href="viewfeedback.php">View Feedback</a></li>
					<li class="active"><a href="organdonor.php">Organ Donor</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<h1>Search Donor</h1>
				<form action="organdonor.php" method="post">
					Search By 
						<select name="by">
							<option value="Organ">Organ</option>
							<option value="bloodgroup">Bloodgroup</option>
					   </select><br><br>
					Type here <input type="text" placeholder="type" name="type"><br><br>
					<input type="submit" value="Search" name="search">
				</form>
				<br><br>
				<?php
					include("../conn.php");
					//if there is no search
					if(!isset($_POST['search']))
					{
						// display all values from the database
						if($result=$conn->query("SELECT * FROM donateonline"))
						{
							if(($rowcount=$result->num_rows)==0)
							{
								echo "<script>alert('No result found!')</script>";
							}
							echo "<center><table><tr><th>Donor Name</th><th>Age</th><th>Gender</th><th>Blood Group</th><th>Donate</th></tr>";
							while($row=$result->fetch_assoc())
							{
								echo "<tr><td>" .  $row['fname']." ". $row['lname'] ."</td><td>" . $row['age']."</td><td>" . $row['gender']."</td><td>". $row['bloodgroup']."</td><td>". $row['organ']."</td></tr>";
							}
							echo "</table></center>";
						}
						else
							echo "<b>No Donor</b>";
					}
					//if any search is performed
					else if(isset($_POST['search']))
					{
						$by=$_POST['by'];
						$type=$_POST['type'];
						//if search is perform only for organ
						if($by=="Organ")
							$result=$conn->query("SELECT * FROM donateonline where organ='$type'");
						//search for bloodgroup
						else if($by=="bloodgroup")
							$result=$conn->query("SELECT * FROM donateonline where bloodgroup='$type'");
						//displays all results from the table which matches the query
						if($result)
						{
							if(($rowcount=$result->num_rows)==0)
							{
								echo "<script>alert('No result found!')</script>";
							}
							echo "<center><table><tr><th>Donor Name</th><th>Age</th><th>Gender</th><th>Blood Group</th><th>Donate</th></tr>";
							while($row=$result->fetch_assoc())
							{
								echo "<tr><td>" .  $row['fname']." ". $row['lname'] ."</td><td>" . $row['age']."</td><td>" . $row['gender']."</td><td>". $row['bloodgroup']."</td><td>". $row['organ']."</td></tr>";
							}
							echo "</table></center>";
						}
						else
							echo "<b>No Donor</b>";
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
		header("Location : ../alogin.html");
?>
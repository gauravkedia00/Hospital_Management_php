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
		<script src=""></script>
		<style>
			.carousel-inner > .item > img,
			.carousel-inner > .item > a > img {
			width: 70%;
			margin: auto;
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
					<li><a href="viewbookings.php">View Bookings</a></li>
					<li><a href="cancelbooking.php">Cancel Booking</a></li>
					<li><a href="searchdoctor.php">Search Doctor</a></li>
					<li class="active" ><a href="feedback.php">Feedback</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<form action="feedback.php" method="post">
					<?php
						include("../conn.php");
						$uid=$_SESSION["uid"];
						if($result=$conn->query("SELECT * FROM patient p,doctortreat dt, patientbook pb where p.uid=dt.uid and pb.uid=p.uid and p.uid='$uid'"))
						{
							if(($rowcount=$result->num_rows)==0)
							{
								echo "<script>alert('You can't give feedback to doctors...')</script>";
								echo "<i style='color:red;'>You can't give feedback to doctors...</i>";
							}
							else
							{
								echo "<center><h1>Feedback Form</h1><table><tr><th>Appointment ID</th><th>Doctor ID</th><th>Doctor Note</th></tr>";
								while($row=$result->fetch_assoc())
								{
									echo "<tr><td>" .  $row['apid']. "</td><td>" . $row['docid']."</td><td>" . $row['doctornote']."</td></tr>";
								}
								echo "</table></center>";
					?>
					<br><br>
					<input type="text" placeholder="Appointment ID" name="apid" size="10px" required>&nbsp
					<input type="text" placeholder="   Type Your Feedback"name="feedback" required>
					<input type="submit" value="Submit" name="Submit">
					<?php
						}
					}
					?>
					</form>
					<?php
						if(isset($_POST['Submit']))
						{
							$feedback=$_POST['feedback'];
							$apid=$_POST['apid'];
							$uid=$_SESSION["uid"];
							if($result=$conn->query("select docid from doctortreat where uid=$uid and tid=$apid")->fetch_object())
							{
								//$row=$result->fetch_object();
								$docid=$result->docid;
								$date=date("Y-m-d");
								if($conn->query("insert into feedback values('$apid','$docid','$uid','$feedback','$date')"))
									echo "<script>alert('Feedback submitted.');</script>";
								else	
									echo "<b style='color:red;'>Already Submitted...</b>";
							}
							else 
								echo "<script>alert('Invalid Appointment ID.');</script>";
						}
					?>
					<br><br><hr>
					<form action="feedback.php" method="post">
						<br><h1>Feedback to our Online Appointment System.</h1>
						Your Feedback :&nbsp
						<select name="feed">
							<option value="Excellent">Excellent</option>
							<option value="Very Good">Very Good</option>
							<option value="Average">Average</option>
							<option value="Good">Good</option>
							<option value="Need Improvement">Need Improvement</option>
						</select><br><br>
						<input type="submit" value="Submit" name="rate">
					</form>
					<br>
					<?php
						if(isset($_POST['rate']))
						{
							$feedback=$_POST['feed'];
							$uid=$_SESSION["uid"];
							$date=date("Y-m-d");
							if($conn->query("insert into sitefeedback values('$uid','$feedback','$date')"))
								echo "<mark>Yeah! Thank you for your feedback.</mark>";
							else
								echo "already given...";
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

<!--

				<form action="">
					<h1>Feedback : </h1><textarea placeholder="Enter your Feedback here ..."<!--style="margin: 2px; height: 113px; width: 319px;" ></textarea><br><br>
					<input type="submit" value="Done">
				</form>

-->
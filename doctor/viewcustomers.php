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
			include("../conn.php");
		?>
		
		<section class="content">
			<nav class="nav1">
				<ul>
					<li><a href="mydetails.php">My Details</a></li>
					<li><a href="myappointment.php">My Appointment</a></li>
					<li class="active"><a href="viewcustomers.php">View Customers</a></li>
					<li><a href="adddescription.php">Add Description</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<h1>Customer Details!!</h1>
				<form action="viewcustomers.php" method="post">
					Customer ID:- <input type="text" name="uid" required>&nbsp;
						<input type="submit" value="Search" name="search">
				</form>
				<?php
					$docid=$_SESSION["docid"];
					// It view all the customers of the doctor.
					if($result=$conn->query("select distinct(p.uid),p.username,p.gender,p.address,p.email,p.contactno from patient p, patientbook pb where p.uid=pb.uid and pb.docid='$docid'"))
					{
						if(($rowcount=$result->num_rows)==0)
						{
							echo "<h3 style='color:red'>you aren't booked yet...</h3>";
						}
						else
						{
							echo "<br><br><center><table><tr><th>User ID</th><th>Name</th><th>Gender</th><th>Address</th><th>Mobile No.</th><th>Email</th></tr>";
							while($row=$result->fetch_assoc())
							{
								echo "<tr><td>" .  $row['uid']. "</td><td>" . $row['username']."</td><td>" . $row['gender']."</td><td>". $row['address']."</td><td>". $row['contactno']."</td><td>".$row['email']."</td></tr>";
							}
							echo "</table></center>";
						}
					}
					
					if(isset($_POST['search']))
					{
						// This search for a particular customer
						$uid=$_POST['uid'];
						$docid=$_SESSION['docid'];
						if($result=$conn->query("select * from doctortreat where docid='$docid' and uid='$uid' 
											and tid in (select apid from patientbook p,doctortreat d 
														where d.docid=p.docid)"))
						{
							if($result->num_rows==0)
							{
								echo "<h3 style='color:red'>No treatment History...</h3>";
							}
							else
							{
								echo "<br><br><center><h1>Patient's Treatment History</h1><table><tr><th>User ID</th><th>Disease</th><th>Treatment</th><th>Doctor Note</th><th>Date & Time</th></tr>";
								while($row=$result->fetch_array())
								{
									echo "<tr><td>" .  $row['uid']. "</td><td>" . $row['treatmentfor']."</td><td>" . $row['treatment']."</td><td>". $row['doctornote']."</td><td>". $row['tdatetime']."</td></tr>";
								}
								echo "</table></center>";
							}
						}
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
		header("Location:  ../dlogin.html");
?>
<!--

SELECT distinct(p.uid),p.username,p.gender,p.address,p.email,p.contactno FROM patient p , doctortreat dt where dt.docid='$docid' and dt.uid=p.uid

SELECT * FROM doctortreat dt , patientbook p where  dt.docid='$docid' and dt.docid=p.docid and dt.uid='$uid
select distinct(p.apid),dt.treatmentfor,dt.treatment,dt.doctornote,p.ap_date,p.ap_time from doctortreat dt, patientbook p where p.docid='$docid' and p.uid='$uid' and dt.uid=p.uid

		<link rel="stylesheet" href="doctor.css" />
-->
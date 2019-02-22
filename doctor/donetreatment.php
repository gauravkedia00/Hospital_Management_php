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
			$docid=$_SESSION["docid"];
		
		?>
		<section class="content">
			<nav class="nav1">
				<ul>
					<li><a href="mydetails.php">My Details</a></li>
					<li><a href="myappointment.php">My Appointment</a></li>
					<li><a href="viewcustomers.php">View Customers</a></li>
					<li class="active"><a href="adddescription.php">Add Description</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
				<?php 
							if(isset($_POST['add']))
							{
								// Doctor will add the treatment for his patient.
								$apid=$_SESSION["apid"];
								$treatmentfor=$_POST['treatmentfor'];
								$treatment=$_POST['treatment'];
								$doctornote=$_POST['doctornote'];
								$userid=$conn->query("select * from patientbook pb where pb.apid='$apid'");
								$userid=$userid->fetch_object();
								$userid=$userid->uid;
								$tdatetime=date("Y:m:d H:i:s");
								$result=$conn->query("insert into doctortreat values('$apid','$userid','$docid','$treatmentfor','$treatment','$doctornote','$tdatetime')");
								if($result)
								{
									$conn->query("update patientbook set done=1 where apid='$apid'");
									echo "<script>alert ('Treatment is added.') ;</script>";
									header("Location: adddescription.php");
								}
								else	
									echo "<script>alert ('Treatment is already added.') ;</script>";
							}
							else	
								echo "<br><br>Try again...";
						
					
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
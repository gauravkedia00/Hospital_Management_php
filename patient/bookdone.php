<?php	
	session_start();
	if(isset($_SESSION["uid"]))
	{
?>
<!doctype html>
<html>
	<head>
		<script type="text/javascript">
		</script>
		
		<title>National Health Care</title>
		<link rel="icon" href="../favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<link href="../header.footer.css" rel="stylesheet">
		<link rel="stylesheet" href="patient.css" />
		<link href="../css/tablestyle.css" rel="stylesheet">
		<style>
			#search{
				background:blue;
				height:30px;
				width:6%;
				color:white;
			}
			@media screen and (min-width:100px) and (max-width:500px)
			{
				#search{
					height:30px;
					width:20%;
				}
			}
			@media screen and (min-width:501px) and (max-width:1000px)
			{
				#search{
					height:30px;
					width:10%;
				}
			}
		</style>
	</head>
	<body class="body">
		<a id="top"></a><?php
			include("../header.html");
			include("../conn.php");
			$uid=$_SESSION["uid"];
			$time=$_POST['time'];
			$date=$_POST['date'];
			$cat=$_POST['cat'];
			$apid=$_SESSION["apid"];
			
		?>
		<section class="content">
			<nav class="nav1">
				<ul>
					<li><a href="mydetails.php">My Details</a></li>
					<li class="active"><a href="newbook.php">New Booking</a></li>
					<li><a href="viewbookings.php" >View Bookings</a></li>
					<li><a href="cancelbooking.php">Cancel Booking</a></li>
					<li><a href="searchdoctor.php" >Search Doctor</a></li>
					<li><a href="feedback.php">Feedback</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
			<article>
							<?php
								if(isset($_POST['Book']))
								{
									$time=$_POST['time'];
									$date=$_POST['date'];
									$cat=$_POST['cat'];
									$doctor=$_POST['doctor'];
									echo "fjhdskjbkjdskjd";
									$sql=$conn->query("select docid from doctor where doctorname='$doctor'");
									$row=$sql->fetch_object();
									$docid=$row->docid;
									$done=0;
									$result=$conn->query("insert into patientbook values('$uid','$docid','$apid','$date','$time','$cat','$done')");
										
									if($result){
										$_SESSION["tid"]=$_SESSION["apid"];
										echo "<script>alert('Appointment done !')</script>";
										header("Location: newbook.php");
									}
									else	
										echo "<br><i style='color:red'>Select any doctor & try again...</i>";
								}
								else
									echo "try again.....";
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


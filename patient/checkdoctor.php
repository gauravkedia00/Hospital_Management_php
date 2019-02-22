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
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
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
			/*$uid=$_SESSION["uid"];
			$time=$_POST['time'];
			$date=$_POST['date'];
			$cat=$_POST['cat'];
			$apid=$_SESSION["apid"];
			//$row=$conn->query("select * from patientbook where uid='$uid' and disease")->fetch_object();
			//$apid=substr($cat,0,1).$uid;*/
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
					if(isset($_POST['check']))
					{
						$date=$_POST['date'];
						$time=$_POST['time'];
						$cat=$_POST['cat'];
						$cdate=date("Y-m-d");
						$ctime=date("H:i:s");
						$uid=$_SESSION["uid"];
						$sql=$conn->query("select * from patientbook where uid='$uid' and disease='$cat' and ap_date='$date' and ap_time='$time'");
						if($date<$cdate||($time<$ctime&&$date<=$cdate))
						{
							echo "<script>alert('please enter correct time..');</script>";
							header("Location:  newbook.php");
						}
						else if($sql->num_rows>0){
							echo "<script>alert('You have already book.');</script>";
							header("Location:  newbook.php");
						}
						else
						{
						
				?>
		
				<h1>Available Doctors</h1>
					<?php
						if($result=$conn->query("(select d.doctorname from doctor d 
												where d.category='$cat' and d.docid not in ( select pb.docid from patientbook pb , doctor d 
																							where d.docid!=pb.docid and d.category='$cat') )
											UNION (select d.doctorname from doctor d ,patientbook pb
														where d.docid=pb.docid and d.category='$cat' and pb.done=1)"))	
						{
							if(($rowcount=$result->num_rows)==0)
							{
								echo "<script>alert('Database Checked!')</script>";
								echo "<h5 style='color:red;'>No doctor is available</h5>";
								//header("Location: newbook.php");
							}
							else
							{
					?>
								<center>
								<form action='bookdone.php' method='post' >
									<input type="hidden" name="date" value="<?php echo $date?>">
									<input type="hidden" name="apid" value="<?php echo $apid?>">
									<input type="hidden" name="time" value="<?php echo $time?>">
									<input type="hidden" name="cat" value="<?php echo $cat?>">
							<?php
								while($row=$result->fetch_assoc())
								{
									echo "<input type=radio name=doctor value=$row[doctorname] >$row[doctorname]<br>";
								}
							?>
									<br><input type='submit' value="Book" name='Book' id="search">
								</form>
				<?php
							}
						}
						else
							echo "<br><h5 style='color:red;'>No doctor is available..</h5>";
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
		header("Location:  ../plogin.html");
?>

<!--
"(select * from doctor d,patientbook pb where pb.docid!=d.docid and d.category='$cat')
						  (select * from  doctor d , patientbook pb
												where pb.docid=d.docid and pb.ap_time!='$time' and pb.ap_date!='$date' and d.category='$cat') "
												-->